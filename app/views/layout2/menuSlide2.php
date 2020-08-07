<?php
$ac1=empty($ac1)?'':$ac1;
$ac2=empty($ac2)?'':$ac2;
$ac3=empty($ac3)?'':$ac3;
?>
<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="<?=$ac1?>">
            <a class="" href="<?=base_url('C_beranda')?>">
                          <i class="icon_house_alt"></i>
                          <span>Beranda</span>
                      </a>
          </li>

          <li class="<?=$ac2?>">
            <a class="" href="<?=base_url('C_input')?>">
                          <i class="icon_document_alt"></i>
                          <span>Permintaan Cuti</span>
                      </a>
          </li>

          <li class="<?=$ac3?>">
            <a class="" href="<?=base_url('C_input/listCuti')?>">
                          <i class="icon_desktop"></i>
                          <span>Daftar Cuti</span>
                      </a>
          </li>

         

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>