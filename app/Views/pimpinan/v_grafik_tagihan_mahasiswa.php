
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-header">
                  <h2>Grafik Tagihan Mahasiswa</h2>
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
                          foreach($getComboboxSemester AS $cmb):
                        ?>
                        <form action="<?= site_url("/grafik_tagihan_mahasiswa") ?>" method="POST">
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
                    <div>
                      <canvas id="myChart"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                      const labels = [
                        'Total Semua Tagihan',
                        'Tagihan Lunas',
                        'Sisa Tagihan'
                      ];

                      const data = {
                        labels: labels,
                        datasets: [{
                          label: 'Grafik Tagihan Mahasiswa',
                          backgroundColor: 'rgb(255, 99, 132)',
                          borderColor: 'rgb(255, 99, 132)',
                          data: [<?= $getTotalTagihan ?>, <?= $getTotalTransaksi ?>, <?= ($getTotalTagihan-$getTotalTransaksi) ?>],
                        }]
                      };

                      const config = {
                        type: 'bar',
                        data: data,
                        options: {}
                      };
                    </script>
                    <script>
                      const myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                      );
                    </script>
                  </div>
              </div>
              
            </div>
            
          </div>
         
          
          
          </section>

