<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- SHOWS VALIDATION ERRORS -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- route is example of resource controller -->
                    <!-- $category example of route model binding -->
                   <form method="post" action={{ route('posts.store') }}>

                    <!-- csrf helps not allowing multiple submission of forms elsewhere
                    by generating unique key -->
                    @csrf
                    Title:
                    <br />
                    <input type="text" name="title" />
                    <br><br />
                    Post text:
                    <br />
                    <textarea name="post_text"></textarea/>
                    <br /><br />
                    Category:
                    <br />
                    <select name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <button type="submit">Save</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
