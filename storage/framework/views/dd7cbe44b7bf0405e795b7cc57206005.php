<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Editar un Usuario
                </div>

                <div class="card-body">
                    <form action="<?php echo e(url('users/'. $user->id . '/update')); ?>" method="post" class="row">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-6 form-group mb-3">
                            <label for="name">Nombre Completo</label>
                            <input type="text" value="<?php echo e($user->name); ?>" class="form-control" name="name">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="email">E-Mail</label>
                            <input type="email" value="<?php echo e($user->email); ?>" class="form-control" name="email">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="phone">Telefono</label>
                            <input type="phone" value="<?php echo e($user->phone); ?>" class="form-control" name="phone">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="age">Edad</label>
                            <input type="number" value="<?php echo e($user->age); ?>" class="form-control" name="age">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="identification_card">Cedula</label>
                            <input type="number" value="<?php echo e($user->identification_card); ?>" class="form-control" name="identification_card">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="address">Direción</label>
                            <textarea class="form-control" name="address">
                                <?php echo e($user->address); ?>

                            </textarea>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="role">Rol:</label>
                            <select name="role" id="role" class="form-control">
                                <option value="<?php echo e($user->role); ?>"><?php echo e(!$user->role ? 'Usuario' : 'Administrador'); ?></option>
                                <option value="">Usuario</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="submit" value="Editar" class="btn btn-dark" />
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos en Curso\pluscontrol\pluscontrol_laravel\resources\views/users/edit.blade.php ENDPATH**/ ?>