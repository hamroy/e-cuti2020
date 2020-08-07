<?php
$ac1=empty($ac1)?'':$ac1;
$ac2=empty($ac2)?'':$ac2;
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
            <a class="" href="<?=base_url('C_admin')?>">
                          <i class="icon_document_alt"></i>
                          <span>Input Jatah Cuti</span>
                      </a>
          </li>

          <li class="sub-menu">
            <a href="#" class="">
                          <i class="icon_documents_alt"></i>
                          <span>LAPORAN</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="<?=base_url('C_laporan')?>">Cuti</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>UI Fitures</span>
                          <span class="menu-arrow arrow_carrot-down"></span>
                      </a>
            <ul class="sub" style="overflow: hidden; display: block;">
              <li><a class="" href="general.html">Elements</a></li>
              <li><a class="" href="buttons.html">Buttons</a></li>
              <li><a class="" href="grids.html">Grids</a></li>
            </ul>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>