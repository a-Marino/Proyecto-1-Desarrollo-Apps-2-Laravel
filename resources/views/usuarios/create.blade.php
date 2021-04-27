<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agregar Usuario
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('usuarios.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md p-10">
                        <div>
                            <x-jet-label for="apelnom" value="{{ __('Nombre y Apellido') }}" />
                            <x-jet-input id="apelnom" class="block mt-1 w-full" type="text" name="apelnom" :value="old('apelnom')" required autofocus autocomplete="apelnom" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="DNI" value="{{ __('DNI') }}" />
                            <x-jet-input id="DNI" class="block mt-1 w-full" type="number" name="DNI" :value="old('DNI')" required autofocus autocomplete="DNI" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="role" value="{{ __('Rol') }}" />
                            <select name="role" id="role" class="block mt-1 w-full">
                                <option value="enfermero">Enfermero</option>
                                <option value="admin">Administrador</option>
                                <option value="gestion">Gestion</option>
                            </select>
                        </div>

                        <div class="mt-4" id="div_rup">
                            <x-jet-label for="RUP" value="{{ __('Rup') }}"/>
                            <x-jet-input id="RUP" class="block mt-1 w-full" type="number" name="RUP"/>
                        </div>

                        <div class="mt-4" id="div_telefono">
                            <x-jet-label for="telefono" value="{{ __('Telefono') }}"/>
                            <x-jet-input id="telefono" class="block mt-1 w-full" type="number" name="telefono"/>
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-100 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Crear 
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>