@include('header.head_credencial')
<body>
    {{--<div class="flex h-screen w-full items-center justify-center bg-gray-900 bg-cover bg-no-repeat" style="background-image:url('https://images.unsplash.com/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1748&q=80')">--}}
    {{--Imagen de Fondo--}}
    <div class="flex h-screen w-full items-center justify-center bg-gray-900 bg-cover bg-no-repeat" style="background-image:url('https://besthqwallpapers.com/Uploads/29-9-2017/22074/thumb2-fire-brigade-of-flames-manga-all-characters-firefighters.jpg')">        
        <div class="rounded-xl bg-gray-800 bg-opacity-50 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8">
          <div class="text-white">
            <div class="mb-8 flex flex-col items-center">
                <h1 class="mb-2 text-2xl">2da. Compañía de Bomberos Voluntarios</h1>
                    <h1 class="mb-2 text-2xl">Fundación Rescate Urbano  </h1>                
                {{-- FOTO DEL VOLUNTARIO --}}
              <img src="{{asset($foto)}}" width="250" height="250" alt="" srcset="" />
              <h1 class="mb-2 text-2xl">Grado Institucional: {{$grado}}</h1>
              <h1 class="mb-2 text-2xl">Voluntario: {{$nombre}}</h1>
              <h1 class="mb-2 text-2xl">C.I.: {{$carnet}}</h1>
              <h1 class="mb-2 text-2xl">Grupo Sanguíneo: {{$sangre}}</h1>
              <h1 class="mb-2 text-2xl">Género: {{$genero}}</h1>
              <h1 class="mb-2 text-2xl">Fecha de Nacimiento: {{$fecha_nacimiento}}</h1>
              <h1 class="mb-2 text-2xl">Nro. Celular: {{$celular}}</h1>
            </div>            
          </div>
        </div>
      </div>
</body>
</html>