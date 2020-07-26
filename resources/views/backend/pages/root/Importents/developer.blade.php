<ul class="app-menu pb-0 bg-theme" style="border-bottom: 8px solid #007d71">
  <li class="treeview {{ (Route::is('admin.menu.index') || Route::is('admin.menu.create') || Route::is('admin.menu.edit')) ? 'is-expanded' : '' }}"><a class="app-menu__item {{ (Route::is('admin.menu.index') || Route::is('admin.menu.create') || Route::is('admin.menu.edit')) ? 'active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">{{ __('backend/sidebar.menu') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item {{ Route::is('admin.menu.index') ? 'active_submenu' : '' }}" href="{{ route('admin.menu.index') }}"><i class="fa fa-list fa-fw"></i>  {{ __('backend/sidebar.menu_list') }}</a></li>
      <li><a class="treeview-item {{ Route::is('admin.menu.create') ? 'active_submenu' : '' }}" href="{{ route('admin.menu.create') }}" rel="noopener"><i class="fa fa-plus fa-fw"></i>  {{ __('backend/sidebar.add_menu') }}</a></li>
      <li><a class="treeview-item {{ Route::is('admin.menu.sort') ? 'active_submenu' : '' }}" href="{{ route('admin.menu.sort') }}" rel="noopener"><i class="fa fa-sort-amount-asc fa-fw"></i>  {{ __('backend/sidebar.sort') }}</a></li>
      <li><a class="treeview-item {{ Route::is('admin.role.assign') ? 'active_submenu' : '' }}" href="{{ route('admin.role.assign','super-admin') }}" rel="noopener"><i class="fa fa-bolt fa-fw"></i>  {{ __('backend/sidebar.assign') }}</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a class="app-menu__item {{ Route::is('admin.language.index') ? 'active_submenu' : '' }}" href="{{ route('admin.language.index') }}"><i class="app-menu__icon fa fa-globe"></i><spaan class="app-menu__label">{{ __('backend/default.language') }}</spaan></a>
  </li>
  <li class="treeview">
    <a class="app-menu__item {{ Route::is('admin.root.index') ? 'active_submenu' : '' }}" href="{{ route('admin.root.index') }}"><i class="app-menu__icon fa fa-free-code-camp"></i><spaan class="app-menu__label">{{ __('backend/default.root') }}</spaan></a>
  </li>
</ul>