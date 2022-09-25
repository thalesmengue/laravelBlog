<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-8">
            {{ __('LaraBlog') }}
        </h2>
    </x-slot>
    @guest
        <div class="relative mx-auto max-w-7xl">
            <div class="text-center mt-12">
                <p>
                    here you can create your own posts, and share with your friends
                </p>
                <p class="mt-4">
                    still haven't made an account? sign up by the header button
                </p>
            </div>
        </div>
    @endguest
</x-app-layout>
