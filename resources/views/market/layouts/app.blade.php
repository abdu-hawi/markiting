@can('market')
    @include('market.layouts.head')
    @include('market.layouts.nav')
    @include('market.layouts.sidebar')
    @yield('content')
    @include('market.layouts.sidebarControl')
    @include('market.layouts.footer')
@else
    {!! abort(403) !!}
@endcan
