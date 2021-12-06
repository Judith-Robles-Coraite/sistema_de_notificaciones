@extends('layouts.plantilla')

@section('title', 'registros')

@section('content')

<body>
    <div class="container">
    <div class="panel-heading">
		<h2>Editar Usuario</h2>
				
	</div>
    <form action="{{route('usuarios.update', $usuarios-> id_usuario)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Nombre </label>
            <input type="text" name ="nombre"  class="form-control @error('nombre') is-invalid @enderror" value = "{{old('nombre', $usuarios->nombre)}}">
            @error('nombre')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Clave</label>
            <input type="text" name ="clave"  class="form-control @error('clave') is-invalid @enderror" value = "{{old('clave',$usuarios->clave)}}">
            @error('clave')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Fecha de Registro </label>
            <input type="date" name ="fecha_registro"  class="form-control @error('fecha_registro') is-invalid @enderror" value = "{{old('fecha_registro', $usuarios->fecha_registro)}}">
            @error('fecha_registro')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label id='label1' name='sexoLabel'>Tipo de usuario </label> 
            <select name="id_tipo_usuario">
            <option value="{{$usuarios->id_tipo_usuario}}">--{!!$usuarios->tipo_usuario->descripcion!!}--</option>"
            @foreach($tipo_usuario as $tipo_usuario)
                <option value="{{$tipo_usuario->id_tipo_usuario}}">{{$tipo_usuario->descripcion}}</option>"

            @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Editar </button>
        <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
@endsection