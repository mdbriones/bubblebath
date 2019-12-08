
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@include('layouts.navbars.sidebar')
<div class="main-panel" style="background-image: linear-gradient(to right, #0F2A4B , #295483);">
    @include('layouts.navbars.navs.auth')
    @yield('content')
    {{-- @include('layouts.footer') --}}
</div>