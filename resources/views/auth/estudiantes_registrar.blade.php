@extends('layouts.plantilla')

@section('title','registro')

@section('content')
<body>
    <div class="container">
    <div class="panel-heading">
		<h2>Registrar Estudiantes</h2>
				
	</div>
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Primer Nombre: </label>
            <input type="text" name ="primer_nombre"  class="form-control @error('primer_nombre') is-invalid @enderror" value = "{{old('primer_nombre')}}">
            @error('primer_nombre')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Segundo Nombre:</label>
            <input type="text" name ="segundo_nombre" class="form-control @error('segundo_nombre') is-invalid @enderror" value = "{{old('segundo_nombre')}}">
            @error('segundo_nombre')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Apellido Paterno: </label>
            <input type="text" name ="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value = "{{old('apellido_paterno')}}">
            @error('apellido_paterno')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Apellido Materno: </label>
            <input type="text" name ="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value = "{{old('apellido_materno')}}">
            @error('apellido_materno')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Fecha Nacimiento: </label>
            <input type="date" name ="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid @enderror" value = "{{old('fecha_nacimiento')}}">
            @error('fecha_nacimiento')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Genero: </label>
            <div class="form-check">
                <input type="radio" class="form-check-input @error('id_genero') is-invalid @enderror" name="id_genero" value="1" /> 
                <label class="form-check-label" >Hombre</label>
                <br>
                <input type="radio" class="form-check-input @error('id_genero') is-invalid @enderror" name="id_genero" value="2" />
                <label class="form-check-label" >Mujer</label>
                @error('id_genero')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Rude: </label>
            <input type="number" name ="rude" class="form-control @error('rude') is-invalid @enderror" value = "{{old('rude')}}">
            @error('rude')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Ci: </label>
            <input type="text" name ="ci" class="form-control @error('ci') is-invalid @enderror" value = "{{old('ci')}}">
            @error('ci')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-success"> Crear</button>
        <a href="{{route('leer.principal')}}" class="btn btn-secondary">Cancelar</a>
    </form>

    </div>
</body>

@endsection

