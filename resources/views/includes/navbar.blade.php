<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


  <div class="app-brand demo">
    <a href="/" class="app-brand-link text-left">
      <span class="app-brand-logo demo">

        <img src="{{ asset('admin-assets/assets/img/icons/app-development.png') }}" width="50" viewBox="0 0 25 42"
          alt="" />

      </span>

      <span
        class="app-brand-text demo menu-text fw-bolder ms-2">{{ config('app.name', 'Kasir Pintar') }}</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  {{-- @php
    dd(Request::segment(1));
  @endphp --}}

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">

    {{-- get module menu --}}
    @foreach ($menus as $menu)
      @php
        //role config
        $role_access = isAccess('list', $menu->id, Auth::user()->role_id);

        if (!$role_access) {
            continue;
        }
      @endphp

      @if ($menu->menus->count() < 1)
        <li class="menu-item {{ activeMenu($menu->link) }}">
          <a href="/{{ $menu->link }}" class="menu-link">
            <i class="menu-icon {{ $menu->icon }}"></i>
            <div data-i18n="{{ $menu->name }}">{{ $menu->name }}</div>
          </a>
        </li>
      @else
        <li class="menu-header small text-uppercase"><span class="menu-header-text">{{ $menu->name }}</span></li>

        @foreach ($menu->menus as $submenu)
          @php
            //role config
            $role_access = isAccess('list', $submenu->id, Auth::user()->role_id);

            if (!$role_access) {
                continue;
            }
          @endphp

          <li class="menu-item {{ activeMenu($submenu->link) }}">
            <a href="/{{ $submenu->link }}" class="menu-link">
              <i class="menu-icon {{ $submenu->icon }}"></i>
              <div data-i18n="{{ $submenu->name }}">{{ $submenu->name }}</div>
            </a>
          </li>
        @endforeach
      @endif
    @endforeach
    {{-- /get module menu --}}
  </ul>



</aside>
