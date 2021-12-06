@extends('layouts.plantilla')

@section('title','registro')

@section('content')
<body>
    <div class="container">
    <div class="panel-heading">
		<h2>Registrar Matricula</h2>
				
	</div>
    <form action="{{route('registros.store')}}" method="POST">
        @csrf
      
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Etudiante: </label>
            <div class="col-sm-4">
                
                <div class="input-group">
                <input type="text" name ="id_estudiante"  class="form-control @error('id_estudiante') is-invalid @enderror" value = "{{old('id_estudiante')}}" readonly onmousedown="return false;"   >
                <span class="input-group-addon"> </span>
                <a href="{{route('leer.principal')}}" class="btn btn-primary"> Buscar</a>
                @error('id_estudiante')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
                 @enderror
                </div>
            </div>
           
        </div>
        

        <div class= "form-group">
            <label class="col-sm-2 col-form-label" >Curso: </label>
            <select name="id_aula" class="form-control @error('id_aula') is-invalid @enderror">
            <option value="">--Seleccione un Curso--</option>"
            @foreach($aulas as $aula)
                <option value="{{$aula->id_aulas}}">{{$aula->grado->descripcion}} {{$aula->paralelo}}</option>"

            @endforeach
            </select>
            @error('id_aula')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
            @enderror
        </div>

        
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Año Escolar: </label>
                <select name="id_gestion_escolar" class="form-control @error('id_gestion_escolar') is-invalid @enderror">

               
                <option value="1">2021</option>
                
                
                </select>
                @error('id_gestion_escolar')
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