@extends('layouts.plantilla')

@section('title','registro')

@section('content')

<body>
    <div class="container">
    <div class="panel-heading">
		<h2>Registrar Aulas</h2>
				
	</div>
    <form action="{{route('aulas.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Docente: </label>
            <div class="col-sm-4">
                
            <div class="input-group">
                <input type="text" name ="id_docente"  class="form-control @error('id_docente') is-invalid @enderror" value = "{{old('id_docente')}}" readonly onmousedown="return false;" >
                
                <span class="input-group-addon"> </span>
                <a href="{{route('docentes.index')}}" class="btn btn-primary"> Buscar</a>
                @error('id_docente')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
                @enderror
            </div>

        
        <div>
        <label class="col-sm-2 col-form-label">Grado: </label>
            <select name="id_grado" class="form-control @error('id_grado') is-invalid @enderror" >
            <option value="">--Seleccione un grado--</option>"
            @foreach($grados as $grado)
                <option value="{{old('id_grado',$grado->id_grados)}}">{{$grado['descripcion']}}</option>
            @endforeach
            </select>
            @error('id_grado')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="col-sm-2 col-form-label">Paralelo: </label>
            <input type="text" name ="paralelo" class="form-control @error('paralelo') is-invalid @enderror" value="{{old('paralelo')}}">
            @error('paralelo')
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