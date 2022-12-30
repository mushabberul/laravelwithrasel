<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <div class="flex-1">
                            <form action="{{ route('addPost') }}" method="post">
                                @csrf
                                <p>
                                    <input placeholder="Title" value="{{ old('title') }}" type="text" name="title"
                                        id="title"> @error('title')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </p>
                                <p>
                                    <textarea placeholder="Message" name="desc" id="desc" cols="30" rows="10">{{ old('desc') }}</textarea>
                                    @error('desc')
                                        <span class='text-blue-600'>{{ $message }}</span>
                                    @enderror
                                </p>
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                        <div class="flex-1">
                            <ul>
                                @foreach ($posts as $post)
                                    <li>{{ $post->title }}</li>
                                    <li>{{ $post->desc }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
