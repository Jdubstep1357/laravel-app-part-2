<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Edits') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- route is example of resource controller -->
                    <!-- $category example of route model binding -->
                   <form method="post" action={{ route('posts.update', $category) }}>
                    <!-- Method('PUT') updates -->
                    @method('PUT')
                    <!-- csrf helps not allowing multiple submission of forms elsewhere
                    by generating unique key -->
                    @csrf
                    Title:
                    <br />
                    <input type="text" name="title" value="{{ $post->title }}"/>
                    <br>
                    Post text:
                    <br />
                    <textarea name="post_text" />
                    <br>
                    Category:
                    <br />
                    <select name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @selected($category->id == $post->category_id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Save</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
