<?php $__env->startSection('title'); ?>
    Products
    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/frontend/shopping.css')); ?>">
    <link href="<?php echo e(asset('assets/vendors/animate/animate.min.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('top'); ?>
    <div class="breadcum">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(route('home')); ?>"> <i class="livicon icon3 icon4" data-name="home" data-size="18"
                                                      data-loop="true" data-c="#eeeeee" data-hc="#eeeeee"></i>Home
                    </a>
                </li>

                <li class="hidden-xs">
                    <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true"
                       data-c="#eeeeee" data-hc="#eeeeee"></i>
                    <a href="#">Products</a>
                </li>
            </ol>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3><i class="livicon icon3" data-name="edit" data-size="20" data-loop="true" data-c="#eee"
                       data-hc="#eee"></i>PRODUCTS LIST</h3>
            </div>
            <div class="col-md-6">
                <nav>
                    <ul class="pagination pull-right">
                        <li class="page-item <?php if($resdata->current_page <=1): ?> <?php echo 'disabled'; ?><?php endif; ?>">
                            <a class="page-link"
                               href="<?php if($resdata->current_page<=1): ?> <?php echo '#'; ?> <?php else: ?> <?php echo url('/products?page='.((int)($resdata->current_page)-1)); ?> <?php endif; ?>"
                               rel="prev">«</a>
                        </li>
                        <?php for($i = 0; $i <= (int)((int)$resdata->total/(int)$resdata->per_page); $i ++): ?>
                            <li class="page-item <?php if($resdata->current_page == $i + 1): ?> <?php echo 'active'; ?> <?php endif; ?>">
                                <a class="page-link" href="<?php echo url('/products?page='.($i+1)); ?>"><?php echo $i + 1; ?>

                                </a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item <?php if($resdata->current_page >=$resdata->last_page): ?> <?php echo 'disabled'; ?><?php endif; ?>">
                            <a class="page-link"
                               href="<?php if($resdata->current_page>=$resdata->last_page): ?> <?php echo '#'; ?> <?php else: ?> <?php echo url('/products?page='.((int)($resdata->current_page)+1)); ?> <?php endif; ?>"
                               rel="next">»</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row">
            <?php $id = 0;?>
            <?php $__currentLoopData = $resdata->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($product->status == "active"): ?>
                    <?php $id ++; ?>
                    <div class="col-sm-6 col-md-3 wow flipInX" data-wow-duration="3.5s">
                        <div class="thumbnail text-center">
                            <a href="<?php echo e(route('single_product', $product->id)); ?>">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php $__currentLoopData = json_decode($product->avatar); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $avatar => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item <?php if($avatar == 0): ?> active <?php endif; ?>">
                                                <img src="<?php echo url('/').'/productsimage/'.$result; ?>"
                                                     alt="First slide"/>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </a>
                            <br/>
                            <h5 class="text-primary"><?php echo strtoupper($product->name); ?></h5>
                            <hr>
                            <div style="max-height: 25px; overflow: hidden;text-overflow: ellipsis; !important;white-space: nowrap;">
                                <?php echo $product->des_short; ?>

                            </div>
                            <hr>
                            <a href="<?php echo e(route('single_product', $product->id)); ?>"
                               class="btn btn-primary btn-block text-white">View</a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
    <script src="<?php echo e(asset('assets/vendors/wow/js/wow.min.js')); ?>" type="text/javascript"></script>
    <script>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>