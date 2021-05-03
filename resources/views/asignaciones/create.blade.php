<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agregar Asignacion
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('asignaciones.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md p-10">
                        <div class="mt-4">
                            <x-jet-label for="user_id" value="{{ __('Enfermero') }}" />
                            <select id="user_id"  name="user_id" class="block mt-1 w-full border-none">
                                @foreach($users as $user)
                                    @if ($user->role == 'enfermero')
                                        <option value="{{$user->id}}">{{$user->apelnom}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="vacunatorio_id" value="{{ __('Vacunatorio') }}" />
                            <select id="vacunatorio_id"  name="vacunatorio_id" class="block mt-1 w-full border-none">
                                @foreach($vacunatorios as $vacunatorio)
                                    @if ($vacunatorio->disable == false)
                                        <option value="{{$vacunatorio->id}}">{{$vacunatorio->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
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