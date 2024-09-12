<!-- right-sidebar -->
<div class="right-sidebar documents-side-panel-details sidebar-md" id="documents-side-panel-details">
    <form>
        <div class="slimscrollright">
            <!--title-->
            <div class="rpanel-title">
                <!--add class'due'to title panel -->
                <i class="sl-icon-note display-inline-block m-t--5"></i>
                <div class="display-inline-block">
                    <?php echo app('translator')->get('lang.edit_details'); ?>
                </div>
                <span>
                    <i class="ti-close js-close-side-panels" data-target="documents-side-panel-details"
                        id="documents-side-panel-details-close-icon"></i>
                </span>
            </div>
            <!--title-->
            <!--body-->
            <div class="r-panel-body documents-side-panel-details-body  p-b-80" id="documents-side-panel-details-body">



                <!--doc_date_start-->
                <div class="form-group row">
                    <label class="col-sm-12 text-left control-label col-form-label required">
                        <?php if($document->doc_type == 'proposal'): ?>
                        <span><?php echo app('translator')->get('lang.proposal_date'); ?>:</span>
                        <?php else: ?>
                        <span><?php echo app('translator')->get('lang.contract_start_date'); ?>:</span>
                        <?php endif; ?>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm pickadate" autocomplete="off"
                            name="doc_date_start" value="<?php echo e(runtimeDatepickerDate($document->doc_date_start ?? '')); ?>">
                        <input class="mysql-date" type="hidden" name="doc_date_start" id="doc_date_start"
                            value="<?php echo e($document->doc_date_start ?? ''); ?>">
                    </div>
                </div>


                <!--doc_date_end-->
                <div class="form-group row">
                    <label class="col-sm-12 text-left control-label col-form-label required">
                        <?php if($document->doc_type == 'proposal'): ?>
                        <span><?php echo app('translator')->get('lang.valid_until'); ?>:</span>
                        <?php else: ?>
                        <span><?php echo app('translator')->get('lang.contract_end_date'); ?>:</span>
                        <?php endif; ?>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm pickadate" autocomplete="off"
                            name="doc_date_end" value="<?php echo e(runtimeDatepickerDate($document->doc_date_end ?? '')); ?>">
                        <input class="mysql-date" type="hidden" name="doc_date_end" id="doc_date_end"
                            value="<?php echo e($document->doc_date_end ?? ''); ?>">
                    </div>
                </div>


                
                <!--doc_value-->
                <?php if($document->doc_type == 'contract'): ?>
                <div class="form-group row">
                    <label class="col-sm-12 text-left control-label col-form-label required">
                        <span><?php echo app('translator')->get('lang.value'); ?>:</span>
                    </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control form-control-sm" autocomplete="off"
                            name="doc_value" value="<?php echo e($document->doc_value ?? ''); ?>">
                    </div>
                </div>
                <?php endif; ?>


                <!--created by-->
                <div class="form-group row">
                    <label
                        class="col-sm-12 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.prepared_by'); ?></label>
                    <div class="col-sm-12">
                        <select class="select2-basic form-control form-control-sm"
                            id="doc_creatorid" name="doc_creatorid">
                            <option></option>
                            <?php $__currentLoopData = config('system.team_members'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>" <?php echo e(runtimePreselected($document->doc_creatorid ?? '', $user->id)); ?>><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>


                <!--category-->
                <div class="form-group row">
                    <label
                        class="col-sm-12 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.category'); ?></label>
                    <div class="col-sm-12">
                        <select class="select2-basic form-control form-control-sm" id="doc_categoryid"
                            name="doc_categoryid">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->category_id); ?>" <?php echo e(runtimePreselected($document->doc_categoryid ?? '', $category->category_id)); ?>><?php echo e($category->category_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>


                <!--status-->
                <?php if($document->doc_type  == 'proposal'): ?>
                <div class="form-group row">
                    <label
                        class="col-sm-12 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.status'); ?></label>
                    <div class="col-sm-12">
                        <select class="select2-basic form-control form-control-sm" id="doc_status"
                            name="doc_status">
                            <option value="draft" <?php echo e(runtimePreselected($document->doc_status ?? '','draft')); ?>><?php echo app('translator')->get('lang.draft'); ?></option>
                            <option value="new" <?php echo e(runtimePreselected($document->doc_status ?? '','new')); ?>><?php echo app('translator')->get('lang.new'); ?></option>
                            <option value="accepted" <?php echo e(runtimePreselected($document->doc_status ?? '','accepted')); ?>><?php echo app('translator')->get('lang.accepted'); ?></option>
                            <option value="declined" <?php echo e(runtimePreselected($document->doc_status ?? '','declined')); ?>><?php echo app('translator')->get('lang.declined'); ?></option>
                            <option value="revised"<?php echo e(runtimePreselected($document->doc_status ?? '','revised')); ?>><?php echo app('translator')->get('lang.revised'); ?></option>
                        </select>
                    </div>
                </div>
                <?php endif; ?>


                <!--document type-->
                <input type="hidden" name="doc_type" value="<?php echo e($document->doc_type ?? ''); ?>">

                <!--buttons-->
                <div class="buttons-block">
                    <button type="button" class="btn btn-rounded-x btn-info js-ajax-ux-request"
                        data-url="<?php echo e(url('documents/'.$document->doc_id.'/update/details')); ?>" data-type="form"
                        data-form-id="documents-side-panel-details"
                        data-ajax-type="post"><?php echo app('translator')->get('lang.save_changes'); ?></button>
                </div>

            </div>
            <!--body-->
        </div>
    </form>
</div>
<!--sidebar--><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/documents/editing/sidepanel-details.blade.php ENDPATH**/ ?>