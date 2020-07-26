    <header class="app-header">
      <a class="app-header__logo" href="{{ route('admin.home') }}">Admin</a>
      <!-- Sidebar toggle button-->
      <a id='app-sidebar__toggle' class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>



      {{-- New add for visite public paeges --}}
      {{-- <a class="app-nav__item" href="{{ url('/') }}" target="blank" title="Visite Pubic pages"><i class="fa fa-eye"></i></a> --}}
      <li class="app-nav__item" style="padding: 12px 15px">
        <a href="{{ route('index') }}" target="_blank" title="{{ __('backend/default.visit_title') }}">
          <img src="{{ asset('public/images/view.png') }}" width="26" height="26">
        </a>
      </li>

      <span class="app-nav_custom_item"></span>

      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-nav__item lang_pen_parent" style="background-color: rgb(6, 114, 104); min-width: 75px;text-align: right; display: none;"><span class="lang_pen">Eng </span><i class="fa fa-pencil"></i></li>
        <li class="app-nav__item" style="padding: 12px 15px">
          @if(Config::get('app.locale') == 'bn')
          <a href="{{ route('language', 'en') }}">
            <img src="{{ asset('public/images/flag/en.png') }}" width="26" height="26" title="Click for english">
          </a>
          @else
          <a href="{{ route('language', 'bn') }}">
            <img src="{{ asset('public/images/flag/bn.png') }}" width="26" height="26" title="বাংলার জন্য ক্লিক করুন">
          </a>
          @endif
        </li>
        <!--Notification Menu-->
        {{-- <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-envelope fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">
              @php $message = DB::table('contacts')->orderBy('id','desc')->limit(10)->get(); @endphp

              You have {{count($message)}} new message.
            </li>
            <div class="app-notification__content">
              @foreach($message as $row)
              <li>
                <a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>

                    <p class="app-notification__message">{{ ucfirst($row->name) }} sent you a message.</p>

                    <p class="app-notification__meta">{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</p>
                  </div>
                </a>
              </li>
              @endforeach
            </div>
            <li class="app-notification__footer"><a href="{{ route('admin.message') }}">See all message.</a></li>
          </ul>
        </li> --}}
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu" style="padding: 10px 15px">
          <img class="img" src="{{ asset('public/images/default.png') }}" alt="👨" width="30" height="30" ></a>
          {{-- Last added anchor --}}
          <ul class="dropdown-menu settings-menu dropdown-menu-right mx-0" style="width: 180px">
            <li><a class="dropdown-item disabled">Hi, {{ Auth()->user()->username }}</a></li>
            @if(Auth::guard('admin')->user()->admin_role == 1)
            <li><a class="dropdown-item" href="{{ route('admin.myadmin.index') }}"><i class="fa fa-users"></i> {{ __('backend/all.my_admins') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('admin.myadmin.add') }}"><i class="fa fa-plus"></i> {{ __('backend/all.add_admin') }}</a></li>
            @endif
            <hr class="my-0">
            <li><a class="dropdown-item" href="{{ route('admin.password.form') }}"><i class="fa fa-cog"></i> {{ __('backend/admin_setting.change_password') }}</a></li>
            <hr class="my-0">
            <li><a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i> {{ __('backend/sidebar.logout') }}</a></li>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </ul>
        </li>
      </ul>
    </header>
