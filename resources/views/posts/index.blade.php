<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
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
                    <x-post-layout :post="$post"/>
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
