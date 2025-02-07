<link rel="stylesheet" href="<?php echo base_url();?>assets/css/form.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
<style>

/* Style the form */
#regForm {
  background-color: #ffffff;
  margin: 10px auto;
  padding: 40px;
  width: 70%;
  min-width: 100%;
}

.tombol {
  display:none;
}

span.wajib {
    color: red;
}

/* Style the input fields */
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}

</style>
<div class="page-container">
  <?php
    foreach ($siswa as $sd):
        if($sd->AplikanID != 0){
            //$dep = $this->m_user->get_prodi_by_idproses();
              $pta = $this->m_user->get_pendidikanortu_by_idproses(); // Combo, Pendidikan Terakhir
            //$sumberinfo = $this->m_user->get_sumber_by_idproses();
            $dep        = $sd->ProdiID;
            $sumberinfo = $sd->SumberInformasi;
            $programnama  = $sd->ProgramID;
        }
  ?>
  

	    <div class="main-content">

              <form id="regForm" action="" style="background-color:#f0f7ff;padding:15px;border-radius:8px" method="post" enctype="multipart/form-data">
                <h1 class="text-center" style="color:#007bff;font-size:20px"><b>Formulir Pendaftaran</b></h1>	
              
                  <div class="tab">
                  <h3>Data Penerimaan Calon Mahasiswa</h3>
                            <div class="multisteps-form__content">  
                    
                    <div class="row">
                                
                      <div class="form-group col-md-12">
                        
                        <div class="row mb-2">
                          <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="oldPassword">Program Studi:</label>
                            <select class="select_prodi form-control" id="prodi" name="prodiID">
                              <?php foreach ($prodi as $dd) {									
                                if($dd->ProdiID == $dep){
                                  echo '<option value="'.$dd->ProdiID.'" selected>'.$dd->ProdiID.'</option>';
                                }else{
                                  echo '<option value="'.$dd->ProdiID.'">'.$dd->ProdiID.'</option>';
                                  
                                }
                              }?>                                    
                            </select>
                          </div> 
                          
                          <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="oldPassword">Program</label>
                            <select class="select_program form-control" id="programid" name="programID">
                              <?php foreach ($program as $dd) {									
                                if($dd->ProgramID == $programnama){
                                  echo '<option value="'.$dd->ProgramID.'" selected>'.$dd->Nama.'</option>';
                                }else{
                                  echo '<option value="'.$dd->ProgramID.'">'.$dd->Nama.'</option>';
                                  
                                }
                              }?>                                    
                            </select>
                          </div> 


                        </div>
                      </div>

                
                      
                    </div>
                      
                      <div class="row">
                                
                        <div class="form-group col-md-4">
                          <label class="font-weight-semibold">Nama sesuai KTP:</label>                                
                          <input type="text" class="form-control" id="namamhsw" name="Nama" value="<?php echo $sd->Nama;?>" required />
                          <span class="wajib"><i>Wajib diisi*</i></span>
                        </div>
                        <div class="form-group col-md-8">
                          <label class="font-weight-semibold">Alamat:</label>                                
                          <input type="text" class="form-control" id="alamatmhsw" name="Alamat" value="<?php echo $sd->Alamat;?>" required />
                          <span class="wajib"><i>Wajib diisi*</i></span>
                        </div>

                      </div>

                      <div class="row">
                                
                        <div class="form-group col-md-4">
                          <label class="font-weight-semibold">Tempat Lahir:</label>                                
                          <input type="text" class="form-control" id="TempatLahir" name="TempatLahir" value="<?php echo $sd->TempatLahir;?>" required />
                          <span class="wajib"><i>Wajib diisi*</i></span>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="font-weight-semibold">Tanggal Lahir:</label>                                
                          <input type="date" class="form-control" id="TanggalLahir" name="TanggalLahir" value="<?php echo $sd->TanggalLahir;?>" required />
                          <span class="wajib"><i>Wajib diisi*</i></span>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="font-weight-semibold">Jenis Kelamin</label>                                
                          <select class="select_kelamin form-control" id="Kelamin" name="Kelamin">
                            <?php foreach ($kelamin as $ee) {
                                echo '<option value="'.$ee->Kelamin.'">'.$ee->Nama.'</option>';
                             
                             
                            }?>                                    
                          </select>
                        </div>

                      </div>
                      
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="font-weight-semibold">No. KTP (dikosongkan jika belum ada):</label>                                
                          <input type="text" class="form-control" id="ktpmhsw" name="NomorKTP" value="<?php echo $sd->NomorKTP;?>">
                        </div>
						
						<div class="form-group col-md-4">
                          <label class="font-weight-semibold">Foto KTP:</label>                                
                          <input type="file" name="foto-ktp" accept=".jpg, .jpeg">
						  <span class="wajib"><i>Wajib diisi*</i></span>
                        </div>
						
                        <div class="form-group col-md-4">
                          <label class="font-weight-semibold">No. KK:</label>                                
                          <input type="text" class="form-control" id="kkmhsw" name="NomorKK" value="<?php echo $sd->NomorKK;?>" >
                        </div>
                       <div class="form-group col-md-4">
                          <label class="font-weight-semibold">No. Ponsel (HP):</label>                                
                          <input type="text" class="form-control" id="hpmhsw" name="Handphone" value="<?php echo $sd->Handphone;?>" required />
                          <span class="wajib"><i>Wajib diisi*</i></span>
                        </div>
						<div class="form-group col-md-4">
                          <label class="font-weight-semibold">Foto Ijazah/ Surat Keterangan Lulus / Raport </label>                                
                          <input type="file" name="foto-ijazah" accept=".jpg, .jpeg">
						  <span class="wajib"><i>Wajib diisi*</i></span>
                        </div>
                      </div>
                      
                                    
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="font-weight-semibold" for="oldPassword">Mengetahui kami dari mana:</label>
                          <select class="select_sumber form-control" id="sumber" name="SumberInformasi">
                            <?php foreach ($sumber as $ee) {									
                              if($ee->InfoID == $sumberinfo){
                                echo '<option value="'.$ee->InfoID.'" selected>'.$ee->Nama.'</option>';
                              }else{
                                echo '<option value="'.$ee->InfoID.'">'.$ee->Nama.'</option>';
                              }
                            }?>                                    
                          </select>
                        </div>
                        <div class="form-group col-md-8">
                          <label class="font-weight-semibold">Tulis Nama&No.HP jika ada yang mereferensikan (Presenter) </label>                                
                          <input type="text" class="form-control" id="CatatanPresenter" name="CatatanPresenter" value="<?php echo $sd->CatatanPresenter;?>">
                        </div>						
                      </div>
                  
                      <div class="row">
                        <div class="button-row d-flex mt-8">
                          
                        </div> 
                      </div>	
                    </div>
                  </div> <!-- Tutup Tap -->

                  <div class="tab step2">
                    <div class="multisteps-form__content">
                      <h4>Pendidikan Terakhir</h4>
                            
                      <div class="row">    
                        
                        <hr>
                        <div class="form-group col-md-4">
                          <label class="font-weight-semibold">Nama Sekolah:</label>                                
                          <input type="text" class="form-control" id="AsalSekolah" name="AsalSekolah" value="<?php echo $sd->AsalSekolah;?>" required />
                          <span class="wajib"><i>Wajib diisi*</i></span>
                        </div>
                        <div class="form-group col-md-8">
                          <label class="font-weight-semibold">Tahun Lulus:</label>                                
                          <input type="text" class="form-control" id="TahunLulus" name="TahunLulus" value="<?php echo $sd->TahunLulus;?>" required />
                          <span class="wajib"><i>Wajib diisi*</i></span>
                        </div>
					<div class="form-group col-md-4">
                          <label class="font-weight-semibold">NISN (Nomor Induk Siswa Nasional):</label>                                
                          <input type="text" class="form-control" id="PropinsiAsal" name="PropinsiAsal" value="<?php echo $sd->PropinsiAsal;?>" required />
                          <span class="wajib"><i>Wajib diisi*</i></span>
                        </div>
                        <div class="form-group col-md-8">
                          <label class="font-weight-semibold">NPSN(Nomor Pokok Sekolah Nasional):</label>                                
                          <input type="text" class="form-control" id="NegaraAsal" name="NegaraAsal" value="<?php echo $sd->NegaraAsal;?>" required />
                          <span class="wajib"><i>Wajib diisi*</i></span>
                        </div>

                      </div>
                      <h4>Data Orang Tua/Wali</h4>
                      <div class="row">    
                        
                        <hr>
                        <div class="form-group col-md-4">
                          <label class="font-weight-semibold">Nama Ibu Kandung:</label>                                
                          <input type="text" class="form-control" id="namaibu" name="NamaIbu" value="<?php echo $sd->NamaIbu;?>" required />
                          <span class="wajib"><i>Wajib diisi*</i></span>
                        </div>
                          <div class="form-group col-md-8">
                          
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="font-weight-semibold">Nama Ayah/Wali:</label>                                
                          <input type="text" class="form-control" id="namaayah" name="NamaAyah" value="<?php echo $sd->NamaAyah;?>" required />
                          <span class="wajib"><i>Wajib diisi*</i></span>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="font-weight-semibold">Pendidikan Terakhir:</label>                                
                          <select class="select_pendidikanayah form-control" id="pendidikanayah" name="PendidikanAyah">
                                <?php foreach ($pendidikanortu as $dd) {									
                                  if($dd->Pendidikan == $sd->PendidikanAyah){
                                    echo '<option value="'.$dd->Pendidikan.'" selected>'.$dd->Nama.'</option>';
                                  }else{
                                    echo '<option value="'.$dd->Pendidikan.'">'.$dd->Nama.'</option>';	
                                  }
                                }?>                                    
                              </select> 
                        </div>
                        <div class="form-group col-md-4">
                          <label class="font-weight-semibold">Pekerjaan:</label>                                
                          <input type="text" class="form-control" id="PekerjaanAyah" name="PekerjaanAyah" value="<?php echo $sd->PekerjaanAyah;?>">
                        </div>
                        <div class="form-group col-md-4">
                          <label class="font-weight-semibold">No.Ponsel Orangtua:</label>                                
                          <input type="text" class="form-control" id="HandphoneOrtu" name="HandphoneOrtu" value="<?php echo $sd->HandphoneOrtu;?>">
                        </div>
						
                        <input type="hidden" class="form-control" id="form_submit" name="form_submit" value="1">
                      </div>
                    </div>
                  </div>
            
            


                  <div style="overflow:auto;">
                    <div style="float:right;">
                    
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-primary ml-auto">Sebelumnya </button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary ml-auto">Selanjutnya <i class="anticon anticon-arrow-right"></i></button>
               
                    </div>
                  </div>

                  <!-- Circles which indicates the steps of the form: -->
                  <div style="text-align:center;margin-top:40px;">
                    Data Pribadi<span class="step"></span>
                    Data Sekolah<span class="step"></span>
                  </div>

              </form>				
                    
	          </div>	
          </div>
            <!--single form panel-->
       
  

      
  <?php endforeach;?>

<!-- Modal 
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Submit Formulir</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                

                <div class="alert alert-success" >
                    <h4 class="alert-heading">Apakah data sudah benar?</h4>
                    <p class="m-b-0">Mohon periksa kembali data-data anda, jika sudah benar silakan klik Lanjutkan untuk melakukan pendaftaran.</p>
                    <hr class="m-v-20">
                    <p class="m-b-0">Setalah melakukan submit data tidak bisa diubah kembali, silakan hubungi kontak person jika akan melakukan perubahan data.</p>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Ingin periksa ulang</button>
                <a href="<?php echo base_url();?>user/verify_form/<?php echo $this->uri->segment('3');?>" class="btn btn-danger">Ya, Lanjutkan</a>
            </div>
        </div>
    </div>
</div> -->

<!-- Content Wrapper END -->

<!-- <script src="<?php echo base_url();?>assets/js/form.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>



<script>
  //Validasi Kolom Teks Yang Wajib Isi.
  $(document).ready(function() {
        var namaInput = $("#namamhsw");
        var alamatInput = $("#alamatmhsw");
        var TempatLahir = $("#TempatLahir");
        var TanggalLahir = $("#TanggalLahir");
        
        $("#nextBtn").click(function(event) {
            if (namaInput.val() === "" || alamatInput.val() === "" || TempatLahir.val() === "" || TanggalLahir.val() === "") {
                event.preventDefault(); // Menghentikan pengiriman form
                
                alert("Nama, alamat, tempat lahir, tanggal lahir harus diisi!");
                location.reload(); // Melakukan reload halaman
            }
        });


        // Mengecek apakah semua input terisi
    function checkInputs() {
        var asalSekolah = $('#AsalSekolah').val();
		var propinsiasal = $('#PropinsiAsal').val(); //CREATED BY FAHMI 
        var negaraasal = $('#NegaraAsal').val(); //CREATED BY FAHMI
        var tahunLulus = $('#TahunLulus').val();
        var namaIbu = $('#namaibu').val();
        var namaAyah = $('#namaayah').val();

        if (asalSekolah !== '' && tahunLulus !== '' && namaIbu !== '' && propinsiasal !== '' && negaraasal !== '' && namaAyah !== '') {
            $('.tombol').show(); // Menampilkan tombol dengan class "tombol"
        } else {
            $('.tombol').hide(); // Menyembunyikan tombol dengan class "tombol"
        }
    }

    // Panggil fungsi checkInputs saat input berubah
    $('#AsalSekolah, #TahunLulus, #namaibu,#PropinsiAsal,#NegaraAsal, #namaayah').on('input', function() {
        checkInputs();
    });
    });





var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function simpanmi(){

  var data = JSON.stringify( $('#regForm').serializeArray());

     
        var aplikanid = "<?php echo $this->uri->segment('3');?>";
		
		console.log(namamhsw + 'asal sekolah : ' + sumber + 'Tahun Lulus : ' + kkmhsw);
		//return false;
//,prodi:prodi,namamhsw:namamhsw,alamatmhsw:alamatmhsw,ktpmhsw:ktpmhsw,kkmhsw:kkmhsw,hpmhsw:hpmhsw,sumber:sumber,CatatanPresenter:CatatanPresenter,TahunLulus:TahunLulus
        $.ajax({
            url: "<?php echo base_url();?>JsUser/saveaplikandata",
            type : "POST",
            data : {data:data,aplikanid:aplikanid},
            cache: false,
            success: function(msg){
                notif('61de00', 'Perubahan berhasil disimpan', 'fa fa-check-circle');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            beforeSend: function(){
                notif('FFC300', 'Menyimpan perubahan...', 'fa fa-spinner');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            error: function(msg){
                notif('de0000', 'Gagal disimpan', 'fa fa-times-circle');
            }
        });
				
				//return false;
	console.log("Aman Input");
	//alert("Aman");
}

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
    document.getElementById("nextBtn").classList.add("tombol"); // Tambahkan class "tombol"
    document.getElementById("nextBtn").setAttribute("type", "submit"); // Ubah type menjadi "submit"
  } else {
    document.getElementById("nextBtn").innerHTML = "Selanjutnya";
    document.getElementById("nextBtn").classList.remove("tombol"); // Hapus class "tombol"
    document.getElementById("nextBtn").setAttribute("type", "button"); // Ubah type menjadi "button"
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n);
}


function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  //if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    //document.getElementById("regForm").submit();
	simpanmi();
  var aplikanid = "<?php echo $this->uri->segment('3');?>";
  //redirect("user/cetak_pdf/".$aplikanid, 'refresh');
  window.location.replace("<?php echo base_url();?>user/data/?id="+aplikanid);
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}




    function save_aplikan(){
        var prodi = document.getElementById("prodi").value;
        var sumber = document.getElementById("sumber").value;
        
        var aplikanid = "<?php echo $this->uri->segment('3');?>";

        $.ajax({
            url: "<?php echo base_url();?>JsUser/save_aplikan",
            type : 'post',
            data : {data:data, aplikanid:aplikanid},
            cache: false,
            success: function(msg){
                notif('61de00', 'Perubahan berhasil disimpan', 'fa fa-check-circle');
            },
            beforeSend: function(){
                notif('FFC300', 'Menyimpan perubahan...', 'fa fa-spinner');
            },
            error: function(msg){
                notif('de0000', 'Gagal disimpan', 'fa fa-times-circle');
            }
        });

    }


    function save_data_wali(){   
        var data = JSON.stringify( $('#data_wali').serializeArray());
        var replid = "<?php echo $this->uri->segment('3');?>";
        
        $.ajax({
            url: "<?php echo base_url();?>JsUser/save_data_wali",
            type : 'post',
            data : {data:data, replid:replid},
            cache: false,
            success: function(msg){
                notif('61de00', 'Perubahan berhasil disimpan', 'fa fa-check-circle');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            beforeSend: function(msg){
                notif('FFC300', 'Menyimpan perubahan...', 'fa fa-spinner');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            error: function(msg){
                notif('de0000', 'Gagal disimpan', 'fa fa-circle-exclamation');

            }
        });
    }

    function save_data_pribadi(){

        if ($("#data_pribadi")[0].checkValidity()){
            
            var data = JSON.stringify( $('#data_pribadi').serializeArray());
                var replid = "<?php echo $this->uri->segment('3');?>";
                
                $.ajax({
                    url: "<?php echo base_url();?>JsUser/save_data_pribadi",
                    type : 'post',
                    data : {data:data, replid:replid},
                    cache: false,
                    success: function(msg){
                        notif('61de00', 'Perubahan berhasil disimpan', 'fa fa-check-circle');
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    },
                    beforeSend: function(msg){
                        notif('FFC300', 'Menyimpan perubahan...', 'fa fa-spinner');
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    },
                    error: function(msg){
                        notif('de0000', 'Gagal disimpan'+msg, 'fa fa-times-circle');
                    }
                });
                
        }else{
            notif('de0000', 'Data belum lengkap, silakan kembali ke halaman seblumnya', 'fa fa-times-circle');
            $("#data_pribadi")[0].reportValidity()
        }

       
    }

    
    function save_sekolah(){
        var asalsekolah = document.getElementById("asalsekolah").value;
		var propinsiasal = document.getElementById("propinsiasal").value; //CREATED BY FAHMI
        var negaraasal = document.getElementById("negaraasal").value; //CREATED BY FAHMI
        var noijasah = document.getElementById("noijasah").value;
        var tglijasah = document.getElementById("tglijasah").value;
        var ketsekolah = document.getElementById("ketsekolah").value;
        var darah = document.getElementById("darah").value;
        
        var replid = "<?php echo $this->uri->segment('3');?>";

        $.ajax({
            url: "<?php echo base_url();?>JsUser/save_sekolah", //CREATED BY FAHMI
            type : 'post',
            data : {replid:replid,asalsekolah:asalsekolah,propinsiasal:propinsiasal,negaraasal:negaraasal,noijasah:noijasah,tglijasah:tglijasah,ketsekolah:ketsekolah, darah:darah, berat:berat, tinggi:tinggi, kesehatan:kesehatan},
            cache: false,
            success: function(msg){
                notif('61de00', 'Perubahan berhasil disimpan', 'fa fa-check-circle');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            beforeSend: function(){
                notif('FFC300', 'Menyimpan perubahan...', 'fa fa-spinner');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            error: function(msg){
                notif('de0000', 'Gagal disimpan', 'fa fa-times-circle');
            }
        });

    }


   d = function(){
        document.getElementById("btn_penerimaan").disabled = true; 
        
        select_prodi(document.getElementById("prodi").value);
        select_program(document.getElementById("program").value);
        select_sumber(document.getElementById("sumber").value);
    };


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
                    background: '#'+color,
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