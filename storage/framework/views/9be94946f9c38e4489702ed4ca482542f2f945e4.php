<?php echo $__env->make('navbar.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('layouts/body.css')); ?>" rel="stylesheet"> 
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <h1>Sign up</h1>
    <?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($error); ?></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
    <form action="<?php echo e(route('user.signup')); ?>" method="post">
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" id="email" name="email" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">password</label>
        <input type="password" id="password" name="password" class="form-control">
      </div>
      <div class="form-group">
        <label for="name">name</label>
        <input type="text" id="name" name="name" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Sign up</button>
      <?php echo e(csrf_field()); ?>

    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>