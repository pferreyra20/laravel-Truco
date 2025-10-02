<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Clasificación</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; font-size: 12px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h3 style="text-align: center;">Tabla de Clasificación</h3>

    <table>
        <thead>
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
</body>
</html>
<?php /**PATH C:\xampp\htdocs\TRUCO_original\resources\views/clasificacion/pdf.blade.php ENDPATH**/ ?>