<!-- Modal -->
<div class="modal fade" id="modal-delete-{{$aula-> id_aulas}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{route('aulas.destroy',$aula-> id_aulas )}}" method="POST" >
		@csrf
		@method('delete')         
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Aula</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseas eliminar del registro a {{$aula->grado['descripcion']." ". $aula->paralelo}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger" value="delete">Borrar</button>
      </div>

    </div>
    </form>
  </div>
</div>
