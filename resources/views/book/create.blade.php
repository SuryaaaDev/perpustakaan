<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <x-header></x-header>

    <div class="flex py-10 justify-center items-center">
        <div class="max-w-xl p-16 rounded-xl shadow-xl bg-white">
            @if ($errors->any())
            <div class=" text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h1 class="text-xl font-bold text-center mb-8">Tambah Data Buku</h1>
            <form action="{{ route('book.store') }}" method="post" class="flex flex-col gap-5" enctype="multipart/form-data">
                @csrf
                {{-- menghindari sql injection --}}
                <label for="image"
                    class="flex flex-col rounded-md shadow-xs focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">Gambar
                    <input type="file" id="image"
                        class="peer border-none bg-transparent pt-1 px-4 h-10 w-72 placeholder-transparent focus:border-transparent focus:ring-0 focus:outline-hidden"
                        placeholder="Gambar" name="image" />
                </label>
                <label for="title"
                    class="relative block rounded-md border border-gray-200 shadow-xs focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                    <input type="text" id="title"
                        class="peer border-none bg-transparent px-4 h-10 w-72 placeholder-transparent focus:border-transparent focus:ring-0 focus:outline-hidden"
                        placeholder="Judul" name="title" required />

                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        Judul
                    </span>
                </label>

                <label for="author"
                    class="relative block rounded-md border border-gray-200 shadow-xs focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                    <input type="text" id="author"
                        class="peer border-none bg-transparent px-4 h-10 w-72 placeholder-transparent focus:border-transparent focus:ring-0 focus:outline-hidden"
                        placeholder="Pengarang" name="author" required />

                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        Pengarang
                    </span>
                </label>

                <label for="year"
                    class="relative block rounded-md border border-gray-200 shadow-xs focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                    <input type="number" id="year"
                        class="peer border-none bg-transparent px-4 h-10 w-72 placeholder-transparent focus:border-transparent focus:ring-0 focus:outline-hidden"
                        placeholder="Tahun Terbit" name="year" required />

                    <span
                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                        Tahun Terbit
                    </span>
                </label>
                <div>
                    <label for="types">Pilih Tipe Buku</label><br>
                    @foreach ($types as $type)
                        <input type="checkbox" name="types[]" value="{{ $type->id }}"
                            class="mx-2">{{ $type->name }}</input><br>
                    @endforeach
                </div>

                <button
                    class="group relative inline-flex items-center overflow-hidden rounded-sm border border-current px-8 py-3 text-indigo-600 focus:ring-3 focus:outline-hidden"
                    type="submit">
                    <span class="absolute -end-full transition-all group-hover:end-4">
                        <svg class="size-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </span>

                    <span class="text-sm font-medium transition-all group-hover:me-4"> Tambah Data </span>
                </button>
            </form>
        </div>
    </div>
</body>

</html>
