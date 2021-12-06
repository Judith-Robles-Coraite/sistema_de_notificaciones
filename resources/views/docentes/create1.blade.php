@extends('layouts.plantilla')

@section('title','registro')

@section('content')

<body>
    <div class="container">
    <div class="panel-heading">
		<h2>Registrar Docentes</h2>
				
	</div>
    <form action="{{route('docentes.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Usuario: </label>
            <div class="col-sm-4">
                
            <div class="input-group">
                <input type="text" name ="id_usuario"  class="form-control @error('id_usuario') is-invalid @enderror" value = "{{old('id_usuario',$usuarios->id_usuario)}}" readonly onmousedown="return false;" >
                
                <span class="input-group-addon"> </span>
                <a href="{{route('usuarios.index')}}" class="btn btn-primary"> Buscar</a>
                @error('id_usuario')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
                @enderror
            </div>

            <div class="form-group">
            <label class="col-sm-2 col-form-label">Nombre: </label>
            <input type="text" name ="nombre"  class="form-control @error('nombre') is-invalid @enderror" value = "{{$usuarios->nombre}}" readonly onmousedown="return false;">
            @error('nombre')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
            </div>
            <div class="form-group">
            <label class="col-sm-2 col-form-label">Clave:</label>
            <input type="text" name ="clave" class="form-control @error('clave') is-invalid @enderror" value = "{{$usuarios->clave}}" readonly onmousedown="return false;">
            @error('clave')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Primer Nombre: </label>
            <input type="text" name ="primer_nombre"  class="form-control @error('primer_nombre') is-invalid @enderror" value="{{old('primer_nombre')}}">
            @error('primer_nombre')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Segundo Nombre:</label>
            <input type="text" name ="segundo_nombre" class="form-control" value="{{old('segundo_nombre')}}">
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Apellido Paterno: </label>
            <input type="text" name ="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{old('apellido_paterno')}}">
            @error('apellido_paterno')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Apellido Materno: </label>
            <input type="text" name ="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{old('apellido_materno')}}">
            @error('apellido_materno')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
            @enderror
        </div>


        <div class="form-group">
            <label class="col-sm-2 col-form-label">Fecha Nacimiento: </label>
            <input type="date" name ="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid @enderror" value="{{old('fecha_nacimiento')}}">
            @error('fecha_nacimiento')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Direccion: </label>
            <input type="text" name ="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{old('direccion')}}">
            @error('direccion')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Correo: </label>
            <input type="email" name ="correo" class="form-control @error('correo') is-invalid @enderror" value="{{old('correo')}}">
            @error('correo')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Telefono: </label>
            <input type="number" name ="telefono" class="form-control " value="{{old('telefono')}}">

        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Celular: </label>
            <input type="number" name ="celular" class="form-control @error('celular') is-invalid @enderror" value="{{old('celular')}}">
            @error('celular')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
            @enderror
        </div>
        <div>
        <label class="col-sm-2 col-form-label">Cargo en la Institucion: </label>
            <select name="id_cargo" class="form-control @error('id_cargo') is-invalid @enderror" >
            <option value="{{old('id_cargo')}}">--Seleccione un Cargo--</option>
            @foreach($cargos as $cargo)
               
                <option value="{{old('id_cargo',$cargo->id_cargos_plantel)}}">{{$cargo['descripcion']}}</option>
            @endforeach
            </select>
            @error('id_cargo')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Genero: </label>
            <div class="form-check  ">
                <input type="radio" class="form-check-input @error('id_genero') is-invalid @enderror" name="id_genero" value="1" /> 
                <label class="form-check-label" >Maculino</label>
                <br>
                <input type="radio" class="form-check-input @error('id_genero') is-invalid @enderror" name="id_genero" value="2" />
                <label class="form-check-label" >Femenino</label>
            @error('id_genero')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>
                </span>
            @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Estudios Realizados: </label>
            <input type="texto" name ="estudios_realizados" class="form-control @error('estudios_realizados') is-invalid @enderror" value="{{old('estudios_realizados')}}">
            @error('estudios_realizados')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">CI: </label>
            <input type="number" name ="ci" class="form-control @error('ci') is-invalid @enderror" value="{{old('ci')}}">
            @error('ci')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-success"> Guardar</button>
        <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>
</body>

@endsection