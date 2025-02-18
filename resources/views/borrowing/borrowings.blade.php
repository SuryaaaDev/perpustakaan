<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <x-header-visit></x-header-visit>
    <div class="overflow-x-auto max-w-screen-lg m-auto py-6">
        @if (Auth::check())
            <h1 class="font-bold text-xl text-center pb-5">Peminjaman Buku {{ Auth::user()->name }}</h1>
        @endif

        @if ($borrowedBooks->isempty())
            <div class="flex justify-center items-center flex-col py-6">
                <p class="text-lg italic text-gray-500">kamu belum meminjam buku</p>
                <a href="/visitor" class="text-blue-700 underline hover:text-blue-400">pinjam buku</a>
            </div>
        @else
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="whitespace-nowrap px-1 py-2 font-medium text-gray-900">#</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Judul</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Pengarang</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Tahun Terbit</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Type</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Tanggal Meminjam</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Action</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($borrowedBooks as $borrow)
                        <tr>
                            <td class="px-1 py-2 font-medium whitespace-nowrap text-gray-900 text-center">
                                {{ $loop->iteration }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700 border-l border-gray-300">{{ $borrow->title }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700 border-l border-gray-300">{{ $borrow->author }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700 border-l border-gray-300">{{ $borrow->year }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700 border-l border-gray-300">
                                <ul>
                                    @forelse ($borrow->types as $type)
                                        <li>{{ $type->name }}</li>
                                    @empty
                                        <li>Tidak ada tipe buku</li>
                                    @endforelse
                                </ul>
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700 border-l border-gray-300"> {{ \Carbon\Carbon::parse($borrow->pivot->borrowed_at)->format('d F Y') }}</td>
                            <td class="px-4 py-2 whitespace-nowrap border-l border-gray-300">
                                <form action="{{ route('borrowing.destroy', $borrow->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="flex m-auto justify-center w-full text-center rounded-md bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    @endif
</body>

</html>
