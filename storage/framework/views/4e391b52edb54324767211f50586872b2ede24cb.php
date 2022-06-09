<?php $__env->startSection('content'); ?>
<h1 class="text-center">Capacitación</h1>
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
                        <h3 class="card-title"><span class="text-warning"><i
                                    class="now-ui-icons ui-1_zoom-bold"></span></i> Búsqueda</h3>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="busqueda" name="busqueda" />
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-warning"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SGC\resources\views/capacitacion/index.blade.php ENDPATH**/ ?>