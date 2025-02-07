<div class="page-container">

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header no-gutters">
        <div class="d-md-flex align-items-md-center justify-content-between">
            <div class="row">
                <?php foreach ($siswa as $sd):?>

                    
                    <div class="col-md-6 mt-3">

                        <div class="m-r-15 font-size-30">
                            <i class="anticon anticon-file-pdf text-warning"></i>
                        </div>
                        <div>
                            <h6 class="mb-0"><?php echo $sd->nopendaftaran;?></h6>
                            <span class="font-size-13 text-muted"><?php echo $this->session->userdata('email');?></span>
                        </div>
                
                    </div>

                    <div class="col-md-6 mt-3 text-right pt-2">

                        <a target="blank" href="<?php echo base_url();?>user/form_pdf/<?php echo $sd->replid;?>" class="btn btn-success btn-lg"><i class="anticon anticon-download"></i> DOWNLOAD PDF</a>
                    </div>

                    <div class="col-md-12 mt-3">
                        <font color="3f87f5"><b>1. Data Penerimaan Calon Mahasiswa</b></font><br>
                            <div class="table-responsive mt-2 ml-2">
                                <table class="table  table-sm table-borderless">
                                    <tr>
                                        <td style="width: 35%">Program Studi</td>
                                        <td>: &nbsp; <?php echo $sd->prodi;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Penerimaan</td>
                                        <td>: &nbsp; <?php echo $sd->proses;?></td>
                                    </tr>

                                    
                                    
                                </table>
                            </div>
                        </div>
               

                        <div class="col-md-12 mt-3">
                        <font color="3f87f5"><b>2. Data Pribadi Calon Mahasiswa</b></font><br>
                            <div class="table-responsive mt-2 ml-2">
                                <table class="table  table-sm table-borderless">
                                    <tr>
                                        <td style="width: 35%">NIM</td>
                                        <td>: &nbsp; <?php echo $sd->nim;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">NIK</td>
                                        <td>: &nbsp; <?php echo $sd->nik;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">No KK </td>
                                        <td>: &nbsp; <?php echo $sd->noun;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Nama</td>
                                        <td>: &nbsp; <?php echo $sd->nama;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Panggilan</td>
                                        <td>: &nbsp; <?php echo $sd->panggilan;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Jenis Kelamin</td>
                                        <td>: &nbsp; <?php echo strtoupper($sd->kelamin);?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Tempat Tanggal Lahir</td>
                                        <td>: &nbsp; <?php echo $sd->tmplahir.', '.$sd->tgllahir;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Agama</td>
                                        <td>: &nbsp; <?php echo $sd->agama;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Suku</td>
                                        <td>: &nbsp; <?php echo $sd->suku;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Status</td>
                                        <td>: &nbsp; <?php echo $sd->status;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Kondisi</td>
                                        <td>: &nbsp; <?php echo $sd->kondisi;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Kewarganegaraan</td>
                                        <td>: &nbsp; <?php echo $sd->warga;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Anak ke</td>
                                        <td>: &nbsp; <?php echo $sd->anakke.', dari '.$sd->jsaudara.' bersaudara';?></td>
                                        
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Status Anak</td>
                                        <td>: &nbsp; <?php echo $sd->statusanak;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Saudara Kandung</td>
                                        <td>: &nbsp; <?php echo $sd->jkandung.' orang';?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Saudara Tiri</td>
                                        <td>: &nbsp; <?php echo $sd->jtiri.' orang';?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Bahasa</td>
                                        <td>: &nbsp; <?php echo $sd->bahasa;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Alamat</td>
                                        <td>: &nbsp; <?php echo $sd->alamatsiswa;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Kode Pos</td>
                                        <td>: &nbsp; <?php echo $sd->kodepossiswa;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Jarak ke Sekolah</td>
                                        <td>: &nbsp; <?php echo $sd->jarak.' KM';?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Telepon</td>
                                        <td>: &nbsp; <?php echo $sd->telponsiswa;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Handphone</td>
                                        <td>: &nbsp; <?php echo $sd->hpsiswa;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Email</td>
                                        <td>: &nbsp; <?php echo $sd->emailsiswa;?></td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>


                        <div class="col-md-12 mt-3">
                        <font color="3f87f5"><b>3. Data Sekolah Calon Siswa</b></font><br>
                            <div class="table-responsive mt-2 ml-2">
                                <table class="table  table-sm table-borderless">
                                    <tr>
                                        <td style="width: 35%">Asal Sekolah</td>
                                        <td>: &nbsp; <?php echo $sd->asalsekolah;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">No Ijasah</td>
                                        <td>: &nbsp; <?php echo $sd->noijasah;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Tanggal Ijasah</td>
                                        <td>: &nbsp; <?php echo $sd->tglijasah;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Keterangan</td>
                                        <td>: &nbsp; <?php echo $sd->ketsekolah;?></td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                        <font color="3f87f5"><b>4. Riwayat Kesehatan Calon Siswa</b></font><br>
                            <div class="table-responsive mt-2 ml-2">
                                <table class="table  table-sm table-borderless">
                                    <tr>
                                        <td style="width: 35%">Golongan Darah</td>
                                        <td>: &nbsp; <?php echo $sd->darah;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Berat</td>
                                        <td>: &nbsp; <?php echo $sd->berat;?> Kg</td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Tinggi</td>
                                        <td>: &nbsp; <?php echo $sd->tglijasah;?> Cm</td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Riwayat Penyakit</td>
                                        <td>: &nbsp; <?php echo $sd->kesehatan;?></td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                        <font color="3f87f5"><b>5. Data Orang Tua Calon Siswa</b></font><br>
                            <div class="table-responsive mt-2 ml-2">
                                <table class="table  table-sm table-borderless">
                                    <tr>
                                        <td colspan="2"><b>Ayah</b></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 35%">Nama</td>
                                        <td>: &nbsp; <?php echo $sd->namaayah;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Status</td>
                                        <td>: &nbsp; <?php echo $sd->statusayah;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Tempat Tanggal Lahir</td>
                                        <td>: &nbsp; <?php echo $sd->tmplahirayah.', '.$sd->tgllahirayah;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Pendidikan</td>
                                        <td>: &nbsp; <?php echo $sd->pendidikanayah;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Pekerjaan</td>
                                        <td>: &nbsp; <?php echo $sd->pekerjaanayah ;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Penghasilan</td>
                                        <td>: &nbsp; <?php echo $sd->penghasilanayah;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Email</td>
                                        <td>: &nbsp; <?php echo $sd->emailayah ;?></td>
                                    </tr>

                                    <tr>
                                        <td class="pt-4" colspan="2"><b>Ibu</b></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Nama</td>
                                        <td>: &nbsp; <?php echo $sd->namaibu;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Status</td>
                                        <td>: &nbsp; <?php echo $sd->statusibu;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Tempat Tanggal Lahir</td>
                                        <td>: &nbsp; <?php echo $sd->tmplahiribu.', '.$sd->tgllahiribu;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Pendidikan</td>
                                        <td>: &nbsp; <?php echo $sd->pendidikanibu;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Pekerjaan</td>
                                        <td>: &nbsp; <?php echo $sd->pekerjaanibu ;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Penghasilan</td>
                                        <td>: &nbsp; <?php echo $sd->penghasilanibu;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Email</td>
                                        <td>: &nbsp; <?php echo $sd->emailibu ;?></td>
                                    </tr>

                                    <tr>
                                        <td class="pt-4" colspan="2"><b>Wali</b></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Nama Wali</td>
                                        <td>: &nbsp; <?php echo $sd->wali;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Alamat Orang Tua</td>
                                        <td>: &nbsp; <?php echo $sd->alamatortu;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Telpon Wali</td>
                                        <td>: &nbsp; <?php echo $sd->telponortu;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Handphone Wali</td>
                                        <td>: &nbsp; <?php echo $sd->hportu ;?></td>
                                    </tr>

                                
                                    
                                </table>
                            </div>
                        </div>


                        <div class="col-md-12 mt-3">
                        <font color="3f87f5"><b>6. Informasi Tambahan</b></font><br>
                            <div class="table-responsive mt-2 ml-2">
                                <table class="table  table-sm table-borderless">
                                    <tr>
                                        <td style="width: 35%">Hobi</td>
                                        <td>: &nbsp; <?php echo $sd->hobi;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Alamat Surat</td>
                                        <td>: &nbsp; <?php echo $sd->alamatsurat;?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 35%">Keterangan</td>
                                        <td>: &nbsp; <?php echo $sd->keterangan;?></td>
                                    </tr>

                                </table>
                            </div>
                        </div>

         

                  
               
                     
                  

               <?php endforeach;?>

            </div>
        </div>
    </div>
</div>

<!-- Content Wrapper END -->

