<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div class="row justify-content-center align-items-center">

        <div class="col-md-7">

            <?php if(session()->has('message')): ?>

                <div class="alert alert-success mb-3"><?php echo e(session()->get('message')); ?></div>

            <?php endif; ?>

            <div class="card shadow border-0">

                <div class="card-header border-0">Modificar Dispositvo</div>



                <div class="card-body">

                    <form action="<?php echo e(url('esps/update')); ?>" method="post" class="row">

                        <?php echo csrf_field(); ?>

                        <div class="col-md-6 form-group mb-3">

                            <label for="name">Nombre del Dispositivo</label>

                            <input type="text" class="form-control" name="name" required value="<?php echo e($esp->name); ?>">

                        </div>



                        <div class="col-md-6 form-group mb-3">

                            <label for="email">Usuario</label>

                            <select class="form-control" name="email">

                                <option value=""><?php echo e($esp->users->count() > 0 ? $esp->users->first()->name : 'N/A'); ?></option>

                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option value="<?php echo e($user->email); ?>"><?php echo e($user->email); ?></option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>

                        </div>

                        

                        <div class="col-md-6 form-group mb-3">

                            <label for="plan">Plan</label>

                            <select class="form-control" name="plan" required>

                                <option value="<?php echo e($esp->plan); ?>"><?php echo e($esp->plan); ?></option>

                                <option value="Plus Basic">Plus Basic</option>

                                <option value="Plus Master">Plus Master</option>

                            </select>

                        </div>



                        <div class="col-md-6 form-group mb-3">

                            <label for="high">Altura</label>

                            <input type="number" class="form-control" step="any" required name="high" value="<?php echo e($esp->high); ?>"/>

                        </div>



                        <div class="col-md-6 form-group mb-3">

                            <label for="volume">Volumen</label>

                            <input type="number" class="form-control" step="any" required name="volume" value="<?php echo e($esp->volume); ?>"/>

                        </div>



                        <div class="col-md-6 form-group mb-3">

                            <label for="expiration_date">Fecha de Expiración:</label>

                            <input type="date" class="form-control" name="expiration_date" 

                                value="<?php echo e($esp->expiration_date ? date_format(new \DateTime($esp->expiration_date), 'Y-m-d') : NULL); ?>"

                            >

                        </div>



                        <div class="col-md-12 my-3">

                            <h6>Asignación de Dispositivo a Usuario</h6>

                            <hr>

                        </div>



                        <div class="col-md-6 form-group mb-3">

                            <label for="alias">Alias</label>

                            <input type="text" class="form-control" name="alias" value="<?php if($esp->users->count() > 0): ?><?php echo e($esp->users->first()->pivot->alias); ?><?php endif; ?>" required>

                        </div>

                        <div class="col-md-6 form-group mb-3">

                            <label for="role">Role</label>

                            <select class="form-control" name="role">

                                <option value="<?php if($esp->users->count() > 0): ?><?php echo e($esp->users->first()->role); ?><?php endif; ?>"><?php if($esp->users->count() > 0): ?><?php echo e($esp->users->first()->pivot->role == 'Administrador' ? $esp->users->first()->role : 'Usuario'); ?><?php endif; ?></option>

                                <option value="">Solo Lectura</option>

                                <option value="Administrador">Administrador</option>

                            </select>

                        </div>

                        <div class="col-md-12 form-group mb-3">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" 

                                    value="Sí" 

                                    id="flexCheckChecked" 

                                    name="main" 

                                    <?php if($esp->users->count() > 0): ?>

                                        <?php if($esp->users->first()->pivot->main): ?>

                                            checked 

                                        <?php endif; ?>

                                    <?php endif; ?>

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/pluscontrol.grupo-plus.com/resources/views/devices/edit.blade.php ENDPATH**/ ?>