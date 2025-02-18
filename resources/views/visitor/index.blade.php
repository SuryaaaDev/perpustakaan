<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <x-header-visit></x-header-visit>
    @if (Auth::check())
        <div class="flex max-w-screen-lg m-auto py-5">
            <p class="font-bold text-2xl">Halo {{ Auth::user()->name }}, Selamat Datang di Perpustakaan</p>
        </div>
    @endif
    <div class="overflow-x-auto max-w-screen-lg flex m-auto my-5 shadow-lg">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="whitespace-nowrap px-1 py-2 font-medium text-gray-900">#</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Gambar</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Judul</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Pengarang</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Tahun Terbit</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Type</th>
                    <th class="whitespace-nowrap px-2 py-2 font-medium text-gray-900">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($books as $book)
                    <tr class="odd:bg-gray-50">
                        <td class="whitespace-nowrap px-1 py-2 font-medium text-gray-900 text-center">
                            {{ $loop->iteration }}</td>
                        <td class="whitespace-nowrap py-2 flex justify-center text-gray-700 border-l border-gray-300">
                            <img class="w-36" src="{{ asset('storage/' . $book->image) }}" alt="">    
                        </td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 border-l border-gray-300">
                            {{ $book->title }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 border-l border-gray-300">
                            {{ $book->author }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 border-l border-gray-300">
                            {{ $book->year }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 border-l border-gray-300">
                            <ul>
                                @forelse ($book->types as $type)
                                    <li>{{ $type->name }}</li>
                                @empty
                                    <li>tidak ada type dari buku</li>
                                @endforelse
                            </ul>
                        </td>
                        <td
                            class="border-l border-gray-300 py-2 flex gap-2 justify-center items-center whitespace-nowrap">
                            <form action="{{ route('visitor.borrow') }}" method="post">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <button type="submit"
                                    class="rounded-md bg-green-600 px-4 py-2 text-xs font-medium text-white hover:bg-green-700">
                                    Pinjam
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
