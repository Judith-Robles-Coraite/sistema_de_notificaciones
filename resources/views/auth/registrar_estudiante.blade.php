@extends('layouts.plantilla')

@section('title','')

@section('content')


<form action="" method="post">
        @csrf
        <br>
        <label>Primer Nombre </label>
        <input type="text" name ="primer_nombre">
        <br>
        <label>Segundo Nombre</label>
        <input type="text" name ="segundo_nombre">
        <br>
        <label>Apellido Paterno </label>
        <input type="text" name ="apellido_paterno">
        <br>
        <label>Apellido Materno </label>
        <input type="text" name ="apellido_materno">
        <br>
        <label>Fecha Nacimiento </label>
        <input type="date" name ="fecha_nacimiento">
        <br>
        <label>Rude </label>
        <input type="number" name ="rude">
        <br>
        <label>Ci </label>
        <input type="text" name ="ci">
        <br>

        <button type="submit">+ nueva mascota</button>
    </form>
    

@endsection