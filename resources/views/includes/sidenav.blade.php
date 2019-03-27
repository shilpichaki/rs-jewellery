
<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu active pcoded-trigger">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Stock Application</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="active">
                        <a href="{{route('stock.create')}}">
                            <span class="pcoded-mtext">Add Stock</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{route('stock.index')}}">
                            <span class="pcoded-mtext">All Stocks</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Design Aadhaar</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="active">
                        <a href="{{route('design.add-design')}}">
                            <span class="pcoded-mtext">Add Design</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{route('design.index')}}">
                            <span class="pcoded-mtext">All Designs</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Order Aadhaar</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="active">
                        <a href="{{route('order.create')}}">
                            <span class="pcoded-mtext">Add Order</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>