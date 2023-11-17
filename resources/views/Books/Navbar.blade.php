<!DOCTYPE html>
<html lang="en">
<head>
   @include('Books.link')
</head>
<body>
     
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="logo">
        <span class="d-none d-lg-block">Books</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ session('username') }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ session('username')}}</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      @if (session('user_id') === 1)
          <li class="nav-item">
              <a class="nav-link collapsed" href="/homes">
                  <i class="fa-solid fa-table-columns"></i>
                  <span>Dashboard</span>
              </a> 
        </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('book.sale')}}">
               <i class="fa-solid fa-cart-shopping"></i>
               <span>Purchase</span>
          </a> 
     </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/books">
          <i class="fa-solid fa-book"></i>
          <span>Books</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
          <a class="nav-link collapsed" href="/years">
               <i class="fa-solid fa-calendar"></i>
               <span>Year</span>
          </a> 
     </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="/faculty">
               <i class="fa-solid fa-plus"></i>
               <span>Faculty</span>
          </a> 
     </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="/majors">
               <i class="fa-solid fa-plus"></i>
               <span>Major</span>
          </a> 
     </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="/semester">
               <i class="fa-solid fa-plus"></i>
               <span>Semester</span>
          </a> 
     </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="/instock">
               <i class="fa-solid fa-plus"></i>
               <span>Instock</span>
          </a> 
     </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="/outstock">
               <i class="fa-solid fa-minus"></i>
               <span>Outstock</span>
          </a> 
     </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('customers')}}">
               <i class="fa-solid fa-user"></i>
               <span>Users</span>
          </a> 
     </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="/logout">
              <i class="fa-solid fa-right-from-bracket"></i>
               <span>Log out</span>
          </a> 
     </li>
      @else
      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('book.sale')}}">
               <i class="fa-solid fa-cart-shopping"></i>
               <span>Purchase</span>
          </a> 
     </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/books">
          <i class="fa-solid fa-book"></i>
          <span>Books</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
          <a class="nav-link collapsed" href="/years">
               <i class="fa-solid fa-calendar"></i>
               <span>Year</span>
          </a> 
     </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="/faculty">
               <i class="fa-solid fa-plus"></i>
               <span>Faculty</span>
          </a> 
     </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="/majors">
               <i class="fa-solid fa-plus"></i>
               <span>Major</span>
          </a> 
     </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="/semester">
               <i class="fa-solid fa-plus"></i>
               <span>Semester</span>
          </a> 
     </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="/instock">
               <i class="fa-solid fa-plus"></i>
               <span>Instock</span>
          </a> 
     </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="/outstock">
               <i class="fa-solid fa-minus"></i>
               <span>Outstock</span>
          </a> 
     </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('customers')}}">
               <i class="fa-solid fa-user"></i>
               <span>Users</span>
          </a> 
     </li>
      <li class="nav-item">
          <a class="nav-link collapsed" href="/logout">
              <i class="fa-solid fa-right-from-bracket"></i>
               <span>Log out</span>
          </a> 
     </li>
    @endif
    </ul>
  </aside><!-- End Sidebar-->
  <script>

  const currentPage = window.location.href;
  const navLinks = document.querySelectorAll('.sidebar-nav .nav-link');
  navLinks.forEach(link => {
      if (currentPage.includes(link.getAttribute('href'))) {
          link.classList.add('active');
      }
  });
  </script>
</body>
</html>