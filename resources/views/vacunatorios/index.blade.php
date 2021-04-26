<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <img src="{{ asset('imagenes/vacunatorio.svg') }}" class="w-10">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('ABM Vacunatorio') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('vacunatorios.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Vacunatorio</a>
            </div>
            <div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Centro
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Medico
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Horario
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Teléfono
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Editar</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($vacunatorios as $vacunatorio)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$vacunatorio->centros->nombre}}</div>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$vacunatorio->medico}}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$vacunatorio->horario}}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$vacunatorio->telefono}}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ route('vacunatorios.edit', $vacunatorio->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                <form class="inline-block" action="{{ route('vacunatorios.destroy', $vacunatorio->id) }}" method="POST" onsubmit="return confirm('Estas seguro?');">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Eliminar">
                </form>
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