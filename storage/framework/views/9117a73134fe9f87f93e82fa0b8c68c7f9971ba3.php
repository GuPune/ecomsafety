<?php $__env->startSection('title','Ecommerce Laravel || Brand Edit'); ?>
<?php $__env->startSection('main-content'); ?>

<div class="card">
    <h5 class="card-header">Edit Group</h5>
    <div class="card-body">
      <form method="post" action="<?php echo e(route('group.update',$brand->id)); ?>"  id="myForm">
        <?php echo csrf_field(); ?> 
        <?php echo method_field('PATCH'); ?>

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Name En <span class="text-danger">*</span></label>
        <input id="name_en" type="text" name="name_en" placeholder="Enter Name En"  value="<?php echo e($brand->name_en); ?>" class="form-control">

        <span class="text-danger" id="span_hide_en" >Name Validation</span>
        </div>

          <div class="form-group">
              <label for="inputTitle" class="col-form-label">Name Th <span class="text-danger">*</span></label>
              <input id="name_th" type="text" name="name_th"  placeholder="Enter Name Th"  value="<?php echo e($brand->name_th); ?>" class="form-control">

              <span class="text-danger" id="span_hide" >Name Validation</span>
          </div>
        
          <div class="form-group">
            <label for="inputPhoto" class="col-form-label">Photo</label>
            <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                <i class="fa fa-picture-o"></i> Choose
                </a>
            </span>
                <input id="thumbnail" class="form-control" type="text" name="photo" value="<?php echo e($brand->image); ?>">
            </div>
            <div id="holder" style="margin-top:15px;max-height:100px;"></div>

            <span class="text-danger" id="span_hide_image" >Image Validation</span>
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="Y" <?php echo e((($brand->status=='Y') ? 'selected' : '')); ?>>Active</option>
            <option value="N" <?php echo e((($brand->status=='N') ? 'selected' : '')); ?>>Inactive</option>
          </select>
          <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span class="text-danger"><?php echo e($message); ?></span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group mb-3">
   
           <button class="btn btn-success" type="button"  id="validateButton">Update</button>
        </div>
      </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/summernote/summernote.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="<?php echo e(asset('backend/summernote/summernote.min.js')); ?>"></script>
<script>

    $('#span_hide').hide();
    $('#span_hide_en').hide();
    $('#span_hide_image').hide();
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });


    document.getElementById('validateButton').onclick = function() {
        // Perform client-side validation here


        let name_en = document.querySelector('input[name="name_en"]');
        let name_th = document.querySelector('input[name="name_th"]');
        let thumbnail = document.querySelector('input[name="photo"]');
        var check = true;
        if (name_en.value.trim() === '') {
            var check = false;
            $('#span_hide_en').show();
        }
        if (name_th.value.trim() === '') {
            var check = false;
            $('#span_hide').show();
        }
        if (thumbnail.value.trim() === '') {
            var check = false;
            $('#span_hide_image').show();
        }

        if(check == false){
            return false; // Prevent form submission
        }

       document.getElementById('myForm').submit();
    };
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Ecommerce-Laravel\resources\views/backend/group/edit.blade.php ENDPATH**/ ?>