

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Edit Kegiatan
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </div>
        <div class="card-body">
    <form action="<?php echo e(route('todos.update', $todo->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> <!-- Menyatakan bahwa ini adalah permintaan PUT -->
        
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $todo->title)); ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control"><?php echo e(old('description', $todo->description)); ?></textarea>
        </div>


        <div class="form-group">
            <label for="due_date">Tanggal Jatuh Tempo</label>
            <input type="date" name="due_date" class="form-control" value="<?php echo e(old('due_date', $todo->due_date)); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Perbarui Tugas</button>
    </form>
    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\Laravelbaen\resources\views/todos/edit.blade.php ENDPATH**/ ?>