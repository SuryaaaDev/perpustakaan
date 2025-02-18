<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>

<body class="bg-gray-100">
    <?php if (isset($component)) { $__componentOriginal2a2e454b2e62574a80c8110e5f128b60 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60 = $attributes; } ?>
<?php $component = App\View\Components\Header::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Header::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $attributes = $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $component = $__componentOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>
    <?php if(Auth::check()): ?>
        <div class="flex max-w-screen-lg m-auto py-5">
            <p class="font-bold text-2xl">Halo <?php echo e(Auth::user()->name); ?>, Selamat Datang di Perpustakaan</p>
        </div>
    <?php endif; ?>
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
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="odd:bg-gray-50">
                        <td class="whitespace-nowrap px-1 py-2 font-medium text-gray-900 text-center">
                            <?php echo e($loop->iteration); ?></td>
                        <td class="flex justify-center py-1 whitespace-nowrap text-gray-700 border-l border-gray-300">
                            <img class="w-32" src="<?php echo e(asset('storage/' . $book->image)); ?>" alt="">    
                        </td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 border-l border-gray-300">
                            <?php echo e($book->title); ?></td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 border-l border-gray-300">
                            <?php echo e($book->author); ?></td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 border-l border-gray-300">
                            <?php echo e($book->year); ?></td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 border-l border-gray-300">
                            <ul>
                                <?php $__empty_1 = true; $__currentLoopData = $book->types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li><?php echo e($type->name); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <li>tidak ada type dari buku</li>
                                <?php endif; ?>
                            </ul>
                        </td>
                        <td
                            class="py-2 border-l border-gray-300 flex gap-2 justify-center items-center whitespace-nowrap">
                            <a href="<?php echo e(route('book.edit', $book->id)); ?>" type="button"
                                class="rounded-md bg-yellow-500 px-4 py-2 text-xs font-medium text-white hover:bg-yellow-700">
                                Edit
                            </a>
                            <form action="<?php echo e(route('book.destroy', $book->id)); ?>" method="post"
                                class="flex items-center">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button type="submit"
                                    class="rounded-md bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="max-w-screen-lg flex m-auto">
        <a href="<?php echo e(route('book.create')); ?>" type="button"
            class="inline-block rounded-md bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">Tambah
            Data</a>
    </div>

</body>

</html>
<?php /**PATH C:\laragon\www\perpustakaan\resources\views/book/index.blade.php ENDPATH**/ ?>