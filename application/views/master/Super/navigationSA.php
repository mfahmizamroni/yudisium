      <!-- BEGIN MENUBAR-->
      <div id="menubar" class="menubar-inverse hidden-lg">
        <div class="menubar-fixed-panel">
          <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
              <i class="fa fa-bars"></i>
            </a>
          </div>
          <div class="expanded">
            <a href="<?php echo base_url();?>super/">
              <span class="text-lg text-bold text-primary ">SIM&nbsp;YUDISIUM</span>
            </a>
          </div>
        </div>
        <div class="menubar-scroll-panel">

          <!-- BEGIN MAIN MENU -->
          <ul id="main-menu" class="gui-controls">

            <!-- BEGIN DASHBOARD -->
            <!-- BEGIN EMAIL -->
            <li class="gui-folder">
              <a>
                <div class="gui-icon"><i class="md md-email"></i></div>
                <span class="title">Mahasiswa</span>
              </a>
              <!--start submenu -->
              <ul>
                <li><a href="<?= base_url()."super/" ?>" ><span class="title">Daftar Mahasiswa</span></a></li>
                <li><a href="<?= base_url()."super/addMahasiswa/" ?>" ><span class="title">Tambah Mahasiswa</span></a></li>
              </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END EMAIL -->

            <!-- BEGIN EMAIL -->
            <li class="gui-folder">
              <a>
                <div class="gui-icon"><i class="md md-email"></i></div>
                <span class="title">Civitas</span>
              </a>
              <!--start submenu -->
              <ul>
                <li><a href="<?= base_url()."super/daftarCivitas" ?>" ><span class="title">Daftar Civitas</span></a></li>
                <li><a href="<?= base_url()."super/addCivitas/" ?>" ><span class="title">Tambah Civitas</span></a></li>
              </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END EMAIL -->

            <!-- BEGIN EMAIL -->
            <li class="gui-folder">
              <a>
                <div class="gui-icon"><i class="md md-email"></i></div>
                <span class="title">User</span>
              </a>
              <!--start submenu -->
              <ul>
                <li><a href="<?= base_url()."super/daftarUserCivitas" ?>" ><span class="title">Daftar User Civitas</span></a></li>
                <li><a href="<?= base_url()."super/addUserCivitas/" ?>" ><span class="title">Tambah User Civitas</span></a></li>
              </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END EMAIL -->

            <!-- BEGIN EMAIL -->
            <li class="gui-folder">
              <a>
                <div class="gui-icon"><i class="md md-email"></i></div>
                <span class="title">Syarat Yudisium</span>
              </a>
              <!--start submenu -->
              <ul>
                <li><a href="<?= base_url()."super/daftarSyaratYudisium" ?>" ><span class="title">Daftar Syarat Yudisium</span></a></li>
                <li><a href="<?= base_url()."super/addSyaratYudisium/" ?>" ><span class="title">Tambah Syarat Yudisium</span></a></li>
              </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END EMAIL -->
            <!-- END DASHBOARD -->

          </ul><!--end .main-menu -->
          <!-- END MAIN MENU -->

          <div class="menubar-foot-panel">
            <small class="no-linebreak hidden-folded">
              <span class="opacity-75">Copyright &copy; 2017</span> <strong>Kaizaen</strong>
            </small>
          </div>
        </div><!--end .menubar-scroll-panel-->
      </div><!--end #menubar-->
      <!-- END MENUBAR -->

</div><!--end #base-->
<!-- END BASE -->
