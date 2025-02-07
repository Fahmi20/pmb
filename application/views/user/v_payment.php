<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
<style>
    .hide-ypgs {
        display: none;
    }
</style>
<div class="page-container">

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header no-gutters">
        <div class="d-md-flex align-items-md-center justify-content-between">                               
            <div class="card">
                <div class="card-body">
                    <h4>Pembayaran</h4>
                    <p>Silakan melakukan pembayaran sesuai nominal dan petunjuk dibawah ini,<br>Klik 'Saya sudah membayar' jika sudah melakukan pembayaran</p>
                    <?php foreach ($invoice as $id): ?>               
                    <div class="m-t-25">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title">Total</h4>
                                    </div>
                                    <div class="col-6 mt-3 text-right">
                                        <font color="#3f87f5"><b>Rp <?php echo number_format($id->trx_amount);?></b></font>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <div class="row pb-4">
                                    <div class="col-4">
                                        <img src="<?php echo base_url();?>assets/images/bsi.png" class="img-fluid" width="140px">
                                    </div>
                                    <div class="col-8  border-bottom pb-4">
                                        Bank Syariah Indonesia<br>
                                        <small><i class="anticon anticon-warning"></i> Hanya menerima pembayaran melalui Bank BSI</small>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-4">
                                      
                                    </div>
                                    <div class="col-8">
                                        <label>No Virtual Account</label>
                                        <h3><font color="#3f87f5" id="coba_salin"><?php echo $id->virtual_account;?></font></h3>
                                        <small>Batas pembayaran : <?php echo $id->datetime_expired;?></small><br>
                                        <a href="#" id="copy-button">SALIN</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <button onclick="cek_payment('<?php echo $id->trx_id;?>');" class="btn btn-primary"><span id="check">Saya sudah membayar</span></button>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <div class="accordion" id="accordion-default">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <a data-toggle="collapse" href="#collapseOneDefault">
                                        <span>Petunjuk Transfer ATM</span>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOneDefault" class="collapse" data-parent="#accordion-default">
                                <div class="card-body">
                                    <span>ATM Bank BSI</span><br/>
									<span>> Pilih menu utama</span><br/>
> Pilih Pembayaran/Pembelian<br/>
> Pilih Akademik<br/>
> Masukkan kode STIKES Gunung Sari (3676) dan nomor pembayaran <?php echo $id->virtual_account;?> <br/>
  maka yang diinput adalah 3676<?php echo $id->virtual_account;?><br/>
> Pilih Benar<br/>
> Silahkan periksa nama yang muncul dan nominal yang harus dibayar<br/>
> Tekan benar untuk memproses pembayaran hingga berhasil<br/>
> Selesai<br/>
<br/>
ATM Bersama/Link/Prima/Alto<br/>
> Pilih menu Transfer<br/>
> Pilih tujuan Bank BSI (kode 451)<br/>
  > Masukkan nomor pembayaran, terdiri dari<br/>
  > kode pembayaran : 900<br/>
  > kode STIKES Gunung Sari : 3676<br/>
  > Nomor Pembayaran : <?php echo $id->virtual_account;?><br/>
  maka yang diinput adalah 9007229<?php echo $id->virtual_account;?><br/>
> Masukkan jumlah yang akan di transfer yaitu sebesar <b>Rp <?php echo number_format($id->trx_amount);?></b><br/>
> Selesai<br/>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseTwoDefault">
                                        <span>Petunjuk Transfer Mobile Banking</span>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwoDefault" class="collapse" data-parent="#accordion-default">
                                <div class="card-body">
                                BSI Mobile<br/>
> Pilih menu bayar<br/>
> Pilih Pembayaran Akademik<br/>
> Pilih STIKES Gunung Sari (3676) dan nomor pembayaran <?php echo $id->virtual_account;?> <br/>
  Input nomor pembayaran <?php echo $id->virtual_account;?> <br/>
> Pilih Selanjutnya <br/>
> Masukkan Nominal <b>Rp <?php echo number_format($id->trx_amount);?></b> <br/>
> Pilih Selanjutnya dan masukkan PIN Mobile Banking <br/>
> Silahkan periksa nama yang muncul dan nominal yang harus dibayar<br/>
> Tekan Selanjutnya untuk memproses pembayaran hingga berhasil <br/>
> Selesai<br/>
<br />
Aplikasi Mobile Bank lain<br/>
> Pilih menu Transfer Antar Bank<br/>
> Pilih input baru<br/>
> Masukkan nomor pembayaran, terdiri dari <br/>
  > kode Bank BSI : 451<br/>
  > kode pembayaran : 900<br/>
  > kode STIKES Gunung Sari: 3676<br/>
  > Nomor Pembayaran : <?php echo $id->virtual_account;?><br/>
  maka yang diinput adalah 9003676<?php echo $id->virtual_account;?><br/>
> Silahk konfirmasi data tujuan transfer antar bank, lalu lanjutkan.<br/>
> Selesai<br/>
                                </div>
                            </div>
                        </div>
                        <div class="card hide-ypgs">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseThreeDefault">
                                        <span>Petunjuk Transfer mBanking</span>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThreeDefault" class="collapse" data-parent="#accordion-default">
                                <div class="card-body">
                                    ...
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            

        </div>
    </div>
</div>
<?php echo $this->session->flashdata('notif') ;?>
<!-- Content Wrapper END -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    

<script>
// start salin
$(document).ready(function() {
    $("#copy-button").click(function() {
      var textToCopy = $("#coba_salin").text();
      var tempInput = $("<input>");
      $("body").append(tempInput);
      tempInput.val(textToCopy).select();
      document.execCommand("copy");
      tempInput.remove();
      alert("No. virtual akun berhasil disalin: " + textToCopy);
    });
  });
  // end salin text

function cek_payment(trx_id){
    $.ajax({
        url: "<?php echo base_url();?>user/cek_payment",
        type : 'post',
        data : {trx_id:trx_id},
        cache: false,
        success: function(msg){
         //console.log(msg)
            if(msg == 1){
                window.location.href = "<?php echo base_url();?>user/form";
            }else{
                notif('red', 'Sepertinya Anda Belum Melakukan Pembayaran, Silahkan Membayar Terlebih Dahulu.', 'fa fa-check-circle');
                document.getElementById("check").innerHTML = 'Saya sudah membayar';
            }

        },
        beforeSend: function(msg){
            document.getElementById("check").innerHTML = 'Sedang melakukan pengecekan...';
        },
        error: function(msg){
            notif('red', 'Terjadi kesalah, mohon ulangi', 'fa fa-exclamation-circle');
            document.getElementById("check").innerHTML = 'Saya sudah membayar';
        }
    });
}

function copy_clipboard(va) {
  navigator.clipboard.writeText(va);
  notif('green', 'Virtual Account berhasil di salin', 'fa fa-check-circle');
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

</script>