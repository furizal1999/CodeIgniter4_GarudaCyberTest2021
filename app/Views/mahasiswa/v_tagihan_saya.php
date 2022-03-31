
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-header">
                  <h2>Tagihan Saya</h2>
                </div>
                             
              </div>
              <div class="card">
              <?php echo session()->getFlashdata('messege'); ?>
                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table" id="myDataTable">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Tahun Ajaran</th>
                              <th>Semester</th>
                              <th>Jenis Tagihan</th>
                              <th>Besar Tagihan</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $no=1;
                              $total_tagihan = 0;
                              $index = 0;
                              $id_tagihan_array = array();
                              foreach($getDataTagihanSaya AS $gdt):
                                $id_tagihan_array[$index] = $gdt->id_tagihan;
                                $total_tagihan = $total_tagihan + $gdt->jumlah_tagihan;
                            ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $gdt->tahun_ajaran ?></td>
                              <td><?= $gdt->semester ?></td>
                              <td><?= $gdt->jenis_tagihan ?></td>
                              <td><?= "Rp. ".$gdt->jumlah_tagihan ?></td>
                              
                            </tr>
                            <?php
                                $index++;
                              endforeach;

                              $id_tagihan_str = implode(", ", $id_tagihan_array);
                            ?>
                            <tfoot class="bg-light">
                              <tr>
                                <td></td>
                                <td>Total</td>
                                <td></td>
                                <td></td>
                                <td>
                                  <?= "Rp. ".$total_tagihan ?> 
                                  <?php
                                    if($getDataTagihanSaya!=NULL){
                                  ?>
                                  <a class="btn btn-sm btn-info text-white" data-toggle="modal" data-target="#modalBayarSemua">Bayar Semua</a>
                                  <?php
                                    }
                                  ?>
                                </td>
                              </tr>
                            </tfoot>
                          </tbody>
                          
                      </table>
                    </div>
                  </div>
              </div>
              
            </div>
            
          </div>
        </section>

           <!-- ============ MODAL ADD =============== -->
           <div class="modal fade" id="modalBayarSemua" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header bg-primary text-white">
                        <h3 class="modal-title" id="myModalLabel">Transaksi</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                      </div>
                      <form class="form-horizontal" method="post" action="<?php echo site_url('/tagihan_saya/transaksi')?>">
                        <div class="modal-body">

                          <input type="hidden" name="id_tagihan_str" value="<?= $id_tagihan_str ?>">
                          <div class="form-group">
                              <label class="control-label col-xs-3" >Metode Bayar</label>
                              <select name="id_metode_bayar" class="form-control" required>
                                    <option value="">--Pilih--</option>
                                    <?php
                                      foreach($tagihanMhs->getComboboxBank() AS $cmb):
                                    ?>
                                    <option  value="<?= $cmb->id_metode_bayar ?>"><?= $cmb->metode_bayar.' ('.$cmb->kode_bank.')' ?></option>
                                    <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-xs-3" >Total Tagihan</label>
                              <input type="number" name="jumlah_tagihan" class="form-control" value="<?= $total_tagihan ?>" readonly>
                          </div>
                                                                       
                        </div>

                        <div class="modal-footer">
                          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                          <button class="btn btn-info" name="tombol_transaksi">Bayar Sekarang</button>
                        </div>
                      </form>
                      </div>
                      </div>
                    </div>
                  <!--END MODAL ADD-->