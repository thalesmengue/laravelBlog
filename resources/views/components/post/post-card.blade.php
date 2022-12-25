@isset($posts)
    @foreach($posts as $post)
        <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
            <div class="flex-shrink-0">
                <img class="h-48 w-full object-cover"
                     src="{{asset("storage/$post->image")}}"
                     alt="">
            </div>
            <div class="flex flex-1 flex-col justify-between bg-white p-6">
                <div class="flex-1">
                    <p class="text-sm font-medium text-indigo-600">
                        <a href="#" class="hover:underline">
                            {{$post->category->name}}
                        </a>
                    </p>
                    <a href="{{route("posts.show", $post)}}" class="mt-2 block">
                        <p class="text-xl font-semibold text-gray-900">{{$post->title}}</p>
                        <p class="mt-3 text-base text-gray-500 text-justify break-words">
                            {{$post->halfString()}}
                            @if(strlen($post->description) >= 175)
                                <a href="#" class="text-blue-600 flex flex-row hover:underline">see more...</a>
                            @endif
                        </p>
                    </a>
                </div>
                <div class="mt-6 flex items-center">
                    <div class="flex-shrink-0">
                        <a href="#">
                            <img class="h-10 w-10 rounded-full"
                                 src="{{asset("storage/" . $post->user->getImage())}}" alt="">
                        </a>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">
                            <a href="#"
                               class="hover:underline">{{$post->user->first_name . " " . $post->user->last_name}}</a>
                        </p>
                        <div class="flex space-x-1 text-sm text-gray-500">
                            <time>{{date("M j, Y", strtotime($post->created_at))}}</time>
                            <span aria-hidden="true">&middot;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endisset
