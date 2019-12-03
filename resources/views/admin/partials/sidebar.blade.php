<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name ?? 'Admin' }}</p>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@if (Request::segment(2) == '') active @endif">
                <a href="{{ asset('admin') }}">
                    <i class="fa fa-child"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview @if (Request::segment(2) == 'product') active @endif">
                <a>
                    <i class="fa fa-comments-o"></i> <span>Quản lý sản phẩm</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ asset('admin/product') }}"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
                    <li><a href="{{ asset('admin/product/add') }}"><i class="fa fa-circle-o"></i> Thêm sản phẩm</a></li>
                </ul>
            </li>
            <li class="@if (Request::segment(2) == 'category') active @endif">
                <a href="{{ asset('admin/category') }}">
                    <i class="fa fa-child"></i> <span>Danh mục phân loại</span>
                </a>
            </li>

            <li class="@if (Request::segment(2) == 'brand') active @endif">
                <a href="{{ asset('admin/brand') }}">
                    <i class="fa fa-home"></i> <span>Danh mục thương hiệu</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-info"></i> <span>Đăng xuất</span>
                    <span class="pull-right-container"></span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </section>
</aside>