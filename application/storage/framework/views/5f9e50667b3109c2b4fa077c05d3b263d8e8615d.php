<?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<tr id="contract_<?php echo e($contract->doc_id); ?>">
    <?php if(config('visibility.contracts_col_checkboxes')): ?>
    <td class="contracts_col_checkbox checkcontract p-l-0" id="contracts_col_checkbox_<?php echo e($contract->doc_id); ?>">
        <!--list checkbox-->
        <span class="list-checkboxes display-inline-block w-px-20">
            <input type="checkbox" id="listcheckbox-contracts-<?php echo e($contract->doc_id); ?>"
                name="ids[<?php echo e($contract->doc_id); ?>]"
                class="listcheckbox listcheckbox-contracts filled-in chk-col-light-blue contracts-checkbox"
                data-actions-container-class="contracts-checkbox-actions-container"
                data-contract-id="<?php echo e($contract->doc_id); ?>">
            <label for="listcheckbox-contracts-<?php echo e($contract->doc_id); ?>"></label>
        </span>
    </td>
    <?php endif; ?>

    <!--doc_id-->
    <td class="col_doc_id">
        <a href="<?php echo e(url('/contracts/'.$contract->doc_id)); ?>"><?php echo e(runtimeContractIdFormat($contract->doc_id)); ?></a>
    </td>


    <!--doc_title-->
    <td class="col_doc_title">
        <a href="<?php echo e(url('/contracts/'.$contract->doc_id)); ?>"><?php echo e(str_limit($contract->doc_title ?? '---', 20)); ?></a>
    </td>

    <!--client-->
    <?php if(config('visibility.col_client')): ?>
    <td class="col_client">
        <a href="<?php echo e(url('/clients/'.$contract->client_id)); ?>"
            title="<?php echo e($contract->client_company_name ?? '---'); ?>"><?php echo e(str_limit($contract->client_company_name ?? '---', 12)); ?></a>
    </td>
    <?php endif; ?>


    <!--doc_date_start-->
    <?php if(config('visibility.doc_date_start')): ?>
    <td class="col_doc_date_start">
        <?php echo e(runtimeDate($contract->doc_date_start)); ?>

    </td>
    <?php endif; ?>

    <!--doc_value-->
    <td class="col_doc_value">
        <?php echo e(runtimeMoneyFormat($contract->doc_value)); ?>

    </td>

    <!--signature client-->
    <?php if(config('visibility.col_doc_signed_status')): ?>
    <td class="col_doc_signed_status">
        <?php if($contract->doc_signed_status == 'signed'): ?>
        <span class="label label label-outline-success"><?php echo app('translator')->get('lang.signed'); ?></span>
        <?php else: ?>
        <span class="label label label-outline-default"><?php echo app('translator')->get('lang.pending'); ?></span>
        <?php endif; ?>
    </td>
    <?php endif; ?>

    <!--signature provider-->
    <?php if(config('visibility.doc_provider_signed_status')): ?>
    <td class="col_doc_provider_signed_status">
        <?php if($contract->doc_provider_signed_status == 'signed'): ?>
        <span class="label label label-outline-success"><?php echo app('translator')->get('lang.signed'); ?></span>
        <?php else: ?>
        <span class="label label label-outline-default"><?php echo app('translator')->get('lang.pending'); ?></span>
        <?php endif; ?>
    </td>
    <?php endif; ?>

    <!--status-->
    <td class="col_doc_status">
        <span
            class="label <?php echo e(runtimeContractStatusColors($contract->doc_status, 'label')); ?>"><?php echo e(runtimeLang($contract->doc_status)); ?></span>
    </td>


    <?php if(config('visibility.contracts_col_action')): ?>
    <td class="contracts_col_action actions_column" id="contracts_col_action_<?php echo e($contract->doc_id); ?>">
        <!--action button-->
        <span class="list-table-action dropdown font-size-inherit">
            <!--delete-->
            <?php if(config('visibility.action_buttons_delete')): ?>
            <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                data-confirm-title="<?php echo e(cleanLang(__('lang.delete_product'))); ?>"
                data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE"
                data-url="<?php echo e(url('/')); ?>/contracts/<?php echo e($contract->doc_id); ?>">
                <i class="sl-icon-trash"></i>
            </button>
            <?php endif; ?>
            <!--edit-->
            <?php if(config('visibility.action_buttons_edit')): ?>
            <a type="button" title="<?php echo e(cleanLang(__('lang.edit'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm"
                href="<?php echo e(url('/contracts/'.$contract->doc_id.'/edit')); ?>">
                <i class="sl-icon-note"></i>
            </a>
            <?php endif; ?>


            <!--more button (team)-->
            <?php if(config('visibility.action_buttons_edit') == 'show'): ?>
            <span class="list-table-action dropdown font-size-inherit">
                <button type="button" id="listTableAction" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" title="<?php echo e(cleanLang(__('lang.more'))); ?>"
                    class="data-toggle-action-tooltip btn btn-outline-default-light btn-circle btn-sm">
                    <i class="ti-more"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="listTableAction">

                    <!--actions button - email client -->
                    <a class="dropdown-item confirm-action-info" href="javascript:void(0)"
                        data-confirm-title="<?php echo e(cleanLang(__('lang.email_to_client'))); ?>"
                        data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>"
                        data-url="<?php echo e(url('/contracts')); ?>/<?php echo e($contract->doc_id); ?>/resend?ref=list">
                        <?php echo e(cleanLang(__('lang.email_to_client'))); ?></a>

                    <!--actions button - change category-->
                    <a class="dropdown-item actions-modal-button js-ajax-ux-request reset-target-modal-form"
                        href="javascript:void(0)" data-toggle="modal" data-target="#actionsModal"
                        data-modal-title="<?php echo e(cleanLang(__('lang.change_category'))); ?>"
                        data-url="<?php echo e(url('/contracts/change-category')); ?>"
                        data-action-url="<?php echo e(urlResource('/contracts/change-category?id='.$contract->doc_id)); ?>"
                        data-loading-target="actionsModalBody" data-action-method="POST">
                        <?php echo app('translator')->get('lang.change_category'); ?></a>


                    <!--clone contract-->
                    <?php if(auth()->user()->role->role_contracts > 1): ?>
                    <a class="dropdown-item actions-modal-button js-ajax-ux-request reset-target-modal-form edit-add-modal-button"
                        href="javascript:void(0)" data-toggle="modal" data-target="#commonModal"
                        data-modal-title="<?php echo e(cleanLang(__('lang.clone_contract'))); ?>"
                        data-url="<?php echo e(url('/contracts/'.$contract->doc_id.'/clone')); ?>"
                        data-action-url="<?php echo e(url('/contracts/'.$contract->doc_id.'/clone')); ?>"
                        data-loading-target="actionsModalBody" data-action-method="POST">
                        <?php echo e(cleanLang(__('lang.clone_contract'))); ?></a>
                    <?php endif; ?>
                </div>
            </span>
            <?php endif; ?>
            <!--more button-->

        </span>
        <!--action button-->
    </td>
    <?php endif; ?>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row--><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/contracts/components/table/ajax.blade.php ENDPATH**/ ?>