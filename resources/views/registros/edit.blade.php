@extends('layouts.plantilla')

@section('title', 'registros')

@section('content')

<body>
    <div class="container">
    <div class="panel-heading">
		<h2>Editar Matricula</h2>
				
	</div>

    <form action="{{route('registros.update', $registros-> id_registros)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Etudiante: </label>
            <div class="col-sm-4">
                
                <div class="input-group">
                <input type="text" name ="id_estudiante"  class="form-control  @error('id_estudiante') is-invalid @enderror" value = "{{old('id_estudiante',$registros->id_estudiante)}}"  >
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

            <div class="form-group">
            <label class="col-sm-2 col-form-label">Primer Nombre: </label>
            
            <input type="text" name ="primer_nombre" value = "{{$registros->estudiantes->primer_nombre}}" class="form-control" readonly onmousedown="return false;">
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-form-label">Segundo Nombre:</label>
                <input type="text" name ="segundo_nombre" value = "{{$registros->estudiantes->segundo_nombre}}" class="form-control" readonly onmousedown="return false;">
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-form-label">Apellido Paterno: </label>
                <input type="text" name ="apellido_paterno" value = "{{$registros->estudiantes->apellido_paterno}}" class="form-control" readonly onmousedown="return false;">
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-form-label">Apellido Materno: </label>
                <input type="text" name ="apellido_materno" value = "{{$registros->estudiantes->apellido_materno}}" class="form-control" readonly onmousedown="return false;">
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-form-label">Fecha Nacimiento: </label>
                <input type="date" name ="fecha_nacimiento" value = "{{$registros->estudiantes->fecha_nacimiento}}" class="form-control" readonly onmousedown="return false;">
            </div>
            
            @php 
            $sexo = $registros->estudiantes->id_genero;
            if($sexo==1){
                
            }
            @endphp
            <div class="form-group">
                <label id='label1' name='sexoLabel'>Sexo: </label> 
                @php
                if($sexo == 1){
                    echo "<input type='radio' name='id_genero' value='1' class='textoBlanco'  disabled checked > Masculino &nbsp";
                    echo "<input type='radio' name='id_genero' value='2' class='textoBlanco' disabled> Femenino<br><br>";
                }else{
                    echo "<input type='radio' name='id_genero' value='1' class='textoBlanco' disabled > Masculino &nbsp";
                    echo "<input type='radio' name='id_genero' value='2' class='textoBlanco' disabled checked> Femenino<br><br>";
                }  
                @endphp
            </div>
            <div class="form-group">
            <label class="col-sm-2 col-form-label">Rude: </label>
            <input type="number" name ="rude" value = "{{$registros->estudiantes->rude}}" class="form-control" readonly onmousedown="return false;">
            </div>
            <div class="form-group">
            <label class="col-sm-2 col-form-label">Ci: </label>
            <input type="text" name ="ci" value = "{{$registros->estudiantes->ci}}" class="form-control" readonly onmousedown="return false;">
            </div>

        <div class= "form-group">
            <label class="col-sm-2 col-form-label">Curso: </label>
            <select name="id_aula" class="form-control  @error('id_aula') is-invalid @enderror">
            <option value="{{$registros->id_aula}}">--{{$registros->aulas->grado['descripcion']}} {{$registros->aulas['paralelo']}}--</option>"
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
                <select name="id_gestion_escolar">

               
                <option value="1">2021</option>
                
                
                </select>
        </div>
            
        
        
        <br>
        <h3>Asignar Representate</h3>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Representante: </label>
            <div class="col-sm-4">
                
                <div class="input-group">
                <input type="text" name ="id_representate" class="form-control  @error('id_representate') is-invalid @enderror" value = "{{old('id_representate',$registros->id_representate)}}" >
                <span class="input-group-addon"> </span>
                <a href="{{route('respresentates.estudiantes')}}" class="btn btn-primary"> Buscar</a>
                @error('id_representate')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
                @enderror
                </div>

        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Primer Nombre: </label>
            <input type="text" name ="primer_nombre" value = "{{$registros->representante->primer_nombre}}" class="form-control" readonly onmousedown="return false;">
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Segundo Nombre:</label>
            <input type="text" name ="segundo_nombre" value = "{{$registros->representante->segundo_nombre}}" class="form-control" readonly onmousedown="return false;">
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Apellido Paterno: </label>
            <input type="text" name ="apellido_paterno" value = "{{$registros->representante->apellido_paterno}}" class="form-control" readonly onmousedown="return false;">
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Apellido Materno:</label>
            <input type="text" name ="apellido_materno" value = "{{$registros->representante->apellido_materno}}" class="form-control" readonly onmousedown="return false;">
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Celular: </label>
            <input type="number" name ="celular" value = "{{$registros->representante->celular}}" class="form-control" readonly onmousedown="return false;">
        </div>
        
        @php 
        $sexo = $registros->representante->id_genero;
        if($sexo==1){
            
        }
        @endphp
        <div class="form-group">
            <label id='label1' name='sexoLabel'>Sexo: </label> 
            @php
            if($sexo == 1){
                echo "<input type='radio' name='id_genero' value='1' class='textoBlanco' disabled checked> Masculino &nbsp";
                echo "<input type='radio' name='id_genero' value='2' class='textoBlanco' disabled> Femenino<br><br>";
            }else{
                echo "<input type='radio' name='id_genero' value='1' class='textoBlanco' disabled > Masculino &nbsp";
                echo "<input type='radio' name='id_genero' value='2' class='textoBlanco' disabled checked> Femenino<br><br>";
            }  
            @endphp
        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label">Correo: </label>
        <input type="email" name ="correo" value = "{{$registros->representante->correo}}" class="form-control" readonly onmousedown="return false;">
        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label">Ci: </label>
        <input type="text" name ="ci" value = "{{$registros->representante->ci}}" class="form-control" readonly onmousedown="return false;">
        </div>
        </div>
        <div class= "form-group">
            <label class="col-sm-2 col-form-label">Parentesco: </label>
            <select name="id_parentescos" class="form-control  @error('id_parentescos') is-invalid @enderror">
            <option value="{{$registros->id_parentescos}}">--{{$registros->parentesco->descripcion}}--</option>"
            @foreach($parentesco as $parentesco)
                <option value="{{$parentesco->id_parentescos}}">{{$parentesco->descripcion}}</option>"

            @endforeach
            </select>
            @error('id_parentescos')
                <span  class="invalid-feedback">
                    <strong>*{{$message}}</strong>

                </span>
            @enderror
             
        </div>

        <button type="submit" class="btn btn-success">Editar </button>
        <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
@endsection