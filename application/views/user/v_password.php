<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header no-gutters">
            <div class="d-md-flex align-items-md-center justify-content-between">                               
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ubah Password</h4>
                </div>
                <div class="card-body">
                    <?php echo form_open('user/change_password');?>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="oldPassword">Password lama:</label>
                                <input type="password" class="form-control" name="old_password" id="oldPassword" placeholder="Old Password">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="newPassword">Password baru:</label>
                                <input type="password" class="form-control" name="new_password" id="newPassword" placeholder="New Password">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="font-weight-semibold" for="confirmPassword">Kofirmasi Password baru:</label>
                                <input type="password" class="form-control" name="confirm_new_password" id="confirmPassword" placeholder="Confirm Password">
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-primary m-t-30">Simpan</button>
                            </div>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Wrapper END -->

