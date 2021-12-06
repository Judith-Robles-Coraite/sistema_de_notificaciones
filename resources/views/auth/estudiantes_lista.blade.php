@extends('layouts.plantilla')

@section('title','registro')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
	<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
	</script>
	</head>

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
					<h2>Estudiantes</h2>
				
				</div>

				<div class="col-xl-12">
					<form action="{{route('leer.principal')}}" method="get">
						<div class="form-group">
							<div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="texto" value="{{$texto}}">
                                    <span class="input-group-addon"> </span>
                                    <input type="submit" class="btn btn-primary" value="Buscar">

                                </div>
							</div> 
							
							<div class="col-sm-4 my-1">
								<a href="{{route('register.pricipal')}}" class="btn btn-success"> + Añadir Estudiante</a>
							</div>

						</div>
						
					</form>
				
				

                </div>
				<div class="col-xl-8">
					<form action="">
						<!--<div class="form-row">
							<div class="col-sm-2">
								<input type="text" class="form-control" name="texto" value="">
							</div> 
							<br>
							<div class="col-auto">
								<input type="submit" class="btn btn-primary" value="Buscar">
							</div>-->
							
						</div>
						
					</form>
				</div>
				

				@if ($estudiantes->isEmpty())
					<div>No estudiantes</div>
				@else
					<table class="table">
						<thead>
							<tr>
								<th>Marcar</th>
								<th>ID</th>
								<th> Apellido Paterno</th>
								<th> Apellido Materno</th>
								<th> Primer Nombre</th>
								<th> Segundo Nombre</th>
								<th> Fecha de Nacimiento</th>
								<th> Genero</th>
								<th> Rude</th>
								<th> CI</th>
								<th> Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($estudiantes as $estudiante)
							@php 
								$sexo = $estudiante->id_genero;
							@endphp
							@php 
								$numero= 1;
							@endphp

								<tr>
								<td><input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
									<div id="content" style="display: none;">
									<form action="{{route('mostrarestudiante',$estudiante-> id_estudiantes)}}">@csrf<button type="submit" class="btn btn-secondary"> enviar</button></form>
 									</div>
								</td>
									<td>{!! $estudiante->id_estudiantes !!}</td>
									<td>{!! $estudiante->apellido_paterno !!}</td>
									<td>{!! $estudiante->apellido_materno!!}</td>
									<td>{!! $estudiante->primer_nombre !!}</td>
									<td>{!! $estudiante->segundo_nombre!!}</td>
									<td>{!! $estudiante->fecha_nacimiento!!}</td>
									<td>@php if($sexo == 1 ){
										echo "Masculino";
									}else{
										echo "Femenino";
									}
									@endphp</td>
									<td>{!! $estudiante->rude!!}</td>
									<td>{!! $estudiante->ci!!}</td>
									<td>
									<div class="btn-group">
										<a href="{{route('edit',$estudiante-> id_estudiantes)}}" class="btn btn-warning">Editar</a>

										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$estudiante-> id_estudiantes}}">
										Eliminar
										</button>
									</div>
									</td>
							
								</tr>
							@include('auth.mensaje-eliminar-estudiante') 
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

