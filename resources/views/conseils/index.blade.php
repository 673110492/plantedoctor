@extends('layouts.app1')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Liste des Conseils</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('conseils.create') }}" class="mb-3 btn btn-primary">Ajouter un conseil</a>

    <div class="table-responsive">
        <table id="conseilTable" class="table align-middle table-bordered table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Nom scientifique</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col" style="min-width: 160px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conseils as $key => $conseil)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $conseil->nom }}</td>
                    <td>{{ $conseil->nom_scientifique ?? '-' }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($conseil->description_courte, 50, '...') }}</td>
                    <td>
                        @if($conseil->image_principale_url)
                            <img src="{{ asset('storage/' . $conseil->image_principale_url) }}"
                                 alt="Image de {{ $conseil->nom }}"
                                 style="max-width: 30px; height: auto; border-radius: 4px;">
                        @else
                            <span class="text-muted">Aucune</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('conseils.edit', $conseil->id) }}" class="mb-1 btn btn-sm btn-warning me-1">Modifier</a>
                        <a href="{{ route('conseils.show', $conseil->id) }}" class="mb-1 btn btn-sm btn-info me-1">Voir</a>

                        <!-- Bouton suppression qui ouvre le modal -->
                        <button type="button" class="mb-1 btn btn-sm btn-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal"
                            data-id="{{ $conseil->id }}"
                            data-nom="{{ $conseil->nom }}">
                            Supprimer
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="deleteForm" method="POST" action="">
        @csrf
        @method('DELETE')

        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Confirmer la suppression</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>

        <div class="modal-body">
          <p>Voulez-vous vraiment supprimer le conseil <strong id="conseilName"></strong> ?</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </div>

      </form>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<!-- DataTables CSS/JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- Bootstrap 5 JS (nécessaire pour modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        $('#conseilTable').DataTable({
            responsive: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            columnDefs: [
                { orderable: false, targets: 5 }
            ]
        });

        // Lorsqu'on ouvre le modal, on met à jour le formulaire avec l'ID et le nom
        $('#deleteModal').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget); // bouton qui a déclenché le modal
            const conseilId = button.data('id');
            const conseilNom = button.data('nom');

            // Met à jour le texte dans le modal
            $('#conseilName').text(conseilNom);

            // Met à jour l'attribut action du formulaire
            const url = "{{ route('conseils.destroy', ':id') }}".replace(':id', conseilId);
            $('#deleteForm').attr('action', url);
        });
    });
</script>
@endsection
