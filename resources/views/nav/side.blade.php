 <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <span class="h1" href="#">
                     ACTIONEER
                </span>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{url('dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">

                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-shopping-cart"></i>Product Categories</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"></option>
                                    <li >
                                        <a class="fas fa-tachometer-alt" href="{{url('category/'.$category->id)}}"> {{$category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-list"></i>Bids</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('placed-bids')}}">Placed Bids</a>
                                    <a href="{{url('won-bids')}}">Won  Bids</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-shopping-basket"></i>My Products</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('my-products')}}"> Products</a>
                                    <a href="{{url('running-products')}}">Running Products</a>
                                    <a href="{{url('sold-products')}}">Sold Products</a>
                                    <a href="{{url('suspended-products')}}">Suspended Products</a>
                                </li>

                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-credit-card"></i>My Account</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('top-up')}}">To-up</a>
                                    <a href="button.html">Transaction History</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->