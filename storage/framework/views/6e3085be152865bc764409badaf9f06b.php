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
    <div class="overflow-x-auto max-w-screen-lg m-auto py-6">
        <?php if(Auth::check()): ?>
            <h1 class="font-bold text-xl text-center pb-5">Peminjaman Buku <?php echo e(Auth::user()->name); ?></h1>            
        <?php endif; ?>
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="whitespace-nowrap px-1 py-2 font-medium text-gray-900">#</th>
                    <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Judul</th>
                    <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Pengarang</th>
                    <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Tahun Terbit</th>
                    <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Type</th>
                    <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Action</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                <tr>
                    <td class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">John Doe</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">24/05/1995</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">Web Developer</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">$120,000</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">$120,000</td>
                    <td class="px-4 py-2 whitespace-nowrap">
                        <a href="#"
                            class="flex m-auto w-1/2 text-center rounded-md bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-red-700">
                            Hapus
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php /**PATH C:\laragon\www\perpustakaan\resources\views/borrowing/borrowing.blade.php ENDPATH**/ ?>