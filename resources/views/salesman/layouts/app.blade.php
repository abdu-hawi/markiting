@can('salesman')
    @include('salesman.layouts.head')
    @include('salesman.layouts.nav')
    @include('salesman.layouts.sidebar')
    @yield('content')
    @include('salesman.layouts.sidebarControl')
    @include('salesman.layouts.footer')
@else
    {!! abort(403) !!}
@endcan
