

<?php $__env->startSection('contenido'); ?>
<div class="container">
    <h2 class="mb-4">Editar Partido</h2>

    <form method="POST" action="<?php echo e(route('partidos.update', $partido->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="cfecha" class="form-label">Fecha del Partido</label>
            <input type="date" name="cfecha" id="cfecha" class="form-control  w-auto" 
                   value="<?php echo e(\Carbon\Carbon::parse($partido->cfecha)->format('Y-m-d\TH:i')); ?>" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="pareja_id1" class="form-label">Pareja 1</label>
                <select name="pareja_id1" id="pareja_id1" class="form-control">
                    <?php $__currentLoopData = $parejas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pareja): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($pareja->pareja_id); ?>">
                            <?php echo e($pareja->jugador1); ?> - <?php echo e($pareja->jugador2); ?>

                            <?php if($pareja->jugador3): ?> - <?php echo e($pareja->jugador3); ?> <?php endif; ?>
                            <?php if($pareja->jugador4): ?> - <?php echo e($pareja->jugador4); ?> <?php endif; ?>
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="pareja_id2" class="form-label">Pareja 2</label>
                <select name="pareja_id2" id="pareja_id2" class="form-control">
                    <?php $__currentLoopData = $parejas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pareja): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($pareja->pareja_id); ?>">
                            <?php echo e($pareja->jugador1); ?> - <?php echo e($pareja->jugador2); ?>

                            <?php if($pareja->jugador3): ?> - <?php echo e($pareja->jugador3); ?> <?php endif; ?>
                            <?php if($pareja->jugador4): ?> - <?php echo e($pareja->jugador4); ?> <?php endif; ?>
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="puntos_pareja1" class="form-label">Puntos Pareja 1</label>
                <input type="number" name="puntos_pareja1" id="puntos_pareja1" class="form-control w-auto" 
                       value="<?php echo e($partido->puntos_pareja1); ?>" required min="0" max="30">
            </div>

            <div class="col-md-6 mb-3">
                <label for="puntos_pareja2" class="form-label">Puntos Pareja 2</label>
                <input type="number" name="puntos_pareja2" id="puntos_pareja2" class="form-control w-auto" 
                       value="<?php echo e($partido->puntos_pareja2); ?>" required min="0" max="30">
            </div>
        </div>

        <div class="mb-4">
            <button type="submit" class="btn btn-primary">Actualizar Partido</button>
            <a href="<?php echo e(route('partidos.index')); ?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('principal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\TRUCO_original\resources\views/partidos/edit.blade.php ENDPATH**/ ?>