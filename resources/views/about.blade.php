<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-8">
            {{ __('LaraBlog') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center font-mono text-xl">
        <div class="w-2/4 p-12 m-auto text-justify break-words">
            <p>Hello, my name is <span class="text-indigo-600">Thales Machado</span>, the idea to start this project
                came from the <span class="text-indigo-600">Laravel Daily</span> Roadmap about Laravel, and
                since I'm studying Laravel, nothing better than joining the useful to the pleasant and apply in a
                practical project what I've been studying.</p>
            <p class="mt-2">I've been increasing my programming skills for about 2 years, and at the actual moment I
                have
                technical knowledge in <span class="text-indigo-600">PHP</span>, <span class="text-indigo-600">JavaScript
                </span> and <span class="text-indigo-600">HTML</span>. In frameworks, I developed practice and knowledge
                in <span class="text-indigo-600">Laravel</span>, <span class="text-indigo-600">TailwindCSS</span>,
                <span class="text-indigo-600">AlpineJS</span>, <span class="text-indigo-600">Bootstrap</span> and
                <span class="text-indigo-600">Livewire</span>.</p>
            <p class="py-14">You can find more infos about me in the links below 🤙</p>
            <div class="">
                <a href="https://github.com/thalesmengue" target="_blank">
                    <button class="inline-flex items-center p-4 py-5 bg-slate-700
            text-gray-300 text-xl font-mono gap-3 rounded-md transition ease-in-out delay-50 hover:-translate-y-3 hover:scale-110
            hover:bg-indigo-800 duration-300">
                        <img src="{{asset("assets/github.svg")}}" alt="..." class="h-8 w-8">
                        Github
                    </button>
                </a>
                <a href="https://www.linkedin.com/in/thales-machado-mengue/" target="_blank">
                    <button class="inline-flex
                items-center p-4 py-5 bg-slate-700 text-gray-300 text-xl gap-3 font-mono ml-4 rounded-md transition ease-in-out
                 delay-50 hover:-translate-y-3 hover:scale-110 hover:bg-indigo-800 duration-300">
                        <img src="{{asset("assets/linkedin.svg")}}" alt="..." class="h-8 w-8">
                        Linkedin
                    </button>
                </a>
                <a href="https://twitter.com/thalesmengue" target="_blank">
                    <button class="inline-flex items-center p-4
                py-5 bg-slate-700 text-gray-300 text-xl gap-3 font-mono ml-4 rounded-md transition ease-in-out delay-50
                hover:-translate-y-3 hover:scale-110 hover:bg-indigo-800 duration-300">
                        <img src="{{asset("assets/twitter.svg")}}" alt="..." class="h-8 w-8">
                        Twitter
                    </button>
                </a>
                <a href="https://thalesmengue.github.io/" target="_blank">
                    <button class="inline-flex items-center p-4
                py-5 bg-slate-700 text-gray-300 text-xl gap-3 font-mono ml-4 rounded-md transition ease-in-out delay-50
                hover:-translate-y-3 hover:scale-110 hover:bg-indigo-800 duration-300">
                        <img src="{{asset("assets/dinamite.png")}}" alt="..." class="h-8 w-8">
                        Portfólio
                    </button>
                </a>
            </div>
        </div>
</x-app-layout>
