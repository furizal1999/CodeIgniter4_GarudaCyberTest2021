
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-header">
                  <h2>Tagihan Mahasiswa</h2>
                </div>
                <div class="card-stats">
                  <div class="card-stats-title">Filter Data -
                    <div class="dropdown d-inline">
                      <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-semester">
                        <?php
                          if(isset(session()->tahun_ajaran) && isset(session()->semester)){
                            echo session()->tahun_ajaran.' ('.session()->semester.']';
                          }else{
                            echo "[Pilih]";
                          }
                        ?>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-sm">
                        <li class="dropdown-title">Pilih Semester</li>
                        <?php

                          // var_dump($tagihanMhs->getComboboxSemester()); die();
                          foreach($tagihanMhs->getComboboxSemester() AS $cmb):
                        ?>
                        <form action="<?= site_url("/tagihan_mahasiswa") ?>" method="POST">
                          <input type="hidden" name="id_semester" value="<?= $cmb->id_semester ?>">
                          <input type="hidden" name="tahun_ajaran" value="<?= $cmb->tahun_ajaran ?>">
                          <input type="hidden" name="semester" value="<?= $cmb->semester ?>">
                          <li>
                            <button type="submit" class="btn btn-white">
                              <a class="dropdown-item btn btn-white"><?= $cmb->tahun_ajaran.' ('.$cmb->semester.']' ?></a>
                            </button>
                          </li>
                        </form>
                        
                        <?php
                          endforeach;
                        ?>
                      </ul>
                    </div>
                  </div>
                  
                </div>               
              </div>
              <div class="card">
              <?php echo session()->getFlashdata('messege'); ?>
                  <div class="card-body">
                    <?php
                      if($tombolTambah==1){
                    ?>
                    <a class="text-white border-white custom-btn bg-primary btn mt-3" data-toggle="modal" data-target="#model_tambah_data_tagihan"><i class="fa fa-plus"></i> Tambah Tagihan</a>
                       
                    <hr>
                    <?php 
                      }
                    ?>
                    <div class="table-responsive">
                        <table class="table" id="myDataTable">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>Username</th>
                                <th>Jenis Tagihan</th>
                                <th>Besar Tagihan</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php



                                $no=1;
                                $total_tagihan = 0;
                                foreach($getDataTagihan AS $gdt):
                                  $total_tagihan = $total_tagihan + $gdt->jumlah_tagihan;
                              ?>
                              <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $gdt->nama_lengkap ?></td>
                                <td><?= $gdt->username ?></td>
                                <td><?= $gdt->jenis_tagihan ?></td>
                                <td><?= "Rp. ".$gdt->jumlah_tagihan ?></td>
                                <td>
                                  <a class="btn btn-sm btn-info text-white" data-toggle="modal" data-target="#modal_edit<?php echo $gdt->id_tagihan;?>"><i class="fa fa-pen"></i></a>
                                  <a class="btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#modal_hapus<?php echo $gdt->id_tagihan;?>"><i class="fa fa-trash"></i></a>
                                </td>
                              </tr>
                              <?php
                                endforeach;
                              ?>
                              <tfoot class="bg-info text-white">
                                <tr>
                                  <td></td>
                                  <td>Total</td>
                                  <td></td>
                                  <td></td>
                                  <td><?= "Rp. ".$total_tagihan ?></td>
                                  <td></td>
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
           <div class="modal fade" id="model_tambah_data_tagihan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header bg-primary text-white">
                        <h3 class="modal-title" id="myModalLabel">Tambah Tagihan</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                      </div>
                      <form class="form-horizontal" method="post" action="<?php echo site_url('/tagihan_mahasiswa/tambah_tagihan')?>">
                        <div class="modal-body">

                          
                          <div class="form-group">
                              <label class="control-label col-xs-3" >Mahasiswa</label>
                              <select name="username" class="form-control" required>
                                    <option value="">--Pilih--</option>
                                    <?php
                                      foreach($tagihanMhs->getComboboxMhs() AS $cmb):
                                    ?>
                                    <option  value="<?= $cmb->username ?>"><?= $cmb->nama_lengkap.' ('.$cmb->username.')' ?></option>
                                    <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-xs-3" >Jenis Tagihan</label>
                              <select name="jenis_tagihan" class="form-control" required>
                                    <option value="">--Pilih--</option>
                                    <option  value="SPP">SPP</option>
                                    <option  value="SKS">SKS</option>
                                    <option  value="Pembangunan">Pembangunan</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-xs-3" >Jumlah Tagihan</label>
                              <input type="number" name="jumlah_tagihan" class="form-control" placeholder="Contoh : 500000"required>
                          </div>
                                                                       
                        </div>

                        <div class="modal-footer">
                          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                          <button class="btn btn-info" name="tombol_tambah_tagihan">Simpan</button>
                        </div>
                      </form>
                      </div>
                      </div>
                    </div>
                  <!--END MODAL ADD-->


                  <?php
                  foreach($getDataTagihan AS $gdt):
                  ?>
                  <!-- ============ MODAL HAPUS =============== -->
                    <div class="modal fade" id="modal_hapus<?php echo $gdt->id_tagihan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header bg-danger">
                        <h3 class="modal-title text-white" id="myModalLabel">Hapus Tagihan</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                      </div>
                      <form class="form-horizontal" method="post" action="<?php echo site_url("/tagihan_mahasiswa/hapus_tagihan") ?>">
                        <div class="modal-body">
                          <p>Anda yakin menghapus data tagihan <b><?php echo $gdt->jenis_tagihan;?></b> mahasiswa atas nama <b><?php echo $gdt->nama_lengkap;?></b>?</p>
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id_tagihan" value="<?php echo $gdt->id_tagihan;?>">
                          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                          <button class="btn btn-danger" name="tombol_hapus_tagihan">Hapus</button>
                        </div>
                      </form>
                      </div>
                      </div>
                    </div>
                  <!--END MODAL HAPUS -->

                   <!-- ============ MODAL EDIT =============== -->
                   <div class="modal fade" id="modal_edit<?php echo $gdt->id_tagihan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header bg-info">
                        <h3 class="modal-title text-white" id="myModalLabel">Edit Tagihan</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                      </div>
                      <form class="form-horizontal" method="post" action="<?php echo site_url("/tagihan_mahasiswa/edit_tagihan") ?>">
                        <div class="modal-body">
                          <div class="form-group">
                              <label class="control-label col-xs-3" >Mahasiswa</label>
                              <input type="text" value="<?= $gdt->nama_lengkap.' ('.$gdt->username.')' ?>" class="form-control" readonly>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-xs-3" >Jenis Tagihan</label>
                              <select name="jenis_tagihan" class="form-control" required>
                                    <option value="">--Pilih--</option>
                                    <option  value="SPP" <?php if($gdt->jenis_tagihan=="SPP"){ echo "selected"; } ?>>SPP</option>
                                    <option  value="SKS" <?php if($gdt->jenis_tagihan=="SKS"){ echo "selected"; } ?>>SKS</option>
                                    <option  value="Pembangunan" <?php if($gdt->jenis_tagihan=="Pembangunan"){ echo "selected"; } ?>>Pembangunan</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-xs-3" >Jumlah Tagihan</label>
                              <input type="number" name="jumlah_tagihan" class="form-control" value="<?= $gdt->jumlah_tagihan ?>" placeholder="Contoh : 500000"required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id_tagihan" value="<?php echo $gdt->id_tagihan;?>">
                          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                          <button class="btn btn-info" name="tombol_edit_tagihan">Edit</button>
                        </div>
                      </form>
                      </div>
                      </div>
                    </div>
                  <!--END MODAL EDIT -->

                  <?php
                  endforeach;
                  ?>