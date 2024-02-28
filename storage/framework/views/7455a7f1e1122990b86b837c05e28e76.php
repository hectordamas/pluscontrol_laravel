
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <?php echo e($user->name); ?>

                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Nombre</th>
                                <td><?php echo e($user->name); ?></td>
                            </tr>
                            <tr>
                                <th>Cédula de Identidad</th>
                                <td><?php echo e($user->identification_card); ?></td>
                            </tr>
                            <tr>
                                <th>E-Mail</th>
                                <td><?php echo e($user->email); ?></td>
                            </tr>
                            <tr>
                                <th>Teléfono</th>
                                <td><?php echo e($user->phone); ?></td>
                            </tr>
                            <tr>
                                <th>Dirección</th>
                                <td><?php echo e($user->adress); ?></td>
                            </tr>
                            <tr>
                                <th>Dispositivos</th>
                                <td>
                                    <?php $__currentLoopData = $user->esps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $esp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($esp->name); ?> 
                                        <?php if($esp->pivot->main): ?>
                                            <span class="badge bg-success">Predeterminado</span>
                                        <?php endif; ?>
                                        <br />
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\pluscontrol_laravel\resources\views/users/show.blade.php ENDPATH**/ ?>