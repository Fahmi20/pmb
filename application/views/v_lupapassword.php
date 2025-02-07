<!-- application/views/forgot_password.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lupa Password</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo/ypgs2.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <!-- Core css -->
    <link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet">
</head>
<body> 
<center><img class="mt-4 mb-4" src="<?php echo base_url();?>logo_stikes.png" style="width:150px" alt="Logo">
<h3>Layanan Pendaftaran mandiri mahasiswa Baru<br>STIKES GUNUNG SARI</h3></center>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title">Lupa Password</h5>
					<label>Mohon Masukkan Email Anda untuk mengirim link Reset Password</label>

                    <?php echo form_open('login/lupapassword'); ?>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>

                        <!-- Button group for Reset Password and Kembali -->
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                            <a href="<?php echo base_url();?>" class="btn btn-secondary ml-2">Kembali</a>
                        </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- Initialize Notyf -->
    <script>
        var notyf = new Notyf();

        <?php if ($this->session->flashdata('success_msg')): ?>
            notyf.success("<?php echo $this->session->flashdata('success_msg'); ?>");
        <?php endif; ?>

        <?php if ($this->session->flashdata('error_msg')): ?>
            notyf.error("<?php echo $this->session->flashdata('error_msg'); ?>");
        <?php endif; ?>
    </script>
</body>
</html>
