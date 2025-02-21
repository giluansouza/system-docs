<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h1 class="text-3xl font-bold tracking-tight text-zinc-300">Documentos</h1>
     <?php $__env->endSlot(); ?>

    

    <div class="mt-4 w-full flex flex-col justify-center gap-4">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl mb-2">Buscar Documentos</h2>
            <a href="<?php echo e(route('documents.create')); ?>" class="w-48 flex justify-center items-center text-zinc-100 shadow bg-sky-800 rounded-md h-10 hover:bg-sky-800/80">Novo documento</a>
        </div>
        <input type="text" id="searchQuery" placeholder="Digite sua busca">
        <button class="w-48 text-zinc-100 shadow bg-sky-500 rounded-md h-10 hover:bg-sky-500/80" onclick="searchDocument()">Buscar</button>
    </div>

    <div id="results"></div>

    
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /var/www/html/resources/views/documents/index.blade.php ENDPATH**/ ?>