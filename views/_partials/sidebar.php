    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link ">
            <span class="brand-text font-weight-light ">Bimbingan Tugas Akhir</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php if ($this->session->userdata('status') == "Mahasiswa") {
                                                    echo $this->session->userdata('nama');
                                                } else if ($this->session->userdata('status') == "Admin") {
                                                    echo $this->session->userdata('status');
                                                } else if ($this->session->userdata('status') == "Dosen") {
                                                    echo $this->session->userdata('nama');
                                                } ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="<?php echo base_url('mainmenu') ?>" class="nav-link <?php if ($this->uri->segment(1) == "mainmenu") {
                                                                                            echo "active";
                                                                                        } ?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Main Menu
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <?php if ($this->session->userdata('status') == "Admin") { ?>
                        <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == "mahasiswa" || $this->uri->segment(1) == "dosen" || $this->uri->segment(1) == "ketua_prodi" || $this->uri->segment(1) == "pa") {
                                                                echo "menu-open";
                                                            } ?>" <?php if ($this->session->userdata('status') == "Mahasiswa") {
                                                                        echo "hidden disabled";
                                                                    } else if (($this->session->userdata('status') == "admin")) {
                                                                        echo "";
                                                                    } ?>>
                            <a href="#" class="nav-link <?php if ($this->uri->segment(1) == "mahasiswa" || $this->uri->segment(1) == "dosen" || $this->uri->segment(1) == "ketua_prodi" || $this->uri->segment(1) == "pa") {
                                                            echo "active";
                                                        } ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Admin
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('mahasiswa') ?>" class="nav-link <?php if ($this->uri->segment(1) == "mahasiswa") {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Mahasiswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('dosen') ?>" class="nav-link <?php if ($this->uri->segment(1) == "dosen") {
                                                                                                    echo "active";
                                                                                                } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dosen</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('ketua_prodi') ?>" class="nav-link <?php if ($this->uri->segment(1) == "ketua_prodi") {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ketua Prodi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('pa') ?>" class="nav-link <?php if ($this->uri->segment(1) == "pa") {
                                                                                                echo "active";
                                                                                            } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pembimbing Akademik</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                       
                        <li class="nav-item">
                            <a href="<?php echo base_url('lihat_judul')
                                        ?>" class="nav-link <?php if ($this->uri->segment(1) == "lihat_judul") {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Lihat Judul

                                </p>
                            </a>
                        </li>
                            
                         <li class="nav-item">
                            <a href="<?php echo base_url('Ujian_proposal') ?>" class="nav-link <?php if ($this->uri->segment(1) == "Ujian_proposal") {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                     Proposal

                                </p>
                            </a>
                        </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url('Lihat_skripsi')?>" class="nav-link <?php if ($this->uri->segment(1) == "Lihat_skripsi") {
                                                                                                        echo "active";
                                                                                                    } ?>">
                            <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Lihat Skripsi

                                </p>
                            </a>
                        </li>
                    <?php } else if ($this->session->userdata('status') == "Mahasiswa") { ?>

                        <li class="nav-item">
                            <a href="<?php echo base_url('form_peng_judul')
                                        ?>" class="nav-link <?php if ($this->uri->segment(1) == "form_peng_judul") {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    form Pengajuan Judul

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('bimbingan_proposal')
                                        ?>" class="nav-link <?php if ($this->uri->segment(1) == "bimbingan_proposal") {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Bimbingan Proposal

                                </p>
                            </a>
                        </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url('ujian_proposal') ?>" class="nav-link <?php if ($this->uri->segment(1) == "ujian_proposal") {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Upload Proposal

                                </p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="<?php echo base_url('bimbingan_skripsi')
                                        ?>" class="nav-link <?php if ($this->uri->segment(1) == "bimbingan_skripsi") {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Bimbingan Skripsi

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('lihat_skripsi')
                                        ?>" class="nav-link <?php if ($this->uri->segment(1) == "lihat_skripsi") {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Upload Skripsi

                                </p>
                            </a>
                        </li>
                    <?php } else if ($this->session->userdata('status') == "Dosen") { ?>
                    
                     <li class="nav-item">
                            <a href="<?php echo base_url('List_bimbingan_dosen')
                                        ?>" class="nav-link <?php if ($this->uri->segment(1) == "List_bimbingan_dosen") {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    List Bimbingan Proposal

                                </p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="<?php echo base_url('List_ujian_proposal')
                                        ?>" class="nav-link <?php if ($this->uri->segment(1) == "List_ujian_proposal") {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    List Ujian Proposal

                                </p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="<?php echo base_url('Lihat_bimbingan_skripsi_dosen')
                                        ?>" class="nav-link <?php if ($this->uri->segment(1) == "Lihat_bimbingan_skripsi_dosen") {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    List Bimbingan Skripsi

                                </p>
                            </a>
                        </li>
                            <li class="nav-item">
                            <a href="<?php echo base_url('List_ujian_skripsi')
                                        ?>" class="nav-link <?php if ($this->uri->segment(1) == "List_ujian_skripsi") {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    List Ujian Skripsi

                                </p>
                            </a>
                        </li>
                    <?php } ?>



                    <li class="nav-item">
                        <a href="<?php echo base_url('login/logout')
                                    ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout

                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>