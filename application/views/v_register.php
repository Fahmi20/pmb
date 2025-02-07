<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Yayasan Pendidikan Gunung Sari</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo/ypgs2.png">

    <!-- page css -->

    <!-- Core css -->
    <link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
</head>

<body>
    <div class="app">
        <div class="container-fluid p-0 ">
            <div class="row no-gutters full-height  justify-content-md-center">
               
                <div class="col-lg-8 bg-white">
                    <div class="container mt-4">
                        <div class="row no-gutters h-100 align-items-center">
                            <div class="col-md-8 col-lg-7 col-xl-6 mx-auto">
                            <img class=" mb-4" src="<?php echo base_url();?>assets/images/logo/ypgs.png" width="230px" alt="Logo">
                                <h2>Membuat Akun</h2>
                                <p class="m-b-30">Silakan membuat akun terlebih dahulu untuk melakukan pembelian formulir.</p>
                                
                                <?php
                                    $length = 18;
                                    $randomString = substr(str_shuffle("01234567891234567890"), 0, $length);
                                    echo form_open('register/process?rdm='.$randomString); ?>
                        <div class="card">
                        <div class="card-body">
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="userName">Nama</label>
                                        <div class="input-affix">
                                            <input type="text" class="form-control" required name="nama_user"  id="userName" placeholder="Nama anda">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="userName">Email</label>
                                        <div class="input-affix">
                                            <input type="email" class="form-control" required name="email"  id="userName" placeholder="Email anda">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="userName">Nomor Hp/Whatsapp</label>
                                        <div class="input-affix">
                                            <input type="number" class="form-control" required name="phone"  id="userName" placeholder="Nomer Hp anda">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">Password:</label>
                                        <div class="input-affix m-b-10">
                                            <input type="password" name="password"  required class="form-control" id="password" placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">OTP Via:</label>
                                        <div class="input-affix m-b-10">
                                            <select class="form-control" name="otp_via">
                                                <option value="wa">Via Whatsapp</option>
                                                <!--<option value="sms">Via SMS</option>-->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="font-size-13 text-muted">
                                                Sudah memiliki akun? 
                                                <a class="" href="<?php echo base_url();?>login"> Login</a>
                                            </span>
                                            <button type="submit" data-toggle="modal" data-target="#exampleModal"class="btn btn-primary">Daftar</button>
                                            <!-- <button type="button" onclick="onsub();" class="btn btn-primary">Daftar</button> -->
                                        </div>
                                    </div>
                        <?php echo form_close();?>
                            </div>
                        </div>  
                    </div>
                    </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden"> </span> 
                </div>
                <br><br><small>Mohon menunggu, kami akan mengirimkan kode OTP ke nomor anda.</small>
            </div>
        </div>
    </div>
</div>
    
    <?php echo $this->session->flashdata('notif') ;?>

    <script>
        function onsub(){
            // $('#exampleModal').modal();
            $('#exampleModal').modal('show');
        }
    </script>
  

    <script src="assets/js/vendors.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>    
    <script src="assets/js/app.min.js"></script>
   
    
</body>

</html>