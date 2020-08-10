  
  <!-- Modal -->
  <div class="modal fade" id="modalEliminar-{{$nota->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Actividad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Deseas eliminar esta Actividad?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <form action="{{route('todas.destroy',$nota->id)}}" method="POST">
            @csrf
            @method('DELETE')
          <button type="submit" class="btn btn-primary">Eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>