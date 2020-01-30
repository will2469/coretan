<!-- Main Sidebar Container -->
  <aside class                    = "main-sidebar sidebar-dark-primary elevation-4">
    <!-- Logo Aplikasi -->
    <a href                       = "dashboard" class="brand-link">
      <img src                    = "{{ asset('/images/compose.png') }}"
      alt                         = "Prototype Logo"
      class                       = "brand-image img-circle elevation-3"
      style                       = "opacity: .8">
      <span class                 = "brand-text font-weight-light">SID</span>
    </a>

    <!-- Sidebar -->
    <div class                    = "sidebar">
      <!-- Sidebar untuk menapilkan pengguna yang sedang login -->
      <div class                  = "user-panel mt-3 pb-3 mb-3 d-flex">
        <div class                = "image">
          <img src                = "{{ asset('/images/boy.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class                = "info">
          <a href                 = "#" class="d-block">
            <!-- menampilkan username-->
            {{Auth::user()->name}}
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class                  = "mt-2">
        <ul class                 = "nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Tambahkan icon fa- untuk mengubah font dari fontawesome -->
          <!-- Dashboard Module -->
          <li class               = "nav-item">
            <router-link to     = "/home" class="nav-link">
              <i class            = "nav-icon fas fa-feather-alt"></i>
              <p>
                Dashboard
              </p>
            </router-link>
          </li>
          <!-- Info Desa Module -->
          <li class               = "nav-item has-treeview">
            <a href               = "" class="nav-link">
              <i class            = "nav-icon fab fa-hubspot"></i>
              <p>
                Info Desa
                <i class          = "right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class             = "nav nav-treeview">
              <li class           = "nav-item">
                <router-link to   = "/id-desa" class="nav-link">
                  <i class        = "fas fa-id-card-alt nav-icon"></i>
                  <p>Identitas Desa</p>
                </router-link>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-map-marked-alt nav-icon"></i>
                  <p>Wilayah Desa</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fab fa-black-tie nav-icon"></i>
                  <p>Pemerintah Desa</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Kependudukan Module -->
          <li class               = "nav-item has-treeview">
            <a href               = "#" class="nav-link">
              <i class            = "nav-icon fab fa-xing"></i>
              <p>
                Kependudukan
                <i class          = "right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class             = "nav nav-treeview">
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-user nav-icon"></i>
                  <p>Penduduk</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-users nav-icon"></i>
                  <p>Keluarga</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-home nav-icon"></i>
                  <p>Rumah Tangga</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-share-alt nav-icon"></i>
                  <p>Kelompok</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-user-shield nav-icon"></i>
                  <p>Data Suplemen</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-user-check nav-icon"></i>
                  <p>Calon Pemilih</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Statistik Module -->
          <li class               = "nav-item has-treeview">
            <a href               = "#" class="nav-link">
              <i class            = "nav-icon fas fa-chart-line"></i>
              <p>
                Statistik
                <i class          = "right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class             = "nav nav-treeview">
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-chart-bar nav-icon"></i>
                  <p>Statistik Kependudukan</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-clipboard nav-icon"></i>
                  <p>Laporan Bulanan</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-wheelchair nav-icon"></i>
                  <p>Laporan Kelompok Rentan</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Layanan Surat Module -->
          <li class               = "nav-item has-treeview">
            <a href               = "#" class="nav-link">
              <i class            = "nav-icon fas fa-pen-nib"></i>
              <p>
                Layanan Surat
                <i class          = "right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class             = "nav nav-treeview">
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-sliders-h nav-icon"></i>
                  <p>Pengaturan Surat</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-print nav-icon"></i>
                  <p>Cetak Surat</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-swatchbook nav-icon"></i>
                  <p>Arsip Layanan</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-question-circle nav-icon"></i>
                  <p>Panduan Layanan</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Sekretariat Module -->
          <li class               = "nav-item has-treeview">
            <a href               = "#" class="nav-link">
              <i class            = "nav-icon fas fa-server"></i>
              <p>
                Sekretariat
                <i class          = "right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class             = "nav nav-treeview">
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-download nav-icon"></i>
                  <p>Surat Masuk</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-upload nav-icon"></i>
                  <p>Surat Keluar</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-gavel nav-icon"></i>
                  <p>Produk Hukum</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-bullhorn nav-icon"></i>
                  <p>Informasi Publik</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-boxes nav-icon"></i>
                  <p>Inventaris</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-file-code nav-icon"></i>
                  <p>Kode Surat</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Keuangan Module -->
          <li class               = "nav-item has-treeview">
            <a href               = "#" class="nav-link">
              <i class            = "nav-icon fas fa-money-bill-wave"></i>
              <p>
                Keuangan
                <i class          = "right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class             = "nav nav-treeview">
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-wallet nav-icon"></i>
                  <p>Arsip Data</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-file-invoice-dollar nav-icon"></i>
                  <p>Laporan Keuangan</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Monografi Desa Desa Module -->
          <li class               = "nav-item">
            <a href               = "#" class="nav-link">
              <i class            = "nav-icon fas fa-book"></i>
              <p>
                Monografi Desa
              </p>
            </a>
          </li>
          <!-- Program Sosial Module -->
          <li class               = "nav-item">
            <a href               = "#" class="nav-link">
              <i class            = "nav-icon fas fa-hand-holding-heart"></i>
              <p>
                Program Sosial
              </p>
            </a>
          </li>
          <!-- Pertanahan Module -->
          <li class               = "nav-item">
            <a href               = "#" class="nav-link">
              <i class            = "nav-icon fas fa-monument"></i>
              <p>
                Pertanahan
              </p>
            </a>
          </li>
          <!-- Pemetaan Module -->
          <li class               = "nav-item has-treeview">
            <a href               = "#" class="nav-link">
              <i class            = "nav-icon fas fa-atlas"></i>
              <p>
                Pemetaan
                <i class          = "right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class             = "nav nav-treeview">
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-globe-asia nav-icon"></i>
                  <p>Peta</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-drafting-compass nav-icon"></i>
                  <p>Pengaturan Peta</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Pengaturan Module -->
          <li class               = "nav-item has-treeview">
            <a href               = "#" class="nav-link">
              <i class            = "nav-icon fas fa-cogs"></i>
              <p>
                Pengaturan
                <i class          = "right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class             = "nav nav-treeview">
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-tasks nav-icon"></i>
                  <p>Modul</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-cog nav-icon"></i>
                  <p>Aplikasi</p>
                </a>
              </li>
              <li class           = "nav-item">
                <router-link to   = "/pengguna" class="nav-link">
                  <i class        = "fas fa-users-cog nav-icon"></i>
                  <p>Pengguna</p>
                </router-link>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-hdd nav-icon"></i>
                  <p>Database</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-info-circle nav-icon"></i>
                  <p>Info Sistem</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Layanan Module -->
          <li class               = "nav-item has-treeview">
            <a href               = "#" class="nav-link">
              <i class            = "nav-icon fas fa-life-ring"></i>
              <p>
                Layanan
                <i class          = "right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class             = "nav nav-treeview">
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-ticket-alt nav-icon"></i>
                  <p>Ticketing System</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-comments nav-icon"></i>
                  <p>Realtime Messenger</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-robot nav-icon"></i>
                  <p>Chatbot</p>
                </a>
              </li>
              <li class           = "nav-item">
                <a href           = "#" class="nav-link">
                  <i class        = "fas fa-person-booth nav-icon"></i>
                  <p>Personal Services</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>