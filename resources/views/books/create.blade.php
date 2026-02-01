<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Book') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())
                <div class="mb-4">
                    <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf

                    <!-- Title -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2" for="title">
                            Title
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="w-full px-3 py-2 border rounded shadow-sm dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <!-- Author -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2" for="author">
                            Author
                        </label>
                        <input type="text" name="author" id="author" value="{{ old('author') }}"
                            class="w-full px-3 py-2 border rounded shadow-sm dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2" for="categorie_id">
                            Category
                        </label>
                        <select name="categorie_id" id="categorie_id"
                            class="w-full px-3 py-2 border rounded shadow-sm dark:bg-gray-700 dark:text-white" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                    {{ $categorie->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- ISBN -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2" for="isbn">
                            ISBN
                        </label>
                        <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}"
                            class="w-full px-3 py-2 border rounded shadow-sm dark:bg-gray-700 dark:text-white">
                    </div>

                    <!-- Quantity -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2" for="quantity">
                            Quantity
                        </label>
                        <input type="number" name="quantity" id="quantity" value="{{ old('quantity', 1) }}" min="0"
                            class="w-full px-3 py-2 border rounded shadow-sm dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <!-- Published At -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2" for="published_at">
                            Published Date
                        </label>
                        <input type="date" name="published_at" id="published_at" value="{{ old('published_at') }}"
                            class="w-full px-3 py-2 border rounded shadow-sm dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-end">
                        <a href="{{ route('books.index') }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Cancel
                        </a>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
