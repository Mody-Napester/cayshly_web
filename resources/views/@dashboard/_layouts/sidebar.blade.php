<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
{{--            <!-- Sidenav Menu Heading (Account)-->--}}
{{--            <!-- * * Note: * * Visible only on and above the sm breakpoint-->--}}
{{--            <div class="sidenav-menu-heading d-sm-none">Account</div>--}}
{{--            <!-- Sidenav Link (Alerts)-->--}}
{{--            <!-- * * Note: * * Visible only on and above the sm breakpoint-->--}}
{{--            <a class="nav-link d-sm-none" href="#!">--}}
{{--                <div class="nav-link-icon"><i data-feather="bell"></i></div>--}}
{{--                Alerts--}}
{{--                <span class="badge badge-warning-soft text-warning ml-auto">4 New!</span>--}}
{{--            </a>--}}
{{--            <!-- Sidenav Link (Messages)-->--}}
{{--            <!-- * * Note: * * Visible only on and above the sm breakpoint-->--}}
{{--            <a class="nav-link d-sm-none" href="#!">--}}
{{--                <div class="nav-link-icon"><i data-feather="mail"></i></div>--}}
{{--                Messages--}}
{{--                <span class="badge badge-success-soft text-success ml-auto">2 New!</span>--}}
{{--            </a>--}}

            <!-- Sidenav Menu Heading (Main)-->
            <div class="sidenav-menu-heading">Main</div>
            @if(check_authority('index.dashboard'))
            <a class="nav-link" href="{{ route('dashboard.home') }}"><div class="nav-link-icon"><i data-feather="activity"></i></div> Dashboard</a>
            @endif

            @if(check_authority('use.application'))
                <!-- Sidenav Menu Heading (Application)-->
                <div class="sidenav-menu-heading">Application</div>
                @if(check_authority('use.authorization'))
                    <!-- Sidenav Accordion (Authorization)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="false" aria-controls="collapseAuthorization">
                        <div class="nav-link-icon"><i data-feather="key"></i></div>
                        Authorization
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseAuthorization" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        @if(check_authority('index.permission_groups'))
                            <a class="nav-link" href="{{ route('permission-groups.index') }}">Groups</a>
                        @endif
                        @if(check_authority('index.permissions'))
                            <a class="nav-link" href="{{ route('permissions.index') }}">Permissions</a>
                        @endif
                        @if(check_authority('index.role'))
                            <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                        @endif
                    </nav>
                </div>
                @endif

                @if(check_authority('index.users'))
                    <a class="nav-link" href="{{ route('user.index') }}"><div class="nav-link-icon"><i data-feather="user"></i></div> Users</a>
                @endif
                @if(check_authority('index.lookup'))
                    <a class="nav-link" href="{{ route('lookup.index') }}"><div class="nav-link-icon"><i data-feather="book"></i></div> Lookups</a>
                @endif
                @if(check_authority('index.script'))
                    <a class="nav-link" href="{{ route('script.index') }}"><div class="nav-link-icon"><i data-feather="code"></i></div> Scripts</a>
                @endif

            @endif

            @if(check_authority('use.control'))
                <!-- Sidenav Heading (Control)-->
                <div class="sidenav-menu-heading">Control</div>
                <a class="nav-link" href="{{ url('translations') }}"><div class="nav-link-icon"><i data-feather="globe"></i></div> Translations</a>
                @if(check_authority('use.utilities'))
                    <!-- Sidenav Accordion (Utilities)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                        <div class="nav-link-icon"><i data-feather="grid"></i></div>
                        Utilities
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseUtilities" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            @if(check_authority('index.category'))
                                <a class="nav-link" href="{{ route('category.index') }}">Categories</a>
                            @endif
                            @if(check_authority('index.brand'))
                                <a class="nav-link" href="{{ route('brand.index') }}">Brands</a>
                            @endif
                            @if(check_authority('index.country'))
                                <a class="nav-link" href="{{ route('country.index') }}">Countries</a>
                            @endif
                            @if(check_authority('index.city'))
                                <a class="nav-link" href="{{ route('city.index') }}">Cities</a>
                            @endif
                            @if(check_authority('index.area'))
                                <a class="nav-link" href="{{ route('area.index') }}">Areas</a>
                            @endif
                        </nav>
                    </div>
                @endif
            @endif

            @if(check_authority('use.core'))
                <!-- Sidenav Accordion (Core)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseCore" aria-expanded="false" aria-controls="collapseCore">
                    <div class="nav-link-icon"><i data-feather="package"></i></div>
                    Core
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCore" data-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                    @if(check_authority('index.store'))
                        <a class="nav-link" href="{{ route('store.index') }}">Stores</a>
                    @endif
                    @if(check_authority('index.specification'))
                        <a class="nav-link" href="{{ route('specification.index') }}">Specifications</a>
                    @endif
                    @if(check_authority('index.option'))
                        <a class="nav-link" href="{{ route('option.index') }}">Options</a>
                    @endif
                    @if(check_authority('index.product'))
                        <a class="nav-link" href="{{ route('product.index') }}">Products</a>
                    @endif
                    @if(check_authority('index.offer'))
                        <a class="nav-link" href="{{ route('offer.index') }}">Offers</a>
                    @endif
                    @if(check_authority('index.slider'))
                        <a class="nav-link" href="{{ route('slider.index') }}">Slider</a>
                    @endif
                    @if(check_authority('index.social'))
                        <a class="nav-link" href="{{ route('social.index') }}">Social</a>
                    @endif
                </nav>
            </div>
            @endif

            @if(check_authority('use.reports'))
                <!-- Sidenav Accordion (Reports)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseReports" aria-expanded="false" aria-controls="collapseReports">
                    <div class="nav-link-icon"><i data-feather="flag"></i></div>
                    Reports
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseReports" data-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                    <a class="nav-link" href="{{ route('dashboard.point.index') }}">Points</a>
{{--                    @if(check_authority('index.points'))--}}
{{--                    @endif--}}
                </nav>
            </div>
            @endif

            @if(check_authority('use.views'))
            <!-- Sidenav Heading (Views)-->
            <div class="sidenav-menu-heading">Views</div>
                @if(check_authority('index.contact'))
                    <a class="nav-link" href="{{ route('contact.index') }}"><div class="nav-link-icon"><i data-feather="map-pin"></i></div> Contact us</a>
                @endif
                @if(check_authority('index.page'))
                    <a class="nav-link" href="{{ route('page.index') }}"><div class="nav-link-icon"><i data-feather="layout"></i></div> Pages</a>
                @endif
                @if(check_authority('index.blog'))
                    <a class="nav-link" href="{{ route('blog.index') }}"><div class="nav-link-icon"><i data-feather="type"></i></div> Blogs</a>
                @endif
            @endif

            @if(check_authority('use.support'))
            <!-- Sidenav Heading (Support)-->
            <div class="sidenav-menu-heading">Support</div>
                <a class="nav-link" href="{{ route('dashboard.ask.index') }}"><div class="nav-link-icon"><i data-feather="message-square"></i></div> Messages</a>
                @if(check_authority('index.orders'))
                    <a class="nav-link" href="{{ route('dashboard.order.index') }}"><div class="nav-link-icon"><i data-feather="shopping-bag"></i></div> Orders</a>
                @endif
                @if(check_authority('index.subscriber'))
                    <a class="nav-link" href="{{ route('dashboard.subscriber.index') }}"><div class="nav-link-icon"><i data-feather="user-check"></i></div> Subscribers</a>
                @endif
                @if(check_authority('index.ticket'))
                    <a class="nav-link" href="{{ route('dashboard.ticket.index') }}"><div class="nav-link-icon"><i data-feather="message-square"></i></div> Tickets</a>
                @endif
            @endif

        </div>
    </div>
    <!-- Sidenav Footer-->
{{--    <div class="sidenav-footer">--}}
{{--        <div class="sidenav-footer-content">--}}
{{--            <div class="sidenav-footer-subtitle">Logged in as:</div>--}}
{{--            <div class="sidenav-footer-title">Valerie Luna</div>--}}
{{--        </div>--}}
{{--    </div>--}}
</nav>
