<x-guest-layout>
    <x-auth.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-auth.application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth.auth-validation-errors class="mb-4" :errors="$errors"/>

        <x-auth.auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-auth.input-label for="first_name" :value="__('First Name')"/>

                <x-auth.text-input id="first_name" class="mt-1 w-full" type="text" name="first_name"
                              :value="old('first_name')" required autofocus/>
            </div>

            <div class="mt-4">
                <x-auth.input-label for="last_name" :value="__('Last Name')"/>

                <x-auth.text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                              :value="old('last_name')" required autofocus/>
            </div>

            <div class="mt-4">
                <x-auth.input-label for="username" :value="__('Username')"/>

                <x-auth.text-input id="username" class="block mt-1 w-full" type="text" name="username"
                              :value="old('username')" required autofocus/>
            </div>

            <div class="mt-4">
                <x-auth.input-label for="email" :value="__('Email')"/>

                <x-auth.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                              required/>
            </div>

            <div class="mt-4">
                <x-auth.input-label for="password" :value="__('Password')"/>

                <x-auth.text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password"/>
            </div>

            <div class="mt-4">
                <x-auth.input-label for="password_confirmation" :value="__('Confirm Password')"/>

                <x-auth.text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-auth.primary-button class="ml-4">
                    {{ __('Register') }}
                </x-auth.primary-button>
            </div>
        </form>
    </x-auth.auth-card>
</x-guest-layout>
