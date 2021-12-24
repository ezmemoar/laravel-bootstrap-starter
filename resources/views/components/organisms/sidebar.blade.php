<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
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
            <x-molecules.sidebar.menu-list name="Menu" :permission="['list admin', 'create admin']" :menu-item="[
                [
                    'name' => 'Dashboard',
                    'icon' => 'pe-7s-rocket',
                    'href' => route('admin.dashboard'),
                    'children' => [],
                ],
                [
                    'name' => 'Admin',
                    'icon' => 'pe-7s-diamond',
                    'permission' => ['list admin', 'create admin'],
                    'children' => [
                        [
                            'href' => route('admin.admin.list'),
                            'name' => 'List Admin',
                            'permission' => 'list admin'
                        ],
                        [
                            'href' => route('admin.admin.create'),
                            'name' => 'Create Admin',
                            'permission' => 'create admin'
                        ],
                    ],
                ],
            ]"></x-molecules.sidebar.menu-list>

            @role('superadmin')
            <x-molecules.sidebar.menu-list name="Permission" :menu-item="[
                [
                    'name' => 'Role',
                    'icon' => 'pe-7s-rocket',
                    'href' => route('admin.role.list'),
                    'children' => [],
                ],
                [
                    'name' => 'Permission',
                    'icon' => 'pe-7s-rocket',
                    'children' => [
                        [
                            'href' => route('admin.permission.list'),
                            'name' => 'Permission',
                        ],
                        [
                            'href' => route('admin.permission-group.list'),
                            'name' => 'Permission Group',
                        ],
                    ],
                ],
            ]"></x-molecules.sidebar.menu-list>
            @endrole
        </div>
    </div>
</div>