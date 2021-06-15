<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <img src="{{ asset('imagenes/centro.svg') }}" class="w-10">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Lista de Centros del Enfermero {{ $user->apelnom }}
            </h2>
             &nbsp  &nbsp
            <a href="{{ route('centros.buscarCentro') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Volver</a>

        </div>

    </x-slot>

    <div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



  <div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Centro
              </th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Localidad
              </th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Médico a Cargo
              </th>

            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($centros as $centro)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0">
                    <img src="{{ asset('imagenes/centro.svg') }}" class="w-10">
                  </div>

                  <div class="ml-4">
                    <div class="text-sm font-medium text-center text-gray-900">
                      {{ $centro->nombre }}
                    </div>
                  </div>
                </div>
              </td>

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 text-center">{{$centro->localidad}}</div>
              </td>

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900 text-center">{{$centro->medico}}</div>
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
        </div>

    </div>


</x-app-layout>