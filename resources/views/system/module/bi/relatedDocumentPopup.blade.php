<!-- Modal delete folder-->
<div class="modal fade" id="relatedDocumentModal" tabindex="-1" role="dialog" aria-labelledby="relatedDocumentModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="relatedDocumentModal">Chọn tài liệu liên quan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="container">
                        <div class="col sm-12">
                            <form action="">
                                <div class="col-md-12 relatedDocumentIds">
                                    <?php foreach ($AllDocuments as $document):?>
                                    <div class="form-group">
                                        <input type="checkbox"  name="relatedDocumentId[]" class="" value="<?php echo $document->ID?>">
                                        <label class="required control-label" for="relatedDocumentId"><?php echo $document->Name?></label>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-info" id="bi-selectRelatedDocument" data-dismiss="modal">Chọn</button>
            </div>
        </div>
    </div>
</div>