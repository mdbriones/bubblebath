<div class="sidebar" data-color="orange">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow" -->
  <div class="logo" align="center" style="background-color: #292929;">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
    <img src="{{ asset('assets/img/bubblebath-logo.png') }}" alt="">
      {{ __('BubbleBath') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      <li class="@if ($activePage == 'clientCarwash' || $activePage == 'clientHistory') active @endif">
        <a @if ($activePage == 'clientCarwash' || $activePage == 'clientHistory')
            style="color: #332a5c;"
          @endif data-toggle="collapse" href="#carwashTab">
          <i @if ($activePage == 'clientCarwash' || $activePage == 'clientHistory')
              style="color: #332a5c;"
            @endif class="fa fa-car"></i>
          <p>
            {{ __("Carwash") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="carwashTab">
          <ul class="nav">
            <li class="@if ($activePage == 'clientCarwash') active @endif">
              <a href="{{ route('carwash.information') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Client Information") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'clientHistory') active @endif">
              <a href="{{ route('carwash.history') }}">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Carwash History") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="@if ($activePage == 'clientShop' || $activePage == 'shopHistory') active @endif">
        <a @if ($activePage == 'clientShop' || $activePage == 'shopHistory')
            style="color: #332a5c;"
          @endif data-toggle="collapse" href="#shopTab">
          <i @if ($activePage == 'clientShop' || $activePage == 'shopHistory')
              style="color: #332a5c;"
            @endif class="fa fa-car"></i>
          <p>
            {{ __("Shop") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="shopTab">
          <ul class="nav">
            <li class="@if ($activePage == 'clientShop') active @endif">
              <a href="{{ route('shop.information') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Client Information") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'shopHistory') active @endif">
              <a href="{{ route('shop.history') }}">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Shop History") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="@if ($activePage == 'receivableCarwash' || $activePage == 'receivableShop') active @endif">
        <a  @if ($activePage == 'receivableCarwash' || $activePage == 'receivableShop')
              style="color: #332a5c;"
            @endif data-toggle="collapse" href="#receivableTab">
          <i @if ($activePage == 'receivableCarwash' || $activePage == 'receivableShop')
              style="color: #332a5c;"
            @endif class="now-ui-icons business_money-coins"></i>
          <p>
            {{ __("Receivables") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="receivableTab">
          <ul class="nav">
            <li class="@if ($activePage == 'receivableCarwash') active @endif">
              <a href="{{ route('carwash.receivables') }}">
                <i class="fa fa-car"></i>
                <p> {{ __("Carwash") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'receivableShop') active @endif">
              <a href="{{ route('shop.receivables') }}">
                <i class="now-ui-icons shopping_shop"></i>
                <p> {{ __("Shop") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="@if ($activePage == 'reportsCarwash' || $activePage == 'reportsShop') active @endif">
        <a @if ($activePage == 'reportsCarwash' || $activePage == 'reportsShop')
            style="color: #332a5c;"
          @endif data-toggle="collapse" href="#reportsTab">
          <i @if ($activePage == 'reportsCarwash' || $activePage == 'reportsShop')
            style="color: #332a5c;"
          @endif class="now-ui-icons business_chart-bar-32"></i>
          <p>
            {{ __("Reports") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="reportsTab">
          <ul class="nav">
            <li class="@if ($activePage == 'reportsCarwash') active @endif">
              <a href="{{ route('carwash.reports') }}">
                <i class="now-ui-icons files_single-copy-04"></i>
                <p> {{ __("Carwash") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'reportsShop') active @endif">
              <a href="{{ route('shop.reports') }}">
                <i class="now-ui-icons files_single-copy-04"></i>
                <p> {{ __("Shop") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="@if ($activePage == 'todaySched' || $activePage == 'pastSChed') active @endif">
        <a @if ($activePage == 'todaySched' || $activePage == 'pastSChed')
          style='color: #332a5c;'
          @endif data-toggle="collapse" href="#productivityTab">
          <i @if ($activePage == 'todaySched' || $activePage == 'pastSChed')
            style='color: #332a5c;'
            @endif class="now-ui-icons sport_user-run"></i>
          <p>
            {{ __("Productivity") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="productivityTab">
          <ul class="nav">
            <li class="@if ($activePage == 'todaySched') active @endif">
              <a href="{{ route('schedule.today') }}">
                <i class="now-ui-icons business_badge"></i>
                <p> {{ __("Today's Schedule") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'pastSChed') active @endif">
              <a href="{{ route('schedule.viewPastSched') }}">
                <i class="now-ui-icons ui-1_calendar-60"></i>
                <p> {{ __("View Past Schedules") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>

    <li class="@if ($activePage == 'encodeStocks' || $activePage == 'outworks/parts' || $activePage == 'shares') active @endif">
        <a @if ($activePage == 'encodeStocks' || $activePage == 'outworks/parts' || $activePage == 'shares')
              style='color: #332a5c;'
            @endif data-toggle="collapse" href="#others">
          <i @if ($activePage == 'encodeStocks' || $activePage == 'outworks/parts' || $activePage == 'shares')
              style='color: #332a5c;'
            @endif class="now-ui-icons sport_user-run"></i>
          <p>
            {{ __("Others") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="others">
          <ul class="nav">
            <li class="@if ($activePage == 'encodeStocks') active @endif">
              <a href=" {{ route('others.encodeStocks') }}">
                <i class="now-ui-icons design_app"></i>
                <p> {{ __("Encode Stocks") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'outworks/parts') active @endif">
              <a href="{{ route('others.outparts') }}">
                <i class="now-ui-icons ui-2_settings-90"></i>
                <p> {{ __("Outworks/Parts") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'shares') active @endif">
              <a href="{{ route('others.shares') }}">
                <i class="now-ui-icons emoticons_satisfied"></i>
                <p> {{ __("Shares") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      {{-- <li class="@if ($activePage == 'icons') active @endif">
        <a href="{{ route('page.index','icons') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'maps') active @endif">
        <a href="{{ route('page.index','maps') }}">
          <i class="now-ui-icons location_map-big"></i>
          <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'notifications') active @endif">
        <a href="{{ route('page.index','notifications') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'table') active @endif">
        <a href="{{ route('page.index','table') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'typography') active @endif">
        <a href="{{ route('page.index','typography') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'upgrade') active @endif active-pro">
        <a href="{{ route('page.index','upgrade') }}">
          <i class="now-ui-icons arrows-1_cloud-download-93"></i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li> --}}
    </ul>
  </div>
</div>