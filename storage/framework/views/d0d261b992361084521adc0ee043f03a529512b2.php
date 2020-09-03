`
<?php $__env->startSection('title'); ?>
    Shop Admin
    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header_styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/animate/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pages/only_dashboard.css')); ?>"/>
    <meta name="_token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/morrisjs/morris.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pages/dashboard2.css')); ?>"/>
    <link href="<?php echo e(asset('assets/css/pages/tables.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/css/pages/productlist.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/frontend/portfolio.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/animate/animate.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/owl_carousel/css/owl.carousel.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/owl_carousel/css/owl.theme.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>Product<span class="hidden-xs header_info">( shop )</span></h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="#">
                    <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                    Image List
                </a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-offset-2 col-md-8">
            <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="livicon" data-name="pencil" data-size="16" data-loop="true" data-c="#fff"
                           data-hc="white"></i> Image List
                    </div>
                </div>
                <div class="portlet-body">
                    <form action="<?php echo route('admin.addprice', $data[0]->id); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" value="0" id="priceid" name="priceid"/>
                        <input type="hidden" value="add" id="addflag" name="addflag"/>
                        <div class="row">
                            <div class="col-md-1">
                                <label class="control-label">Weight</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control"  name="weight" id="weight"/>
                            </div>
                            <div class="col-md-1">
                                <label class="control-label" >Price</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="price" id="price"/>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-xs" id="button_type">Add Price</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default btn-xs" id="refresh_btn">
                                    <i class="livicon" data-name="refresh" data-size="20" data-loop="true"
                                       data-c="#fff" data-hc="white"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <th>#</th>
                            <th>
                                Weight(g)
                            </th>
                            <th>
                                Price(€)
                            </th>
                            <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <input type="hidden" value='<?php echo json_encode($data[1]); ?>' id="pricelist"/>
                            <?php $i = 0; ?>
                            <?php $__currentLoopData = $data[1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $i ++; ?>
                                <tr class="price_row" id="<?php echo $price->id; ?>">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $price->weight; ?></td>
                                    <td><?php echo $price->price; ?></td>
                                    <td>
                                        <a style="display: inline-block !important;"  class="btn btn-danger btn-xs" href="<?php echo route('admin.removeprice', $price->id); ?>">Remove</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/moment/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/moment/js/moment.min.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/countUp_js/js/countUp.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/morrisjs/morris.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/productList.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js')); ?>"
            type="text/javascript"></script>
    <script>
        $(function () {
            var pricelist = JSON.parse($('#pricelist').val());
            $('.price_row').click(function () {
                $('#button_type').text("Update Price");
                var id = $(this).attr('id');
                console.log(id);
                for(var i = 0; i < pricelist.length; i ++){
                    if(pricelist[i].id == id){
                        $('#weight').val(pricelist[i].weight);
                        $('#price').val(pricelist[i].price);
                        $('#addflag').val('update');
                        $('#priceid').val(id);
                    }
                }
            });
            $('#refresh_btn').click(function () {
                $('#button_type').text("Add Price");
                $('#weight').val("");
                $('#price').val("");
                $('#addflag').val('add');
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>