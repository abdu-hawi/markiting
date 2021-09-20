<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{!! url('') !!}" class="brand-link">
        <img src="{!! asset('logo.png') !!}" alt="مبادرة مليون متطوع" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{!! auth()->user()->name !!}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
{{--        <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
{{--            <div class="info">--}}
{{--                <a href="javascript:void(0)" class="d-block">{!! ucfirst(auth()->user()->role->name) !!}</a>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{!! route('company.home') !!}" class="nav-link {!! active_menu('dashboard')[0] !!}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{!! trans('market.sidebar.Dashboard') !!}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('company.salesmen') !!}" class="nav-link {!! active_menu('salesmen')[0] !!}">
                        <i class="nav-icon fas fa-comments-dollar"></i>
                        <p>{!! trans('market.company.Salesmen') !!}</p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{!! route('market.settings') !!}" class="nav-link {!! active_menu('settings')[0] !!}">--}}
{{--                        <i class="nav-icon fas fa-cogs"></i>--}}
{{--                        <p>{!! trans('market.setting.Settings') !!}</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{!! route('market.sections') !!}" class="nav-link {!! active_menu('sections')[0] !!}">--}}
{{--                        <i class="nav-icon fa fa-list-alt"></i>--}}
{{--                        <p>Sections</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{!! route('market.qualifications') !!}" class="nav-link {!! active_menu('qualifications')[0] !!}">--}}
{{--                        <i class="nav-icon fas fa-award"></i>--}}
{{--                        <p>Qualifications</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--

                <li class="nav-item">
                    <a href="{!! url('') !!}" class="nav-link">
                        <i class="nav-icon fas fa-hand-holding-heart"></i>
                        <p>
                            المبادرة
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{!! url('programs') !!}" class="nav-link {!! active_menu('programs')[0] !!}">
                        <i class="nav-icon fas fa-code"></i>
                        <p>
                            المجالات
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{!! url('initiatives') !!}" class="nav-link {!! active_menu('initiatives')[0] !!}">
                        <i class="nav-icon fas fa-hands-helping"></i>
                        <p>
                            الفرص التطوعية
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{!! url("volunteers") !!}" class="nav-link {!! active_menu('volunteers')[0] !!}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            المتطوعين
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{!! url('settings') !!}" class="nav-link {!! active_menu('settings')[0] !!}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            الاعدادات
                        </p>
                    </a>
                </li>
--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
