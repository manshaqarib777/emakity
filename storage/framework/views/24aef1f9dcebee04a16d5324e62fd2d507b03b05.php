
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header content-header<?php echo e(setting('fixed_header')); ?>">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo e(trans('lang.dashboard')); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo e(trans('lang.dashboard')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(trans('lang.dashboard')); ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo e($ordersCount); ?></h3>

                        <p><?php echo e(trans('lang.dashboard_total_orders')); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-bag"></i>
                    </div>
                    <a href="<?php echo route('orders.index'); ?>" class="small-box-footer"><?php echo e(trans('lang.dashboard_more_info')); ?>

                        <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <?php if(setting('currency_right', false) != false): ?>
                            <h3><?php echo e($earning); ?><?php echo e(setting('default_currency')); ?></h3>
                        <?php else: ?>
                            <h3><?php echo e(setting('default_currency')); ?><?php echo e($earning); ?></h3>
                        <?php endif; ?>

                        <p><?php echo e(trans('lang.dashboard_total_earnings')); ?> <span style="font-size: 11px">(<?php echo e(trans('lang.dashboard_after taxes')); ?>)</span></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <a href="<?php echo route('payments.index'); ?>" class="small-box-footer"><?php echo e(trans('lang.dashboard_more_info')); ?>

                        <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo e($marketsCount); ?></h3>
                        <p><?php echo e(trans('lang.market_plural')); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cutlery"></i>
                    </div>
                    <a href="<?php echo route('markets.index'); ?>" class="small-box-footer"><?php echo e(trans('lang.dashboard_more_info')); ?>

                        <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo e($membersCount); ?></h3>

                        <p><?php echo e(trans('lang.dashboard_total_clients')); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-group"></i>
                    </div>
                    <a href="<?php echo route('users.index'); ?>" class="small-box-footer"><?php echo e(trans('lang.dashboard_more_info')); ?>

                        <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header no-border">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title"><?php echo e(trans('lang.earning_plural')); ?></h3>
                            <a href="<?php echo route('payments.index'); ?>"><?php echo e(trans('lang.dashboard_view_all_payments')); ?></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <?php if(setting('currency_right', false) != false): ?>
                                    <span class="text-bold text-lg"><?php echo e($earning); ?><?php echo e(setting('default_currency')); ?></span>
                                <?php else: ?>
                                    <span class="text-bold text-lg"><?php echo e(setting('default_currency')); ?><?php echo e($earning); ?></span>
                                <?php endif; ?>
                                <span><?php echo e(trans('lang.dashboard_earning_over_time')); ?></span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success"> <?php echo e($ordersCount); ?></span></span>
                                <span class="text-muted"><?php echo e(trans('lang.dashboard_total_orders')); ?></span>
                            </p>
                        </div>
                        <!-- /.d-flex -->

                        <div class="position-relative mb-4">
                            <canvas id="sales-chart" height="200"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2"> <i class="fa fa-square text-primary"></i> <?php echo e(trans('lang.dashboard_this_year')); ?> </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header no-border">
                        <h3 class="card-title"><?php echo e(trans('lang.market_plural')); ?></h3>
                        <div class="card-tools">
                            <a href="<?php echo e(route('markets.index')); ?>" class="btn btn-tool btn-sm"><i class="fa fa-bars"></i> </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                                <th><?php echo e(trans('lang.market_image')); ?></th>
                                <th><?php echo e(trans('lang.market')); ?></th>
                                <th><?php echo e(trans('lang.market_address')); ?></th>
                                <th><?php echo e(trans('lang.actions')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $markets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $market): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td>
                                        <?php echo getMediaColumn($market, 'image','img-circle img-size-32 mr-2'); ?>

                                    </td>
                                    <td><?php echo $market->name; ?></td>
                                    <td>
                                        <?php echo $market->address; ?>

                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo route('markets.edit',$market->id); ?>" class="text-muted"> <i class="fa fa-edit"></i> </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts_lib'); ?>
    <script src="<?php echo e(asset('plugins/chart.js/Chart.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        var data = [1000, 2000, 3000, 2500, 2700, 2500, 3000];
        var labels = ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];

        function renderChart(chartNode, data, labels) {
            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            };

            var mode = 'index';
            var intersect = true;
            return new Chart(chartNode, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            backgroundColor: '#007bff',
                            borderColor: '#007bff',
                            data: data
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            // display: false,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,

                                // Include a dollar sign in the ticks
                                callback: function (value, index, values) {
                                    <?php if(setting('currency_right', '0') == '0'): ?>
                                        return "<?php echo e(setting('default_currency')); ?> "+value;
                                    <?php else: ?>
                                        return value+" <?php echo e(setting('default_currency')); ?>";
                                        <?php endif; ?>

                                }
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })
        }

        $(function () {
            'use strict'

            var $salesChart = $('#sales-chart')
            $.ajax({
                url: "<?php echo $ajaxEarningUrl; ?>",
                success: function (result) {
                    $("#loadingMessage").html("");
                    var data = result.data[0];
                    var labels = result.data[1];
                    renderChart($salesChart, data, labels)
                },
                error: function (err) {
                    $("#loadingMessage").html("Error");
                }
            });
            //var salesChart = renderChart($salesChart, data, labels);
        })

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/food/resources/views/dashboard/index.blade.php ENDPATH**/ ?>