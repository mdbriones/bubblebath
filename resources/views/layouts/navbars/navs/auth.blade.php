<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <div class="navbar-toggle">
        <button type="button" class="navbar-toggler">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <a class="navbar-brand" href="#MDB">{{ $namePage }}</a>
      <ul>
        <li class="nav-item dropdown" id="small_screen_notif" style="@if (Auth::user()->is_admin != 1) display:none @endif list-style: none;">
          <a class="nav-link notification dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="notification-bell">
              <span class="bell-top"></span>
              <span class="bell-middle"></span>
              <span class="bell-bottom"></span>
              <span class="bell-rad"></span>
            </div>
          <span class="notification-count">{{ $notification ?? '' }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" style="background-color: transparent; width: 250px;">
            @if (isset($checkStocks))
              @if ($checkStocks > 0)
                  @foreach ($criticalStocks as $criticalStock)
                    <div class="alert alert-primary alert-with-icon" style="margin-bottom: 2px;">
                      <span data-notify="icon" class="fa now-ui-icons ui-1_bell-53" style="font-size: 20px;"></span>
                      <a href="encodeStocks" style="font-size: 10px;">Number of {{ $criticalStock->description }} is below 10</a>
                    </div>    
                  @endforeach
              @endif
            @endif
            @if (isset($setSchedule))
                @if ($setSchedule == 1)
                  <div class="alert alert-warning" style="margin-bottom: 2px;"><a href="todaySchedule">Set today Workers</a></div>
                @endif
            @endif
          </div>
        </li>
      </ul>
    </div>
    <div>
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navigation">
      <ul class="navbar-nav">
        <li class="nav-item dropdown" id="id_notif" style="@if (Auth::user()->is_admin != 1) display:none @endif">
          <a class="nav-link notification dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="notification-bell">
              <span class="bell-top"></span>
              <span class="bell-middle"></span>
              <span class="bell-bottom"></span>
              <span class="bell-rad"></span>
            </div>
          <span class="notification-count">{{ $notification ?? '' }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" style="background-color: transparent; width: 250px;">
            @if (isset($checkStocks))
              @if ($checkStocks > 0)
                  @foreach ($criticalStocks as $criticalStock)
                    <div class="alert alert-primary alert-with-icon" style="margin-bottom: 2px;">
                      <span data-notify="icon" class="fa now-ui-icons ui-1_bell-53" style="font-size: 20px;"></span>
                      <a href="encodeStocks" style="font-size: 10px;">Number of {{ $criticalStock->description }} is below 10</a>
                    </div>    
                  @endforeach
              @endif
            @endif
            @if (isset($setSchedule))
                @if ($setSchedule == 1)
                  <div class="alert alert-warning" style="margin-bottom: 2px;"><a href="todaySchedule">Set today Workers</a></div>
                @endif
            @endif
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="now-ui-icons users_single-02"></i>
            <p>
              <span class="d-lg-none d-md-block"></span>
            </p>
            Welcome back, {{ Auth::user()->name }} !
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __("User Management") }}</a>
            {{-- <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __("Edit profile") }}</a> --}}
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <!-- End Navbar -->