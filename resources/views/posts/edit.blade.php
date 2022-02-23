<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{request()->routeIs('posts.create')?"Create new post": "Edit post"}}
        </h2>
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">

        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        @if (isset($post))
            <!-- Le formulaire est géré par la route "posts.update" -->
            <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">

                <!-- <input type="hidden" name="_method" value="PUT"> -->
                @method('PUT')

            @else

                <!-- Le formulaire est géré par la route "posts.store" -->
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @endif

        @csrf
        <!-- Name -->
        <div>
            <x-label for="title" :value="__('title')" />

            <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                value="{{ isset($post->title) ? $post->title : old('title') }}" required />
        </div>

        <div>
            <x-label for="content" :value="__('content')" />

            <textarea id="title" class="block mt-1 w-full" name="content"
                required>{{ isset($post->content) ? $post->content : old('content') }}</textarea>
        </div>

        <div>
            <x-label for="tags" :value="__('Choose tags')" />
            <select id="tags" name="tags[]" multiple>
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}"
                        @if (isset($post)) @foreach ($post->tags as $post_tag)
                    @selected($tag->id== $post_tag->id) @endforeach
                @endif> {{ $tag->title }}</option>
                @endforeach
            </select>
        </div>

        @if(isset($post->imagePath))
		<p>
			<span>Actual image</span><br/>
			<img src="{{ Storage::url($post->imagePath)}} " alt="actual image" style="max-height: 200px;" >
		</p>
		@endif
        <div>
            <x-label for="imagePath" :value="__('Image')" />

            <x-input id="imagePath" class="block mt-1 w-full" type="file" name="imagePath"
                value="{{ isset($post->imagePath) ? $post->imagePath : old('imagePath') }}"  />

        </div>
        <div class="flex items-center justify-end mt-4">

            <x-button class="ml-4">
                {{ isset($post) ? __('edit post') : __('Add post') }}
            </x-button>
        </div>
        </form>
    </x-auth-card>
</x-app-layout>
