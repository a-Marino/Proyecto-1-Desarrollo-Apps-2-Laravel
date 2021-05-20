<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Centro
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('centros.update', $centro->id) }}">
                    @csrf
                    @method('put')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-input rounded-md shadow mt-1 block w-full border-gray-300"
                                   value="{{ old('nombre', $centro->nombre) }}" />
                            @error('nombre')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="localidad" class="block font-medium text-sm text-gray-700">Localidad</label>
                            <input type="text" name="localidad" id="localidad" class="form-input rounded-md shadow border-gray-300 mt-1 block w-full"
                                   value="{{ old('localidad', $centro->localidad) }}" />
                            @error('localidad')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="id" class="block font-medium text-sm text-gray-700">Código</label>
                            <input type="number" name="id" id="id" class="form-input rounded-md shadow border-gray-300 mt-1 block w-full"
                                   value="{{ old('id', $centro->id) }}" />
                            @error('id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="disable" class="block font-medium text-sm text-gray-700">Estado</label>
                            <input type="radio" name="disable" value='0'> Habilitar <br>
                            <input type="radio" name="disable" value='1'> Deshabilitar <br>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-blue-500 hover:bg-blue-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Editar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>