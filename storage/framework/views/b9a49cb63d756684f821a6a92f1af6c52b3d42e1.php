<?php $__env->startSection('title','Ecommerce Laravel || PRODUCT PAGE'); ?>

<?php $__env->startSection('main-content'); ?>
	<!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html"><?php echo e($group_name->name_en); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Product Style -->
    <form action="<?php echo e(route('shop.filter')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <section class="product-area shop-sidebar shop section">
            <div class="container">
                <div class="row">
             
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="row">
                            <div class="col-12">
                                <!-- Shop Top -->
                                <div class="shop-top">
                                    <div class="shop-shorter">
                                        <div class="single-shorter">
                                            <label>Show :</label>
                                            <select class="show" name="show" onchange="this.form.submit();">
                                                <option value="">Default</option>
                                                <option value="9" <?php if(!empty($_GET['show']) && $_GET['show']=='9'): ?> selected <?php endif; ?>>09</option>
                                                <option value="15" <?php if(!empty($_GET['show']) && $_GET['show']=='15'): ?> selected <?php endif; ?>>15</option>
                                                <option value="21" <?php if(!empty($_GET['show']) && $_GET['show']=='21'): ?> selected <?php endif; ?>>21</option>
                                                <option value="30" <?php if(!empty($_GET['show']) && $_GET['show']=='30'): ?> selected <?php endif; ?>>30</option>
                                            </select>
                                        </div>
                                        <div class="single-shorter">
                                            <label>Sort By :</label>
                                            <select class='sortBy' name='sortBy' onchange="this.form.submit();">
                                                <option value="">Default</option>
                                                <option value="title" <?php if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title'): ?> selected <?php endif; ?>>Name</option>
                                                <option value="price" <?php if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price'): ?> selected <?php endif; ?>>Price</option>
                                                <option value="category" <?php if(!empty($_GET['sortBy']) && $_GET['sortBy']=='category'): ?> selected <?php endif; ?>>Category</option>
                                                <option value="brand" <?php if(!empty($_GET['sortBy']) && $_GET['sortBy']=='brand'): ?> selected <?php endif; ?>>Brand</option>
                                            </select>
                                        </div>
                                    </div>
                                    <ul class="view-mode">
                                        <li class="active"><a href="javascript:void(0)"><i class="fa fa-th-large"></i></a></li>
                                        <li><a href="<?php echo e(route('product-lists')); ?>"><i class="fa fa-th-list"></i></a></li>
                                    </ul>
                                </div>
                                <!--/ End Shop Top -->
                            </div>
                        </div>
                        <div class="row">
                            
                            <?php if(count($product_group)>0): ?>
                                <?php $__currentLoopData = $product_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="<?php echo e(route('product-detail',$product->slug)); ?>">
                                                    <?php
                                                        $photo=explode(',',$product->photo);
                                                    ?>
                                                    <img class="default-img" src="<?php echo e($photo[0]); ?>" alt="<?php echo e($photo[0]); ?>">
                                                    <img class="hover-img" src="<?php echo e($photo[0]); ?>" alt="<?php echo e($photo[0]); ?>">
                                                    <?php if($product->discount): ?>
                                                                <span class="price-dec"><?php echo e($product->discount); ?> % Off</span>
                                                    <?php endif; ?>
                                                </a>
                                                <div class="button-head">
                                                    <div class="product-action">
                                                        <a data-toggle="modal" data-target="#<?php echo e($product->id); ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                        <a title="Wishlist" href="<?php echo e(route('add-to-wishlist',$product->slug)); ?>" class="wishlist" data-id="<?php echo e($product->id); ?>"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                    </div>
                                                    <div class="product-action-2">
                                                        <a title="Add to cart" href="<?php echo e(route('add-to-cart',$product->slug)); ?>">Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="<?php echo e(route('product-detail',$product->slug)); ?>"><?php echo e($product->title); ?></a></h3>
                                                <?php
                                                    $after_discount=($product->price-($product->price*$product->discount)/100);
                                                ?>
                                                <span>$<?php echo e(number_format($after_discount,2)); ?></span>
                                                <del style="padding-left:4%;">$<?php echo e(number_format($product->price,2)); ?></del>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                    <h4 class="text-warning" style="margin:100px auto;">There are no products.</h4>
                            <?php endif; ?>



                        </div>
                        <div class="row">
                            <div class="col-md-12 justify-content-center d-flex">
                               
                            </div>
                          </div>

                    </div>
                </div>
            </div>
        </section>
    </form>

    <!--/ End Product Style 1  -->



    <!-- Modal -->
 
    <!-- Modal end -->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<style>
    .pagination{
        display:inline-flex;
    }
    .filter_button{
        /* height:20px; */
        text-align: center;
        background:#F7941D;
        padding:8px 16px;
        margin-top:10px;
        color: white;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    
    <script>
        $(document).ready(function(){
        /*----------------------------------------------------*/
        /*  Jquery Ui slider js
        /*----------------------------------------------------*/
        if ($("#slider-range").length > 0) {
            const max_value = parseInt( $("#slider-range").data('max') ) || 500;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;
            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }

            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  "+currency+ ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            }
        if ($("#amount").length > 0) {
            const m_currency = $("#slider-range").data('currency') || '';
            $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                "  -  "+m_currency + $("#slider-range").slider("values", 1));
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Ecommerce-Laravel\resources\views/frontend/pages/product_group.blade.php ENDPATH**/ ?>