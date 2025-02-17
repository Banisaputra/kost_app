<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="#" class="app-brand-link">
      <span class="app-brand-text demo menu-text fw-bold ms-2">Kost Kita</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item active">
      <a href="#" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-dashboard"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Master</span>
    </li>
    <!-- Apps -->
    <li class="menu-item">
      <a href="{{ route('rooms.index') }}" class="menu-link">
        <i class='menu-icon tf-icons bx bx-home' ></i>
        <div data-i18n="Rooms">Data Ruangan</div>
        {{-- <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div> --}}
      </a>
    </li>
     
    <li class="menu-item">
      <a href="#" class="menu-link">
        <i class="menu-icon tf-icons bx bx-grid"></i>
        <div data-i18n="Kanban">XXCS</div>
      </a>
    </li>
    
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
        <div data-i18n="Authentications">Authentications</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="auth-login-basic.html" class="menu-link" target="_blank">
            <div data-i18n="Basic">Login</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="auth-register-basic.html" class="menu-link" target="_blank">
            <div data-i18n="Basic">Register</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
            <div data-i18n="Basic">Forgot Password</div>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</aside>