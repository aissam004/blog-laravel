<div>
    <div class="flex flex-wrap justify-between pt-3 -mx-6">
        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                <a href="{{ route('posts.show', [$post]) }}"
                    class="flex flex-wrap no-underline hover:no-underline">
                    <img src="{{Storage::url($post->imagePath)}}"
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
                        <p>{{ $post->user->name }} </p>
           
                    </div>
                    <p class="text-gray-600 text-xs md:text-sm">{{ $post->created_at }}</p>
                </div>
            </div>
        </div>

    </div>
</div>
