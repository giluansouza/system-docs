<?php if(session()->has('success')): ?>
  <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    <?php echo e(session('success')); ?>

  </div>
<?php endif; ?>

<?php if(session()->has('message')): ?>
  <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800" role="alert">
    <?php echo e(session('message')); ?>

  </div>
<?php endif; ?>

<?php if(session()->has('error')): ?>
  <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
    <?php echo e(session('error')); ?>

  </div>
<?php endif; ?>

<?php if($errors->any()): ?>
  <ul class="text-sm text-red-600 dark:text-red-400">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
<?php endif; ?><?php /**PATH /var/www/html/resources/views/components/alert.blade.php ENDPATH**/ ?>