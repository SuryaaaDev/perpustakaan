<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<header class="bg-white">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex-1 md:flex md:items-center md:gap-12">
                <h1 class="block text-teal-500 text-xl font-bold">Perpustakaan</h1>
            </div>

            <div class="md:flex md:items-center md:gap-12" x-data="{ open: false }">
                <nav aria-label="Global" class="hidden md:block">
                    <ul class="flex items-center gap-6 text-sm">
                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75" href="/book"> Home </a>
                        </li>

                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75" href="/book/create"> Create </a>
                        </li>

                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75" href="/borrowings"> Peminjaman </a>
                        </li>
                    </ul>
                </nav>

                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="overflow-hidden rounded-full border border-gray-300 shadow-inner">
                        <span class="sr-only">Toggle dashboard menu</span>

                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="" class="size-10 object-cover" />
                    </button>

                    <div x-show="open" x-transition @click.outside="open = false"
                        class="absolute right-0 z-10 mt-0.5 w-56 divide-y divide-gray-100 rounded-md border border-gray-100 bg-white shadow-lg"
                        role="menu">
                        <div class="p-2">
                            <a href="#"
                                class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                role="menuitem">My profile</a>
                        </div>

                        <div class="p-2">
                            <form action="<?php echo e(route('logout')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit"
                                    class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-red-700 hover:bg-red-50"
                                    role="menuitem">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH C:\laragon\www\perpustakaan\resources\views/components/header.blade.php ENDPATH**/ ?>