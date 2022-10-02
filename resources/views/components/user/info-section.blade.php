<section class="pt-2 bg-blueGray-50 w-[480px] container">
    <div class="px-4">
        <div class="flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-2">
            <div>
                <div class="flex flex-wrap justify-center">
                    <div class="px-4 flex justify-center">
                    </div>
                    <div class="px-4 text-center mt-20">
                        <div class="flex items-center justify-center ">
                            <img alt="..." src="{{asset("storage/profile/$user->profile_image")}}"
                                 class=" shadow-xl rounded-full h-24 w-24 lg:-ml-16">
                        </div>
                        <div class="flex justify-center py-4 lg:pt-4 pt-8">
                            <div class="mr-4 p-3 text-center">
                                <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                    {{$user->getPostsCount()}}
                                </span>
                                <span class="text-sm text-blueGray-400">Posts</span>
                            </div>
                            <div class="mr-4 p-3 text-center">
                            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600 ml-20">
                                10
                            </span>
                                <span class="text-sm text-blueGray-400 ml-20">Followers</span>
                            </div>
                            <div class="lg:mr-4 p-3 text-center">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-12">
                    <h3 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                        {{$user->first_name . " ". $user->last_name}}
                    </h3>
                    <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold">
                        <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                        {{$user->username}}
                    </div>
                </div>
                <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-9/12 px-4">
                            <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                @if(empty($user->bio))
                                    {{"We don't have much information about $user->username, but we are pretty sure
                                    that he's a cool person."}}
                                @endif
                                    {{$user->bio}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
