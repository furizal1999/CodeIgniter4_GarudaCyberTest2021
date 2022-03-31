
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-header">
                  <h2>Histori Transaksi</h2>
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
                              <th>Nama Pengirim</th>
                              <th>Metode Transaksi</th>
                              <th>Tanggal Transaksi</th>
                              <th>Nominal</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $no=1;
                              $total_tagihan = 0;
                              foreach($getHistoriTransaksi AS $gdt):
                                $total_tagihan = $total_tagihan + $gdt->jumlah_tagihan;
                            ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $gdt->tahun_ajaran ?></td>
                              <td><?= $gdt->semester ?></td>
                              <td><?= $gdt->jenis_tagihan ?></td>
                              <td><?= $gdt->nama_pembayar ?></td>
                              <td><?= $gdt->metode_bayar ?></td>
                              <td><?= $gdt->tanggal_transaksi ?></td>
                              <td><?= "Rp. ".$gdt->jumlah_tagihan ?></td>
                              
                            </tr>
                            <?php
                              endforeach;
                            ?>
                            <tfoot class="bg-light">
                              <tr>
                                <td></td>
                                <td>Total</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                  <?= "Rp. ".$total_tagihan ?> 
                                 
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