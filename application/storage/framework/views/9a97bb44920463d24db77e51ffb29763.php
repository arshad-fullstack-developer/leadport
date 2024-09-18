<div class="col-sm-12 col-md-6 col-lg-4" id="splash_item_<?php echo e($item->frontend_id); ?>">
    <div class="splah-item-editing">
        <img
        src="<?php echo e(url('storage/frontend/'.$item->frontend_directory.'/'.$item->frontend_filename)); ?>">
        <div class="p-t-8 p-b-8"><h4><?php echo e($item->frontend_data_1); ?></h4></div>
        <div>
            <button class="btn btn-rounded-x btn-info btn-xs waves-effect text-left edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                data-toggle="modal" 
                data-target="#commonModal" 
                data-url="<?php echo e(url('/app-admin/frontend/section/'.$item->frontend_id.'/splash')); ?>"
                data-loading-target="commonModalBody" 
                data-modal-title="<?php echo app('translator')->get('lang.edit'); ?>" 
                data-action-url="<?php echo e(url('/app-admin/frontend/section/'.$item->frontend_id.'/splash')); ?>"
                data-action-ajax-class="js-ajax-ux-request"
                data-action-method="POST"><?php echo app('translator')->get('lang.edit'); ?></button>
        </div>
    </div>
</div><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/frontend/splash/ajax.blade.php ENDPATH**/ ?>