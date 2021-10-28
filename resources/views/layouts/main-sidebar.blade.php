<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ trans('backend/main-sidebar.dashboard') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('categories.index')}}">{{trans('backend/main-sidebar.categories')}}</a> </li>

                            <li> <a href="{{route('products.index')}}">{{trans('backend/main-sidebar.products')}}</a> </li>

                              <li> <a href="{{route('invoices.index')}}">{{trans('backend/main-sidebar.invoices')}}</a> </li>

                        </ul>
                    </li>

                </ul>
            </div>
        </div>
