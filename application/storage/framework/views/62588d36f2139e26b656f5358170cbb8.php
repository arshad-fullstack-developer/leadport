<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('frontend.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="inner-page pricing">

    <?php echo $__env->make('frontend.layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.layout.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!--page heading-->
    <div class="container page-wrapper pricing">

        <div class="page-header pricing-header text-center">
            <h2><?php echo _clean($content->frontend_data_1); ?></h2>
            <h5><?php echo _clean($content->frontend_data_2); ?></h5>
        </div>


        <!--pricing toggle-->
        <div class="switch-container">
            <!-- Rounded switch -->
            <h4 class="pricing-toggle-period active" id="pricing-toggle-monthly"><?php echo app('translator')->get('lang.monthly'); ?></h4>

            <label class="switch">
                <input id="price-cycle-switch" type="checkbox">
                <span class="slider round"></span>
            </label>

            <h4 class="pricing-toggle-period" id="pricing-toggle-yearly"><?php echo app('translator')->get('lang.yearly'); ?></h4>
        </div>



        <!--[MONTHLY]-->
        <div class="pricing-table-wrapper" id="pricing-tables-monthly">
            <div class="pricing-table card-deck row" id="pricing-tables-monthly">

                <!--each plan-->
                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card box-shadow pricing-plan pricing-featured-<?php echo e($package->package_featured); ?>">
                        <div class="card-body">
                            <h4 class="my-0 font-weight-normal"><?php echo e($package->package_name); ?></h4>
                            <h1 class="card-title pricing-card-title">
                                <?php echo e(runtimeMoneyFormatPricing($package->package_amount_monthly)); ?> <small
                                    class="text-muted">/
                                    <?php echo app('translator')->get('lang.month'); ?></small></h1>
                            <ul class="list-unstyled mt-3 mb-4">


                                <!--package_limits_team-->
                                <li>
                                    <?php if($package->package_limits_team > 0 || $package->package_limits_team == -1): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text font-weight-500"><?php echo app('translator')->get('lang.team'); ?> (<?php echo app('translator')->get('lang.users'); ?>) -
                                        <?php echo e(runtimeCheckUnlimited($package->package_limits_team)); ?></span>
                                </li>

                                <!--package_limits_clients-->
                                <li>
                                    <?php if($package->package_limits_clients > 0 || $package->package_limits_clients == -1): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text font-weight-500"><?php echo app('translator')->get('lang.clients'); ?> -
                                        <?php echo e(runtimeCheckUnlimited($package->package_limits_clients)); ?></span>
                                </li>


                                <!--package_limits_projects-->
                                <li>
                                    <?php if($package->package_limits_projects > 0 || $package->package_limits_projects ==
                                    -1): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text font-weight-500"><?php echo app('translator')->get('lang.projects'); ?> -
                                        <?php echo e(runtimeCheckUnlimited($package->package_limits_projects)); ?></span>
                                </li>

                                <!--package_module_tasks-->
                                <li>
                                    <?php if($package->package_module_tasks == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.tasks'); ?></span>
                                </li>

                                <!--package_module_leads-->
                                <li>
                                    <?php if($package->package_module_leads == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.leads'); ?></span>
                                </li>

                                <!--package_module_invoices-->
                                <li>
                                    <?php if($package->package_module_invoices == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.invoices'); ?></span>
                                </li>

                                <!--package_module_estimates-->
                                <li>
                                    <?php if($package->package_module_estimates == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.estimates'); ?></span>
                                </li>

                                <!--package_module_subscriptions-->
                                <li>
                                    <?php if($package->package_module_subscriptions == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.subscriptions'); ?></span>
                                </li>

                                <!--package_module_contracts-->
                                <li>
                                    <?php if($package->package_module_contracts == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.contracts'); ?></span>
                                </li>

                                <!--package_module_proposals-->
                                <li>
                                    <?php if($package->package_module_proposals == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.proposals'); ?></span>
                                </li>

                                <!--package_module_tickets-->
                                <li>
                                    <?php if($package->package_module_tickets == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.tickets'); ?></span>
                                </li>

                                <!--package_module_calendar-->
                                <li>
                                    <?php if($package->package_module_calendar == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.calendar'); ?></span>
                                </li>

                                <!--package_module_expense-->
                                <li>
                                    <?php if($package->package_module_expense == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.expenses'); ?></span>
                                </li>

                                <!--package_module_messages-->
                                <li>
                                    <?php if($package->package_module_messages == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.instant_messaging'); ?></span>
                                </li>

                                <!--package_module_timetracking-->
                                <li>
                                    <?php if($package->package_module_timetracking == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.time_tracking'); ?></span>
                                </li>

                                <!--package_module_knowledgebase-->
                                <li>
                                    <?php if($package->package_module_knowledgebase == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.knowledgebase'); ?></span>
                                </li>

                                <!--package_module_reminders-->
                                <li>
                                    <?php if($package->package_module_reminders == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.reminders'); ?></span>
                                </li>
                            </ul>
                            <?php if($package->package_subscription_options == 'free'): ?>
                            <a type="button" href="<?php echo e(url('account/signup?ref=free_'.$package->package_id)); ?>"
                                class="frontent-pricing-button"><?php echo e($content->frontend_data_4 ?? ''); ?></a>
                            <?php else: ?>
                            <a type="button" href="<?php echo e(url('account/signup?ref=monthly_'.$package->package_id)); ?>"
                                class="frontent-pricing-button"><?php echo e($content->frontend_data_4 ?? ''); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>


        <!--[YEARLY]-->
        <div class="pricing-table-wrapper hidden" id="pricing-tables-yearly">
            <div class="pricing-table card-deck row">

                <!--each plan-->
                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card box-shadow pricing-plan pricing-featured-<?php echo e($package->package_featured); ?>">
                        <div class="card-body">
                            <h4 class="my-0 font-weight-normal"><?php echo e($package->package_name); ?></h4>
                            <h1 class="card-title pricing-card-title">
                                <?php echo e(runtimeMoneyFormatPricing($package->package_amount_yearly)); ?> <small
                                    class="text-muted">/
                                    <?php echo app('translator')->get('lang.year'); ?></small></h1>
                            <ul class="list-unstyled mt-3 mb-4">



                                <!--package_limits_team-->
                                <li>
                                    <?php if($package->package_limits_team > 0 || $package->package_limits_team == -1): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text font-weight-500"><?php echo app('translator')->get('lang.team'); ?> (<?php echo app('translator')->get('lang.users'); ?>) -
                                        <?php echo e(runtimeCheckUnlimited($package->package_limits_team)); ?></span>
                                </li>

                                <!--package_limits_clients-->
                                <li>
                                    <?php if($package->package_limits_clients > 0 || $package->package_limits_clients == -1): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text font-weight-500"><?php echo app('translator')->get('lang.clients'); ?> -
                                        <?php echo e(runtimeCheckUnlimited($package->package_limits_clients)); ?></span>
                                </li>


                                <!--package_limits_projects-->
                                <li>
                                    <?php if($package->package_limits_projects > 0 || $package->package_limits_projects ==
                                    -1): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text font-weight-500"><?php echo app('translator')->get('lang.projects'); ?> -
                                        <?php echo e(runtimeCheckUnlimited($package->package_limits_projects)); ?></span>
                                </li>

                                <!--package_module_tasks-->
                                <li>
                                    <?php if($package->package_module_tasks == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.tasks'); ?></span>
                                </li>

                                <!--package_module_leads-->
                                <li>
                                    <?php if($package->package_module_leads == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.leads'); ?></span>
                                </li>

                                <!--package_module_invoices-->
                                <li>
                                    <?php if($package->package_module_invoices == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.invoices'); ?></span>
                                </li>

                                <!--package_module_estimates-->
                                <li>
                                    <?php if($package->package_module_estimates == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.estimates'); ?></span>
                                </li>

                                <!--package_module_subscriptions-->
                                <li>
                                    <?php if($package->package_module_subscriptions == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.subscriptions'); ?></span>
                                </li>

                                <!--package_module_contracts-->
                                <li>
                                    <?php if($package->package_module_contracts == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.contracts'); ?></span>
                                </li>

                                <!--package_module_proposals-->
                                <li>
                                    <?php if($package->package_module_proposals == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.proposals'); ?></span>
                                </li>

                                <!--package_module_tickets-->
                                <li>
                                    <?php if($package->package_module_tickets == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.tickets'); ?></span>
                                </li>

                                <!--package_module_calendar-->
                                <li>
                                    <?php if($package->package_module_calendar == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.calendar'); ?></span>
                                </li>

                                <!--package_module_expense-->
                                <li>
                                    <?php if($package->package_module_expense == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.expenses'); ?></span>
                                </li>

                                <!--package_module_messages-->
                                <li>
                                    <?php if($package->package_module_messages == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.instant_messaging'); ?></span>
                                </li>

                                <!--package_module_timetracking-->
                                <li>
                                    <?php if($package->package_module_timetracking == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.time_tracking'); ?></span>
                                </li>

                                <!--package_module_knowledgebase-->
                                <li>
                                    <?php if($package->package_module_knowledgebase == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.knowledgebase'); ?></span>
                                </li>

                                <!--package_module_reminders-->
                                <li>
                                    <?php if($package->package_module_reminders == 'yes'): ?>
                                    <span class="x-icon x-icon-yes"><i class="mdi mdi-check"></i></span>
                                    <?php else: ?>
                                    <span class="x-icon x-icon-no"><i class="mdi mdi-window-close"></i></span>
                                    <?php endif; ?>
                                    <span class="x-text"><?php echo app('translator')->get('lang.reminders'); ?></span>
                                </li>
                            </ul>
                            <?php if($package->package_subscription_options == 'free'): ?>
                            <a type="button" href="<?php echo e(url('account/signup?ref=free_'.$package->package_id)); ?>"
                                class="frontent-pricing-button"><?php echo e($content->frontend_data_4 ?? ''); ?></a>
                            <?php else: ?>
                            <a type="button" href="<?php echo e(url('account/signup?ref=yearly_'.$package->package_id)); ?>"
                                class="frontent-pricing-button"><?php echo e($content->frontend_data_4 ?? ''); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            </div>
        </div>

        <!--FOOTER-->
        <div class="pricing-summary-content p-t-10">
            <?php echo $content->frontend_data_3; ?>

        </div>

    </div>

    <?php echo $__env->make('frontend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.layout.footerjs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/frontend/pricing/page.blade.php ENDPATH**/ ?>