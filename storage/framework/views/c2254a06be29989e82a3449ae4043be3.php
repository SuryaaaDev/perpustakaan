<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>

<body class="bg-gray-100">
    <?php if (isset($component)) { $__componentOriginale8415c895fd8be2c3388a9267f28a144 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale8415c895fd8be2c3388a9267f28a144 = $attributes; } ?>
<?php $component = App\View\Components\HeaderVisit::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('header-visit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\HeaderVisit::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale8415c895fd8be2c3388a9267f28a144)): ?>
<?php $attributes = $__attributesOriginale8415c895fd8be2c3388a9267f28a144; ?>
<?php unset($__attributesOriginale8415c895fd8be2c3388a9267f28a144); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale8415c895fd8be2c3388a9267f28a144)): ?>
<?php $component = $__componentOriginale8415c895fd8be2c3388a9267f28a144; ?>
<?php unset($__componentOriginale8415c895fd8be2c3388a9267f28a144); ?>
<?php endif; ?>
    <div class="overflow-x-auto max-w-screen-lg m-auto py-6">
        <?php if(Auth::check()): ?>
            <h1 class="font-bold text-xl text-center pb-5">Peminjaman Buku <?php echo e(Auth::user()->name); ?></h1>
        <?php endif; ?>

        <?php if($borrowedBooks->isempty()): ?>
            <div class="flex justify-center items-center flex-col py-6">
                <p class="text-lg italic text-gray-500">kamu belum meminjam buku</p>
                <a href="/visitor" class="text-blue-700 underline hover:text-blue-400">pinjam buku</a>
            </div>
        <?php else: ?>
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
                    <?php $__currentLoopData = $borrowedBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $borrow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="px-1 py-2 font-medium whitespace-nowrap text-gray-900 text-center">
                                <?php echo e($loop->iteration); ?></td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700 border-l border-gray-300"><?php echo e($borrow->title); ?></td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700 border-l border-gray-300"><?php echo e($borrow->author); ?></td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700 border-l border-gray-300"><?php echo e($borrow->year); ?></td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700 border-l border-gray-300">
                                <ul>
                                    <?php $__empty_1 = true; $__currentLoopData = $borrow->types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <li><?php echo e($type->name); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <li>Tidak ada tipe buku</li>
                                    <?php endif; ?>
                                </ul>
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700 border-l border-gray-300"> <?php echo e(\Carbon\Carbon::parse($borrow->pivot->borrowed_at)->format('d F Y')); ?></td>
                            <td class="px-4 py-2 whitespace-nowrap border-l border-gray-300">
                                <form action="<?php echo e(route('borrowing.destroy', $borrow->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button type="submit"
                                        class="flex m-auto justify-center w-full text-center rounded-md bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
    </div>
    <?php endif; ?>
</body>

</html>
<?php /**PATH C:\laragon\www\perpustakaan\resources\views/borrowing/borrowings.blade.php ENDPATH**/ ?>