
<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <a href="{{route('dashboard.dashboard')}}" class="text-white pcoded-item p-3">Dashboard</a>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu @if($routeName == 'stock' ) active pcoded-trigger @endif">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Stock Application</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="@if($routeAction == 'create' && $routeName == 'stock') active @endif">
                        <a href="{{route('stock.create')}}">
                            <span class="pcoded-mtext">Add Stock</span>
                        </a>
                    </li>
                    <li class="@if($routeAction == 'index' && $routeName == 'stock' ) active @endif">
                        <a href="{{route('stock.index')}}">
                            <span class="pcoded-mtext">All Stocks</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu @if($routeName == 'design' ) active pcoded-trigger @endif">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Design Aadhaar</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="@if($routeAction == 'add-design' && $routeName == 'design' ) active @endif">
                        <a href="{{route('design.add-design')}}">
                            <span class="pcoded-mtext">Add Design</span>
                        </a>
                    </li>
                    <li class="@if($routeAction == 'index' && $routeName == 'design'  ) active @endif">
                        <a href="{{route('design.index')}}">
                            <span class="pcoded-mtext">All Designs</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu @if($routeName == 'order' && $routeName == 'order') active pcoded-trigger @endif">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Order Aadhaar</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="@if($routeAction == 'create' && $routeName == 'order' ) active @endif">
                        <a href="{{route('order.create')}}">
                            <span class="pcoded-mtext">Add Order</span>
                        </a>
                    </li>
                    <li class="@if($routeAction == 'allocation' && $routeName == 'order' ) active @endif">
                        <a href="{{route('order.allocation')}}">
                            <span class="pcoded-mtext">Order Allocation</span>
                        </a>
                    </li>
                    <li class="@if($routeAction == 'receive' ) active @endif">
                        <a href="{{route('order.receive')}}">
                            <span class="pcoded-mtext">Receive order</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>