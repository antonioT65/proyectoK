<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addRol" data-whatever="@mdo">Crear Grupo</button>
{!! Form::open(['url' => 'grupos']) !!}
{!! Form::token() !!}
<div class="modal fade" id="addRol" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"> 
        <h5 class="modal-title">Nuevo Grupo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre del grupo:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Grupo</button>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}