<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="{{route("index")}}"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                        >Home</a>
                        @auth
                            <a href="{{route("posts.index")}}"
                               class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                            >Posts</a>
                            <a href="{{route("user.show", auth()->user()->username)}}"
                               class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                            >Profile</a>
                        @endauth
                        <a href="{{ route("about") }}"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About
                        </a>
                    </div>
                </div>
            </div>
            @guest
                <div class="mr-8">
                    <button onclick="window.location='{{route("login")}}'" class="bg-gray-200 text-slate-800 font-bold
                         py-2 px-4 border-b-4 border-gray-400 hover:opacity-60 rounded mr-4">
                        sign in
                    </button>
                    <button onclick="window.location='{{route("register")}}'" class="bg-gray-200 text-slate-800 font-bold
                     py-2 px-4 border-b-4 border-gray-400 hover:opacity-60 rounded">
                        sign up
                    </button>
                </div>
            @endguest
            @auth
                <nav :class="{'flex': open, 'hidden': !open}"
                     class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                                class="flex flex-wrap w-full px-12 py-2 mt-2 text-sm font-mono space-x-3 items-center bg-gray-800
                        rounded-lg hover:text-gray-900 focus:text-gray-900 hover:opacity-70 focus:outline-none focus:shadow-outline">
                            <img src="{{ auth()->user()->getImage() }}"
                                 class="w-8 rounded-full">
                            <span class="text-white"> {{ auth()->user()->first_name }} </span>
                            <svg fill="currentColor" viewBox="0 0 20 20"
                                 :class="{'rotate-180': open, 'rotate-0': !open}"
                                 class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1 fill-white">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 w-full mt-1 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                <button onclick="window.location='{{route("user.edit", Auth::user())}}'" class="block px-4 py-2 mt-2 text-sm
                                 font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900
                                  hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"> Settings
                                </button>
                                <form method="post" action="{{route("logout")}}">
                                    @csrf
                                    <button class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0
                        hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none
                        focus:shadow-outline h-full"> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            @endauth
            <div class="sm:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pt-2 pb-3">
                    <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium"
                       aria-current="page">Home</a>
                    <a href="#"
                       class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Posts</a>
                    <a href="#"
                       class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">About</a>
                </div>
            </div>
</nav>
