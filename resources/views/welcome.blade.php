<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 dark:bg-black dark:text-white antialiased min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Dashboard</h1>
            <nav>
                <a href="#" class="text-white hover:text-gray-200 mx-2 transition duration-300">Profile</a>
                <a href="#" class="text-white hover:text-gray-200 mx-2 transition duration-300">Setting</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Konser -->
            <div class="bg-white dark:bg-blue-950 p-6 rounded-lg shadow-md dark:hover:bg-gray-700 transition duration-300">
                <h2 class="text-xl font-semibold mb-2">Konser</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">Tentukan Penamaan Konser</p>
                <a target="_blank" href="{{route('konser.index')}}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Go To Konser</a>
            </div>

            <!-- Kategori Tempat Duduk -->
            <div class="bg-white dark:bg-indigo-950 p-6 rounded-lg shadow-md dark:hover:bg-gray-700 transition duration-300">
                <h2 class="text-xl font-semibold mb-2">Kategori Tempat Duduk</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">Tentukan Kategori Tempat Duduk</p>
                <a target="_blank" href="{{route('kategori.index')}}" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Go To Kategori</a>
            </div>

            <!-- Tempat Duduk -->
            <div class="bg-white dark:bg-cyan-950 p-6 rounded-lg shadow-md dark:hover:bg-gray-700 transition duration-300">
                <h2 class="text-xl font-semibold mb-2">Tempat Duduk</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">Tentukan Tempat Duduk</p>
                <a target="_blank" href="{{route('tempat-duduk.index')}}" class="bg-cyan-600 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Go To Tempat Duduk</a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-4">
        <div class="container mx-auto text-center">
            <p>&copy; {{date('Y')}} Alief Ibnu</p>
        </div>
    </footer>
</body>
</html>
