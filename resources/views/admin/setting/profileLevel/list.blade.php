<div class="tab-content p-3 text-muted">
    <div class="tab-pane active" id="profileLevel" role="tabpanel">
        <table id="profileLevelList" class="table table-bordered dt-responsive nowrap"
        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>Profile Level Name</th>
                <th>Profile Level Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>        
    </table>
    </div>
</div>
{{-- add profile modal  --}}
<div class="modal fade bs-example-modal-center" tabindex="-1" role="modal" aria-labelledby="AddProfileLevelModal" aria-hidden="true" id="AddProfileLevelModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Add Profile Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="add_profile_form">
                    <label>Profile Name</label>
                    <div class="form-group">
                        <input type="text" placeholder="Profile Level Name" class="form-control" name="profile_name"
                            id="profile_name">
                    </div>
                    <label>Description</label>
                    <div class="form-group">
                        <input type="text" placeholder="Profile Level Description" class="form-control" name="profile_desc"
                            id="profile_desc">
                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-secondary " data-dismiss="modal" value="close">
                        <input type="submit" class="btn btn-primary " value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

 {{-- //profile edit modal --}}
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="profileEditModal" aria-hidden="true" id="profileEditModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Profile Level Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="edit_profile_form">
                    <label>Profile Name</label>
                    <div class="form-group">
                        <input type="text" placeholder="Profile Level Name" class="form-control" name="profile_name"
                            id="e_pl_name">
                    </div>
                    <label>Description</label>
                    <div class="form-group">
                        <input type="text" placeholder="Profile Level Description" class="form-control" name="profile_desc"
                            id="e_pl_desc">
                            <input type="hidden" class="form-control" name="profile_slug" id="e_pl_slug"> 
                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-secondary " data-dismiss="modal" value="close">
                        <input type="submit" class="btn btn-primary " value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>