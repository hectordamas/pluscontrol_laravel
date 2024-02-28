<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-header">Lista de Dispositvos</div>

                <div class="card-body">
                    <div class="col-md-12">
                        <form action="<?php echo e(url('esps/renew')); ?>" class="row mb-3" method="post" id="renew_form" name="renew_form">
                            <?php echo csrf_field(); ?>                    
                            <div class="col-md-3 d-flex">
                                <input type="date" class="form-control rounded-0" name="expiration_date">
                                <button type="submit" class="btn btn-dark btn-sm rounded-0">Renovar</button>
                            </div>
                        </form>
                    </div>

                    <table class="table table-sm table-striped" id="DevicesTable">
                        <thead class="table-dark">
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>Expiracion</th>
                                <th>Nombre</th>
                                <th>Status</th>
                                <th>Pago</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $esps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $esp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="row<?php echo e($esp->id); ?>">
                                    <td>
                                        <input type="checkbox" id="device-<?php echo e($esp->id); ?>" form="renew_form" name="devices[]" value="<?php echo e($esp->id); ?>">
                                    </td>
                                    <td><?php echo $esp->expiration_date ? date_format(new DateTime($esp->expiration_date), 'Y-m-d') : '<strong class="text-danger">0000-00-00</strong>'; ?></td>
                                    <td><?php echo e($esp->name); ?></td>
                                    <td>
                                        <?php if($esp->state == 'Online'): ?>
                                            <span class="text-success"><?php echo e($esp->state); ?></span>
                                        <?php else: ?>
                                            <span class="text-danger"><?php echo e($esp->state); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if( $esp->paymentStatus == 'Verde' ): ?>
                                            <span class="badge bg-success">Pagado</span>
                                        <?php elseif( $esp->paymentStatus == 'Amarillo' ): ?>
                                            <span class="badge bg-warning">Próximo a vencerse</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Vencido</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(url('/esps/' . $esp->id . '/edit')); ?>" class="btn btn-sm btn-success">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a href="<?php echo e(url('/esps/' . $esp->id . '/show')); ?>" class="btn btn-sm btn-dark">
                                            <i class="fas fa-info"></i>                                        
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger espDestroy" data-id="<?php echo e($esp->id); ?>">
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos en Curso\pluscontrol\pluscontrol_laravel\resources\views/home.blade.php ENDPATH**/ ?>