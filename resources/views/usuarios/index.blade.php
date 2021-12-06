@extends('layouts.plantilla')

@section('title','Usuarios')

@section('content')

<!DOCTYPE html>
<html lang="en">
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
					<h2>Usuarios</h2>
				
				</div>
                
                <div class="col-xl-12">
					<form action="{{route('usuarios.index')}}" method="get">
						<div class="form-group">
							<div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="texto" value="{{$texto}}">
                                    <span class="input-group-addon"> </span>
                                    <input type="submit" class="btn btn-primary" value="Buscar">
                                </div>
							</div> 
							
							<div class="col-sm-4 my-1">
								<a href="{{route('usuarios.create')}}" class="btn btn-success"> + Añadir Usuarios</a>
							</div>
						</div>
						
					</form>
				
				

                </div>
				

				@if ($usuarios->isEmpty())
					<div>No se encuentra al Usuario</div>
				@else
					<table class="table">
						<thead>
							<tr>
								<th>Marcar</th>
								<th>ID</th>
                                <th>Nombre</th>
								<th>Clave</th>
								<th>Fecha Registro</th>
                                <th>id_tipo_usuario</th>
							</tr>
						</thead>
						<tbody>
							@foreach($usuarios as $usuario)
                            @php 
								$tipo = $usuario->id_tipo_usuario;
							@endphp

								<tr>
									<td><input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
									<div id="content" style="display: none;">
									<form action="{{route('mostrarusuario',$usuario->id_usuario)}}">@csrf<button type="submit" class="btn btn-secondary"> enviar</button></form>
 									</div>
								</td>
									<td>{!! $usuario->id_usuario !!}</td>
                                    <td>{!! $usuario->nombre !!}</td>
                                    <td>{!! $usuario->clave !!}</td>
                                    <td>{!! $usuario->fecha_registro !!}</td>
                                    <td>@php if($tipo == 2 ){
										echo "Administrador";
									}else{
										echo "Operario";
									}
									@endphp</td>
									
									<td>
									<div class="btn-group">
										<a href="{{route('usuarios.edit',$usuario->id_usuario)}}" class="btn btn-warning">Editar</a>
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$usuario->id_usuario}}">
										Eliminar
										</button>
									</div>
									</td>
							
								</tr>
                                @include('usuarios.delete')  
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