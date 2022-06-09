<?php $__env->startSection('content'); ?>
    <h1 class="text-center">Problemas y Soluciones</h1>
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
                    <h4>Haz tu búsqueda:</h4>
                    <form action="">
                        <div class="input">
                            <input type="text" class="form-control" wire::model="searchTerm" type="text" placeholder="Búsqueda...">
                        </div>
                    </form>
                    <div class="row align-items-center">
                        <div class="col-md-3 offset-md-1 text-end">
                            <h3 class="card-title"><span class="text-black"><i class="now-ui-icons ui-1_zoom-bold"> <span></i> Búsqueda</h3>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="busqueda" name="busqueda" />
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn" style="background:#f96332"> <i
                                    class="fas fa-search"></i></button>
                            <a class="btn" style="background:#a1a1a1" href="<?php echo e(route('welcome')); ?>"><i
                                    class="fa fa-home"></i></a>
                            <a href="<?php echo e(route('problemasolucions.create')); ?>" type="submit" class="btn btn-success"><i
                                    class="fa fa-plus"></i></a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    <?php if(isset($problemas)): ?>
        <?php
            $cont = 0;
        ?>
        <?php $__currentLoopData = $problemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $problema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#p<?php echo e($cont); ?>" aria-expanded="false"
                            aria-controls="p<?php echo e($cont); ?>">
                            Problema <?php echo e($problema->titulo); ?>

                        </button>
                    </h2>
                    <div id="p<?php echo e($cont); ?>" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Descripción:</strong> <?php echo e($problema->descripcion); ?>

                            <p></p>
                            <strong>Solución:</strong> <?php echo e($problema->solucion); ?>

                            <p></p>
                            <strong>¿Dónde aplica?:</strong> <?php echo e($problema->donde_aplica); ?>

                            <p></p>
                            <strong>Link para más información:</strong> <?php echo e($problema->link); ?>

                            <p></p>
                            <strong>Autor:</strong> <?php echo e($problema->autor); ?>

                            <p></p>
                            <strong>Fecha de creación:</strong> <?php echo e($problema->fecha_creacion); ?> - <strong>Fecha de
                                actualización:</strong> <?php echo e($problema->fecha_actualizacion); ?>


                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <a href="<?php echo e(route('problemasolucions.edit', $problema->id)); ?>" type="submit"
                                        class="btn" style="background:#f96332"><i class="fa fa-pen"></i></a>
                                    <a href="<?php echo e(route('delete_problema_solucion', $problema->id)); ?>" type="submit"
                                        class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                $cont = $cont + 1;
            ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SGC\resources\views/problemas_soluciones/index.blade.php ENDPATH**/ ?>