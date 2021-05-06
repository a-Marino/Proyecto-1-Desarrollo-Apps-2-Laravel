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


                <form method="post" action="{{ route('registrarVacunados.buscar') }}" id="myform">
                    @csrf
                    <div class="grid grid-cols-2">

                        <div>

                            <div id="form-reg-vacunacion" class="px-1 my-4 max-w-5xl mx-6 space-y-5">

                                <div class="flex space-x-4">

                                    <div class="w-1/4">
                                        <label for="DNI">DNI:</label>
                                        <input type="number" name="DNI" id="DNI"
                                            class="border border-gray-400 block py-2 px-4 rounded w-full" value=@foreach ($vacunado as $vac) {{ $vac->DNI }} @endforeach required>
                                    </div>

                                    <div class="w-1/7 py-7">
                                        <button name='boton' value='busca_vacunado'
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
                                            pattern="[A-Za-z0-9ÑñáéíóúÁÉÍÓÚüÜ´ ]+" required disabled value="@foreach ($vacunado as $vac) {{ $vac->apelnom }} @endforeach">
                                    </div>
                                </div>



                                <div class="flex space-x-4">
                                    <div class="w-1/3">
                                        <label for="edad">Edad:</label>
                                        <input type="number" name="edad" id="edad_vacunado"
                                            class="border border-gray-400 block py-2 px-4 rounded w-full" required
                                            disabled value=@foreach ($vacunado as $vac) {{ $vac->edad }} @endforeach>
                                    </div>
                                    <div class="w-1/2 px-4">
                                        <label for="domicilio">Domicilio:</label>
                                        <input type="text" name="domicilio" id='domicilio_vacunado'
                                            class="border border-gray-400 block py-2 px-4 rounded w-full"
                                            pattern="[A-Za-z0-9ÑñáéíóúÁÉÍÓÚüÜ´ ]+" required disabled value="@foreach ($vacunado as $vac) {{ $vac->domicilio }} @endforeach">
                                    </div>
                                </div>
                                <div class="flex space-x-4">
                                    <div class="w-1/3">
                                        <label for="grupo_riesgo">Grupo de riesgo:</label>
                                        <select name="grupo_riesgo" id="grupo_riesgo"
                                            class="border border-gray-400 block py-2 px-4 rounded w-full" required
                                            disabled>
                                            <option value="">Seleccione Tipo</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                    <div class="w-1/2 px-4">
                                        <label for="tipo_vacuna">Tipo de vacuna:</label>

                                        <select name="tipo_vacuna" id="tipo_vacuna"
                                            class="border border-gray-400 block py-2 px-4 rounded w-full" onchange="this.form.submit()">
                                            <option value="">Seleccionar Tipo de Vacuna</option>

                                            @foreach ($vacuna as $vac)
                                                <option value={{ $vac->id }}> {{ $vac->nombre }} </option>
                                            @endforeach

                                        </select>
                                      </div>
                                </div>

                                <div class="flex space-x-2">

                                    <div class="w-1/2 mt-2">


                                        <!-- Mensaje de error -------------------------------------------------------------->
                                        <div class="flex items-center bg-green-400 text-white text-sm font-bold px-4 py-2"
                                            id="mensaje_vac">
                                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                                            </svg>

                                        </div>

                                    </div>
                                </div>


                                <div class="mx-auto">
                                    <div class="w-1/2 mt-2 ml-26">

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
                                                Nombre
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Dosis
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Estado
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Editar</span>
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
                                                            {{ $registro->id_vacunatorio }}</div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">
                                                            {{ $registro->tipo_vacuna }}
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
        <<input class="form-control" type="hidden" name="boton" value="otro">
        </form>

    </div>
</div>
</div>
</x-app-layout>
