<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow">
                <div class="card-header">
                    Todos los Usuarios
                </div>
                <div class="card-body">
                    <table class="table table-sm" id="UsersTable">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>E-Mail</th>
                                <th>Nombre</th>
                                <th>Rol:</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="row<?php echo e($user->id); ?>">
                                    <td><?php echo e($user->id); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->role); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('/users/' . $user->id . '/edit')); ?>" class="btn btn-success btn-sm">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm userDestroy" data-id="<?php echo e($user->id); ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        <a href="<?php echo e(url('/users/' . $user->id . '/show')); ?>" class="btn btn-dark btn-sm">
                                            <i class="fas fa-info"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\pluscontrol_laravel\resources\views/users/index.blade.php ENDPATH**/ ?>