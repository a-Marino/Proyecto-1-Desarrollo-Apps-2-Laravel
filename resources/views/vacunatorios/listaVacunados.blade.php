<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <img src="{{ asset('imagenes/vacunatorio.svg') }}" class="w-10">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Vacunados del Vacunatorio {{$id}}
            </h2>
            &nbsp  &nbsp
            <a href="{{ route('vacunatorios.buscarVacunatorio') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Volver</a>
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
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                DNI
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Ciudadano
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Grupo Riesgo
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Vacuna
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Fecha
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Enfermero
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Teléfono
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($vacunados as $vacunado)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$vacunado->DOC}}</div>
              </td class="px-6 py-4 whitespace-nowrap">

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$vacunado->vacunado_AN}}</div>
              </td class="px-6 py-4 whitespace-nowrap">

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$vacunado->GR}}</div>
              </td class="px-6 py-4 whitespace-nowrap">

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$vacunado->vacuna}}</div>
              </td class="px-6 py-4 whitespace-nowrap">

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{date('d-m-Y', strtotime($vacunado->aplicacion))}}</div>
              </td class="px-6 py-4 whitespace-nowrap">

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$vacunado->enfermero}}</div>
              </td class="px-6 py-4 whitespace-nowrap">

              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$vacunado->contacto}}</div>
              </td class="px-6 py-4 whitespace-nowrap">

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