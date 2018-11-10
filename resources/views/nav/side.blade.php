<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block" style="background-color: #f5f5f5">
    <div class="logo">
                <span class="h3" href="#" >
                    <img src="images/icon/logo.png" alt="ACTIONEER" width="79" height="102"><a href="#">CAMPUS AUCTION</a>
                </span>
    </div>
    <div class="menu-sidebar__content js-scrollbar1"  >
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow text-dark h4" href="{{url('dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">

                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow text-dark h4" href="#">
                        <i class="fas fa-shopping-cart "></i>Product Categories</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"></option>
                            <li class="text-dark h4">
                                <a class="fas fa-tachometer-alt"
                                   href="{{url('category/'.$category->id)}}"> {{$category->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow text-dark h4" href="#">
                        <i class="fas fa-list"></i>Bids</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class="text-dark h4">
                            <a href="{{url('placed-bids')}}">Placed Bids</a>
                        </li>
                        <li class="text-dark h4">
                            <a href="{{url('won-bids')}}">Won Bids</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow text-dark h4" href="#">
                        <i class="fas fa-shopping-basket"></i>My Products</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class="text-dark h4">
                            <a href="{{url('my-products')}}"> Products</a>
                        </li>
                        <li class="text-dark h4">
                            <a href="{{url('running-products')}}">Running Products</a>
                        </li>
                        <li class="text-dark h4">
                            <a href="{{url('sold-products')}}">Sold Products</a>
                        </li>
                        <li class="text-dark h4">
                            <a href="{{url('suspended-products')}}">Suspended Products</a>
                        </li>

                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow text-dark h4" href="#">
                        <i class="fa fa-credit-card"></i>My Account</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class="text-dark h4">
                            <a href="{{url('top-up')}}">To-up</a>
                        </li>
                        <li class="text-dark h4">
                            <a href="{{url('transactions')}}">Transaction History</a>
                        </li>
                    </ul>
                </li>

                @if(\Illuminate\Support\Facades\Auth::check())
                    @if(\Illuminate\Support\Facades\Auth::user()->role==2)
                        <li class="has-sub">
                            <a class="js-arrow text-dark h4" href="#">
                                <i class="fas fa-shopping-basket"></i>Admin Tool</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="text-dark h4">
                                    <a href="{{url('products')}}"> Suspend Product</a>
                                </li>
                                <li class="text-dark h4">
                                    <a href="{{url('addcategory')}}"> Add Category</a>
                                </li>

                            </ul>
                        </li>
                    @endif
                @endif
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->