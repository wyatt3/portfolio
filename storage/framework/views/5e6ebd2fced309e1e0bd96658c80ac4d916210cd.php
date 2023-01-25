<!DOCTYPE html>
<html lang="en" class="bg-light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, ">
        <meta name="author" content="Wyatt Johnson">
        <title>Wyatt Johnson - Portfolio</title>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="<?php echo e(asset('img/favicon.ico')); ?>">
        <!-- Font Awesome icons -->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/mytheme.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
        <style>
            html {
                background-image: url(<?php echo e(asset('img/tile.jpg')); ?>);
                background-attachment: fixed;
            }
            body {
                background-image: url(<?php echo e(asset('img/tile.jpg')); ?>);
                background-attachment: fixed;
            }
            a {}
        </style>
    </head>
    <body class="bg-light">
        <nav class="navbar navbar-expand-lg bg-dark text-uppercase" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="<?php echo e(route('admin.home')); ?>">Home</a><button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-light rounded py-2" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <?php if(Auth::user()): ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('projects.index')); ?>">Projects</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('updates.index')); ?>">Updates</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('mail.index')); ?>">Messages</a></li>
                    </ul>
                    <?php endif; ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('home')); ?>">View Public Page</a></li>
                        <?php if(Auth::user()): ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><?php echo e(__('Logout')); ?></a></li>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php echo $__env->yieldContent('content'); ?>
    </body>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="<?php echo e(asset('js/overhang.js')); ?>"></script>
        <!-- Core theme JS-->
        <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
</html>

<?php /**PATH /var/www/wyattjohnson/resources/views/layouts/admin.blade.php ENDPATH**/ ?>