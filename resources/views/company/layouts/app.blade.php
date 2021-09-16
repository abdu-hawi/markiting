@can('company')
    @include('company.layouts.head')
    @include('company.layouts.nav')
    @include('company.layouts.sidebar')
    @yield('content')
    @include('company.layouts.sidebarControl')
    @include('company.layouts.footer')
@else
    {!! abort(403) !!}
@endcan
