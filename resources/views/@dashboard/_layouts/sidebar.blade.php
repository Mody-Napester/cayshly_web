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
            <a class="nav-link" href="{{ route('dashboard.home') }}"><div class="nav-link-icon"><i data-feather="activity"></i></div> Dashboard</a>

            <!-- Sidenav Menu Heading (Application)-->
            <div class="sidenav-menu-heading">Application</div>
            <!-- Sidenav Accordion (Authorization)-->
            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="false" aria-controls="collapseAuthorization">
                <div class="nav-link-icon"><i data-feather="key"></i></div>
                Authorization
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseAuthorization" data-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                    <a class="nav-link" href="{{ route('permission-groups.index') }}">Groups</a>
                    <a class="nav-link" href="{{ route('permissions.index') }}">Permissions</a>
                    <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                </nav>
            </div>
            <a class="nav-link" href="{{ route('dashboard.user.index') }}"><div class="nav-link-icon"><i data-feather="user"></i></div> Users</a>
            <a class="nav-link" href="{{ route('lookup.index') }}"><div class="nav-link-icon"><i data-feather="book"></i></div> Lookups</a>
            <a class="nav-link" href="{{ route('script.index') }}"><div class="nav-link-icon"><i data-feather="code"></i></div> Scripts</a>

    <!-- Sidenav Heading (Control)-->
            <div class="sidenav-menu-heading">Control</div>
            <a class="nav-link" href="{{ url('translations') }}"><div class="nav-link-icon"><i data-feather="globe"></i></div> Translations</a>
            <!-- Sidenav Accordion (Utilities)-->
            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                <div class="nav-link-icon"><i data-feather="grid"></i></div>
                Utilities
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseUtilities" data-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                    <a class="nav-link" href="{{ route('category.index') }}">Categories</a>
                    <a class="nav-link" href="{{ route('brand.index') }}">Brands</a>
                    <a class="nav-link" href="{{ route('country.index') }}">Countries</a>
                    <a class="nav-link" href="{{ route('city.index') }}">Cities</a>
                    <a class="nav-link" href="{{ route('area.index') }}">Areas</a>
                </nav>
            </div>

            <!-- Sidenav Accordion (Core)-->
            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseCore" aria-expanded="false" aria-controls="collapseCore">
                <div class="nav-link-icon"><i data-feather="package"></i></div>
                Core
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseCore" data-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                    <a class="nav-link" href="{{ route('store.index') }}">Stores</a>
                    <a class="nav-link" href="{{ route('specification.index') }}">Specifications</a>
                    <a class="nav-link" href="{{ route('option.index') }}">Options</a>
                    <a class="nav-link" href="{{ route('product.index') }}">Products</a>
                    <a class="nav-link" href="{{ route('offer.index') }}">Offers</a>
                    <a class="nav-link" href="{{ route('slider.index') }}">Slider</a>
                    <a class="nav-link" href="{{ route('social.index') }}">Social</a>
                </nav>
            </div>

            <!-- Sidenav Accordion (Reports)-->
            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseReports" aria-expanded="false" aria-controls="collapseReports">
                <div class="nav-link-icon"><i data-feather="flag"></i></div>
                Reports
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseReports" data-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
{{--                    <a class="nav-link" href="{{ route('dashboard.points.index') }}">Points</a>--}}
                </nav>
            </div>

            <!-- Sidenav Heading (Views)-->
            <div class="sidenav-menu-heading">Views</div>
            <a class="nav-link" href="{{ route('contact.index') }}"><div class="nav-link-icon"><i data-feather="map-pin"></i></div> Contact us</a>
            <a class="nav-link" href="{{ route('page.index') }}"><div class="nav-link-icon"><i data-feather="layout"></i></div> Pages</a>
            <a class="nav-link" href="{{ route('blog.index') }}"><div class="nav-link-icon"><i data-feather="type"></i></div> Blogs</a>

            <!-- Sidenav Heading (Support)-->
            <div class="sidenav-menu-heading">Support</div>
            <a class="nav-link" href="{{ route('dashboard.order.index') }}"><div class="nav-link-icon"><i data-feather="shopping-bag"></i></div> Orders</a>
            <a class="nav-link" href="{{ route('dashboard.subscriber.index') }}"><div class="nav-link-icon"><i data-feather="user-check"></i></div> Subscribers</a>
            <a class="nav-link" href="{{ route('dashboard.ticket.index') }}"><div class="nav-link-icon"><i data-feather="message-square"></i></div> Tickets</a>

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
