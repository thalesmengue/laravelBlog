<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-8">
            {{ __('LaraBlog') }}
        </h2>
    </x-slot>
    <div class="relative bg-gray-50 px-4 pt-16 pb-20 sm:px-6 lg:px-8 lg:pt-24 lg:pb-28">
        <div class="absolute inset-0">
            <div class="h-1/3 sm:h-2/3 flex float-right mr-12">
                @auth
                    <div>
                        <button onclick="window.location='{{ route("posts.create") }}'" type="button" class="rounded-md
                        border border-transparent bg-indigo-600 px-4 py-2 text-sm mt-4 font-medium text-white shadow-sm
                        hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                        >Add Post
                        </button>
                    </div>
                @endauth
            </div>
        </div>
        <div class="relative mx-auto max-w-7xl">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">posts</h2>
                <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">here you can find your own posts</p>
            </div>
            <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">
                <x-post.post-card :posts="$posts"/>
            </div>
            @if($posts->isEmpty())
                <p class="text-center font-bold text-xl">you haven't posted anything yet, you can create posts by
                    clicking
                    on the purple button in the upper left corner</p>
            @endif
            <div class="flex justify-center mt-8">
                {{ $posts->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
