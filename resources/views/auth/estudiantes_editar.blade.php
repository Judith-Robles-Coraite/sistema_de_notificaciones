@extends('layouts.plantilla')

@section('title', 'registros')

@section('content')

<body>
    <div class="container">
    <div class="panel-heading">
		<h2>Editar Registro</h2>
				
	</div>
    <form action="{{route('edit.secundaria', $estudiante-> id_estudiantes)}}" method="POST">
        @csrf



        <div class="form-group">
            <label class="col-sm-2 col-form-label">Primer Nombre: </label>
            <input type="text" name ="primer_nombre"  class="form-control @error('primer_nombre') is-invalid @enderror" value = "{{old('primer_nombre',$estudiante->primer_nombre)}}">
            @error('primer_nombre')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Segundo Nombre:</label>
            <input type="text" name ="segundo_nombre" class="form-control @error('segundo_nombre') is-invalid @enderror" value = "{{old('segundo_nombre',$estudiante->segundo_nombre)}}">
            @error('segundo_nombre')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Apellido Paterno: </label>
            <input type="text" name ="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value = "{{old('apellido_paterno',$estudiante->apellido_paterno)}}">
            @error('apellido_paterno')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Apellido Materno: </label>
            <input type="text" name ="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value = "{{old('apellido_materno',$estudiante->apellido_materno)}}">
            @error('apellido_materno')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Fecha Nacimiento: </label>
            <input type="date" name ="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid @enderror" value = "{{old('fecha_nacimiento',$estudiante->fecha_nacimiento)}}">
            @error('fecha_nacimiento')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        @php 
        $sexo = $estudiante->id_genero;
        if($sexo==1){
            
        }
        @endphp
        <div class="form-group">
            <label id='label1' name='sexoLabel'>Sexo </label> 
            @php
            if($sexo == 1){
                echo "<input type='radio' name='id_genero' value='1' class='textoBlanco' checked> Masculino &nbsp";
                echo "<input type='radio' name='id_genero' value='2' class='textoBlanco'> Femenino<br><br>";
            }else{
                echo "<input type='radio' name='id_genero' value='1' class='textoBlanco' > Masculino &nbsp";
                echo "<input type='radio' name='id_genero' value='2' class='textoBlanco' checked> Femenino<br><br>";
            }  
            @endphp
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Rude: </label>
            <input type="number" name ="rude" class="form-control @error('rude') is-invalid @enderror" value = "{{old('rude',$estudiante->rude)}}">
            @error('rude')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Ci: </label>
            <input type="text" name ="ci" class="form-control @error('ci') is-invalid @enderror" value = "{{old('ci',$estudiante->ci)}}">
            @error('ci')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-success">Editar </button>
        <a href="{{route('leer.principal')}}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
@endsection