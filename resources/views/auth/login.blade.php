<x-guest-layout>
    <x-jet-authentication-card>
        <div class="fixed top-0 left-0 p-5">
            <h1 class="text-2xl"> LOGIN DATA </h1>
            <h2 class="text-xl">ADMIN</h2>
            <p>DNI: 100 - PASSWORD: 100</p>
            <h2 class="text-xl"> ENFERMERO </h2>
            <p>DNI: 101 - PASSWORD: 101 </p>
            <h3 class="text-xl"> GESTION </h3>
            <p>DNI: 103 - PASSWORD: 103</p>
        </div>
        
        <x-slot name="logo">
            <img src="{{ asset('imagenes/vacunate-logo-lg-n.svg') }}" alt="" class="w-56">
        </x-slot>
        
        <x-jet-validation-errors class="mb-4" />
        
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="DNI" value="{{ __('DNI') }}" />
                <x-jet-input id="DNI" class="block mt-1 w-full" type="number" name="DNI" :value="old('DNI')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Olvidaste tu Contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="bg-blue-500 hover:bg-blue-700 ml-4">
                    {{ __('Iniciar Sesión') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
