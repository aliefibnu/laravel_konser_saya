<!DOCTYPE html>
<html lang="en" class="dark">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-white antialiased">
    <!-- Header -->
    <header class="bg-blue-600 dark:bg-gray-800 text-white p-4 shadow-md">
      <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="flex items-center space-x-2">
          <img src="/img/logo.jpg" alt="Logo" class="h-8">
          <span class="text-xl font-bold">Event Dashboard</span>
        </a>
        <nav>
          <a href="/" class="text-white transition duration-500 hover:text-gray-200 mx-2 ">Home</a>
          <a href="{{ route('konser.index') }}" class="text-white transition duration-500 hover:text-gray-200 mx-2">Konser</a>
          <a href="{{ route('kategori.index') }}" class="text-white transition duration-500 hover:text-gray-200 mx-2">Kategori</a>
          <a href="{{ route('tempat-duduk.index') }}" class="text-white transition duration-500 hover:text-gray-200 mx-2">TempatDuduk</a>
        </nav>
      </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-6">
      <h1 class="text-2xl font-bold mb-6">Daftar Tempat Duduk</h1>

      @if (@session('success'))
      <!-- Success Alert -->
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
          <strong class="font-bold">{{session('success')}}</strong>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
              <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0C4.478 0 0 4.478 0 10s4.478 10 10 10 10-4.478 10-10S15.522 0 10 0zM4.293 7.293a1 1 0 011.414 0L10 9.586l4.293-4.293a1 1 0 111.414 1.414l-4.707 4.707a1 1 0 01-1.414 0L4.293 8.707a1 1 0 010-1.414z"/></svg>
          </span>
      </div>
      @endif

      <form action="{{ route('tempat-duduk.index') }}" method="GET" class="mb-4">
        <input type="text" name="search" value="{{ $search }}" placeholder="Cari Tempat Duduk"
          class="border border-gray-300 dark:border-gray-700 rounded px-4 py-2 bg-white dark:bg-gray-700 dark:text-white">
        <button type="submit" class="bg-blue-500 transition duration-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
      </form>

      <a href="{{ route('tempat-duduk.create') }}" class="bg-green-500 transition duration-500 hover:bg-green-600 text-white px-4 py-2 rounded">Tambah Tempat Duduk</a>

      <!-- Tabel -->
      <div class="overflow-x-auto mt-6">
        <table class="min-w-full mt-4 bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
          <thead class="bg-gray-200 dark:bg-gray-700">
            <tr>
              <th class="px-4 py-2 text-left">ID</th>
              <th class="px-4 py-2 text-left">Nama Konser</th>
              <th class="px-4 py-2 text-left">Nama Kategori</th>
              <th class="px-4 py-2 text-left">Nomor Tempat Duduk</th>
              <th class="px-4 py-2 text-left">Harga</th>
              <th class="px-4 py-2 text-left">Status Pemesanan</th>
              <th class="px-4 py-2 text-left">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tempatDuduk as $k)
              <tr class="border-b dark:border-gray-600">
                <td class="px-4 py-2">{{ $k->id_tempat_duduk }}</td>
                <td class="px-4 py-2">{{ $modelKonser::find($k->id_konser)->nama_konser ?? 'Konser Hilang / Tidak Ada' }}</td>
                <td class="px-4 py-2">{{ $modelKategori::find($k->id_kategori)->nama_kategori ?? 'Kategori Hilang / Tidak Ada' }}</td>
                <td class="px-4 py-2">{{ $k->nomor_tempat }}</td>
                <td class="px-4 py-2">{{ $k->harga }}</td>
                <td class="px-4 py-2">{{ $k->status_pemesanan }}</td>
                <td class="px-4 py-2 flex space-x-2">
                  <a href="{{ route('tempat-duduk.show', $k->id_tempat_duduk) }}" class="bg-blue-500 transition duration-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Detail</a>
                  <a href="{{ route('tempat-duduk.edit', $k->id_tempat_duduk) }}" class="bg-yellow-500 transition duration-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">Edit</a>
                  <form action="{{ route('tempat-duduk.destroy', $k->id_tempat_duduk) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 transition duration-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </body>
</html>
