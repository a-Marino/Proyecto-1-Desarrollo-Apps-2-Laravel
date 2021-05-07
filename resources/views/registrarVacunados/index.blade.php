<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <img src="{{ asset('imagenes/vacuna.svg') }}" class="w-10">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Registrar Vacunado') }}
            </h2>
        </div>
    </x-slot>
    
  
        
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <form method="post" action="{{ route('registrarVacunados.buscar') }}">
                    @csrf
                    <div class="grid grid-cols-2">

                        <div>

                            <div id="form-reg-vacunacion" class="px-1 my-4 max-w-5xl mx-6 space-y-5">

                                <div class="flex space-x-4">

                                    <div class="w-1/4">
                                        <label for="DNI">DNI:</label>
                                        <input type="number" name="DNI" id="DNI" min="1" pattern="^[0-9]+"
                                            class="border border-gray-400 block py-2 px-4 rounded w-full" value={{ $DNI }} required>
                                    </div>

                                    <div class="w-1/7 py-7">
                                        <button name='boton' value='busca_vacunado' formnovalidate
                                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                            id='btn-registrar-vacunado'>
                                            Buscar
                                        </button>
                                    </div>
                                </div>

                                <div class="flex space-x-4">
                                    <div class="w-10/12">
                                        <label for="apelnom_v">Nombre y Apellido:</label>
                                        <input type="text" name="apelnom_v" id="apelnom_v"
                                            class="border border-gray-400 block py-2 px-4 rounded w-full"
                                            pattern="[A-Za-z0-9ÑñáéíóúÁÉÍÓÚüÜ´ ]+" required @if ($cant_vacunados==1||$DNI==''){ disabled } @endif value="{{ $apelnom }}">
                                    </div>
                                </div>



                                <div class="flex space-x-4">
                                    <div class="w-1/3">
                                        <label for="edad">Edad:</label>
                                        <input type="number" name="edad" id="edad_vacunado"
                                            class="border border-gray-400 block py-2 px-4 rounded w-full" required
                                            @if ($cant_vacunados==1||$DNI==''){ disabled } @endif value={{ $edad }}>
                                    </div>
                                    <div class="w-1/2 px-4">
                                        <label for="domicilio">Domicilio:</label>
                                        <input type="text" name="domicilio" id='domicilio_vacunado'
                                            class="border border-gray-400 block py-2 px-4 rounded w-full"
                                            pattern="[A-Za-z0-9ÑñáéíóúÁÉÍÓÚüÜ´ ]+" required @if ($cant_vacunados==1||$DNI==''){ disabled } @endif value="{{ $domicilio }}">
                                    </div>
                                </div>
                                <div class="flex space-x-4">
                                    <div class="w-1/3">
                                        <label for="grupo_riesgo">Grupo de riesgo:</label>
                                        <select name="grupo_riesgo" id="grupo_riesgo"
                                            class="border border-gray-400 block py-2 px-4 rounded w-full" required
                                            @if ($cant_vacunados==1||$DNI==''){ disabled } @endif>
                                            <option value="">Seleccione Tipo</option>
                                            <option value="1" @if ($grupo_riesgo==1){ selected } @endif >1</option>
                                            <option value="2" @if ($grupo_riesgo==2){ selected } @endif >2</option>
                                            <option value="3" @if ($grupo_riesgo==3){ selected } @endif >3</option>
                                            <option value="4" @if ($grupo_riesgo==4){ selected } @endif >4</option>
                                        </select>
                                    </div>
                                    <div class="w-1/2 px-4">
                                       
                                        <label for="tipo_vacuna">Tipo de vacuna:</label>
                                     
                                        <select name="tipo_vacuna" id="tipo_vacuna"
                                            class="border border-gray-400 block py-2 px-4 rounded w-full"  @if ($DNI==''){ disabled } @endif required>
                                            <option value="">Seleccionar Tipo de Vacuna</option>

                                            @foreach ($vacuna as $vac)
                                                <option value={{ $vac->id }}> {{ $vac->nombre }} </option>
                                            @endforeach

                                        </select>
                                      </div>


                                </div>

                                <div class="mx-auto">
                                    <div class="w-1/2 mt-2 ml-26  @if ($DNI==''){ invisible } @endif"  >
                                        
                                        <button name='boton' value='graba_vacunado'
                                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                            id='btn-registrar-vacunado'>
                                            Registrar Vacunado
                                        </button>
                                        
                                    </div>
                                </div>

                                <input type="hidden" name="turno" id="turno">

                            </div>

                        </div>

                        <div class="mt-4 mx-4">
                            <label class="mt-2">VACUNAS RECIBIDAS:</label>

                            <!---  Bloque 2 --->
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Fecha
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Dosis
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Vacunatorio
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                RUP
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">

                                        @if (isset($dosis))


                                            @foreach ($dosis as $registro)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ $registro->created_at }}
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">
                                                            {{ $registro->nombre }}</div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">
                                                            {{ $registro->Id_vacunatorio }}</div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">
                                                            {{ $registro->RUP }}
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach

                                        @endisset

                                </tbody>
                            </table>
                        </div>
                        <!-- Fin Bloque 2 -->
                    </div>

                </div>

        </div>
        <input class="form-control" type="hidden" name="boton" value="otro">
        </form>

    </div>
</div>
</div>
</x-app-layout>
