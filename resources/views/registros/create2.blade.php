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
                <input type="text" name ="id_estudiante"  class="form-control  @error('id_estudiante') is-invalid @enderror" value = "{{old('id_estudiante',$estudiante->id_estudiantes)}}"  >
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
            <label class="col-sm-2 col-form-label">Primer Nombre </label>
            
            <input type="text" name ="primer_nombre" value = "{{$estudiante->primer_nombre}}" class="form-control" readonly onmousedown="return false;">
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-form-label">Segundo Nombre</label>
                <input type="text" name ="segundo_nombre" value = "{{$estudiante->segundo_nombre}}" class="form-control" readonly onmousedown="return false;">
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-form-label">Apellido Paterno </label>
                <input type="text" name ="apellido_paterno" value = "{{$estudiante->apellido_paterno}}" class="form-control" readonly onmousedown="return false;">
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-form-label">Apellido Materno </label>
                <input type="text" name ="apellido_materno" value = "{{$estudiante->apellido_materno}}" class="form-control" readonly onmousedown="return false;">
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-form-label">Fecha Nacimiento </label>
                <input type="date" name ="fecha_nacimiento" value = "{{$estudiante->fecha_nacimiento}}" class="form-control" readonly onmousedown="return false;">
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
                    echo "<input type='radio' name='id_genero' value='1' class='textoBlanco'  disabled checked readonly > Masculino &nbsp";
                    echo "<input type='radio' name='id_genero' value='2' class='textoBlanco' readonly disabled> Femenino<br><br>";
                }else{
                    echo "<input type='radio' name='id_genero' value='1' class='textoBlanco' readonly disabled > Masculino &nbsp";
                    echo "<input type='radio' name='id_genero' value='2' class='textoBlanco' readonly  disabled checked> Femenino<br><br>";
                }  
                @endphp
            </div>
            <div class="form-group">
            <label class="col-sm-2 col-form-label">Rude </label>
            <input type="number" name ="rude" value = "{{$estudiante->rude}}" class="form-control" readonly onmousedown="return false;">
            </div>
            <div class="form-group">
            <label class="col-sm-2 col-form-label">Ci </label>
            <input type="text" name ="ci" value = "{{$estudiante->ci}}" class="form-control" readonly onmousedown="return false;">
            </div>

        <div class= "form-group">
            <label class="col-sm-2 col-form-label">Curso: </label>
            <select name="id_aula" class="form-control  @error('id_aula') is-invalid @enderror">
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
                <input type="text" name ="id_representate" class="form-control  @error('id_representate') is-invalid @enderror" value = "{{old('id_representate',$representante->id_representantes)}}" >
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
            <label class="col-sm-2 col-form-label">Primer Nombre </label>
            <input type="text" name ="primer_nombre" value = "{{$representante->primer_nombre}}" class="form-control" readonly onmousedown="return false;">
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Segundo Nombre</label>
            <input type="text" name ="segundo_nombre" value = "{{$representante->segundo_nombre}}" class="form-control" readonly onmousedown="return false;">
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Apellido Paterno </label>
            <input type="text" name ="apellido_paterno" value = "{{$representante->apellido_paterno}}" class="form-control" readonly onmousedown="return false;">
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Apellido Materno </label>
            <input type="text" name ="apellido_materno" value = "{{$representante->apellido_materno}}" class="form-control" readonly onmousedown="return false;">
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label">Celular </label>
            <input type="number" name ="celular" value = "{{$representante->celular}}" class="form-control" readonly onmousedown="return false;">
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
                echo "<input type='radio' name='id_genero' value='1' class='textoBlanco' disabled checked> Masculino &nbsp";
                echo "<input type='radio' name='id_genero' value='2' class='textoBlanco' disabled> Femenino<br><br>";
            }else{
                echo "<input type='radio' name='id_genero' value='1' class='textoBlanco' disabled > Masculino &nbsp";
                echo "<input type='radio' name='id_genero' value='2' class='textoBlanco' disabled checked> Femenino<br><br>";
            }  
            @endphp
        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label">Correo </label>
        <input type="email" name ="correo" value = "{{$representante->correo}}" class="form-control" readonly onmousedown="return false;">
        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label">Ci </label>
        <input type="text" name ="ci" value = "{{$representante->ci}}" class="form-control" readonly onmousedown="return false;">
        </div>
        </div>
        <div class= "form-group">
            <label class="col-sm-2 col-form-label">Parentesco: </label>
            <select name="id_parentescos" class="form-control  @error('id_parentescos') is-invalid @enderror">
            <option value="">--Seleccione el parentesco--</option>"
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

        </div>
        <br>
        <button type="submit" class="btn btn-success"> Guardar</button>
        <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>


    </form>

    </div>
</body>

@endsection