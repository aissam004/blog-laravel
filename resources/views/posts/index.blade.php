<x-app-layout>

    <div class=" w-full flex flex-row ">
        <div class='nav-left  flex-none w-1/4'>

            <div class="flex flex-wrap justify-between pt-3 mx-6">
                <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">

                    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                        <h3 class="text-gray-800 text-base px-6 md:font-bold my-4 text-center">Users</h5>
                            @foreach ($users as $user)
                                <div class="my-2 text-gray-800 {{isset($userSelect)&&($userSelect->id==$user->id)?"bg-yellow-200":""}}">
                                    <a href="{{ route('users.show', ['user' => $user]) }}"
                                        class="p-6">{{ $user->name }}</a>
                                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-gray-700 bg-yellow-500 rounded-full">{{count($user->posts)}}</span>

                                </div>
                                <hr>
                            @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div class="grow">
            <div class="container px-4 md:px-0 max-w-6xl mx-auto ">


                @foreach ($posts as $k=>$post)
                    <div class="flex flex-wrap justify-between pt-3 -mx-6">
                        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                                <a href="{{ route('posts.show', [$post]) }}"
                                    class="flex flex-wrap no-underline hover:no-underline">
                                    <img src="https://source.unsplash.com/collection/{{rand($k,455*$k)}}/800x600"
                                        class="h-64 w-full rounded-t pb-6">
                                    <div
                                        class="flex flex-wrap w-full text-gray-800 text-xs md:text-sm px-6 md:font-bold">
                                        @foreach ($post->tags as $val)
                                            <a href="{{ route('tags.show', ['tag' => $val]) }}"
                                                class="mr-1">#{{ $val->title }}</a>
                                        @endforeach
                                    </div>
                                    <div class="w-full font-bold text-xl text-gray-900 px-6">{{ $post->title }}</div>
                                    <p class="text-gray-800 font-serif text-base px-6 mb-5">
                                        {{ $post->content }}
                                    </p>
                                </a>
                            </div>
                            <div
                                class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-row flex-wrap content-center">
                                        <img class="w-8 h-8 rounded-full mr-4 avatar" data-tippy-content="Author Name"
                                            src="http://i.pravatar.cc/300" alt="Avatar of Author">
                                        <p>{{ $post->user->name }}</p>
                                    </div>
                                    <p class="text-gray-600 text-xs md:text-sm">{{ $post->created_at }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
        <div class='nav-right flex-none w-1/4'>
            <div class="flex flex-wrap justify-between pt-3 mx-6">
                <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">

                    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                        <h3 class="text-gray-800 text-base px-6 md:font-bold my-4 text-center">Tags</h5>
                            @foreach ($tags as $val)
                                <div class=" my-2 text-gray-800 {{isset($tag)&&($tag->id==$val->id)?"bg-red-100":""}}">
                                    <a href="{{ route('tags.show', ['tag' => $val]) }}"
                                        class="p-6">#{{ $val->title }}</a>
                                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">{{count($val->posts)}}</span>
                                </div>
                                <hr>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Container-->
    <div class="flex justify-center m-5">
        {{$posts->links()}}
    </div>


</x-app-layout>
