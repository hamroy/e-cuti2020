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
                        <div class="card bcForm">
                            <div class="card-body">
                              <div class="table-responsive">
                                    <!-- ISI -->
                                            <table class="table table-bordered">
                                              <tr>    
                                                  <td>
                                                  <table class="table1 " width="100%">
                                                    <tr valign="top">
                                                      <td width="90%"><h4>INPUT <?=strtoupper($judul)?></h4></td>
                                                      <td width="10%" align="right">
                                                        <a href="javascript:history.back()"><font size="2"><i>Back&nbsp;</i></font></a>
                                                      </td>
                                                    </tr>
                                                  </table>
                                                  </td>
                                              </tr>
                                            </table>
                                            <form action="<?=base_url('C_input/inputCuti_save')?>" name="modal_popup" enctype="multipart/form-data" method="POST">
                                        
            <table class="table table-bordered" width="100%">
              <?php
                $akses=$this->session->userdata('lvl_akses');
                if ($akses==1) {
                } 
              ?>  
              <tr>
                <td colspan="4"><b>Jenis Surat :</b></td>
              </tr>
              <tr>
                <td colspan="4">
                  <select name="kdJenisCuti" id="cbobidang" class="form-control">
                    <option value=""></option>
                    <?php
                    $sql_row=$this->M_master2->getJenisCuti();
                    foreach ($sql_row->result_array() as $sql_res){
                    ?>
                    <option value="<?php echo $sql_res["kd_cuti"]; ?>"><?php echo $sql_res["nm_cuti"]; ?></option>
                    <?php
                      }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td colspan="2"><b>Tanggal Mulai :</b></td>
                <td colspan="2"><b>s/d :</b></td>
              </tr>

              <tr>
                <td colspan="2">
                  <input type="text" name="tanggal" autocomplete="off" id="_tgl1" class="form-control" required/>
                </td>
                <td colspan="2">
                  <input type="text" name="tanggalS" autocomplete="off" id="_tgl2" class="form-control" required/>
                </td>
              </tr>

                   
              
              <tr>
                <td colspan="4"><b>Alamat :</b></td>
              </tr>
              <tr>
                <td colspan="4"><input type="text" name="alamat"  class="form-control"/></td>
              </tr>
              <tr>
                <td colspan="4"><b>No. HP :</b></td>
              </tr>
              <tr>
                <td colspan="4"><input type="text" name="no"  class="form-control"/></td>
              </tr>
              <tr>
                <td colspan="4"><b>Alasan :</b></td>
              </tr>
              <tr>
                <td colspan="4"><textarea name="alasan" class="form-control" rows="10"></textarea></td>
              </tr>

              <tr>
                
                <td colspan="4"><b>Kepala Bidang :</b></td>
                <!-- <td colspan="2"><b>Pejabat Pemberi Cuti  :</b></td> -->
              </tr>
              <tr>
    
                <td colspan="4">
                  <select name="atasan" id="cbopegawai1" class="form-control" required>
                    <option value=""></option>
                    <?php
                      $sql_row=$this->M_master->jabatanPeg();
                      foreach ($sql_row->result_array() as $sql_res){
                    ?>
                    <option value="<?php echo $sql_res["nip"]; ?>"><?php echo $sql_res["nama_jabatan"]; ?></option>
                          <?php
                            }
                          ?>
                  </select>
                </td>

              </tr>


            </table>
            </td>
      </tr>

      <tr>    
            <td>
                <hr/>
                  <button class="btn btn-success btn-block" type="submit">KIRIM</button>
            </td>
      </tr>
          </table>
                                      </form>

                                     <!-- BATAS BAWAH TAG  -->
                              </div> 
                        </div>
                  </div>
    <br>
          <div class="card bcForm">
            <div class="card-body">
                <table class="table table-bordered">
                  <tr>    
                      <td colspan="2">
                        CATATAN CUTI
                      </td>
                  </tr>

                  <tr style="font-size: 10px">
                    <td width="50%">
                      <table width="100%">
                        <tr>
                          <td>
                            Tahun 
                          </td>
                          <td>
                            Sisa
                          </td>
                          <td width="50%">
                            Ket.
                          </td>
                        </tr>
                        <?php
                        $thn = $this->M_set->thn;
                        // echo $this->M_input->getSisaCuti3Tahun();
                        $sisaN=0;
                        for ($i=0; $i < 3 ; $i++) { 
                          $thnC=$thn - $i;
                          $jatah = $this->M_input->getJatahThn($thnC);
                          $rs = $this->M_input->getRealisasiCutiThn($thnC);
                          $sisa=$jatah-$rs;
                          $sisa+=$sisaN;
                          if ($sisa < 0){
                            $sisaN +=$sisa;
                            $sisa=0;
                          }
                           
                          echo "
                          <tr>
                            <td>
                              {$thnC}
                            </td>
                            <td>
                             $sisa
                            </td>
                            <td width=\"50%\">
                              -
                            </td>
                          </tr>
                          ";
                        ?>
                        
                        <?php
                        }
                        ?>
                        

                      </table>
                    </td>

                    <td width="50%">
                      <table width="100%">
                        <tr>
                          <td width="50%">
                            CUti tahunan 
                          </td>
                          <td>
                          </td>
                        </tr>

                      </table>
                    </td>

                  </tr>

                </table>
            </div>
          </div>
        </div>
