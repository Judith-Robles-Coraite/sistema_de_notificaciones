@extends('layouts.app')

@section('title','Login')

@section('content')


<div class= "block mx-auto my-12 p-8  w-1/3 border border-gray-200 
rounded-lg shadow-lg"  style="background: #BA8B02;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #181818, #BA8B02);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #181818, #BA8B02); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
    <h1 class="text-3xl text-center " style="color:#F5FFFA">Iniciar Sesión</h1>
    <center>
    <img src="imagenes\pngegg1.png" alt="" height="180" width="150" aling="Top" aling="booton" >
    </center>
    
    <form class="mt-4" method="POST" action="" id="login_form">
    {{csrf_field()}}
        <input type ="text" class="border border-gray-200 rounded-md bg-gray-200 w-full 
        text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Usuario" id="nombre" name="nombre">

        <input type ="password" class="border border-gray-200 rounded-md bg-gray-200 w-full 
        text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Contraseña" id="password" name="password">
       
        @error('message1')

        <p class ="border border-red-500 rounded-md bg-red-100 w-full
        text-red-600 p-2 my-2">*Usuario  incorrecto, porfavor ingrese nuevamente el usuario</p>

        @enderror

        @error('message2')

        <p class ="border border-red-500 rounded-md bg-red-100 w-full
        text-red-600 p-2 my-2">*Contraseña  incorrecta, porfavor ingrese nuevamente la contraseña </p>

        @enderror
        

        <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg
        text-white font-semibold p-2 my-3 hover::bg-indigo-600 " style="background-color:#708090">Ingresar</button>

        
    </form>

</div>
    

@endsection
