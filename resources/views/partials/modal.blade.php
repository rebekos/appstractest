<div class="modal fade" id="regjectedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class='fa fa-exclamation-triangle'></i> {{__('dashboard.Confirmation')}}
                </h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <form method="post" action="" class="form-inline">

                    <input type="hidden" name="id" class="abir_id" value="0">
                    <input type="hidden" name="status" value="REJECTED">
                    <input type="hidden" name="doc" class="doc">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>

                    </button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> sssss
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>