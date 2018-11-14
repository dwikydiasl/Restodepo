  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">ADMIN MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <?php
		$CI = & get_instance();
        $iduser = $_SESSION[$CI->config->item('sess_prefix')."IDSession"];
        $namapage = $_SESSION[$CI->config->item('sess_prefix')."NamaPageSession"];
		?>
		
		<li <?php if($namapage == "dashboard"){ echo "class=\"active\"";}?>> <a href="<?php echo base_url();?>backend/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>



		<?php
        // begin menu penjual
        if ($this->dasarlib->apakahBolehMelakukan('PENJUAL', 'lihat', $iduser)) {
            if ($namapage == "penjual") {
                $isactive = "class=active";
            } else {
                $isactive = "";
            }

            echo "<li $isactive><a href='" . base_url() . "backend/penjual/index'><i class='fa fa-user-secret'></i> <span>Penjual</span></a></li>";
        }
        // end menu penjual 

        // begin menu pembeli
        if ($this->dasarlib->apakahBolehMelakukan('PEMBELI', 'lihat', $iduser)) {
            if ($namapage == "pembeli") {
                $isactive = "class=active";
            } else {
                $isactive = "";
            }

            echo "<li $isactive><a href='" . base_url() . "backend/pembeli/index'><i class='fa fa-user'></i> <span>Pembeli</span></a></li>";
        }
        // end menu pembeli 

        // begin menu produk
        if ($this->dasarlib->apakahBolehMelakukan('PRODUK', 'lihat', $iduser)) {
            if ($namapage == "produk") {
                $isactive = "active";
            } else {
                $isactive = "";
            }
            echo "
                <li class='treeview $isactive'>
                    <a href='#'><i class='fa fa-folder'></i> <span>Produk</span> <i class='fa fa-angle-left pull-right'></i></a>
                    <ul class='treeview-menu'>";

                echo "<li>
                            <a href='" . base_url() . "backend/produk/kategori_produk'><i class='fa fa-cubes'></i> <span>Kategori Produk</span></a>
                        </li>";
                echo "<li>
                            <a href='" . base_url() . "backend/produk/tag_produk'><i class='fa fa-tag'></i> <span>Tag Produk</span></a>
                        </li>";


                echo "<li>
                            <a href='" . base_url() . "backend/produk/item_produk'><i class='fa fa-cube'></i> <span>Item Produk</span></a>
                        </li>";


            echo"
                    </ul>
                </li>           
            ";
        }
        // end menu produk

        // begin menu transaksi
        if ($this->dasarlib->apakahBolehMelakukan('TRANSAKSI', 'lihat', $iduser)) {
            if ($namapage == "transaksi") {
                $isactive = "active";
            } else {
                $isactive = "";
            }
            echo "
                <li class='treeview $isactive'>
                    <a href='#'><i class='fa fa-usd'></i> <span>TRANSAKSI</span> <i class='fa fa-angle-left pull-right'></i></a>
                    <ul class='treeview-menu'>";

                echo "<li>
                            <a href='" . base_url() . "backend/transaksi/tanya_jawab'><i class='fa fa-comments'></i> <span>Tanya Jawab</span></a>
                        </li>";
                echo "<li>
                            <a href='" . base_url() . "backend/transaksi/invoice'><i class='fa fa-envelope'></i> <span>Invoice</span></a>
                        </li>";

            echo"
                    </ul>
                </li>           
            ";
        }
        // end menu transaksi

        // begin menu setting
        if ($this->dasarlib->apakahBolehMelakukan('SETTING', 'lihat', $iduser)) {
            if ($namapage == "setting") {
                $isactive = "active";
            } else {
                $isactive = "";
            }
            echo "
                <li class='treeview $isactive'>
                    <a href='#'><i class='fa fa-cog'></i> <span>Setting Restodepo</span> <i class='fa fa-angle-left pull-right'></i></a>
                    <ul class='treeview-menu'>";

                echo "<li>
                            <a href='" . base_url() . "backend/setting/bank'><i class='fa fa-bank'></i> <span>Bank</span></a>
                        </li>";
                echo "<li>
                            <a href='" . base_url() . "backend/setting/admin_fee'><i class='fa fa-money'></i> <span>Admin Fee</span></a>
                        </li>";

            echo"
                    </ul>
                </li>           
            ";
        }
        // end menu setting

        // begin menu priviledge
        if (($this->dasarlib->apakahBolehMelakukan('AREA_TUGAS', 'lihat', $iduser)) || ($this->dasarlib->apakahBolehMelakukan('DEPARTEMEN', 'lihat', $iduser)) || ($this->dasarlib->apakahBolehMelakukan('JABATAN', 'lihat', $iduser)) || ($this->dasarlib->apakahBolehMelakukan('PENGGUNA', 'lihat', $iduser))) {
            if ($namapage == "hakakses") {
                $isactive = "active";
            } else {
                $isactive = "";
            }
            echo "
				<li class='treeview $isactive'>
                	<a href='#'><i class='fa fa-cog'></i> <span>Setting Hak Akses</span> <i class='fa fa-angle-left pull-right'></i></a>
              		<ul class='treeview-menu'>";

            if ($this->dasarlib->apakahBolehMelakukan('AREA_TUGAS', 'lihat', $iduser)) {
                echo "<li>
                        	<a href='" . base_url() . "backend/hakakses/areatugas'><i class='fa fa-puzzle-piece'></i> <span>Area Tugas/Module</span></a>
                        </li>";
            }
            /*
            if ($this->dasarlib->apakahBolehMelakukan('DEPARTEMEN', 'lihat', $iduser)) {
                echo "<li>
                        	<a href='" . base_url() . "backend/hakakses/departemen'><i class='fa fa-puzzle-piece'></i> <span>Departemen</span></a>
                        </li>";
            }
            */
            if ($this->dasarlib->apakahBolehMelakukan('JABATAN', 'lihat', $iduser)) {
                echo "<li>
                        	<a href='" . base_url() . "backend/hakakses/jabatan'><i class='fa fa-male'></i> <span>Jabatan</span></a>
                        </li>";
            }
            if ($this->dasarlib->apakahBolehMelakukan('PENGGUNA', 'lihat', $iduser)) {
                echo "<li>
                        	<a href='" . base_url() . "backend/hakakses/pengguna'><i class='fa fa-user'></i> <span>Pengguna/User</span></a>
                        </li>";
            }

            echo"
              		</ul>
            	</li>			
			";
        }
        // end menu priviledge



        // begin menu audit trail
        if ($this->dasarlib->apakahBolehMelakukan('AUDIT_TRAIL', 'lihat', $iduser)) {
            if ($namapage == "audittrail") {
                $isactive = "class=active";
            } else {
                $isactive = "";
            }

            echo "<li $isactive><a href='" . base_url() . "backend/dashboard/audit_trail'><i class='fa fa-barcode'></i> <span>Audit Trail</span></a></li>";
        }
        // end menu audit trail        
		
        // begin menu maintenance
        if ($this->dasarlib->apakahBolehMelakukan('MAINTENANCE', 'lihat', $iduser)) {
            if ($namapage == "maintenance") {
                $isactive = "class=active";
            } else {
                $isactive = "";
            }

            echo "<li $isactive><a href='" . base_url() . "backend/dashboard/maintenance'><i class='fa fa-close'></i> <span>Maintenance</span></a></li>";
        }
        // end menu maintenance		
		
		?>        
        
        
        
        
        
        
        
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
