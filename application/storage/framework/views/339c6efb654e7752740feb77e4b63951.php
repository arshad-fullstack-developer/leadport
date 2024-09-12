<!--item-->
<form id="document-editor-wrapper">
    <div class="form-group row">
        <div class="col-12">
            <textarea class="form-control form-control-sm tinymce-document-textarea" rows="5" name="doc_body"
                id="doc_body"><?php echo e($document->doc_body ?? ''); ?></textarea>
        </div>
    </div>

    <!--document type-->
    <input type="hidden" name="doc_type" value="<?php echo e($document->doc_type); ?>">


    <!--contract signatures-->
    <?php if($document->doc_type == 'contract'): ?>
    <div id="doc-signatures-container">
        <?php echo $__env->make('pages.documents.elements.signatures-contracts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php endif; ?>

    <!--form buttons-->
    <div class="text-right p-t-30">
        <?php if($document->doc_type == 'proposal'): ?>
        <a type="button" class="btn btn-secondary btn-sm waves-effect text-left"
            href="<?php echo e(url('/proposals/'.$document->doc_id)); ?>"><?php echo app('translator')->get('lang.exit_editing_mode'); ?></a>
        <?php endif; ?>
        <?php if($document->doc_type == 'contract'): ?>
        <!--more button (team)-->
        <!--#/more button-->
        <a type="button" class="btn btn-secondary btn-sm waves-effect text-left"
            href="<?php echo e(url('/contracts/'.$document->doc_id)); ?>"><?php echo app('translator')->get('lang.exit_editing_mode'); ?></a>
        <?php endif; ?>
        <button type="submit" id="submitButton" class="btn btn-danger btn-sm waves-effect text-left ajax-request"
            data-url="<?php echo e(url('/documents/'.$document->doc_id.'/update/body')); ?>" data-loading-target=""
            data-ajax-type="POST" data-button-loading-annimation="yes"
            data-on-start-submit-button="disable"><?php echo app('translator')->get('lang.save_changes'); ?></button>
    </div>
</form><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/documents/elements/doc-editor.blade.php ENDPATH**/ ?>