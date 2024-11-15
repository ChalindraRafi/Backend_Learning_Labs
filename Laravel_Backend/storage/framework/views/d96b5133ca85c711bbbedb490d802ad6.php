<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>



<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Todo List
            <form action="<?php echo e(route('todos.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="text" style="width: 100%;" name="title" placeholder="Masukkan kegiatan">
                <button type="submit" class ="btn btn-success btn-sm float-end">Add</button>
            </form>
        </div>
        <div class="card-body">

    <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal Jatuh Tempo</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($todos) > 0): ?>
            <?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($todo->title); ?></td>
                <td><?php echo e($todo->description); ?></td>
                <td><?php echo e($todo->due_date); ?></td>
                <td><?php echo e($todo->completed ? 'Selesai' : 'Belum Selesai'); ?></td>
                <td>
                    <a href="<?php echo e(route('todos.edit', $todo->id)); ?>" class="btn btn-warning">Edit</a>
                    <form action="<?php echo e(route('todos.destroy', $todo->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    <form action="<?php echo e(route('todos.updateStatus', $todo->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="completed" value="0">

                        <button type="submit">Update Status</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <td colspan="5">Tidak ada kegiatan!</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
    
</body>
</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\Laravelbaen\resources\views/todos/index.blade.php ENDPATH**/ ?>