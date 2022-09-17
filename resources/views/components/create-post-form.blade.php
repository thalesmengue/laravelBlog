<div class="bg-white">
    <div class="w-3/4 content-center ml-56 p-12">
        <form method="post" action="{{route("posts.store")}}" enctype="multipart/form-data" class="space-y-8 divide-y divide-gray-200">
            @csrf
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div class="space-y-6 sm:space-y-5">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Post</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Create your post</p>
                    </div>

                    <div class="space-y-6 sm:space-y-5">
                        <div
                            class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="first-name" class="block text-sm font-semibold text-gray-700 sm:mt-px sm:pt-2">Title</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <input type="text" name="title" id="title" autocomplete="given-name"
                                       class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm
                                       focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                @if($errors->has("title"))
                                    <div class="text-center text-base text-red-600 mr-64 mt-2">
                                        {{ $errors->first("title") }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div
                            class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="description" class="block text-sm font-semibold text-gray-700 sm:mt-px sm:pt-2">
                                Description</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <textarea name="description" id="description" autocomplete="family-name"
                                          class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm
                                       focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm"></textarea>
                                @if($errors->has("description"))
                                    <div class="text-center text-base text-red-600 mr-64 mt-2">
                                        {{ $errors->first("description") }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div
                            class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="cover-photo" class="block text-sm font-semibold text-gray-700 sm:mt-px sm:pt-2">Image</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <div
                                    class="flex max-w-lg justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                             viewBox="0 0 48 48" aria-hidden="true">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0
                                                01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4
                                                0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="image"
                                                   class="relative cursor-pointer rounded-md bg-white font-medium
                                                   text-indigo-600 focus-within:outline-none focus-within:ring-2
                                                   focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="image" name="image" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                                @if($errors->has("image"))
                                    <div class="text-center text-base text-red-600 mr-64 mt-2">
                                        {{ $errors->first("image") }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="categories" class="block text-sm font-semibold text-gray-700 mt-4">Category</label>
                    <select id="categories" name="categories" autocomplete="country-name" class="mt-4 block w-2/4
                    rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500
                    focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has("categories"))
                        <div class="text-center text-base text-red-600 mr-64 mt-2">
                            {{$errors->first("categories")}}
                        </div>
                    @endif
                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <button type="button" onclick="window.location='{{route("posts.index")}}'"
                                class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700
                             shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Cancel
                        </button>
                            <button type="submit"
                                    class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600
                            py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none
                            focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Post
                            </button>
                    </div>
                </div>
        </form>
    </div>
</div>
