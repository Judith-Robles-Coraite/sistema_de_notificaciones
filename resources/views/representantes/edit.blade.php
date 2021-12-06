@extends('layouts.plantilla')

@section('title', 'registros')

@section('content')

<body>
    <div class="container">
    <div class="panel-heading">
		<h2>Editar Registro</h2>
				
	</div>
    <form action="{{route('representante.update', $representante-> id_representantes)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="col-sm-2 col-form-label">Primer Nombre: </label>
            <input type="text" name ="primer_nombre"  class="form-control @error('primer_nombre') is-invalid @enderror" value = "{{old('primer_nombre',$representante->primer_nombre)}}">

            @error('primer_nombre')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Segundo Nombre:</label>
            <input type="text" name ="segundo_nombre" class="form-control @error('segundo_nombre') is-invalid @enderror" value = "{{old('segundo_nombre',$representante->segundo_nombre)}}">
            @error('segundo_nombre')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Apellido Paterno: </label>
            <input type="text" name ="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value = "{{old('apellido_paterno',$representante->apellido_paterno)}}">
            @error('apellido_paterno')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Apellido Materno: </label>
            <input type="text" name ="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value = "{{old('apellido_materno',$representante->apellido_materno)}}">
            @error('apellido_materno')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Celular: </label>
            <input type="number" name ="celular" class="form-control @error('celular') is-invalid @enderror" value = "{{old('celular',$representante->celular)}}">
            @error('celular')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        @php 
        $sexo = $representante->id_genero;
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
            <label class="col-sm-2 col-form-label">Correo: </label>
            <input type="email" name ="correo" class="form-control @error('correo') is-invalid @enderror" value = "{{old('correo',$representante->correo)}}">
            @error('correo')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Ci: </label>
            <input type="text" name ="ci" class="form-control @error('ci') is-invalid @enderror" value = "{{old('ci',$representante->ci)}}">
            @error('ci')
            <span  class="invalid-feedback">
                 <strong>*{{$message}}</strong>

            </span>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-success">Editar </button>
        <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
@endsection