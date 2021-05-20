<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Usuario
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('usuarios.update', $user->id) }}">
                    @csrf
                    @method('put')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="apelnom" class="block font-medium text-sm text-gray-700">Nombre y Apellido</label>
                            <x-jet-input type="text" name="apelnom" id="apelnom" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('apelnom', $user->apelnom) }}" />
                            @error('apelnom')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="DNI" class="block font-medium text-sm text-gray-700">DNI</label>
                            <x-jet-input type="number" name="DNI" id="DNI" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('DNI', $user->DNI) }}" />
                            @error('DNI')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <x-jet-input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('email', $user->email) }}" />
                            @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        @if ($user->role == 'enfermero')
                            <div class="px-4 py-5 bg-white sm:p-6" id="div_rup">
                                <label for="RUP" class="block font-medium text-sm text-gray-700">RUP</label>
                                <x-jet-input type="number" name="RUP" id="RUP" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('RUP', $user->RUP) }}" />
                                @error('RUP')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-5 bg-white sm:p-6" id="div_telefono">
                                <label for="telefono" class="block font-medium text-sm text-gray-700">Telefono</label>
                                <x-jet-input type="number" name="telefono" id="telefono" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('telefono', $user->telefono) }}" />
                                @error('telefono')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        @endif

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