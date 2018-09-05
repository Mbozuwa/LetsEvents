<<<<<<< HEAD
<?php $__env->startSection('content'); ?>
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title">--</h3>
                    <div class="row">
                        <div class="col-md-8">
                            <!-- BASIC TABLE -->
                            <div class="panel">
                                <div class="panel-body">
                                </div>
                            </div>
                            <div id="calendar"></div>
                                <script type="text/javascript" src="<?php echo e(URL::asset('js/moment.min.js')); ?>"></script>
                                <script type="text/javascript" src="<?php echo e(URL::asset('js/index.js')); ?>"></script>
                                <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/style.css')); ?>">

                        </div>
                            <!-- END BASIC TABLE -->
                        </div>
                        <div class="col-md-3">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">-</h3>
                                </div>
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <body>
                <div class="flex-center position-ref full-height">
                    <div class="content" style="margin-right: 400px">
                        <div class="title m-b-md">
                            Let's Event
                        </div>

=======
<?php echo $__env->make('navbar.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Let's event</title>



        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>

    </head>

    <body>
        <div class="flex-center position-ref full-height">

                <div class="top-right links">
                    <?php if(Auth::check()): ?>
                        <li><a class="nav-link" href="#">User profile</a></li>
                          <li><a class="nav-link" href="<?php echo e(route('user.logout')); ?>">log out</a></li>
                        <a href="<?php echo e(url('/welcome')); ?>">Home</a>
                    <?php else: ?>
                        <li><a href="<?php echo e(route('user.signup')); ?>">Signup</a></li>
                        <li><a href="<?php echo e(route('user.signin')); ?>">Signin</a></li>
                    <?php endif; ?>

                </div>


            <div class="content" style="margin-right: 400px">
                <div class="title m-b-md">
                    Let's Event
>>>>>>> development
                </div>
                <div id="calendar"></div>
                    <script type="text/javascript" src="<?php echo e(URL::asset('js/moment.min.js')); ?>"></script>
                    <script type="text/javascript" src="<?php echo e(URL::asset('js/index.js')); ?>"></script>
                    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/style.css')); ?>">

            </div>
        </div>
    </body>
</html>
