<div class="bg-white">
    <div class="w-3/4 content-center ml-56">
    <form action="{{ route("user.destroy", Auth::user()) }}" method="post">
        @csrf
        @method("DELETE")
        <div class="w-3/4 px-12">
            <button type="submit"
                    class="float-right rounded-md border border-gray-300 bg-red-500 py-2 px-4 text-sm font-medium text-white
                             shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Delete
            </button>
            <p class="font-mono">Want to delete your account? Click in the red button</p>
        </div>
    </form>
    </div>
    <div class="w-3/4 content-center ml-56 p-12">
        <form enctype="multipart/form-data" action="{{route("user.update", $user)}}"
              class="space-y-8 divide-y divide-gray-200" method="post">
            @csrf
            @method("PUT")
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div class="space-y-6 sm:space-y-5">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Settings</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">edit your account settings</p>
                    </div>
                    <div class="space-y-6 sm:space-y-5">
                        <div
                            class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="first_name" class="block text-sm font-semibold text-gray-700 sm:mt-px sm:pt-2">First
                                Name</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <input type="text" name="first_name" id="first_name" autocomplete="given-name"
                                       value="{{$user->first_name}}"
                                       class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm
                                       focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                @if($errors->has("first_name"))
                                    <div class="text-center text-base text-red-600 mr-64 mt-2">
                                        {{ $errors->first("first_name") }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="space-y-6 sm:space-y-5">
                            <div
                                class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="last_name"
                                       class="block text-sm font-semibold text-gray-700 sm:mt-px sm:pt-2">Last
                                    Name</label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <input type="text" name="last_name" id="last_name" autocomplete="given-name"
                                           value="{{$user->last_name}}"
                                           class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm
                                       focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                    @if($errors->has("last_name"))
                                        <div class="text-center text-base text-red-600 mr-64 mt-2">
                                            {{ $errors->first("last_name") }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="space-y-6 sm:space-y-5">
                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="username"
                                           class="block text-sm font-semibold text-gray-700 sm:mt-px sm:pt-2">Username</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <input type="text" name="username" id="username" autocomplete="given-name"
                                               value="{{$user->username}}"
                                               class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm
                                       focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                        @if($errors->has("username"))
                                            <div class="text-center text-base text-red-600 mr-64 mt-2">
                                                {{ $errors->first("username") }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="space-y-6 sm:space-y-5">
                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="email"
                                               class="block text-sm font-semibold text-gray-700 sm:mt-px sm:pt-2">
                                            Email</label>
                                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                                            <input type="text" name="email" id="email" autocomplete="given-name"
                                                   value="{{$user->email}}"
                                                   class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm
                                       focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                            @if($errors->has("email"))
                                                <div class="text-center text-base text-red-600 mr-64 mt-2">
                                                    {{ $errors->first("email") }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="bio"
                                               class="block text-sm font-semibold text-gray-700 sm:mt-px sm:pt-2">
                                            Bio</label>
                                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <textarea name="bio" id="bio" autocomplete="family-name"
                                          class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm
                                       focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">{{$user->bio}}</textarea>
                                            @if($errors->has("bio"))
                                                <div class="text-center text-base text-red-600 mr-64 mt-2">
                                                    {{ $errors->first("bio") }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="profile_image"
                                               class="block text-sm font-semibold text-gray-700 sm:mt-px sm:pt-2">Profile
                                            Image</label>
                                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                                            <div
                                                class="flex max-w-lg justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                                <div class="space-y-1 text-center">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                         fill="none"
                                                         viewBox="0 0 48 48" aria-hidden="true">
                                                        <path
                                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0
                                                01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4
                                                0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"/>
                                                    </svg>
                                                    <div class="flex text-sm text-gray-600">
                                                        <label for="profile_image"
                                                               class="relative cursor-pointer rounded-md bg-white font-medium
                                                   text-indigo-600 focus-within:outline-none focus-within:ring-2
                                                   focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                                            <span>Upload a file</span>
                                                            <input id="profile_image" name="profile_image" type="file"
                                                                   class="sr-only"
                                                                   value="{{ $user->profile_image }}">
                                                        </label>
                                                        <p class="pl-1">or drag and drop</p>
                                                    </div>
                                                    <p class="text-xs text-gray-500">PNG, JPG or JPEG to 10MB</p>
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

                            <div class="pt-5">
                            </div>
                            <div class="flex justify-end gap-5">
                                <button type="button" onclick="window.location='{{ url()->previous() }}'"
                                        class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700
                             shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Cancel
                                </button>
                                <button type="submit"
                                        class="rounded-md border border-gray-300 bg-indigo-600 py-2 px-4 text-sm font-medium text-white
                             shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
