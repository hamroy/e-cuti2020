<style type="text/css">
  .setkol{
    background-color: gainsboro;text-align:center; font-size: 13px;
  }
</style>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <br>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered setkol">
                                    <tr>    
                                            <th colspan="9">
                                                <div class="row">
                                                  <div class="col-md-8">
                                                      <form method="get">
                                                        <div class="input-group">
                                                          <input type="Search" class="form-control" name="keyword" placeholder="..">
                                                          <span class="input-group-btn">
                                                            <button  class="btn btn-primary" type="submit">Cari</button>
                                                          </span>
                                                        </div><!-- /input-group -->
                                                        </form>
                                                  </div>
                                                  <div class="col-md-4 pull-left">
                                                    
                                                </div>
                                                </div>
                                        
                                        
                                        </th>
                                          </tr>
                                          <tr >
                                            <th ><font size="">No</font></th>
                                            <th ><font size="">Indeks Surat</font></th>
                                            <th ><font size="">Tanggal</font></th>
                                            <th ><font size="">Tujuan</font></th>
                                            <th ><font size="">Perihal</font></th>
                                            <th ><font size="">Bidang/Unit</font></th>
                                            <th ><font size="">Keterangan</font></th>
                                            <th ><font size="">File</font></th>
                                            <th ><font size="">Menu</font></th>  
                                          </tr>

                                          <?php 
                                            foreach ($sql->result_array() as $tampil){
                                              $kd_bidang=$tampil['kd_bidang'];
                                              $file_dok=$tampil['file_dok'];
                                              
                                              $gidpeg=$this->M_master->getKdBidang($kd_bidang);
                                              $tm_cari=$gidpeg->row_array();
                                              $nm_bidang = $tm_cari['nm_bidang'];
                                             ?> 
                                                <tr>
                                                  <td align="center"><font size="2"><?php echo $tampil['no_urut']?></font></td>
                                                  <td><font><?php echo $tampil['indeks_surat_klr']?></font></td>
                                                  <td align="center"><font><?php echo $tampil['tgl1']?></font></td>
                                                  <td><font><?php echo $tampil['tujuan']?></font></td>
                                                  <td><font><?php echo $tampil['perihal']?></font></td>
                                                  <td><font><?php echo $nm_bidang?></font></td>
                                                  <td><font><?php echo $tampil['keterangan']?></font></td>

                                                  <td>
                                                    <?php
                                                      if($file_dok<>'') {
                                                    ?>
                                                    <a href="<?php echo base_url($tampil['file_dok'])?>">
                                                      <i class="fas fa-download"></i>
                                                    </a>
                                                    <?php
                                                      } else {
                                                    ?>
                                                    <font size="2"><i>No Files</i></font>
                                                    <?php
                                                      }
                                                    ?>
                                                  </td>
                                                  
                                                  <td>
                                                    <a   class='open_modal' id='<?=$tampil['indeks_surat_klr']; ?>'><i class="fas fa-edit"> Edit</i></a>
                                                    <?php
                                                    $akses=$this->session->userdata('lvl_akses');
                                                    if ($akses==1) {
                                                    ?>            
                                                    <a   
                                                    onclick="confirm_modal('<?=base_url()?>C_input/sKeluarDel?&modal_id=<?=$tampil['indeks_surat_klr']?>');"><i class="far fa-times-circle"> Hapus</i></a>
                                                    <?php
                                                    }
                                                    ?>
                                                  </td>
                                                </tr>
                                             <?php
                                            }
                                          ?>
                                        </table>
                                      </div>
                                
                                
                            </div>
       </div>