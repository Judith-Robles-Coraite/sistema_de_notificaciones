@extends('layouts.plantilla')

@section('title','Registros')

@section('content')

<!DOCTYPE html>
<html lang="en">
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
					<h2>Matriculas</h2>
				
				</div>
				<div class="col-xl-12">
					<form action="">
						<!--<div class="form-row">
							<div class="col-sm-2">
								<input type="text" class="form-control" name="texto" value="">
							</div> 
							<br>
							<div class="col-auto">
								<input type="submit" class="btn btn-primary" value="Buscar">
							</div>-->
							<div class="col-sm-4 my-1">
								<a href="{{route('registros.create')}}"  class="btn btn-success"> + Añadir Matricula</a>
							</div>
						</div>
						
					</form>
				</div>
				

				@if ($registros->isEmpty())
					<div>No representante</div>
				@else
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Primer Nombre</th>
                                <th>Segundo Nombre</th>
								<th>Curso</th>
								<th>Paralelo</th>
								<th>Parentesco</th>
								<th>Celular Representante</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($registros as $registro)
							
								<tr>

									<td>{!!$registro->id_registros !!}</td>
                                    <td>{!!$registro->estudiantes->apellido_paterno!!}</td>
                                    <td>{!!$registro->estudiantes->apellido_materno!!}</td>
                                    <td>{!!$registro->estudiantes->primer_nombre!!}</td>
                                    <td>{!!$registro->estudiantes->segundo_nombre!!}</td>
									<td>{!!$registro->aulas->grado->descripcion!!}</td>
                                    <td>{!!$registro->aulas->paralelo!!}</td>
									<td>{!!$registro->parentesco['descripcion']!!}</td>
									<td>{!!$registro->representante['celular']!!}</td>
									<td>
									<div class="btn-group">
										<a href="{{route('registros.edit',$registro->id_registros)}}" class="btn btn-warning">Editar</a>
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$registro->id_registros}}">
										Eliminar
										</button>
									</div>
									</td>
							
								</tr>
								@include('registros.delete')  
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