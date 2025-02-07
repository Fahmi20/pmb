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

    <style>



.inputs input {
    width: 50px;
    height: 40px
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0
}


.form-control:focus {
    box-shadow: none;
    border: 2px solid red
}


</style>
</head>

<body>
    <div class="app">
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters h-100 full-height  justify-content-md-center">               
                <div class="col-lg-6 bg-white">
                    <div class="container h-100">
                        <div class="row no-gutters h-50 align-items-center">
                            <div class="col-md-8 col-lg-7 col-xl-6 mx-auto text-center">
                            <a href="<?php echo base_url();?>"><img class="mt-4 mb-4" src="<?php echo base_url();?>assets/images/logo/ypgs.png" width="230px" alt="Logo"></a>
                            <?php
                                    foreach ($user as $ud) {
                                        $nomor = $ud->phone;
                                        $idmd5 = $ud->idmd5;
                                    }   
                                ?>

                                <h4>Masukan kode OTP</h5>
                                <small>Kami telah mengirimkan kode OTP ke nomor <?php echo $nomor;?></small><br><br>
                     
                              <?php echo form_open('register/cek_otp');?>

                                    <div class=" justify-content-center align-items-center">
                                        <div class="position-relative">
                                            <div class="card p-1 text-center">
                                                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                                    <input class="m-2 text-center form-control rounded" autofocus type="text" name="first" id="first" maxlength="1" />
                                                    <input class="m-2 text-center form-control rounded" type="text" name="second" id="second" maxlength="1" />
                                                    <input class="m-2 text-center form-control rounded" type="text" name="third" id="third" maxlength="1" />
                                                    <input class="m-2 text-center form-control rounded" type="text" name="fourth" id="fourth" maxlength="1" />
                                                    <input type="hidden" name="id" value="<?php echo $idmd5;?>">
                                                </div>
                                                <div class="mt-4 mb-4">
                                                    <button type="submit" class="btn btn-primary px-4 validate">Verifikasi</button>
                                                </div>
                                            </div>
                                            <div class="card-2">
                                                <div class="content d-flex justify-content-center align-items-center"> <span>Tidak mendapatkan kode? &nbsp;</span>
                                                <div id="countdown"></div> <a href="javascript:void(0)" id="resend" onclick="resend_otp('<?php echo $idmd5;?>');" class="text-decoration-none ms-3">Kirim Ulang</a> </div>
                                            </div>
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
    
    <?php echo $this->session->flashdata('notif') ;?>
    
    <script src="assets/js/vendors.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    
    <script>

        var timeleft = 60;
        var downloadTimer = setInterval(function(){
        if(timeleft <= 0){
            clearInterval(downloadTimer);
            document.getElementById("resend").style.display = "block"; 
            document.getElementById("countdown").style.display = "none"; 
        } else {
            document.getElementById("resend").style.display = "none"; 
            document.getElementById("countdown").innerHTML = timeleft + " seconds remaining";
        }

        timeleft -= 1;
        }, 1000);

        function resend_otp(id){
            
            $.ajax({
                url: "<?php echo base_url();?>register/resend_otp",
                type : 'post',
                data : {id:id},
                cache: false,
                success: function(msg){
                    if(msg == 1){
                        notif('green', 'kode OTP berhasil dikirim', 'fa fa-check-circle');                       
                    }else{
                        notif('red', 'Maaf kode OTP gagal dikirim, silakan coba lagi', 'fa fa-check-circle');
                    }

                },
                beforeSend: function(msg){

                },
                error: function(){
                    notif('red', 'Gagal', 'fa fa-exclamation-circle');
                }
            });
        }

        function notif(color, msg, icon){

            const notyf = new Notyf({
                duration: 6000,
                position: {
                    x: 'right',
                    y: 'top',
                },
                types: [
                    {
                        type: 'info',
                        background: color,
                        icon: {
                            className: icon,
                            tagName: 'span',
                            color: '#fff'
                        },
                        dismissible: false
                    }
                ]
            });

            notyf.open({
                type: 'info',
                message: msg
            });

        }

        document.addEventListener("DOMContentLoaded", function(event) {

        function OTPInput() {
        const inputs = document.querySelectorAll('#otp > *[id]');
        for (let i = 0; i < inputs.length; i++) { inputs[i].addEventListener('keydown', function(event) { if (event.key==="Backspace" ) { inputs[i].value='' ; if (i !==0) inputs[i - 1].focus(); } else { if (i===inputs.length - 1 && inputs[i].value !=='' ) { return true; } else if (event.keyCode> 47 && event.keyCode < 58) { inputs[i].value=event.key; if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } else if (event.keyCode> 64 && event.keyCode < 91) { inputs[i].value=String.fromCharCode(event.keyCode); if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } } }); } } OTPInput(); });

    </script>

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>