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
                                    <li>{{ $post->title }} <a href="{{ route('edit', $post->id) }}"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6 inline bg-black text-white">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </a>

                                        <form action="{{ route('delete', $post->id) }}" method="post" class="inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6 inline bg-black text-white">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </form>



                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
