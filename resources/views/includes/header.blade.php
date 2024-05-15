<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
  id="layout-navbar" style="z-index: 1000">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="bx bx-menu bx-sm"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center d-none d-sm-block">
      <div class="nav-item d-flex align-items-center" style="width: 600px !important; z-index: 100 !important;">

        <select class="form-control border-0 shadow-none laravel-select2" id="laravel_navigation"
          style="z-index: 100 !important; width: 100%">
          @foreach ($menus as $menu)
            @php
              //role config
              $role_access = isAccess('list', $menu->id, Auth::user()->role_id);
              
              if (!$role_access) {
                  continue;
              }
            @endphp

            @if ($menu->menus->count() > 0)
              <optgroup label="{{ $menu->name }}">
                <option>Dashboard {{ $menu->name }}</option>
                @foreach ($menu->menus as $submenu)
                  @php
                    //role config
                    $role_access = isAccess('list', $submenu->id, Auth::user()->role_id);
                    if (!$role_access) {
                        continue;
                    }
                  @endphp
                  <option value="{{ url($submenu->link) }}"
                    {{ Request::is($submenu->link . '/*') || Request::is($submenu->link) ? 'selected' : '' }}>
                    {{ $submenu->name }}
                  </option>
                @endforeach
              </optgroup>
            @else
              <option value="{{ url($menu->link) }}"
                {{ Request::is($menu->link . '/*') || Request::is($menu->link) ? 'selected' : '' }}>
                {{ $menu->name }}</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">

      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            @if (Auth::user()->avatar != null)
              @if (Storage::disk('public')->exists(Auth::user()->avatar))
                <img src="{{ Storage::url(Auth::user()->avatar) }}" alt class="w-px-40 h-auto rounded-circle" />
              @endif
            @else
              <img src="{{ asset('admin-assets/assets/img/avatars/user-default.png') }}" alt
                class="w-px-40 h-auto rounded-circle" />
            @endif
          </div>
        </a>

        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="{{ url('/user-profile-account') }}">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar avatar-online">

                    @if (Auth::user()->avatar != null)
                      @if (Storage::disk('public')->exists(Auth::user()->avatar))
                        <img src="{{ Storage::url(Auth::user()->avatar) }}" alt
                          class="w-px-40 h-auto rounded-circle" />
                      @endif
                    @else
                      <img src="{{ asset('admin-assets/assets/img/avatars/user-default.png') }}" alt
                        class="w-px-40 h-auto rounded-circle" />
                    @endif

                  </div>
                </div>
                <div class="flex-grow-1">
                  <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                  <small class="text-muted">{{ Auth::user()->role->name }}</small>
                </div>
              </div>
            </a>
          </li>

          <li>
            <div class="dropdown-divider"></div>
          </li>

          <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="bx bx-power-off me-2"></i>
              <span class="align-middle">Log Out</span>
            </a>
          </li>
        </ul>
      </li>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      <!--/ User -->
    </ul>
  </div>
</nav>
