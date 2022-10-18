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
    <div class="relative bg-gray-50 px-4 pt-16 pb-20 sm:px-6 lg:px-8 lg:pt-24 lg:pb-28">
        <div>
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">posts</h2>
                <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">here you can find some random posts</p>
            </div>
        </div>
        <div class="relative mx-auto max-w-7xl">
            <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">
                <x-post.post-card :posts="$posts"/>
            </div>
        </div>
    </div>
</x-app-layout>
