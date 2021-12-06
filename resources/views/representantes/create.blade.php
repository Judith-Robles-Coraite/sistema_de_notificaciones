@extends('layouts.plantilla')

@section('title','registro')

@section('content')
<body>
    <div class="container">
    <div class="panel-heading">
		<h2>Registrar Representante</h2>
				
	</div>
    <form action="{{route('representante.store')}}" method="POST">
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
            <label class="col-sm-2 col-form-label">Celular: </label>
            <input type="number" name ="celular" class="form-control @error('celular') is-invalid @enderror" value = "{{old('celular')}}">
            @error('celular')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Genero: </label>
            <div class="form-check">
                <input type="radio" class="form-check-input @error('id_genero') is-invalid @enderror" name="id_genero" value="1"/> 
                <label class="form-check-label" >Maculino</label>
                <br>
                <input type="radio" class="form-check-input @error('id_genero') is-invalid @enderror" name="id_genero" value="2" />
                <label class="form-check-label" >Femenino</label>
            </div>
            @error('id_genero')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Correo: </label>
            <input type="email" name ="correo" class="form-control @error('correo') is-invalid @enderror" value = "{{old('correo')}}">
            @error('correo')
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
        <button type="submit" class="btn btn-success"> Guardar</button>
        <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
    </form>

    </div>
</body>

@endsection