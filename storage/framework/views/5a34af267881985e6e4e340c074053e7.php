
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <?php echo e($esp->name); ?>

                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Identificador</th>
                                <td><?php echo e($esp->device_id); ?></td>
                            </tr>
                            <tr>
                                <th>Usuarios Asociados</th>
                                <td>
                                    <?php $__currentLoopData = $esp->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($user->name); ?>

                                        <?php if($user->role == 'Administrador'): ?> 
                                            <span class="badge bg-dark">Administrador</span> 
                                        <?php endif; ?>
                                        <br />
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <td><?php echo e($esp->name); ?></td>
                            </tr>
                            <tr>
                                <th>Alias</th>
                                <td><?php echo e($esp->alias); ?></td>
                            </tr>
                            <tr>
                                <th>Plan</th>
                                <td><?php echo e($esp->plan); ?></td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <span class="badge bg-dark">Dimensiones</span>
                                </th>
                            </tr>
                            <tr>
                                <th>Altura</th>
                                <td><?php echo e($esp->high); ?> m</td>
                            </tr>
                            <tr>
                                <th>Volumen</th>
                                <td><?php echo e(number_format($esp->volume, 2, '.', ',')); ?> lts</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos en Curso\pluscontrol\pluscontrol_laravel\resources\views/devices/show.blade.php ENDPATH**/ ?>