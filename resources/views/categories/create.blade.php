<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- route is example of resource controller -->
                    <!-- $category example of route model binding -->
                   <form method="post" action={{ route('categories.store') }}>

                    <!-- csrf helps not allowing multiple submission of forms elsewhere
                    by generating unique key -->
                    @csrf
                    Name:
                    <br />
                    <input name="name" />
                    <br>
                    <button type="submit">Save</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
