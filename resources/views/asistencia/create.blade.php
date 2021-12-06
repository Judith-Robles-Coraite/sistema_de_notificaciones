@extends('layouts.plantilla')

@section('title','asistencia')

@section('content')

<body>
    <div class="container">
    <div class="panel-heading">
		<h2>Crear Asistencia</h2>
				
	</div>
    <form action="{{route('asistencia.store')}}" method="POST">
        @csrf
        <div class="form-group">
        <label class="col-sm-2 col-form-label">Aula: </label>
            <select name="id_aula" class="form-control @error('id_aula') is-invalid @enderror" >
            <option value="">--Seleccione una Aula--</option>"
            @foreach($aulas as $aula)
                <option value="{{old('id_aula',$aula->id_aulas)}}">{{$aula->grado->descripcion}} {{$aula->paralelo}}</option>
            @endforeach
            </select>
            @error('id_aula')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="col-sm-2 col-form-label">fecha: </label>
            <input type="date" name ="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{old('fecha')}}">
            @error('fecha')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Año Escolar: </label>
                <select name="id_gestion_escolar">

               
                <option value="1">2021</option>
                
                
                </select>
        </div>
        <br>
        <button type="submit" class="btn btn-success"> Guardar</button>
        <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>
</body>

@endsection