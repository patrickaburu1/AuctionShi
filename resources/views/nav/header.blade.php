

<header class="header-desktop" >
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" hidden
                           placeholder="Search for datas &amp; reports..."/>

                </form>
                <div class="header-button">

                    <div class="account-wrap">

                            @if(\Illuminate\Support\Facades\Auth::check()==true)
                            <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="{{asset('images/icon/avatar-01.jpg')}}" alt="Name"/>
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">

                                <div class="account-dropdown__footer">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>

                                </div>


                            </div>
                        </div>
                            @else

                                    <a class="js-acc-btn text-info" href="{{url('login')}}">LOGIN</a>

                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

