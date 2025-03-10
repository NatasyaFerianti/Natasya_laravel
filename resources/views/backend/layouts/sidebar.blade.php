 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

   <ul class="sidebar-nav" id="sidebar-nav">

     <li class="nav-item">
       <a class="nav-link " href="index.html">
         <i class="bi bi-grid"></i>
         <span>Dashboard</span>
       </a>
     </li><!-- End Dashboard Nav -->
     <li class="nav-item">
       <a class="nav-link {{ Request::is('pendidikan') || Request::is('pengalaman_kerja') ? '' : 'collapsed' }}" data-bs-target="#riwayat-hidup-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-file-earmark-text"></i><span>Riwayat Hidup</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="riwayat-hidup-nav" class="nav-content collapse {{ Request::is('pendidikan') || Request::is('pengalaman_kerja') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
         <li>
           <a href="{{ url('pendidikan') }}" class="{{ Request::is('pendidikan') ? 'active' : '' }}">
             <i class="bi bi-circle"></i>
             <span>Pendidikan</span>
           </a>
         </li>
         <li>
           <a href="{{ route('pengalaman_kerja.index') }}" class="{{ Request::is('pengalaman_kerja') ? 'active' : '' }}">
             <i class="bi bi-circle"></i>
             <span>Pengalaman Kerja</span>
           </a>
         </li>
       </ul>
     </li>

     <li class="nav-heading">Pages</li>

     <li class="nav-item">
       <a class="nav-link collapsed" href="users-profile.html">
         <i class="bi bi-person"></i>
         <span>Profile</span>
       </a>
     </li><!-- End Profile Page Nav -->

     <li class="nav-item">
       <a class="nav-link collapsed" href="pages-faq.html">
         <i class="bi bi-question-circle"></i>
         <span>F.A.Q</span>
       </a>
     </li><!-- End F.A.Q Page Nav -->

     <li class="nav-item">
       <a class="nav-link collapsed" href="pages-contact.html">
         <i class="bi bi-envelope"></i>
         <span>Contact</span>
       </a>
     </li><!-- End Contact Page Nav -->

     <li class="nav-item">
       <a class="nav-link collapsed" href="pages-register.html">
         <i class="bi bi-card-list"></i>
         <span>Register</span>
       </a>
     </li><!-- End Register Page Nav -->

     <li class="nav-item">
       <a class="nav-link collapsed" href="pages-login.html">
         <i class="bi bi-box-arrow-in-right"></i>
         <span>Login</span>
       </a>
     </li><!-- End Login Page Nav -->

     <li class="nav-item">
       <a class="nav-link collapsed" href="pages-error-404.html">
         <i class="bi bi-dash-circle"></i>
         <span>Error 404</span>
       </a>
     </li><!-- End Error 404 Page Nav -->

     <li class="nav-item">
       <a class="nav-link collapsed" href="pages-blank.html">
         <i class="bi bi-file-earmark"></i>
         <span>Blank</span>
       </a>
     </li><!-- End Blank Page Nav -->

   </ul>

 </aside><!-- End Sidebar-->