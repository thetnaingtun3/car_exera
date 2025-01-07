   <nav class="sidebar sidebar-offcanvas" id="sidebar">
       <ul class="nav">
           <li class="nav-item nav-profile">
               <div class="nav-link">
                   <div class="profile-image">
                       <img src="{{ asset('assets/images/faces/face5.jpg') }}" alt="image" />
                   </div>
                   <div class="profile-name">
                       <p class="name">
                           Welcome Jane
                       </p>
                       <p class="designation">
                           Super Admin
                       </p>
                   </div>
               </div>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="index-2.html">
                   <i class="fa fa-home menu-icon"></i>
                   <span class="menu-title">Dashboard</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="pages/widgets.html">
                   <i class="fa fa-puzzle-piece menu-icon"></i>
                   <span class="menu-title">Widgets</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                   aria-controls="page-layouts">
                   <i class="fab fa-trello menu-icon"></i>
                   <span class="menu-title">Page Layouts</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="page-layouts">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                               href="pages/layout/boxed-layout.html">Boxed</a></li>
                       <li class="nav-item"> <a class="nav-link" href="pages/layout/rtl-layout.html">RTL</a>
                       </li>
                       <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                               href="pages/layout/horizontal-menu.html">Horizontal Menu</a></li>
                   </ul>
               </div>
           </li>
           <li class="nav-item d-none d-lg-block">
               <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false"
                   aria-controls="sidebar-layouts">
                   <i class="fas fa-columns menu-icon"></i>
                   <span class="menu-title">Sidebar Layouts</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="sidebar-layouts">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" href="pages/layout/compact-menu.html">Compact
                               menu</a></li>
                       <li class="nav-item"> <a class="nav-link" href="pages/layout/sidebar-collapsed.html">Icon
                               menu</a></li>
                       <li class="nav-item"> <a class="nav-link" href="pages/layout/sidebar-hidden.html">Sidebar
                               Hidden</a></li>
                       <li class="nav-item"> <a class="nav-link" href="pages/layout/sidebar-hidden-overlay.html">Sidebar
                               Overlay</a></li>
                       <li class="nav-item"> <a class="nav-link" href="pages/layout/sidebar-fixed.html">Sidebar
                               Fixed</a></li>
                   </ul>
               </div>
           </li>

           <li class="nav-item">
               <a class="nav-link" data-toggle="collapse" href="#e-commerce" aria-expanded="false"
                   aria-controls="e-commerce">
                   <i class="fas fa-shopping-cart menu-icon"></i>
                   <span class="menu-title">E-commerce</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="e-commerce">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" href="pages/samples/invoice.html"> Invoice
                           </a></li>
                       <li class="nav-item"> <a class="nav-link" href="pages/samples/pricing-table.html">
                               Pricing Table </a></li>
                       <li class="nav-item"> <a class="nav-link" href="pages/samples/orders.html"> Orders
                           </a></li>
                   </ul>
               </div>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="pages/documentation.html">
                   <i class="far fa-file-alt menu-icon"></i>
                   <span class="menu-title">Documentation</span>
               </a>
           </li>
       </ul>
   </nav>
