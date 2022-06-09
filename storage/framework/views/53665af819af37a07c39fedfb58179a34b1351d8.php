<?php $__env->startSection('content'); ?>

    <div class="container">
        <?php if(Auth::check()): ?>
            <?php if(session('message')): ?>
                <div class="alert alert-success">
                    <h2><?php echo e(session('message')); ?></h2>

                </div>
            <?php endif; ?>

            <div class="row">
                <h2>Captura de Manual/Guía</h2>
                <hr>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#js-example-basic-single').select2();
                        $('#js-example-basic-single2').select2();
                        $('#equipos').select2();
                    });
                </script>

            </div>
            <form action="<?php echo e(route('manualesguias.store')); ?>" method="post" enctype="multipart/form-data" class="col-12">
                <div class="row">
                    <div class="col">
                        <?php echo csrf_field(); ?>

                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="row g-3 align-items-center">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-9">
                                    <label class="font-weight-bold" for="titulo">Título del Manual/Guía</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo">
                                </div>
                                <div class="col-md-3">
                                    <label class="font-weight-bold" for="tipo">Tipo:</label>
                                    <select class="form-control" id="tipo" name="tipo">
                                        <option disabled selected>Elegir</option>
                                        <option value="problemas_soluciones">PROBLEMAS Y SOLUCIONES</option>
                                        <option value="manuales_guias">MANUALES Y GUÍAS</option>
                                        <option value="capacitacion">CAPACITACIÓN </option>
                                        <option value="documentacion">DOCUMENTACIÓN</option>
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <label class="font-weight-bold" for="descripcion">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion">
                                </div>

                                <div class="col-md-3">
                                    <label class="font-weight-bold" for="donde_aplica">¿Dónde aplica?</label>
                                    <input type="text" class="form-control"
                                        id="donde_aplica" name="donde_aplica">
                                </div>

                                <div class="col-md-6">
                                    <label class="font-weight-bold" for="link">Link para mayor información</label>
                                    <input type="text" class="form-control" id="link" name="link">
                                </div>

                                <div class="col-md-4">
                                    <label for="fecha_creacion">Fecha de creación:</label>
                                    <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion"
                                        value="<?php echo e(old('fecha_creacion')); ?>" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="fecha_actualizacion">Fecha de actualización:</label>
                                    <input type="date" class="form-control" id="fecha_actualizacion"
                                        name="fecha_actualizacion" value="<?php echo e(old('fecha_actualizacion')); ?>" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="font-weight-bold" for="autor">Autor:</label>
                                    <input type="text" class="form-control" id="autor" name="autor">
                                </div>

                                    <p>

                                      Sube archivos:

                                      <input type="file" name="archivo" multiple>
                                      <input type="submit" value="Upload">

                                    </p>
                            </div>
                        </div>

                        <br>
                        <div class="row g-3 align-items-center">
                            <div class="col-md-12">
                                <a href="<?php echo e(route('welcome')); ?>" class="btn btn-danger">Cancelar</a>
                                <button type="submit" class="btn btn-success">Guardar datos</button>
                            </div>
                        </div>
                    </div>
                    <br>

                </div>
            </form>
            <br>
            <div class="row g-5 align-items-center">

                <br>
                <h5>En caso de inconsistencias, favor de reportarlas.</h5>
                <hr>

            </div>

    </div>
<?php else: ?>
    Acceso No válido
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SGC\resources\views/manuales_guias/create.blade.php ENDPATH**/ ?>