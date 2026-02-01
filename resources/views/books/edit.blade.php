<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Book') }}
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
                <form action="{{ route('books.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2">
                            Title
                        </label>
                        <input type="text" name="title"
                            value="{{ old('title', $book->title) }}"
                            class="w-full px-3 py-2 border rounded shadow-sm dark:bg-gray-700 dark:text-white"
                            required>
                    </div>

                    <!-- Author -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2">
                            Author
                        </label>
                        <input type="text" name="author"
                            value="{{ old('author', $book->author) }}"
                            class="w-full px-3 py-2 border rounded shadow-sm dark:bg-gray-700 dark:text-white"
                            required>
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2">
                            Category
                        </label>
                        <select name="categorie_id"
                            class="w-full px-3 py-2 border rounded shadow-sm dark:bg-gray-700 dark:text-white"
                            required>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}"
                                    {{ old('categorie_id', $book->categorie_id) == $categorie->id ? 'selected' : '' }}>
                                    {{ $categorie->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- ISBN -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2">
                            ISBN
                        </label>
                        <input type="text" name="isbn"
                            value="{{ old('isbn', $book->isbn) }}"
                            class="w-full px-3 py-2 border rounded shadow-sm dark:bg-gray-700 dark:text-white">
                    </div>

                    <!-- Quantity -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2">
                            Quantity
                        </label>
                        <input type="number" name="quantity"
                            value="{{ old('quantity', $book->quantity) }}"
                            min="0"
                            class="w-full px-3 py-2 border rounded shadow-sm dark:bg-gray-700 dark:text-white"
                            required>
                    </div>

                    <!-- Published At -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2">
                            Published Date
                        </label>
                        <input type="date" name="published_at"
                            value="{{ old('published_at', \Carbon\Carbon::parse($book->published_at)->format('Y-m-d')) }}"
                            class="w-full px-3 py-2 border rounded shadow-sm dark:bg-gray-700 dark:text-white"
                            required>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end">
                        <a href="{{ route('books.index') }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Cancel
                        </a>

                        <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Update
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
