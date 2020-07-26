<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar of-y-hidden">
  <div data-simplebar class="h-100">

    @if (strpos(url('/'), 'localhost') !== false)
        @include('backend.pages.root.Importents.developer')
    @endif

    <ul class="app-menu">
      @php 
      $role_wise_menus = \App\Models\Role::where('role', Auth()->guard('admin')->user()->admin_role)->first();
      @endphp
      @if($role_wise_menus)
        @php
        // decode menus and submenus
        $role_menus = json_decode($role_wise_menus->menu);
        $role_sub_menus = json_decode($role_wise_menus->sub_menu);
        $role_in_body = json_decode($role_wise_menus->in_body);
        @endphp

        {{-- Check Authority --}}
        @include('backend.partials.check_authority')
        {{-- Check Authority --}}

        @foreach($role_menus as $role_menu)
          @php
          // retrieve row for the menu_id
          $menu = \App\Models\Menu::roleMenu($role_menu);
          @endphp

          {{-- if it is the menu (not submenu) --}}
          @if(is_null($menu->parent_id))

            @php
              $menu_all_submenus = $menu->submenus;
            @endphp

            @if($menu->route)
              @php
              if(Route::is($menu->route)){
                $id = 'me_';
              } else {
                $id = '';
              }
              @endphp
              <li>
                <a id="{{ $id }}" class="app-menu__item {{ Route::is($menu->route) ? 'active' : '' }}
                  @foreach($menu_all_submenus as $submenus)
                  {{ Route::is($submenus->route) ? 'active' : '' }}
                  @foreach($submenus->submenus as $in_body)
                  {{ Route::is($in_body->route) ? 'active' : '' }}
                  @endforeach
                  @endforeach
                  " href="{{ route($menu->route) }}"><i class="app-menu__icon {{ $menu->icon }}"></i><span class="app-menu__label">@if(Config::get('app.locale') == 'en') {{ $menu->menu }} @else {{ $menu->menu_bn }} @endif</span>
                </a>
              </li>
            @else
              <li class="treeview
                @foreach($menu_all_submenus as $submenus)
                  {{ Route::is($submenus->route) ? 'is-expanded' : '' }}
                  @foreach($submenus->submenus as $in_body)
                    {{ Route::is($in_body->route) ? 'is-expanded' : '' }}
                  @endforeach
                @endforeach
                ">
                <a class="app-menu__item" href="#" data-toggle="treeview"
                  @foreach($menu_all_submenus as $submenus)
                    {{ Route::is($submenus->route) ? 'active' : '' }}
                    @foreach($submenus->submenus as $in_body)
                      {{ Route::is($in_body->route) ? 'active' : '' }}
                    @endforeach
                  @endforeach
                  >
                  <i class="app-menu__icon {{ $menu->icon }}"></i>
                  <span class="app-menu__label">@if(Config::get('app.locale') == 'en') {{ $menu->menu }} @else {{ $menu->menu_bn }} @endif</span><i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                  @foreach($menu_all_submenus as $submenu)
                    @if(\App\Models\Menu::existForRole($submenu->id, $role_sub_menus))

                    @php
                      if(Route::is($submenu->route)){ 
                        $id = 'me_';
                      }else{
                        $id = '';
                        foreach($submenu->submenus as $in_body){
                          if(Route::is($in_body->route)){ 
                            $id = 'me_';
                            break;
                          }else{
                            $id = '';
                          }
                        }
                      }
                    @endphp

                      <li>
                        <a id="{{ $id }}" class="treeview-item {{ Route::is($submenu->route) ? 'active_submenu' : '' }}
                        @foreach($submenu->submenus as $in_body)
                        {{ Route::is($in_body->route) ? 'active_submenu' : '' }}
                        @endforeach" href="{{ route($submenu->route) }}"><i class="icon {{ $submenu->icon }}"></i> @if(Config::get('app.locale') == 'en') {{ $submenu->menu }} @else {{ $submenu->menu_bn }} @endif</a>
                      </li>
                    @endif
                  @endforeach
                </ul>
              </li>
            @endif

          @endif
        @endforeach
      @endif
    </ul>
  </div>
</aside>