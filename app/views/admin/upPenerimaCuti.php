<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=$judulModal?></h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('C_admin/simpanUpPenerima')?>" method='post' >
      <div class="form-group">
        <label for="exampleInputPassword1">Tahun</label>
        <input name="thn" type="text" class="form-control" value="<?=$thn?>" id="exampleInputPassword1" placeholder="Tahun">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Distribusi/Jatah Cuti</label>
        <input name="jatah" type="number" class="form-control" id="exampleInputPassword1" value="<?=$jatah?>" placeholder="Distribusi Cuti">
      </div>
      <input type="hidden" name="id" value="<?=$id?>">
      <button type="submit" class="btn btn-success btn-block">Simpan</button>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>