<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Vacunatorio
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('vacunatorios.update', $vacunatorio->id) }}">
                    @csrf
                    @method('put')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="centro" class="block font-medium text-sm text-gray-700">Centro</label>
                            <select name="centro_id" id="centro" class="form-input rounded-md shadow-sm mt-1 block w-full border border-gray-300 shadow rounded">
                            @foreach($centros as $centro)
                                @if($centro->id === $vacunatorio->centros->id)
                                <option value="{{$centro->id}}" selected style="display:none">{{$vacunatorio->centros->nombre}}</option>
                                @endif
                                <option value="{{$centro->id}}">{{$centro->nombre}}</option>
                            @endforeach
                            </select>
                            @error('centro')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-input rounded-md shadow mt-1 block w-full border border-gray-300"
                                   value="{{ old('nombre', $vacunatorio->nombre) }}" />
                            @error('nombre')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="medico" class="block font-medium text-sm text-gray-700">Medico</label>
                            <select name="medico" id="medico" class="form-input rounded-md shadow mt-1 block w-full border border-gray-300">
                            @foreach($medicos as $medico)
                                <option value="{{$medico->nombre}}">{{$medico->nombre}}</option>
                            @endforeach
                            </select>
                            @error('medico')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="horario" class="block font-medium text-sm text-gray-700">Horario</label>
                            <x-jet-input type="text" name="horario" id="horario" class="form-input rounded-md shadow mt-1 block w-full border-gray-300"
                                   value="{{ old('horario', $vacunatorio->horario) }}" />
                            @error('horario')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="telefono" class="block font-medium text-sm text-gray-700">Teléfono</label>
                            <input type="text" name="telefono" id="telefono" class="form-input rounded-md shadow mt-1 block w-full border-gray-300"
                                   value="{{ old('telefono', $vacunatorio->telefono) }}" />
                            @error('medico')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="disable" class="block font-medium text-sm text-gray-700">Estado</label>
                            <input type="radio" name="disable" value='0'> Habilitar <br>
                            <input type="radio" name="disable" value='1'> Deshabilitar <br>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest  active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Editar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>