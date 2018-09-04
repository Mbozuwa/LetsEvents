<?php echo $__env->make('navbar.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/profile.css')); ?>">
<?php $__env->startSection('content'); ?>
<?php if(Auth::check()): ?>
<body class="p">
    <div class="col-md-12">
        <div class="row justify-content-center">
            <ul class="nav nav-tabs">
                <h2 role="presentation">
                    <a class="profile" href="#">Profiel </a>
                </h2>
                <h2 role="presentation"><a class="profile" href="#">Geschiedenis</a></h2>
            </ul>
        </div>
        <div class="col-9 justify-content-center bg-dark">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <h1 class="profile"> Profiel</h1>
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-md-6 bg-light">
                    <form>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Naam:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" value="<?php echo e($profile->name); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">E-mail:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="voorbeeld@gmail.com" value="<?php echo e($profile->email); ?>">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Woonplaats:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" value="<?php echo e($profile->address); ?>">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Telefoon:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3"value="<?php echo e($profile->telephone); ?>"                               });>
                            </div>
                        </div>
                        <button type="button" class="btn bg-success btn-lg">Bewerken</button>
                </form>
                </div>

                <div class="col-4">
                    <img src="http://suryanation.id/assets/img/profiels/unknown.png">
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <form>
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </form>
            </div>
        </div>
     </div>
</body>

<?php else: ?>
<div class="container">
    <h1>You are not logged in.</h1>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>