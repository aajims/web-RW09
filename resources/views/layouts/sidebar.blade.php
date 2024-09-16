  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <span class="brand-text font-weight-light">Sukamulya Cikupa</span>
  </a>

<section class="sidebar">
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/img/logo-rw.jpeg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin Pengurus RW.09</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">BERANDA</li>
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('profil') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil User
              </p>
            </a>
          </li>
          @if(Auth::user()->role == 'Super Admin')
          <li class="nav-header">MASTER DATA</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Data Admin Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('user') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('slide') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Data Slide</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('rt') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Data RT</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('jabatan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Jabatan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Data Pengurus
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('pengurus') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Pengurus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('pengurus/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Pengurus</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Agenda Kegiatan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('agenda') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Agenda</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Personil Keamanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('keamanan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Personil</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-times"></i>
              <p>
                Jadwal Personil Keamanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('jadwal') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Personil</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-camera"></i>
              <p>
                Foto Kegiatan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('foto') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Foto</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Penduduk
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('penduduk') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Penduduk</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-archive"></i>
              <p>
                Data Dokumen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('dokumen') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Dokumen</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-archive"></i>
              <p>
                Karang Taruna
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('karang-taruna') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Karang Taruna</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-futbol"></i>
              <p>
                Data Cabang Olahraga
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('cabor') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Cabang Olahraga</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-trophy"></i>
              <p>
                Data Pertandingan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('pertandingan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Pertandingan</p>
                </a>
              </li>
            </ul>
          </li>

              @elseif(Auth::user()->role == 'Admin')
              <li class="nav-header">MASTER DATA</li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-envelope"></i>
                  <p>
                    Data Admin Master
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('slide') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Data Slide</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('rt') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Data RT</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('jabatan') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Jabatan</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user-tie"></i>
                  <p>
                    Data Pengurus
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('pengurus') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Pengurus</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('pengurus/add') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Pengurus</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-calendar-plus"></i>
                  <p>
                    Agenda Kegiatan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('agenda') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Agenda</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-lock"></i>
                  <p>
                    Personil Keamanan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('keamanan') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Personil</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-calendar-times"></i>
                  <p>
                    Jadwal Personil Keamanan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('jadwal') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Personil</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-camera"></i>
                  <p>
                    Foto Kegiatan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('foto') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Foto</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Penduduk
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('penduduk') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Penduduk</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file-archive"></i>
                  <p>
                    Data Dokumen
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('dokumen') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Dokumen</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file-archive"></i>
                  <p>
                    Karang Taruna
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('karang-taruna') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Karang Taruna</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-futbol"></i>
                  <p>
                    Data Cabang Olahraga
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('cabor') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Cabang Olahraga</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-trophy"></i>
                  <p>
                    Data Pertandingan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('pertandingan') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Pertandingan</p>
                    </a>
                  </li>
                </ul>
              </li>

          @elseif(Auth::user()->role == 'Bendahara')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Kategori Keuangan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('kategori-keuangan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('kategori-keuangan/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Kategori</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Data Keuangan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('keuangan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Keuangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('keuangan/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Keuangan</p>
                </a>
              </li>
            </ul>
          </li>
          
          @elseif(Auth::user()->role == 'Staff23')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Data Penduduk RT 23
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('penduduk') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Data Penduduk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('penduduk/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data Penduduk</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->role == 'Staff24')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Data Penduduk RT 24
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('penduduk') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Data Penduduk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('penduduk/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data Penduduk</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->role == 'Staff25')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Data Penduduk RT 25
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('penduduk') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Data Penduduk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('penduduk/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data Penduduk</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->role == 'Staff26')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Data Penduduk RT 26
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('penduduk') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Data Penduduk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('penduduk/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data Penduduk</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->role == 'Staff27')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Data Penduduk RT 27
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('penduduk') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Data Penduduk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('penduduk/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data Penduduk</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->role == 'Staff28')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Data Penduduk RT 28
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('penduduk') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Data Penduduk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('penduduk/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data Penduduk</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->role == 'Staff29')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Data Penduduk RT 29
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('penduduk') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Data Penduduk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('penduduk/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data Penduduk</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->role == 'Staff41')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Data Penduduk RT 41
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('penduduk') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Data Penduduk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('penduduk/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data Penduduk</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->role == 'Staff48')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Data Penduduk RT 48
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('penduduk') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Data Penduduk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('penduduk/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data Penduduk</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li><a href="{{ url('/logout') }}"><i class="fas fa-fw fa-sign-out-alt"></i> Logout</span></a></li>
        </ul>
      </nav>
    </section>