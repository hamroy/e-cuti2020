<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
      <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-minimized" width="118" height="463" alt="CoreUI Logo">
          <img src="<?=base_url()?>icon/logo-ecuti.png" alt="homepage"  class="dark-logo" width="50%" height="46" />
            <span class="logo-text">
            </span>
        </svg>
        
      </div>
      <ul class="c-sidebar-nav">
        
        <li class="c-sidebar-nav-title">MENU</li>

        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url('C_beranda')?>">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=base_url()?>dist/vendors/@coreui/icons/svg/free.svg#cil-home"></use>
            </svg> BERANDA</a>
        </li>

        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url('C_input')?>">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=base_url('')?>dist/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
            </svg> PERMINTAAN CUTI</a>
        </li>
       
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" >
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=base_url()?>dist/vendors/@coreui/icons/svg/free.svg#cil-book"></use>
            </svg> LAPORAN</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="<?=base_url('C_laporan')?>">
                <span class="c-sidebar-nav-icon"></span> Cuti</a>
            </li>

          </ul>
        </li>
        

        <li class="c-sidebar-nav-divider"></li>
        <li class="c-sidebar-nav-title">SISTEM</li>

        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url('C_sett')?>">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=base_url()?>dist/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
            </svg> SETTING SISTEM</a>
        </li>

        
      </ul>
      <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>