<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-8">
            {{ __('LaraBlog') }}
        </h2>
    </x-slot>

    <x-form.create-post-form :categories="$categories"/>

</x-app-layout>
