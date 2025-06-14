@php $user = $user ?? null; @endphp

<div class="mb-3">
    <label>Nom</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $user?->name) }}" required>
</div>

<div class="mb-3">
    <label>Prénom</label>
    <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $user?->prenom) }}">
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $user?->email) }}" required>
</div>

<div class="mb-3">
    <label>Téléphone</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $user?->phone) }}">
</div>

<div class="mb-3">
    <label>Adresse</label>
    <input type="text" name="adresse" class="form-control" value="{{ old('adresse', $user?->adresse) }}">
</div>

<div class="mb-3">
    <label>Date de naissance</label>
    <input type="date" name="date_naissance" class="form-control" value="{{ old('date_naissance', $user?->date_naissance) }}">
</div>

<div class="mb-3">
    <label>Photo (URL)</label>
    <input type="file" name="photo" class="form-control" value="{{ old('photo', $user?->photo) }}">
</div>

<div class="mb-3">
    <label>Statut</label>
    <select name="statut" class="form-control">
        <option value="1" {{ old('statut', $user?->statut) ? 'selected' : '' }}>Actif</option>
        <option value="0" {{ old('statut', $user?->statut) === 0 ? 'selected' : '' }}>Inactif</option>
    </select>
</div>

<div class="mb-3">
    <label>Mot de passe {{ isset($user) ? '(laisser vide pour ne pas changer)' : '' }}</label>
    <input type="password" name="password" class="form-control">
</div>

<div class="mb-3">
    <label>Confirmer mot de passe</label>
    <input type="password" name="password_confirmation" class="form-control">
</div>
