<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <img src="{{ asset('imagenes/vacunate-logo-lg-n.svg') }}" class="h-14 w-auto">
    </div>

    <div class="mt-8 text-2xl">
        Bienvenidos a la Aplicacion de la Secretaria de Salud de Coronel Suarez.
    </div>

  
    <div class="mt-6 text-gray-500">
        Bienvenido <strong>{{auth()->user()->apelnom}}</strong>, en la parte superior tendra disponible el listado de actividades que usted puede realizar con la Aplicacion.
    </div>
</div>

