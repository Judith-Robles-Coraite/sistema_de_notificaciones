@extends('layouts.plantilla')

@section('title','Representantes')

@section('content')

<!DOCTYPE html>
<html lang="es">
<body>
<div class="panel-heading">
	</div>
	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif

		<div class="container col-md-12 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Aulas</h2>
				
				</div>
                
                <div class="col-xl-12">
					<form action="{{route('aulas.index')}}" method="get">
						<div class="form-group">
							 
							
							<div class="col-sm-4 my-1">
								<a href="{{route('aulas.create')}}" class="btn btn-success"> + Añadir Aulas</a>
							</div>
						</div>
						
					</form>
				
				

                </div>
				

				@if ($aulas->isEmpty())
					<div>No Aulas</div>
				@else
					<table class="table">
                    
						<thead>
							<tr>
								<th>ID</th>
                                <th>Grado </th>
								<th>Paralelo</th>
								<th>Docente</th>
								<th>Acciones</th>
							</tr>
						</thead>
                        
						<tbody>
                        @foreach($aulas as $aula)
								<tr>
									<td>{!! $aula->id_aulas !!}</td>
                                    <td>{!! $aula->grado['descripcion']!!}</td>
									<td>{!! $aula->paralelo!!}</td>
                                    <td>{!! $aula->docentes['apellido_paterno'],' ',
                                            $aula->docentes['apellido_materno'],' ',
                                            $aula->docentes['primer_nombre'],' ',
                                            $aula->docentes['segundo_nombre']!!}</td>
                                   <td>
									<div class="btn-group">
										<a href="{{route('aulas.edit',$aula->id_aulas)}}" class="btn btn-warning">Editar</a>
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$aula->id_aulas}}">
										Eliminar
										</button>
									</div>
                                    </td>
								</tr>
								@include('aulas.delete')
                        @endforeach
                         </tbody>
                        
                        
					</table>
				@endif
			</div>
		</div>
		
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
@endsection