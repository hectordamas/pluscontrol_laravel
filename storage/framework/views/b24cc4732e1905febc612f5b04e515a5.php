<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-7">
            <div class="card shadow border-0">
                <div class="card-header border-0">Registrar un Nuevo Dispositvo</div>

                <div class="card-body">
                    <form action="<?php echo e(url('esps/store')); ?>" method="post" class="row">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-6 form-group mb-3">
                            <label for="name">Nombre del Dispositivo</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        
                        <div class="col-md-6 form-group mb-3">
                            <label for="email">Usuario</label>
                            <select class="form-control" name="email" required>
                                <option value="">Selecciona una opción</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->email); ?>"><?php echo e($user->email); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="plan">Plan</label>
                            <select class="form-control" name="plan" required>
                                <option value="">Selecciona una opción</option>
                                <option value="Plus Basic">Plus Basic</option>
                                <option value="Plus Master">Plus Master</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="high">Altura</label>
                            <input type="number" class="form-control" step="any" required name="high" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="volume">Volumen</label>
                            <input type="number" class="form-control" step="any" required name="volume" />
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="expiration_date">Fecha de Expiración</label>
                            <input type="date" class="form-control" value="<?php echo e(date('Y-m-d')); ?>">
                        </div>

                        <div class="col-md-12 my-3">
                            <h6>Asignación de Dispositivo a Usuario</h6>
                            <hr>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="alias">Alias</label>
                            <input type="text" class="form-control" name="alias" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="role">Role</label>
                            <select class="form-control" name="role" required>
                                <option value="">Selecciona una opción</option>
                                <option value="">Solo Lectura</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" 
                                    value="Sí" id="flexCheckChecked" 
                                    name="main" checked
                                />
                                <label class="form-check-label" for="flexCheckChecked">
                                  Establecer como Dispositivo Principal
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="submit" class="btn btn-dark w-100" value="Registrar Dispositivo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\pluscontrol_laravel\resources\views/devices/create.blade.php ENDPATH**/ ?>