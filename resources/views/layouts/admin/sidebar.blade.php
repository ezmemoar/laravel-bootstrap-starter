<div class="app-sidebar sidebar-shadow">
  <div class="app-header__logo">
    <div class="logo-src"></div>
    <div class="header__pane ml-auto">
      <div>
        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      </div>
    </div>
  </div>
  <div class="app-header__mobile-menu">
    <div>
      <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
    </div>
  </div>
  <div class="app-header__menu">
    <span>
      <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
        <span class="btn-icon-wrapper">
          <i class="fa fa-ellipsis-v fa-w-6"></i>
        </span>
      </button>
    </span>
  </div>
  <div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">

      <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading">Menu</li>
        <x-atoms.sidebar.menu-item name="Dashboard" :href="route('admin.dashboard')" />

        <x-atoms.sidebar.menu-dropdown-item name="Admin" icon="pe-7s-diamond"
          :permission="['list admin', 'create admin']" :children="[
            [
                'href' => route('admin.admin.list'),
                'name' => 'List Admin',
                'permission' => ['list admin']
            ],
            [
                'href' => route('admin.admin.create'),
                'name' => 'Create Admin',
                'permission' => ['create admin']
            ],
        ]" />
        </li>
      </ul>

      @role('superadmin')
      <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading">Permission</li>
        <x-atoms.sidebar.menu-item name="Role" :href="route('admin.role.list')" />

        <x-atoms.sidebar.menu-dropdown-item name="Permission" icon="pe-7s-diamond"
          :permission="['list admin', 'create admin']" :children="[
            [
                'href' => route('admin.permission.list'),
                'name' => 'Permission',
            ],
            [
                'href' => route('admin.permission-group.list'),
                'name' => 'Permission Group',
            ],
        ]" :is-active="false" />
        </li>
      </ul>
      @endrole

    </div>
  </div>
</div>
