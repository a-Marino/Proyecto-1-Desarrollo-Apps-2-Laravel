<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Asignacion
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('asignaciones.update', $asignacion->id) }}">
                    @csrf
                    @method('put')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="user_id" class="block font-medium text-sm text-gray-700">Enfermero</label>
                            <select name="user_id" id="user_id" class="form-input rounded-md shadow-sm mt-1 block w-full">
                            @foreach($users as $user)
                                @if($user->id === $asignacion->user_id)
                                <option value="{{$user->id}}" selected style="display:none">{{$user->apelnom}}</option>
                                @endif
                                @if($user->role == 'enfermero')
                                <option value="{{$user->id}}">{{$user->apelnom}}</option>
                                @endif
                            @endforeach
                            </select>
                            @error('user_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="vacunatorio_id" class="block font-medium text-sm text-gray-700">Vacunatorio</label>
                            <select name="vacunatorio_id" id="vacunatorio_id" class="form-input rounded-md shadow-sm mt-1 block w-full">
                            @foreach($vacunatorios as $vacunatorio)
                                @if($vacunatorio->id === $asignacion->vacunatorio_id)
                                <option value="{{$vacunatorio->id}}" selected style="display:none">{{$vacunatorio->nombre}}</option>
                                @endif
                                @if($vacunatorio->disable == false)
                                <option value="{{$vacunatorio->id}}">{{$vacunatorio->nombre}}</option>
                                @endif
                            @endforeach
                            </select>
                            @error('vacunatorio_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="disable" class="block font-medium text-sm text-gray-700">Estado</label>
                            <input type="radio" name="disable" value='0'> Habilitar <br>
                            <input type="radio" name="disable" value='1'> Deshabilitar <br>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Editar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>