<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">

            <div class="card shadow border-0">

                <div class="card-header border-0 font-weight-bold text-primary">Lista de Dispositvos</div>



                <form action="<?php echo e(url('esps/renew')); ?>" class="row px-5 py-3 " method="post" id="renew_form" name="renew_form">
                    <?php echo csrf_field(); ?>

                    <div class="col-md-2  mb-3">                                   
                        <input type="checkbox" id="select-all">
                        <label for="select-all">Seleccionar todos</label>
                    </div>
                    
                    <div class="col-md-3  mb-3">
                        <input type="date" class="form-control" name="expiration_date">
                    </div>

                    <div class="col-md-3  mb-3">
                        <button type="submit" class="btn btn-dark " >Renovar</button>
                    </div>
                </form>
                <div class="card-body">

                    <table class="table" id="DevicesTable">

                        <thead class="table-dark">
                            <tr>

                                <th>Renovación</th>
                                <th>#</th>

                                <th>Expiracion</th>

                                <th>ID del Dispositivo</th>

                                <th>Usuarios</th>

                                <th>Nombre</th>

                                <th>Status</th>

                                <th>Status del pago</th>

                                <th>Recibo de pago</th>
                                
                                <th>Comprobante de pago</th>

                                <th>Acciones</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $__currentLoopData = $esps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $esp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr id="row<?php echo e($esp->id); ?>">

                                    <td>
                                        <input type="checkbox" id="device-<?php echo e($esp->id); ?>" form="renew_form" name="devices[]" value="<?php echo e($esp->id); ?>">

                                    </td>

                                    <td><?php echo e($esp->id); ?></td>

                                    <td><?php echo $esp->expiration_date ? date_format(new DateTime($esp->expiration_date), 'Y-m-d') : '<strong class="text-danger">0000-00-00</strong>'; ?></td>

                                    <td><?php echo e($esp->device_id); ?></td>

                                    <!-- <td><?php echo e($esp->users->count() > 0 ? $esp->users->first()->name : 'N/A'); ?></td> -->

                                    <td>
                                        <?php if($esp->users->count() > 0): ?>
                                            <ul>    
                                                <?php $__currentLoopData = $esp->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($user->name); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php else: ?>
                                            'N/A'
                                        <?php endif; ?>
                                    </td>

                                    <td><?php echo e($esp->name); ?></td>

                                    <td><?php echo e($esp->state); ?></td>

                                    <td>
                                        <?php if( $esp->paymentStatus == 'Verde' ): ?>
                                        <span class="green_status">
                                        </span>
                                        <?php elseif( $esp->paymentStatus == 'Amarillo' ): ?>
                                        <span class="yellow_status">
                                        </span>
                                        <?php else: ?>
                                        <span class="red_status">
                                        </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('downloadReceipt', ['id' => $esp->id])); ?>">Descargar recibo</a>
                                    </td>
                                    <td>
                                    <form action="<?php echo e(route('uploadProof', ['id' => $esp->id])); ?>" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="file" name="proof">
                                        <button type="submit" class="btn btn-dark">Subir</button>
                                    </form>
                                    </td>
                                    <td>

                                        <a href="<?php echo e(url('/esps/' . $esp->id . '/edit')); ?>" class="btn btn-success">

                                            <i class="fa-regular fa-pen-to-square"></i>

                                        </a>

                                        <a href="javascript:void(0);" class="btn btn-danger espDestroy" data-id="<?php echo e($esp->id); ?>">

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

<script>
    document.getElementById('select-all').addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    });
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos en Curso\pluscontrol\pluscontrol_back\resources\views/home.blade.php ENDPATH**/ ?>