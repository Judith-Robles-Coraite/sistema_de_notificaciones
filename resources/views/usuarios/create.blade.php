@extends('layouts.plantilla')

@section('title','registro')

@section('content')
<body>
    <div class="container">
    <div class="panel-heading">
		<h2>Registrar Usuarios</h2>
				
	</div>
    <form action="{{route('usuarios.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Nombre: </label>
            <input type="text" name ="nombre"  class="form-control @error('nombre') is-invalid @enderror" value = "{{old('nombre')}}">
            @error('nombre')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        
       
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Clave:</label>
            <input type="text" name ="clave" class="form-control @error('clave') is-invalid @enderror" value = "{{old('clave')}}">
            @error('clave')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Fecha Registro: </label>
            <input type="date" name ="fecha_registro" class="form-control @error('fecha_registro') is-invalid @enderror" value = "{{old('fecha_registro')}}">
            @error('fecha_registro')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Tipo de Usuario: </label>
                <select name="id_tipo_usuario">

                <option value="2">Administrador</option>

                <option value="3">Operario</option>

                </select>
        </div>
        @error('id_tipo_usuario')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <button type="submit" class="btn btn-success"> Guardar</button>
        <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>
</body>

@endsection