<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{asset('img/Logo.png')}}" class="w-32 h-32" alt="Logo">
            {{-- <x-jet-authentication-card-logo /> --}}
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            
            <div class="mt-4">
                <x-jet-label for="username" value="{{ __('User Name') }}" />
                <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
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
            <div class="flex flex-wrap mt-4">
                <div class="flex-1">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered ?') }}
                    </a>
                  </div>
            </div>
            <div class="flex items-center justify-center mt-4">
                <x-jet-button class="ml-4 mb-4 w-3/12 text-center">
                    {{ __('Register') }}
                </x-jet-button>
            </div>

            <p class="mb-4 text-center">OR</p>
            <hr class="block w-full mb-4 border-0 border-t border-gray-300" />
            <div class="flex flex-wrap justify-center">
                <div class="w-full sm:w-1/2 sm:pr-2 mb-3 sm:mb-0">
                  <a href="{{ url('auth/facebook') }}" class="w-full bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-2 focus:outline-none focus:shadow-outline">Register with Facebook</a>
                </div>
                <div class="w-full sm:w-1/2 sm:pl-2">
                  <a href="{{ url('auth/google') }}" class="w-full bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline">Register with Google</a>
                </div>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
