<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-md-10">

            <div class="card border-0 shadow">

                <div class="card-header">

                    Todos los Usuarios

                </div>

                <div class="card-body">

                    <table class="table" id="UsersTable">

                        <thead class="table-dark">

                            <tr>

                                <th>#</th>

                                <th>E-Mail</th>

                                <th>Nombre</th>

                                <th>Telefono</th>
                                
                                <th>Cedula</th>
                                
                                <th>Edad</th>
                                
                                <th>Dirección</th>

                                <th>Dispositivos</th>

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

                                    <td><?php echo e($user->phone); ?></td>

                                    <td><?php echo e($user->identification_card); ?></td>

                                    <td><?php echo e($user->age); ?></td>
                                    
                                    <td><?php echo e($user->address); ?></td>

                                    <td>
                                        <?php if($user->esps->count() > 0): ?>
                                            <ul>    
                                                <?php $__currentLoopData = $user->esps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $esp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($esp->name); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php else: ?>
                                            'N/A'
                                        <?php endif; ?>
                                    </td>

                                    <td><?php echo e($user->role); ?></td>

                                    <td>

                                        <a href="<?php echo e(url('/users/' . $user->id . '/edit')); ?>" class="btn btn-success">

                                            <i class="fa-regular fa-pen-to-square"></i>

                                        </a>

                                        <a href="javascript:void(0);" class="btn btn-danger userDestroy" data-id="<?php echo e($user->id); ?>">

                                            <i class="fa-solid fa-trash"></i>

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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos en Curso\pluscontrol\pluscontrol_back\resources\views/users/index.blade.php ENDPATH**/ ?>