<div class="modal fade" id="confirm_delete_modal" tabindex="-1" role="dialog" aria-labelledby="confirm_delete_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="confirm-delete-form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="modal-header">
                    <h4 class="modal-title">Delete item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Are you sure you want to delete this for ever?</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>