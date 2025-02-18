<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="mx-auto max-w-screen-sm px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg">
            <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Buat Akun Anda</h1>

            <p class="mx-auto mt-4 max-w-md text-center text-gray-500">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati sunt dolores deleniti
                inventore quaerat mollitia?
            </p>

            <form action="{{ route('registrasi.submit') }}" method="post" class="mt-6 mb-0 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
                @csrf
                <p class="text-center text-lg font-medium">Buat Akun Anda</p>

                <div>
                    <label for="username" class="sr-only">Username</label>

                    <div class="relative">
                        <input type="text" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-xs"
                            placeholder="Enter username" name="name" />

                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div>
                    <label for="email" class="sr-only">Email</label>

                    <div class="relative">
                        <input type="email" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-xs"
                            placeholder="Enter email" name="email" />

                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>

                    <div class="relative">
                        <input type="password" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-xs"
                            placeholder="Enter password" name="password" />

                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <button type="submit"
                    class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white">
                    Create
                </button>

                <p class="text-center text-sm text-gray-500">
                    sudah punya akun?
                    <a class="underline" href="/">login</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>
