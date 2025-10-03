

<?php $__env->startSection('contenido'); ?>
<div class="container">
    <h2 class="mb-4">Cargar Partido</h2>

    <form method="POST" action="<?php echo e(route('partidos.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="cfecha" class="form-label">Fecha del Partido</label>
            <input type="date" name="cfecha" id="cfecha" class="form-control w-auto" required>
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
                <div class="mt-2 text-muted" id="descripcion_pareja1"></div>
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
                <div class="mt-2 text-muted" id="descripcion_pareja2"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="puntos_pareja1" class="form-label">Puntos Pareja 1</label>
                <input type="number" name="puntos_pareja1" id="puntos_pareja1" class="form-control w-auto" required min="0">
            </div>

            <div class="col-md-6 mb-3">
                <label for="puntos_pareja2" class="form-label">Puntos Pareja 2</label>
                <input type="number" name="puntos_pareja2" id="puntos_pareja2" class="form-control w-auto" required min="0">
            </div>
        </div>

        <div class="mb-4">
            <button type="submit" class="btn btn-success">Agregar Partido</button>
            <button type="reset" class="btn btn-warning">Cancelar</button>
            <a href="<?php echo e(route('principal')); ?>" class="btn btn-secondary">Salir</a>
        </div>
    </form>

    <h3>Listado de Partidos</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Pareja 1</th>
                <th>Puntos 1</th>
                <th>Pareja 2</th>
                <th>Puntos 2</th>
                <th>Ganador 1</th>
                <th>Ganador 2</th>
                <th>Diferencia 1</th>
                <th>Diferencia 2</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $partidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($partido->fecha); ?></td>
                    <td><?php echo e($partido->jugador1_p1); ?> y <?php echo e($partido->jugador2_p1); ?></td>
                    <td><?php echo e($partido->puntos_pareja1); ?></td>
                    <td><?php echo e($partido->jugador1_p2); ?> y <?php echo e($partido->jugador2_p2); ?></td>
                    <td><?php echo e($partido->puntos_pareja2); ?></td>
                    <td><?php echo e($partido->pareja1_ganado); ?></td>
                    <td><?php echo e($partido->pareja2_ganado); ?></td>
                    <td><?php echo e($partido->diferencia_puntos1); ?></td>
                    <td><?php echo e($partido->diferencia_puntos2); ?></td>
                    <td>
                        <a href="<?php echo e(route('partidos.edit', $partido->partido_id)); ?>" class="btn btn-primary btn-sm">Editar</a>
                        <form action="<?php echo e(route('partidos.destroy', $partido->partido_id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro que deseas eliminar este partido?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<script>
document.getElementById('pareja_id1').addEventListener('change', function () {
    const id = this.value;
    // Aquí podés hacer una petición AJAX para mostrar los jugadores si querés
    document.getElementById('descripcion_pareja1').textContent = `Seleccionaste la pareja ID: ${id}`;
});

document.getElementById('pareja_id2').addEventListener('change', function () {
    const id = this.value;
    document.getElementById('descripcion_pareja2').textContent = `Seleccionaste la pareja ID: ${id}`;
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('principal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\TRUCO_original\resources\views/partidos/index.blade.php ENDPATH**/ ?>