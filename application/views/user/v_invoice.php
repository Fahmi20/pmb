<div class="page-container">

    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header no-gutters">
            <div class="d-md-flex align-items-md-center justify-content-between">                               
                <div class="card">
                    <div class="card-body">
                        <h4>Invoice</h4>
                        <p>Dibawah ini adalah data tagihan pembayaran anda</p>
                        <div class="m-t-25">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Total Tagihan</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($invoice as $id) {
                                        ?>
                                        <tr>
                                            <td scope="row"><?php echo $id->id_formulir;?></td>
                                            <td scope="row"><?php echo $id->datetime_input;?></td>
                                            <td><?php echo $id->description;?></td>
                                            <td scope="row"><?php echo $id->jml_formulir;?></td>
                                            
                                            <td>
                                                <?php

                                                    if($id->status_formulir == 0){
                                                        echo '<span class="badge badge-warning"><i class="anticon anticon-clock-circle"></i> &nbsp;Menunggu Pembayaran</span>';
                                                    }else if($id->status_formulir == 1){
                                                        echo '<span class="badge badge-success"><i class="anticon anticon-check-circle"></i> &nbsp;Telah Dibayar</span>';
                                                    }else{
                                                        echo '<span class="badge badge-danger">Dibatalkan</span>';
                                                    }

                                                ?>
                                            </td>

                                            <td>Rp <?php echo number_format($id->trx_amount);?></td>

                                            <td>
                                                <?php
                                                    if($id->status_formulir == 0){
                                                        echo '<a href="'.base_url().'user/payment/'.$id->id_formulir.'" class="btn btn-primary btn-sm">Bayar <i class="anticon anticon-right"></i></a>';
                                                    }
                                                ?>
                                                </td>
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<!-- Content Wrapper END -->

