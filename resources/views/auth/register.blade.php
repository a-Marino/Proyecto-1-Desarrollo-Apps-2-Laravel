<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('imagenes/vacunate-logo-lg-n.svg') }}" alt="" class="w-32">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

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

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Ya estas registrado?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
