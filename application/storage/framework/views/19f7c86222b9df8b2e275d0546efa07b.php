
<?php $__env->startSection('account-page'); ?>
<div class="account-wrapper">


    <div class="row x-current-plan p-t-10">
        <div class="col-sm-12 col-lg-6">
            <h3><?php echo e($package->package_name); ?></h3>
            <?php echo app('translator')->get('lang.this_is_your_current_plan'); ?>
        </div>
        <div class="col-sm-12 col-lg-6 text-right">
            <button type="button"
                class="btn waves-effect waves-light btn-sm btn-success hidden"><?php echo app('translator')->get('lang.change_your_plan'); ?></button>

            <!--pay button-->
            <?php if($subscription->subscription_status == 'awaiting-payment'): ?>
            <button type="button"
                class="btn waves-effect waves-light btn-sm btn-danger js-ajax-ux-request js-submenu-ajax js-dynamic-settings-url"
                data-url="/settings/account/notices"><?php echo app('translator')->get('lang.pay_now'); ?></button>
            <?php endif; ?>
        </div>
    </div>
    <div class="x-current-features p-t-40">

        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <?php if($subscription->subscription_type == 'paid' && $subscription->subscription_gateway_billing_cycle
                    == 'monthly'): ?>
                    <tr>
                        <td><?php echo app('translator')->get('lang.amount'); ?></td>
                        <td class="text-right p-r-30">
                            <?php echo e(runtimeMoneyFormat($package->package_amount_monthly)); ?>/<?php echo app('translator')->get('lang.month'); ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if($subscription->subscription_type == 'paid' && $subscription->subscription_gateway_billing_cycle
                    == 'yearly'): ?>
                    <tr>
                        <td><?php echo app('translator')->get('lang.amount'); ?></td>
                        <td class="text-right p-r-30">
                            <?php echo e(runtimeMoneyFormat($package->package_amount_yearly)); ?>/<?php echo app('translator')->get('lang.year'); ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <!--status-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.account_status'); ?></td>
                        <td class="text-right p-r-30 font-medium"><span
                                class="label <?php echo e(runtimeSubscriptionStatusColors($subscription->subscription_status)); ?>"><?php echo e(runtimeSubscriptionStatusLang($subscription->subscription_status)); ?></span>
                        </td>
                    </tr>

                    <!--trial_end_date-->
                    <?php if($subscription->subscription_status =='free-trial'): ?>
                    <tr>
                        <td><?php echo app('translator')->get('lang.trial_end_date'); ?></td>
                        <td class="text-right p-r-30">
                            <?php echo e(runtimeDate($subscription->subscription_trial_end)); ?>

                        </td>
                    </tr>
                    <?php endif; ?>

                    <!--next_billing_date-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.next_billing_date'); ?></td>
                        <td class="text-right p-r-30">
                            <?php if($subscription->subscription_type == 'free'): ?>
                            <span><?php echo app('translator')->get('lang.none'); ?></span>
                            <?php else: ?>
                            <span><?php echo e(runtimeDate($subscription->subscription_date_next_renewal)); ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>


    <h4 class="m-b-0 p-b-15 m-t-20"><?php echo app('translator')->get('lang.features'); ?></h4>

    <div class="x-current-features">

        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td><?php echo app('translator')->get('lang.clients'); ?></td>
                        <td class="text-right p-r-30"><?php echo e(runtimeCheckUnlimited($package->package_limits_clients)); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo app('translator')->get('lang.projects'); ?></td>
                        <td class="text-right p-r-30"><?php echo e(runtimeCheckUnlimited($package->package_limits_projects)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td><?php echo app('translator')->get('lang.team_members'); ?></td>
                        <td class="text-right p-r-30">
                            <?php echo e(runtimeCheckUnlimited($package->package_limits_team)); ?>

                        </td>
                    </tr>
                    <!--package_module_tasks-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.tasks'); ?></td>
                        <td class="text-right p-r-30">
                            <?php if($package->package_module_tasks == 'yes'): ?>
                            <i class="sl-icon-check text-success"></i>
                            <?php else: ?>
                            <i class="sl-icon-close text-danger"></i>
                            <?php endif; ?></td>
                    </tr>

                    <!--package_module_invoices-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.invoices'); ?></td>
                        <td class="text-right p-r-30">
                            <?php if($package->package_module_invoices == 'yes'): ?>
                            <i class="sl-icon-check text-success"></i>
                            <?php else: ?>
                            <i class="sl-icon-close text-danger"></i>
                            <?php endif; ?></td>
                    </tr>

                    <!--package_module_estimates-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.estimates'); ?></td>
                        <td class="text-right p-r-30">
                            <?php if($package->package_module_estimates == 'yes'): ?>
                            <i class="sl-icon-check text-success"></i>
                            <?php else: ?>
                            <i class="sl-icon-close text-danger"></i>
                            <?php endif; ?></td>
                    </tr>

                    <!--package_module_proposals-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.proposals'); ?></td>
                        <td class="text-right p-r-30">
                            <?php if($package->package_module_proposals == 'yes'): ?>
                            <i class="sl-icon-check text-success"></i>
                            <?php else: ?>
                            <i class="sl-icon-close text-danger"></i>
                            <?php endif; ?></td>
                    </tr>

                    <!--package_module_contracts-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.contracts'); ?></td>
                        <td class="text-right p-r-30">
                            <?php if($package->package_module_contracts == 'yes'): ?>
                            <i class="sl-icon-check text-success"></i>
                            <?php else: ?>
                            <i class="sl-icon-close text-danger"></i>
                            <?php endif; ?></td>
                    </tr>

                    <!--package_module_messages-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.instant_messaging'); ?></td>
                        <td class="text-right p-r-30">
                            <?php if($package->package_module_messages == 'yes'): ?>
                            <i class="sl-icon-check text-success"></i>
                            <?php else: ?>
                            <i class="sl-icon-close text-danger"></i>
                            <?php endif; ?></td>
                    </tr>

                    <!--package_module_expense-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.expenses'); ?></td>
                        <td class="text-right p-r-30">
                            <?php if($package->package_module_expense == 'yes'): ?>
                            <i class="sl-icon-check text-success"></i>
                            <?php else: ?>
                            <i class="sl-icon-close text-danger"></i>
                            <?php endif; ?></td>
                    </tr>

                    <!--package_module_leads-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.leads'); ?></td>
                        <td class="text-right p-r-30">
                            <?php if($package->package_module_leads == 'yes'): ?>
                            <i class="sl-icon-check text-success"></i>
                            <?php else: ?>
                            <i class="sl-icon-close text-danger"></i>
                            <?php endif; ?></td>
                    </tr>

                    <!--package_module_knowledgebase-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.knowledgebase'); ?></td>
                        <td class="text-right p-r-30">
                            <?php if($package->package_module_knowledgebase == 'yes'): ?>
                            <i class="sl-icon-check text-success"></i>
                            <?php else: ?>
                            <i class="sl-icon-close text-danger"></i>
                            <?php endif; ?></td>
                    </tr>

                    <!--package_module_subscriptions-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.subscriptions'); ?></td>
                        <td class="text-right p-r-30">
                            <?php if($package->package_module_subscriptions == 'yes'): ?>
                            <i class="sl-icon-check text-success"></i>
                            <?php else: ?>
                            <i class="sl-icon-close text-danger"></i>
                            <?php endif; ?></td>
                    </tr>

                    <!--package_module_tickets-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.tickets'); ?></td>
                        <td class="text-right p-r-30">
                            <?php if($package->package_module_tickets == 'yes'): ?>
                            <i class="sl-icon-check text-success"></i>
                            <?php else: ?>
                            <i class="sl-icon-close text-danger"></i>
                            <?php endif; ?></td>
                    </tr>


                    <!--package_module_calendar-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.calendar'); ?></td>
                        <td class="text-right p-r-30">
                            <?php if($package->package_module_calendar == 'yes'): ?>
                            <i class="sl-icon-check text-success"></i>
                            <?php else: ?>
                            <i class="sl-icon-close text-danger"></i>
                            <?php endif; ?></td>
                    </tr>

                    <!--package_module_timetracking-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.time_tracking'); ?></td>
                        <td class="text-right p-r-30">
                            <?php if($package->package_module_timetracking == 'yes'): ?>
                            <i class="sl-icon-check text-success"></i>
                            <?php else: ?>
                            <i class="sl-icon-close text-danger"></i>
                            <?php endif; ?></td>
                    </tr>

                    <!--package_module_reminders-->
                    <tr>
                        <td><?php echo app('translator')->get('lang.reminders'); ?></td>
                        <td class="text-right p-r-30">
                            <?php if($package->package_module_reminders == 'yes'): ?>
                            <i class="sl-icon-check text-success"></i>
                            <?php else: ?>
                            <i class="sl-icon-close text-danger"></i>
                            <?php endif; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>


    <!--cancel subscription-->
    <div class="modal-selector m-r-0 m-l-0 m-t-20 p-t-20 p-b-20">

        <div class="hidden" id="cancel_account_last_step">
            <div class="alert alert-danger">
                <h5 class="text-danger"><i class="mdi mdi-alert-outline"></i> <?php echo app('translator')->get('lang.warning'); ?></h5>
                <?php echo app('translator')->get('lang.cancel_subscription_info'); ?>
            </div>

            <!--add item modal-->
            <div class="text-right">
                <button type="button" class="btn btn-success btn-sm ajax-request"
                    data-url="<?php echo e(url('/settings/account/close-account')); ?>"
                    id="cancel_my_subscription_button_confirm"><?php echo app('translator')->get('lang.cancel_account_confirmation'); ?>
                </button>
            </div>
        </div>

        <!--add item modal-->
        <div class="text-right" id="cancel_my_subscription_button_container">
            <button type="button" class="btn btn-info btn-sm"
                id="cancel_my_subscription_button"><?php echo app('translator')->get('lang.close_my_account'); ?>
            </button>
        </div>

    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('account.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/account/myaccount/myaccount.blade.php ENDPATH**/ ?>