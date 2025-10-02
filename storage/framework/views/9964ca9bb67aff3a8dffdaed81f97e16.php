

<?php $__env->startSection('contenido'); ?>
    <div class="container">
        <h3 class="mb-4">Tabla de Clasificación</h3>

        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Jugador</th>
                    <th>Ganados</th>
                    <th>Perdidos</th>
                    <th>Diferencia Partidos</th>
                    <th>Puntos Ganados</th>
                    <th>Puntos Perdidos</th>
                    <th>Diferencia Puntos</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $clasificacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($c->nombre_completo); ?></td>
                        <td><?php echo e($c->ganados); ?></td>
                        <td><?php echo e($c->perdidos); ?></td>
                        <td><?php echo e($c->difpartidos); ?></td>
                        <td><?php echo e($c->puntos_ganados); ?></td>
                        <td><?php echo e($c->puntos_perdidos); ?></td>
                        <td><?php echo e($c->diferencia_partidos); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="<?php echo e(url('/')); ?>" class="btn btn-secondary">SALIR</a>
        <a href="<?php echo e(route('clasificacion.pdf')); ?>" class="btn btn-primary mb-3">Exportar a PDF</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('principal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\TRUCO_original\resources\views/clasificacion/index.blade.php ENDPATH**/ ?>