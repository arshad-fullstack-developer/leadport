<div class="section-element-box clearfix" id="section_image_<?php echo e($item->frontend_id); ?>">
    <div class="x-image">
        <img src="<?php echo e(url('storage/frontend/'.$item->frontend_directory.'/'.$item->frontend_filename)); ?>"
            alt="<?php echo app('translator')->get('lang.error_404'); ?>" />
    </div>
    <div class="x-title">
        <h4><?php echo e($item->frontend_data_1); ?></h4>
        <?php echo e($item->frontend_data_2); ?>

        <div class="text-right">
            <button class="btn btn-rounded-x btn-info btn-xs waves-effect text-left edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                data-toggle="modal" 
                data-target="#commonModal" 
                data-url="<?php echo e(url('/app-admin/frontend/section/'.$item->frontend_id.'/image-content')); ?>"
                data-loading-target="commonModalBody" 
                data-modal-title="<?php echo app('translator')->get('lang.edit'); ?>" 
                data-action-url="<?php echo e(url('/app-admin/frontend/section/'.$item->frontend_id.'/image-content')); ?>"
                data-action-ajax-class="js-ajax-ux-request"
                data-action-method="POST"><?php echo app('translator')->get('lang.edit'); ?></button>
        </div>
    </div>
</div><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/frontend/components/icon-section.blade.php ENDPATH**/ ?>