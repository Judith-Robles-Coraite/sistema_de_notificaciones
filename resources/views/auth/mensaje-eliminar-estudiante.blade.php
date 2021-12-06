
<!-- Modal -->
<div class="modal fade" id="modal-delete-{{$estudiante-> id_estudiantes}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{route('borrar',[ 'id_estudiantes'=> $estudiante-> id_estudiantes ])}}" method="POST" >
		@csrf
		@method('delete')         
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseas eliminar del registro a {{$estudiante-> apellido_paterno." ".$estudiante-> apellido_materno." ".$estudiante-> primer_nombre." ".$estudiante-> segundo_nombre}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger" value="delete">Borrar</button>
      </div>

    </div>
    </form>
  </div>
</div>
