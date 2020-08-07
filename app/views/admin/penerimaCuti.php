
<section class="panel">
          
        <div class="panel-body">
        	<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
			  <span class="glyphicon glyphicon-plus" >Tambah Data</span> 
			</button>
			<hr>
			<div class="table-responsive">
			  <table class="table table-hover table-bordered">
			    <tr>
			    	<th width="2%">No</th>
			    	<th>NIP</th>
			    	<th>Nama</th>
			    	<th>Jatah</th>
			    	<th>Tahun</td>
			    	<th width="16%">Menu</td>
			    </tr>

			    <?php
			    $no=1;
			    foreach ($sql->result() as $key) {
			    	$gP=$this->M_master->getNipPeg($key->nip)->row();
			    ?>
			    <tr>
			    	<td><?=$no++?></td>
			    	<td><?=$key->nip?></td>
			    	<td><?=empty($gP->nama)?"":$gP->nama?></td>
			    	<td><?=$key->jatah?></td>
			    	<td><?=$key->thn?></td>
			    	<td>
			    		<a type="button" onclick="return confirm('Anda Yakin?')" class="btn btn-danger btn-lg" href="<?=base_url('C_admin/delDistribusiId/'.$key->idtbl_distribusicuti)?>" >
						   Hapus
						</a>

			    		<button type="button" class="btn btn-primary btn-lg open_modal" id="<?=$key->idtbl_distribusicuti?>" data-url="<?=base_url('C_admin/distribusiId')?>">
						   Edit
						</button>
			    	</td>
			    </tr>
			    <?php
			    }
			    ?>
			  </table>
			</div>


            
        </div>



</section>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('C_admin/simpanPenerima')?>" method='post' >

		  <div class="form-group">
		    <label for="exampleInputPassword1">Nip</label>
		    <select name="nip" id="lvl" class="form-control">
                <option value="">-Pilih Pegawai-</option>
                <?php
                  $sql_row=$this->M_master->getPegawai();
                  foreach ($sql_row->result_array() as $sql_res){
                ?>
                <option value="<?php echo $sql_res["nip"]; ?>"><?php echo $sql_res["nama"]; ?></option>
                    <?php
                    }
                    ?>
          	</select>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Tahun</label>
		    <input name="thn" type="text" class="form-control" id="exampleInputPassword1" placeholder="Tahun">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Distribusi/Jatah Cuti</label>
		    <input name="jatah" type="number" class="form-control" id="exampleInputPassword1" placeholder="Distribusi Cuti">
		  </div>

		  <button type="submit" class="btn btn-success btn-block">Simpan</button>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
