<?php

use App\Http\Controllers\ConseilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiagnosticController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\front\AcceuilController;
use App\Http\Controllers\front\ConseilfrontController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\MaladieController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MetricsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['auth'])->group(function () {
    Route::resource('forums', ForumController::class);
    Route::post('/forums/{forum}/messages', [MessageController::class, 'store'])->name('forums.message.store');

});

// routes/web.php

Route::get('/forums/{forum}/add-user', [ForumController::class, 'showAddUserForm'])->name('forums.add-user.form');
Route::post('/forums/{forum}/add-user', [ForumController::class, 'addUser'])->name('forums.add-user');



use App\Http\Controllers\TwoFactorController;

Route::get('/2fa', [TwoFactorController::class, 'index'])->name('2fa.index');
Route::post('/2fa', [TwoFactorController::class, 'store'])->name('2fa.store');




Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::get('users/{user}/assign-roles', [UserRoleController::class, 'edit'])->name('users.assign-roles');
    Route::post('users/{user}/assign-roles', [UserRoleController::class, 'update']);
});
Route::get('roles/{role}/permissions', [PermissionController::class, 'show'])->name('roles.permissions.show');
Route::get('users/{user}/roles', [UserRoleController::class, 'edit'])->name('users.roles.edit');
Route::patch('users/{user}/roles', [UserRoleController::class, 'update'])->name('users.roles.update');
Route::get('/roles/{role}/permissions/edit', [RolePermissionController::class, 'edit'])->name('roles.permissions.edit');
Route::patch('/roles/{role}/permissions', [RolePermissionController::class, 'update'])->name('roles.permissions.update');



Route::middleware(['auth', '2fa'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::post('/2fa/resend', [TwoFactorController::class, 'resend'])->name('2fa.resend');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index')->middleware('permission:users-read');
    Route::get('/create', [UserController::class, 'create'])->name('create')->middleware('permission:users-create');
    Route::post('/', [UserController::class, 'store'])->name('store')->middleware('permission:users-create');
    Route::get('/{user}', [UserController::class, 'show'])->name('show')->middleware('permission:users-read');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit')->middleware('permission:users-edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('update')->middleware('permission:users-update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy')->middleware('permission:users-delete');
    Route::patch('/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('toggleStatus')->middleware('permission:users-update');
});


Route::resource('maladies', MaladieController::class);
Route::resource('recommendations', RecommendationController::class);


Route::get('/diagnostics', [DiagnosticController::class, 'index'])->name('diagnostics.index');
Route::delete('/diagnostics/{id}', [DiagnosticController::class, 'destroy'])->name('diagnostics.destroy');




Route::prefix('conseils')
    ->name('conseils.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', [ConseilController::class, 'index'])->name('index');
        Route::get('/create', [ConseilController::class, 'create'])->name('create');
        Route::post('/', [ConseilController::class, 'store'])->name('store');
        Route::get('/{id}', [ConseilController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [ConseilController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ConseilController::class, 'update'])->name('update');
        Route::delete('/{id}', [ConseilController::class, 'destroy'])->name('destroy');
    });



Route::get('/metrics', MetricsController::class);




Route::view('/predict', 'predict')->name('predict.form');
use App\Models\Diagnostic;
use App\Models\Maladie;
use Illuminate\Support\Facades\Storage;

Route::post('/predict', function (Request $request) {
    $request->validate([
        'image' => 'required|image|max:2048'
    ]);

    $image = $request->file('image');
    $path = $image->store('diagnostics', 'public');

    try {
        $response = Http::attach(
            'file', Storage::disk('public')->get($path), $image->getClientOriginalName()
        )->post('http://127.0.0.1:8030/predict');

        if ($response->successful()) {
            $result = $response->json();

            $maladie = Maladie::where('nom', $result['predicted_class'])->with('recommendations')->first();

            // Enregistrer le diagnostic avec la relation maladie_id
            Diagnostic::create([
                'image_path' => $path,
                'predicted_class' => $result['predicted_class'],
                'confidence' => $result['confidence'],
                'maladie_id' => $maladie ? $maladie->id : null,
            ]);

            if ($maladie) {
                return redirect()->route('predict.form')->with([
                    'result' => $result,
                    'maladie' => $maladie
                ]);
            } else {
                return redirect()->route('predict.form')->with([
                    'result' => $result,
                    'message' => "Aucune information enregistrée pour la maladie « " . $result['predicted_class'] . " »."
                ]);
            }
        } else {
            return back()->with('error', 'Erreur FastAPI : ' . $response->body());
        }
    } catch (\Exception $e) {
        return back()->with('error', 'Erreur de connexion à FastAPI : ' . $e->getMessage());
    }
})->name('predict');










Route::get('/', [AcceuilController::class, 'index']);

Route::prefix('conseils_conseil')->name('front.conse.')->group(function () {
    Route::get('/', [ConseilfrontController::class, 'index'])->name('list');
    Route::get('/{id}', [ConseilfrontController::class, 'show'])->name('detail');
});
