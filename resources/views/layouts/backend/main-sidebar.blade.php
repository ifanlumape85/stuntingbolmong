 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ route('dashboard') }}" class="brand-link">
         <span class="brand-text font-weight-light ml-3">STUNTING BOLMONG</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ auth()->user()->gravatar() }}" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="{{ route('user.edit', auth()->user()->id) }}" class="d-block">{{ auth()->user()->name }}</a>
             </div>
         </div>
         @auth
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-danger"></i>
                         <p>
                             Stunting
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         @can('stunting-list')
                         <li class="nav-item">
                             <a href="{{ route('stunting.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>
                                     Data Stunting
                                 </p>
                             </a>
                         </li>
                         @endcan
                     </ul>
                 </li>

                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-danger"></i>
                         <p>
                             Balita
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         @can('balita-list')
                         <li class="nav-item">
                             <a href="{{ route('balita.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>
                                     Data Balita
                                 </p>
                             </a>
                         </li>
                         @endcan
                     </ul>
                 </li>

                 @if(auth()->user()->is_admin == "Y")
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-danger"></i>
                         <p>
                             Referensi
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         @can('kabupaten-list')
                         <li class="nav-item">
                             <a href="{{ route('kabupaten.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>
                                     Kabupaten
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('kecamatan-list')
                         <li class="nav-item">
                             <a href="{{ route('kecamatan.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>
                                     Kecamatan
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('kelurahan-list')
                         <li class="nav-item">
                             <a href="{{ route('kelurahan.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>
                                     Kelurahan
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('propinsi-list')
                         <li class="nav-item">
                             <a href="{{ route('propinsi.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>
                                     Propinsi
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('puskesmas-list')
                         <li class="nav-item">
                             <a href="{{ route('puskesmas.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>
                                     Puskesmas
                                 </p>
                             </a>
                         </li>
                         @endcan
                     </ul>
                 </li>

                 <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p>
                            News & Gallery
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('gallery-list')
                        <li class="nav-item">
                            <a href="{{ route('gallery.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('news-list')
                        <li class="nav-item">
                            <a href="{{ route('news.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    News
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('category-list')
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Category
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('tag-list')
                        <li class="nav-item">
                            <a href="{{ route('tag.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Tag
                                </p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>

                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-danger"></i>
                         <p>
                             Pengaturan
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         @can('role-list')
                         <li class="nav-item">
                             <a href="{{ route('roles.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>
                                     Roles
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('user-list')
                         <li class="nav-item">
                             <a href="{{ route('user.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>
                                     Users
                                 </p>
                             </a>
                         </li>
                         @endcan
                     </ul>
                 </li>
                 @endif
                 <li class="nav-item">
                     <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                         <p>
                             {{ __('Logout') }}
                         </p>
                     </a>

                 </li>
             </ul>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
         </nav>
         <!-- /.sidebar-menu -->
         @endauth
     </div>
     <!-- /.sidebar -->
 </aside>