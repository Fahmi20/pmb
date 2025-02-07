<style>
    .hide-ypgs {
        display:none;
    }
    </style>
<div class="page-container">

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header no-gutters">
        <div class="d-md-flex align-items-md-center justify-content-between">
            <div class="media m-v-10 align-items-center">
                <div class="avatar avatar-image avatar-lg">
                    <img src="<?php echo base_url();?>assets/images/logo/no-profile.png" alt="">
                </div>
                <div class="media-body m-l-15">
                    <h4 class="m-b-0">Selamat Datang, <?php echo $this->m_user->get_name($this->session->userdata('email'));?></h4>
                    <span class="text-gray"><?php echo $this->session->userdata('email');?></span>
                </div>
            </div>
            <div class="d-md-flex align-items-center">
                <div class="media align-items-center m-v-5">
                    <div class="d-flex align-items-center m-l-10">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#beliFormulir">Beli Formulir &nbsp;&nbsp;<i class="anticon anticon-right"></i></a>
                    </div>
                </div>
            </div>

           
        </div>

        
    </div>

    <div class="row">
                <div class="col-md-8"><br>
                <!-- <img src="<?php echo base_url();?>assets/images/bismillah.png" class="img-fluid" width="168px"><br><br>
                <i>Assalamualaikum warahmatullahi wabarakatuh</i><br><br> -->

	            <!-- Kami selaku pengelola Sekolah Islam AR-RAAFI mengucapkan terima kasih Ayah / Bunda yang akan mempercayakan
                Sekolah Islam AR-RAAFI sebagai tempat Putra/putri nya mengenyam pendidikan. Insyaallah amanah dan tugas yang diberikan
                kepada kami untuk memberikan pendidikan terbaik kepada Ananda dapat menjadi kebanggaan kita semua dan Agamanya.<br><br> -->
                Selamat Datang, Salam Sejahtera.<br><br>
                KETUA STIKES<br><br>
                <img src="<?php echo base_url();?>assets/images/ttd_ketua_stikes.jpg" class="img-fluid" width="148px"><br><br>
                <b>Dr.Syaiful Bachri, SE, MM, M.Kes</b>


                </div>
            </div>

</div>

<!-- Content Wrapper END -->



<div class="modal fade" id="beliFormulir">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembelian Formulir</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('user/buy_form');?>
                <div class="row">
                    <?php $dep = $this->m_user->get_name_departemen();?>
                    <div class="col-md-12">
                        <label>Pilih Departemen</label>
                        <div class="m-b-15">
                            <select class="select2" name="departemen">
                                <?php
                                    foreach ($dep as $ds) {
                                        echo '<option value="'.$ds->replid.'">'.$ds->departemen.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 hide-ypgs">
                        <label>Masukan Jumlah Formulir</label>
                        <div class="m-b-15">
                            <select class="select2" name="jml_form">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
                <button type="submit" class="btn btn-primary" onClick="this.form.submit(); this.disabled=true; this.value='Sending…';">Lanjut Ke Pembayaran</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>