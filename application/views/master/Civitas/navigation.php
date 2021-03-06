      <!-- BEGIN MENUBAR-->
      <div id="menubar" class="menubar-inverse hidden-lg">
        <div class="menubar-fixed-panel">
          <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
              <i class="fa fa-bars"></i>
            </a>
          </div>
          <div class="expanded">
            <a href="<?php echo base_url();?>form/daftarMahasiswa">
              <span class="text-lg text-bold text-primary ">SIM&nbsp;YUDISIUM</span>
            </a>
          </div>
        </div>
        <div class="menubar-scroll-panel">

          <!-- BEGIN MAIN MENU -->
          <ul id="main-menu" class="gui-controls">

            <!-- BEGIN DASHBOARD -->
            <li>
              <a href="<?php echo base_url();?>form/daftarMahasiswa">
                <div class="gui-icon"><i class="fa fa-user"></i></div>
                <span class="title">Daftar Mahasiswa</span>
              </a>
            </li><!--end /menu-li -->
            <!-- END DASHBOARD -->

            <!-- BEGIN EMAIL -->
            <li class="gui-folder">
              <a>
                <div class="gui-icon"><i class="md md-email"></i></div>
                <span class="title">Syarat Yudisium</span>
              </a>
              <!--start submenu -->
              <ul>
                <li><a href="<?php echo base_url();?>syarat/daftarSyaratYudisium" ><span class="title">Daftar Syarat Yudisium</span></a></li>
                <li><a href="<?php echo base_url();?>syarat/addSyaratYudisium" ><span class="title">Tambah Syarat</span></a></li>
              </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END EMAIL -->

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