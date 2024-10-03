<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konser Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-white antialiased">
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Detail Tempat Duduk</h1>

        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <table class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <tr class="mb-4 text-gray-700 dark:text-gray-300">
                <td><strong>Id Tempat Duduk </strong></td>
                <td>:</td>
                <td>{{$tempatDuduk->id_tempat_duduk}}</td>
            </tr>
            <tr class="mb-4 text-gray-700 dark:text-gray-300">
                <td><strong>Nama Konser </strong></td>
                <td>:</td>
                <td>{{$namaKonser}}</td>
            </tr>
            <tr class="mb-4 text-gray-700 dark:text-gray-300">
                <td><strong>Nama Kategori </strong></td>
                <td>:</td>
                <td>{{$namaKategori}}</td>
            </tr>
             <tr class="mb-4 text-gray-700 dark:text-gray-300">
                <td><strong>Nomor Tempat </strong></td>
                <td>:</td>
                <td>{{$tempatDuduk->nomor_tempat}}</td>
            </tr>
             <tr class="mb-4 text-gray-700 dark:text-gray-300">
                <td><strong>Harga </strong></td>
                <td>:</td>
                <td>{{$tempatDuduk->harga}}</td>
            </tr>
             <tr class="mb-4 text-gray-700 dark:text-gray-300">
                <td><strong>Status Pemesanan </strong></td>
                <td>:</td>
                <td>{{$tempatDuduk->status_pemesanan}}</td>
            </tr>
             <tr class="mb-4 text-gray-700 dark:text-gray-300">
                <td><strong>Created At </strong></td>
                <td>:</td>
                <td>{{$tempatDuduk->created_at}}</td>
            </tr>
             <tr class="mb-4 text-gray-700 dark:text-gray-300">
                <td><strong>Updated At </strong></td>
                <td>:</td>
                <td>{{$tempatDuduk->updated_at}}</td>
            </tr>
        </table>
        <div class="mt-4 flex">
            <form action="{{ route('tempat-duduk.index', $tempatDuduk->id_tempat_duduk) }}" method="get">
              @csrf
              <button type="submit" class="bg-blue-500 transition duration-500 hover:bg-blue-600 text-white px-3 mr-4 py-1 rounded">Back To List</button>
            </form>
            <form action="{{ route('tempat-duduk.edit', $tempatDuduk->id_tempat_duduk) }}" method="get">
              @csrf
              <button type="submit" class="bg-yellow-500 transition duration-500 hover:bg-yellow-600 text-white px-3 mr-4 py-1 rounded">Edit</button>
            </form>
            <form action="{{ route('tempat-duduk.destroy', $tempatDuduk->id_tempat_duduk) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-500 transition duration-500 hover:bg-red-600 text-white px-3 mr-4 py-1 rounded">Hapus</button>
            </form>
        </div>
        </div>
    </div>
</body>
</html>
