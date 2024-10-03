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
        <h1 class="text-2xl font-bold mb-6 text-center">Tambah Konser</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tempat-duduk.update', $tempatDuduk->id_tempat_duduk) }}" method="post" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="id_tempat_duduk" class="block text-gray-700 dark:text-gray-300">Id Tempat Duduk:</label>
                <input type="number" name="id_tempat_duduk" id="id_tempat_duduk" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" value="{{$tempatDuduk->id_tempat_duduk}}" disabled>
            </div>

            <div class="mb-4">
                <label for="id_konser" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Konser: </label>
                <select name="id_konser" id="id_konser" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  <option disabled selected value="">{{$namaKonser}}</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="id_kategori" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kategori: </label>
                <select name="id_kategori" id="id_kategori" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  <option disabled selected>{{$namaKategori}}</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="nomor_tempat" class="block text-gray-700 dark:text-gray-300">Nomor Tempat Duduk:</label>
                <input type="text" name="nomor_tempat" id="nomor_tempat" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:border-gray-600 dark:text-white" value="{{$tempatDuduk->nomor_tempat}}">
            </div>

            <div class="mb-4">
                <label for="harga" class="block text-gray-700 dark:text-gray-300">Harga Tempat Duduk:</label>
                <input type="number" name="harga" step="0.01" max="99999999.99" id="harga" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:border-gray-600 dark:text-white" value="{{$tempatDuduk->harga}}">
            </div>
            <div class="mb-4">
                <label for="status_pemesanan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status Pemesanan: </label>
                <select name="status_pemesanan" id="status_pemesanan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:border-gray-600 dark:text-white">
                  <option value="" disabled selected>Pilih Status</option>
                  <option value="Tersedia" {{  $tempatDuduk->status_pemesanan=="Tersedia" ? 'selected' : ''  }}>Tersedia</option>
                  <option value="Dipesan" {{ $tempatDuduk->status_pemesanan=="Dipesan" ? 'selected' : '' }}>Dipesan</option>
                  <option value="Dibayar" {{ $tempatDuduk->status_pemesanan=="Dibayar" ? 'selected' : '' }}>Dibayar</option>
                </select>
            </div>
            <div class="flex justify-between ">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Edit Tempat Duduk</button>
                <a href="{{route('tempat-duduk.index')}}" class="bg-gray-700 hover:bg-gray-900 text-white px-4 py-2 rounded" type="submit">
                    Back To List
                </a>
            </div>
        </form>
    </div>
</body>
</html>

