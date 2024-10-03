<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Konser</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-white antialiased">
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6 text-center">Tambah Kategori</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kategori.store') }}" method="post" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            @method('post')

            <div class="mb-4">
                <label for="id_kategori" class="block text-gray-700 dark:text-gray-300">Id Kategori:</label>
                <input type="number" name="id_kategori" id="id_kategori" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:border-gray-600 dark:text-white " value="{{$latestKategoriId}}" disabled>
            </div>

            <div class="mb-4">
                <label for="nama_kategori" class="block text-gray-700 dark:text-gray-300">Nama Kategori:</label>
                <input type="text" name="nama_kategori" id="nama_kategori" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="keterangan" class="block text-gray-700 dark:text-gray-300">Keterangan Kategori Tempat Duduk:</label>
                <input type="text" name="keterangan" id="keterangan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>

            <div class="flex justify-between ">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Tambah Kategori</button>
                <a href="{{route('kategori.index')}}" class="bg-gray-700 hover:bg-gray-900 text-white px-4 py-2 rounded" type="submit">
                    Back To List
                </a>
            </div>
        </form>

    </div>
</body>
</html>
