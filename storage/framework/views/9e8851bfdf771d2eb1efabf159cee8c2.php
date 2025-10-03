

<?php $__env->startSection('contenido'); ?>
<div class="card">
    <div class="card-header">Cargar Jugador</div>
    <div class="card-body">
        <form action="<?php echo e(route('jugadores.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Aceptar</button>
            <a href="<?php echo e(url('/')); ?>" class="btn btn-secondary">Salir</a>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('principal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\TRUCO_original\resources\views/jugadores/index.blade.php ENDPATH**/ ?>