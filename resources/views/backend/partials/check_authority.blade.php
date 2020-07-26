
      @php
        // $role_wise_menus = \App\Models\Role::where('role', Auth()->guard('admin')->user()->admin_role)->first();
        // $role_menus = json_decode($role_wise_menus->menu);
        // $role_sub_menus = json_decode($role_wise_menus->sub_menu);
        $access_check = \App\Models\Menu::where('route', Route::currentRouteName())->first();

        $_data_ = array_merge($role_menus, $role_sub_menus, $role_in_body);

      @endphp
      @if ($access_check)
        @if (!in_array($access_check->id, $_data_) && Auth()->guard('admin')->user()->admin_role!=1)
          <script type="text/javascript">
            window.location.href = '{{ route("errors.404") }}';
          </script>
        @endif
      @endif