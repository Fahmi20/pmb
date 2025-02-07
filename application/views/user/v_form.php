<style>
    .teks-hidden {
        display: none;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

<div class="page-container">
    <div class="main-content">
        <div class="page-header no-gutters">
            <div class="d-md-flex align-items-md-center justify-content-between">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#beliFormulir">
                                Beli Formulir baru &nbsp;&nbsp;<i class="anticon anticon-right"></i>
                            </a>
                        </div>

                        <?php
                        $c = $this->m_user->get_id_formulir($this->session->userdata('email'));
                        ?>

                        <div class="alert alert-warning alert-dismissible fade show mt-4">
                            Setelah melakukan pembelian & pembayaran, formulir akan muncul dibawah ini sesuai jumlah formulir yang dibeli.<br>
                            Status pembayaran bisa di cek pada menu Invoice.
                        </div>

                        <div class="alert alert-success alert-dismissible fade show mt-4">
                            Anda memiliki <?php echo count($c); ?> formulir
                        </div>

                        <!-- Filter User -->
                        <div class="row">
                            <?php if ($_SESSION['jenis'] == 1) : ?>
                                <div class="col-lg-12">
                                    <form method="get" action="<?php echo base_url(); ?>user/form">
                                        <div class="form-group">
                                            <label for="search_formulir">Pilih Email:</label>
                                            <select name="search_formulir" id="search_formulir" class="form-control select2" style="width: 100%;">
                                                <option value="" <?php echo empty($selected_email) ? 'selected' : ''; ?>>Pilih Email</option>
                                                <?php foreach ($all_users as $user): ?>
                                                    <option value="<?php echo $user->email; ?>" <?php echo ($selected_email == $user->email) ? 'selected' : ''; ?>>
                                                        <?php echo $user->email; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="margin-bottom: 15px;">Cari</button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- User Formulir -->
                        <div class="row">
                            <?php foreach ($c as $cd): ?>
                                <?php if (!($this->session->userdata('jenis') == 1)): ?>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-6">
                                        <div class="file-wrapper">
                                            <div class="file vertical">
                                                <div class="font-size-40">
                                                    <?php if ($cd->form_submit != '0' && $cd->status_formulir == "1"): ?>
													<a href="<?php echo base_url(); ?>user/cetak_pdf/<?php echo $cd->replid; ?>" target="_blank">
                                                            <i class="anticon anticon-file text-success"></i>
                                                        </a>
                                                    <?php elseif ($cd->status_formulir != "1"): ?>
                                                        <?php if (strtotime($cd->datetime_expired) < time()): ?>
                                                            <span class="text-muted anticon anticon-file text-danger"></span>
                                                        <?php else: ?>
                                                            <a href="<?php echo base_url(); ?>user/payment/<?php echo $cd->id_formulir; ?>">
                                                                <i class="anticon anticon-file text-danger"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <a href="<?php echo base_url(); ?>user/form_input/<?php echo $cd->replid; ?>">
                                                            <i class="anticon anticon-file text-warning"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="m-t-0">
                                                    <h6 class="mb-1"><?php echo $cd->pssbid; ?></h6>
                                                    <span class=" font-size-13">
												<strong>	<?php echo $cd->nama; ?></strong></br>
                                                      <p class="font-size-10 text-muted"> Presenter : <?php echo $nama = $this->m_user->get_name($this->session->userdata('email')); ?></p>
                                                    </span>
                                                    <p class="font-size-10"><?php echo $cd->replid; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <!-- Formulir -->
                        <div class="row">
                            <?php foreach ($formulirs as $formulir): ?>
                                <?php if ($formulir->email == $selected_email): ?>
                                    <div class="col-lg-3 col-sm-1 col-md-2 col-xs-6">
                                        <div class="file-wrapper">
                                            <div class="file vertical">
                                                <div class="font-size-40">
                                                    <?php if ($formulir->form_submit != '0' && $formulir->status_formulir == "1"): ?>
                                                        <a href="<?php echo base_url(); ?>user/cetak_pdf/<?php echo $formulir->replid; ?>" target="_blank">
                                                            <i class="anticon anticon-file text-success"></i>
                                                        </a>
                                                    <?php elseif ($formulir->status_formulir != "1"): ?>
                                                        <?php if (strtotime($formulir->datetime_expired) < time()): ?>
                                                            <span class="text-muted anticon anticon-file text-danger"><i class="text-muted font-size-15">Expired</i></span>
                                                        <?php else: ?>
                                                            <a href="<?php echo base_url(); ?>user/payment/<?php echo $formulir->id_formulir; ?>">
                                                                <i class="anticon anticon-file text-danger"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <a href="<?php echo base_url(); ?>user/form_input/<?php echo $formulir->replid; ?>">
                                                            <i class="anticon anticon-file text-warning"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="m-t-10">
                                                    <h6 class="mb-1"><?php echo $formulir->pssbid; ?></h6>
                                                    <span class="font-size-13"><strong>
                                                        <?php echo $formulir->nama; ?></strong>

                                                    </span>
                                                    <br>
                                                    <span class="font-size-13 text-muted"><?php echo $formulir->datetime_input; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $this->session->flashdata('notif'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

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
                    <?php echo form_open('user/buy_form'); ?>
                    <div class="row">
                        <?php $dep = $this->m_user->get_name_departemen(); ?>
                        <div class="col-md-12">
                            <label>Pilih Formulir</label>
                            <div class="m-b-15">
                                <select class="select2" name="departemen">
                                    <?php foreach ($dep as $ds) : ?>
                                        <option value="<?php echo $ds->replid; ?>"><?php echo $ds->departemen; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 teks-hidden">
                            <label>Masukan Jumlah Formulir</label>
                            <div class="m-b-15">
                                <select class="select2" name="jml_form">
                                    <option value="1" selected>1</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary" onClick="this.form.submit(); this.disabled=true; this.value='Sending…';">Lanjut Ke Pembayaran</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Initialize Select2 for the "Pilih Email" dropdown
            $('#search_formulir').select2({
                placeholder: 'Pilih Email',
                allowClear: true
            });
        });
    </script>
</div>
