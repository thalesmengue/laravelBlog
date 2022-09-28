<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-8">
            {{ __('LaraBlog') }}
        </h2>
    </x-slot>
    <div>
        <div class="flex justify-start gap-72">
            <x-user.info-section :posts="$posts" :user="$user"/>
            <div class="flex flex-col">
                <h2 class="font-semibold mt-4">Posts</h2>
                    <x-post.profile-post-card :posts="$posts" :user="$user"/>
            </div>
        </div>
    </div>
</x-app-layout>
