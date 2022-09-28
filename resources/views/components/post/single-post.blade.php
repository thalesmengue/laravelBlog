<div class="max-w-screen-xl mx-auto">
    <div class="inset-0">
        @if($post->user_id === auth()->user()->id)
            <div class="h-2/3 sm:h-2/3 mr-8 mt-4 flex flex-row float-right">
                <div>
                    <button onclick="window.location='{{ route("posts.edit", $post) }}'" type="button"
                            class="text-white bg-blue-500 hover:bg-blue-600 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
                    >edit
                    </button>
                </div>
                <div>
                    <form method="post" action="{{route("posts.destroy", $post)}}">
                        @csrf
                        @method("DELETE")
                        <button type="submit"
                                class="text-white bg-red-500 hover:bg-red-600 font-semibold py-2 px-4 border border-gray-400 rounded shadow ml-4">
                            delete
                        </button>
                    </form>
                </div>
                @endif
            </div>
            <main class="mt-10">
                <div class="mb-24 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
                    <div class="absolute left-0 bottom-0 w-full h-full z-10"
                         style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                    <img src="{{asset("/posts/$post->image")}}"
                         class="absolute left-0 top-0 w-full h-full z-0 object-cover"/>
                    <div class="p-4 absolute bottom-0 left-0 z-20">
                        <a href="#"
                           class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">{{$post->category->name}}</a>
                        <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                            {{$post->title}}
                        </h2>
                        <div class="flex mt-3">
                            <img src="{{asset($post->user->profile_image)}}"
                                 class="h-10 w-10 rounded-full mr-2 object-cover"/>
                            <div>
                                <p class="font-semibold text-gray-200 text-sm">{{$post->user->first_name . " " . $post->user->last_name}}</p>
                                <time
                                    class="font-semibold text-gray-400 text-xs"> {{date("M j, Y", strtotime($post->created_at))}}</time>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed mb-24 text-justify">
                    <p>{{$post->description}}</p>
                </div>
            </main>
    </div>
