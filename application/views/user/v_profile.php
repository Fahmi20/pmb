<div class="page-container">

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header no-gutters">
        <div class="d-md-flex align-items-md-center justify-content-between">                               
            <div class="card">
                <div class="card-body">
                    <?php foreach ($profile as $pd): ?>
                    <h4>Profil Saya</h4>

                    <div class="row mt-4">
                        <div class="col-12">
                            <label>Nama</label><br>
                            <h5><?php echo $pd->nama_user;?></h5>
                        </div>

                        <div class="col-12 mt-3">
                            <label>Email</label>
                            <h5><?php echo $pd->email;?></h5>
                        </div>

                        <div class="col-12 mt-3">
                            <label>Hp</label><br>
                            <h5><?php echo $pd->phone;?></h5>
                        </div>

                        <div class="col-12 mt-3">
                            <label>Tanggal daftar</label><br>
                            <h5><?php echo $pd->datetime_register;?></h5>
                        </div>

                        <div class="col-12 mt-3">
                            <label>Terakhir login</label><br>
                            <h5><?php echo $pd->last_login;?></h5>
                        </div>

                      <?php endforeach;?>
                    </div>
                 
                </div>
            </div>

            

        </div>
    </div>
</div>

<!-- Content Wrapper END -->

