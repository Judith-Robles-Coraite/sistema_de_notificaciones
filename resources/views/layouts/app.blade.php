<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>@yield('title') - Laravel APP</title>


        <!-- Tailwind CSS Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

        
    </head>
    <body class="bg-gray-100 text-gray-800" style="background: #870000;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #190A05, #870000);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #190A05, #870000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
    <nav class="flex py-5 bg-indigo-500 text-white"  style="background: #BA8B02;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #181818, #BA8B02);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #181818, #BA8B02); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
        <div class= "w-1/2 px-12 mr-auto ">
            <p class = "text-2xl ">Sistema de Notificaciones</p>
        </div>
        <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
            <li>
                <a href="/login" class="font-semibold hover:.bg-secondary.bg-gradient py-3 px-4 rounded-md border-2 border-white" >Iniciar Sesión</a>
            </li>

        </ul>

    </nav> 
    
    @yield('content')
    </body>
</html>
