<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <img src="{{ asset('imagenes/usuario.svg') }}" class="w-10">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('ABM Usuario') }}
            </h2>
        </div>
    </x-slot>

<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div class="block mb-8">
    <a href="{{ route('usuarios.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Usuario</a>
  </div>
  <div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nombre
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                DNI
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                RUP
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Telefono
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Estado
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Rol
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Editar</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($users as $user)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-16 w-16">
                    @if ($user->role == 'enfermero')
                      <img src="{{ asset('imagenes/enfermeros.svg') }}" class="w-16">
                    @endif
                    @if ($user->role == 'admin')
                      <img src="{{ asset('imagenes/admin.svg') }}" class="w-16">
                    @endif
                    @if ($user->role == 'gestion')
                      <img src="{{ asset('imagenes/gestor.svg') }}" class="w-16"> 
                    @endif
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{ $user->apelnom }}
                    </div>
                    <div class="text-sm text-gray-500">
                      {{ $user->email }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $user->DNI }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                @if ($user->role == 'enfermero')
                  <div class="text-sm text-gray-900">{{ $user->RUP }}</div>
                @else 
                  <div class="text-sm text-gray-900">-</div>
                @endif
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                @if ($user->role == 'enfermero')
                  <div class="text-sm text-gray-900">{{ $user->telefono }}</div>
                @else 
                  <div class="text-sm text-gray-900">-</div>
                @endif
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                  @if($user->disable == false) 
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Habilitado</span>
                  @else
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Deshabilitado</span>
                  @endif
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $user->role }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ route('usuarios.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                <form class="inline-block" action="{{ route('usuarios.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Estas seguro?');">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Eliminar">
                </form>
              </td>
            </tr>
            @endforeach
            <!-- More people... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</x-app-layout>
