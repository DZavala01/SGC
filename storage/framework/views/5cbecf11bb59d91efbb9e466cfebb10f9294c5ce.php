<?php $__env->startSection('content'); ?>
<h1 class="text-center">Manuales y Guías</h1>
    <div class="col-md-12">
        <div class="card card-chart">
            <div class="card-body">
                <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <?php if(session('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>

                <form action="#" method="POST" enctype="multipart/form-data" class="col-12">
                    <?php echo csrf_field(); ?>


                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>Debe de escribir un criterio de búsqueda</ul>
                        </div>
                    <?php endif; ?>

                    <br>
                    <div class="row align-items-center">
                        <div class="col-md-3 offset-md-1 text-end">
                            <h3 class="card-title"><span class="text-dark"><i
                                        class="now-ui-icons ui-1_zoom-bold"></span></i> Búsqueda</h3>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="busqueda" name="busqueda" />
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn" style="background:#f96332"> <i class="fas fa-search"></i></button>
                            <a class="btn" style="background:#a1a1a1"href="<?php echo e(route('welcome')); ?>"> <i class="fa fa-home"></i></a>
                            <a href="<?php echo e(route('manualesguias.create')); ?>" type="submit" class="btn btn-success"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    <?php if(isset($manuales_guias)): ?>
        <div class="row">
            <?php $__currentLoopData = $manuales_guias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manuales_guias): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-4 p-1 m-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><b><?php echo e($manuales_guias->titulo); ?></b></h5>
                            <p class="card-text"><b>Descripción:</b> <?php echo e($manuales_guias->descripcion); ?>

                                <br>
                                <b>Aplicación:</b> <?php echo e($manuales_guias->donde_aplica); ?>

                            <br>
                                <b>Más info:</b> <?php echo e($manuales_guias->link); ?>

                            <br>
                                <b>Autor:</b> <?php echo e($manuales_guias->autor); ?>

                            </p>
                            <a href="<?php echo e(route('manualesguias.edit', $manuales_guias->id)); ?>" type="submit" class="btn" style="background:#f96332"> <i class="fa fa-pen"></i></a>
                                <a href="<?php echo e(route('delete_manuales_guia', $manuales_guias->id)); ?>" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                <a class="btn btn-primary  " href="<?php echo e($manuales_guias->archivo); ?>" download=""> <i class="fa fa-download"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SGC\resources\views/manuales_guias/index.blade.php ENDPATH**/ ?>