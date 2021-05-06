<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('imagenes/vacunate-logo-lg-n.svg') }}" alt="" class="w-56">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Gracias por registrarse! Antes de continuar, podrias confirmar tu direccion de correo electronico con el link que te hemos enviado? Si no recibiste ningun email, te enviaremos otro.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Un link de verificacion ha sido enviado a tu correo electronico') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Volver a enviar link') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Salir') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
