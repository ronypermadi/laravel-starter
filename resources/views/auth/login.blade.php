<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{asset('img/Logo.png')}}" class="w-32 h-32" alt="Logo">
            {{-- <x-jet-authentication-card-logo /> --}}
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
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex flex-wrap mt-4">
                <div class="flex-1">
                    <label for="remember_me" class="items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                  </div>
                  <div class="flex-1">
                    @if (Route::has('password.request'))
                        <a class="items-center underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                  </div>
            </div>
            
            <div class="flex items-center justify-center mt-4">
                <x-jet-button class="ml-4 mb-4 w-3/12 text-center">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
            <p class="mb-4 text-center">OR</p>
            <hr class="block w-full mb-4 border-0 border-t border-gray-300" />
            <div class="flex flex-wrap justify-center">
                <div class="w-full sm:w-1/2 sm:pr-2 mb-3 sm:mb-0">
                  <a href="" class="w-full bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline">Login with Facebook</a>
                </div>
                <div class="w-full sm:w-1/2 sm:pl-2">
                  <a href="" class="w-full bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline">Login with Google</a>
                </div>
              </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
