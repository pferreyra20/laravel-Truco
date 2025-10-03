

<?php $__env->startSection('contenido'); ?>
<div class="container">
    <h2>Cargar Parejas</h2>

    <form method="POST" action="<?php echo e(route('parejas.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3 border rounded p-3">
            <label><strong>Cantidad de jugadores</strong></label><br>
            <input type="radio" name="tipo_pareja" value="2" checked onclick="toggleJugador3()"> Pareja de 2 jugadores
            <input type="radio" name="tipo_pareja" value="3" onclick="toggleJugador3()"> Pareja de 3 jugadores
        </div>

        <div class="mb-3">
            <label>Jugador 1</label>
            <select name="pareja1" class="form-control">
                <?php $__currentLoopData = $jugadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jugador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($jugador->id); ?>"><?php echo e($jugador->nombre); ?> <?php echo e($jugador->apellido); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Jugador 2</label>
            <select name="pareja2" class="form-control">
                <?php $__currentLoopData = $jugadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jugador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($jugador->id); ?>"><?php echo e($jugador->nombre); ?> <?php echo e($jugador->apellido); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3" id="jugador3-box" style="display: none;">
            <label>Jugador 3</label>
            <select name="pareja3" class="form-control">
                <option value="">-- Opcional --</option>
                <?php $__currentLoopData = $jugadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jugador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($jugador->id); ?>"><?php echo e($jugador->nombre); ?> <?php echo e($jugador->apellido); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">AGREGAR PAREJA</button>
        <a href="<?php echo e(route('parejas.index')); ?>" class="btn btn-secondary">CANCELAR</a>
        <a href="<?php echo e(url('/')); ?>" class="btn btn-secondary">SALIR</a>
    </form>

    <hr>

    <h3>Parejas cargadas</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Jugador 1</th>
                <th>Jugador 2</th>
                <th>Jugador 3</th>
                <th>Jugador 4</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $parejas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($p->pareja_id); ?></td>
                    <td><?php echo e($p->jugador1); ?></td>
                    <td><?php echo e($p->jugador2); ?></td>
                    <td><?php echo e($p->jugador3); ?></td>
                    <td><?php echo e($p->jugador4); ?></td>
                    <td><?php echo e($p->tipo_pareja); ?></td>
                    <td>
                        <a href="<?php echo e(route('parejas.edit', $p->pareja_id)); ?>" class="btn btn-sm btn-warning">Editar</a>
                        <form action="<?php echo e(route('parejas.destroy', $p->pareja_id)); ?>" method="POST" style="display:inline-block" onsubmit="return confirm('¿Desea eliminar la pareja seleccionada?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<script>
function toggleJugador3() {
    const tipo = document.querySelector('input[name="tipo_pareja"]:checked').value;
    document.getElementById('jugador3-box').style.display = tipo === '3' ? 'block' : 'none';
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('principal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\TRUCO_original\resources\views/parejas/index.blade.php ENDPATH**/ ?>