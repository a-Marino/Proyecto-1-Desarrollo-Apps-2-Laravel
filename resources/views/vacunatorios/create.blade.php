<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agregar Vacunantorio
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('vacunatorios.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md p-10">
                        <div class="mt-4">
                            <x-jet-label for="centro_id" value="{{ __('Centro') }}" />
                            <select id="centro_id"  name="centro_id" class="block mt-1 w-full border-none">
                                @foreach($centros as $centro)
                                    @if ($centro->disable == 0)
                                        <option value="{{$centro->id}}">{{$centro->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="medico" value="{{ __('Medico') }}" />
                            <x-jet-input id="medico" class="block mt-1 w-full" type="string" name="medico" :value="old('medico')" required />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="horario" value="{{ __('Horario') }}" />
                            <x-jet-input id="horario" class="block mt-1 w-full" type="string" name="horario" :value="old('horario')" required />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="telefono" value="{{ __('Teléfono') }}" />
                            <x-jet-input id="telefono" class="block mt-1 w-full" type="string" name="telefono" :value="old('telefono')" required />
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
</x-app-layout>