<div class="modal fade" id="{{ $target }}" tabindex="-1" aria-labelledby="modalDelete"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $route }}" method="post">
            @csrf
            @method('DELETE')

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDelete">Tem certeza que deseja excluir {{ $item ?? '' }}?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Sim, excluir</button>
                </div>
            </div>
        </form>
    </div>
</div>
