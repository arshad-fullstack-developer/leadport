<!--CRUMBS CONTAINER (RIGHT)-->
<div class="col-md-12 align-self-center text-right <?php echo e($page['list_page_actions_size'] ?? ''); ?> <?php echo e($page['list_page_container_class'] ?? ''); ?>"
    id="list-page-actions-container">
    <div id="list-page-actions">
        <!--ADD NEW ITEM-->
        <button type="button"
            class="btn btn-danger btn-add-circle edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
            data-toggle="modal" data-target="#commonModal" data-url="<?php echo e(url('/app-admin/frontend/mainmenu/create')); ?>"
            data-loading-target="commonModalBody" data-modal-title="<?php echo app('translator')->get('lang.add_menu_item'); ?>"
            data-action-url="<?php echo e(url('/app-admin/frontend/mainmenu')); ?>"
            data-action-method="POST"
            data-modal-size="modal-lg"
            data-action-ajax-loading-target="commonModalBody">
            <i class="ti-plus"></i>
        </button>
    </div>
</div><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/frontend/mainmenu/actions/page-actions.blade.php ENDPATH**/ ?>