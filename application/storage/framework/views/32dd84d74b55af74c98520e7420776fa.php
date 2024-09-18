<!--menu name-->
<div class="form-group row">
    <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.name'); ?></label>
    <div class="col-sm-12 col-lg-9">
        <input type="text" class="form-control form-control-sm" id="frontend_data_1" name="frontend_data_1"
            value="<?php echo e($menu->frontend_data_1 ?? ''); ?>">
    </div>
</div>

<div class="modal-selector m-t-20 ">

    <!--link type-->
    <div class="form-group row">
        <label
            class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.link_type'); ?></label>
        <div class="col-sm-12 col-lg-9">
            <select class="select2-basic form-control form-control-sm select2-preselected"
                id="landlord_main_menu_selector" name="frontend_data_3"
                data-preselected="<?php echo e($menu->frontend_data_3 ?? 'internal'); ?>">
                <option></option>
                <option value="internal"><?php echo app('translator')->get('lang.internal_page'); ?></option>
                <option value="manual"><?php echo app('translator')->get('lang.manual_link'); ?></option>
            </select>
        </div>
    </div>


    <!--internal link-->
    <div class="landlord-main-menu-types <?php echo e(saasLinkTypeToggle($payload['link_type'], 'internal')); ?>" id="link_type_internal">
        <div class="form-group row">
            <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.page'); ?></label>
            <div class="col-sm-12 col-lg-9">
                <select class="select2-basic form-control form-control-sm select2-preselected" id="link_internal"
                    name="link_internal" data-preselected="<?php echo e($menu->frontend_data_2 ?? '/'); ?>">
                    <option></option>
                    <option value="/"><?php echo app('translator')->get('lang.home'); ?></option>
                    <option value="/pricing"><?php echo app('translator')->get('lang.pricing'); ?></option>
                    <option value="/faq"><?php echo app('translator')->get('lang.faq'); ?></option>
                    <option value="/contact"><?php echo app('translator')->get('lang.contact_us'); ?></option>
                    <option value="/account/login"><?php echo app('translator')->get('lang.log_in'); ?></option>
                    <option value="/account/signup"><?php echo app('translator')->get('lang.sign_up'); ?></option>
                    <?php $__currentLoopData = $internal_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $internal_page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="/page/<?php echo e($internal_page->page_permanent_link); ?>"><?php echo e($internal_page->page_title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </div>


    <!--manual link-->
    <div class="landlord-main-menu-types <?php echo e(saasLinkTypeToggle($payload['link_type'], 'manual')); ?>" id="link_type_manual">
        <div class="form-group row">
            <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.url'); ?></label>
            <div class="col-sm-12 col-lg-9">
                <input type="text" class="form-control form-control-sm" id="link_manual" name="link_manual"
                    value="<?php echo e($menu->frontend_data_2 ?? ''); ?>">
            </div>
        </div>
    </div>

        <!--manual link-->
        <div class="landlord-main-menu-types <?php echo e(saasLinkTypeToggle($payload['link_type'], 'manual')); ?>" id="link_type_manual_target">
            <div class="form-group row">
                <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.target'); ?></label>
                <div class="col-sm-12 col-lg-9">
                    <select class="select2-basic form-control form-control-sm select2-preselected" id="link_target"
                        name="link_target" data-preselected="<?php echo e($menu->frontend_data_6 ?? 'same_window'); ?>">
                        <option></option>
                        <option value="same_window"><?php echo app('translator')->get('lang.same_window'); ?></option>
                        <option value="new_window"><?php echo app('translator')->get('lang.new_window'); ?></option>
                    </select>
                </div>
            </div>
        </div>

</div><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/frontend/mainmenu/modals/add-edit.blade.php ENDPATH**/ ?>