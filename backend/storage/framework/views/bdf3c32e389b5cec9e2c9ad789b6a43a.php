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

    <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>

    <form action="<?php echo e(route('documents.store')); ?>" id="uploadForm" method="POST" class="mt-4 mb-4 w-full flex flex-col justify-center gap-4">
        <?php echo csrf_field(); ?>
        <div class="flex flex-col gap-2">
            <label for="title">Assunto</label>
            <input type="text" id="title" name="title" placeholder="Título" required class="p-2 border rounded-md">
        </div>
        <div class="flex flex-col gap-2">
            <label for="author">Autor</label>
            <input type="text" id="author" name="author" placeholder="Autor" class="p-2 border rounded-md">
        </div>
        <div class="flex flex-col gap-2">
            <label for="date">Data</label>
            <input type="date" id="date" name="date" class="p-2 border rounded-md">
        </div>
        <div class="flex flex-col gap-2">
            <label for="type">Tipo</label>
            <select name="type" class="p-2 border rounded-md">
                <option value="word">Word</option>
                <option value="pdf">PDF</option>
                
            </select>
        </div>
        <div class="flex flex-col gap-2">
            <label for="content">Conteúdo</label>
            <textarea name="content"  placeholder="Conteúdo" required class="p-2 border rounded-md"></textarea>
        </div>
        <button type="submit" onclick="uploadDocument()" class="w-48 text-zinc-100 shadow bg-sky-500 rounded-md h-10 hover:bg-sky-500/80">Cadastrar documento</button>
    </form>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /var/www/html/resources/views/documents/create.blade.php ENDPATH**/ ?>