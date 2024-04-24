
<?php $__env->startSection('title','Ecommerce Laravel || Brand Edit'); ?>
<?php $__env->startSection('main-content'); ?>

<div class="card">
    <h5 class="card-header">Product To Group</h5>
    <div class="card-body">
      <div id='app'>
        <product-selectgroup-component/>
    </div>
     
    </div>

 
</div>


<link href="https://unpkg.com/bootstrap-vue@2.15.0/dist/bootstrap-vue.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<link href="https://unpkg.com/bootstrap-vue@2.15.0/dist/bootstrap-vue.css" rel="stylesheet" />
<script defer src="<?php echo e(mix('js/app.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecomsafety\resources\views/backend/groupshell/edit.blade.php ENDPATH**/ ?>