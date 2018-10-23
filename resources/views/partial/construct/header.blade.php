<header>
    <div class="container">
        <!-- top nav -->
        <nav class="top_nav d-flex pt-3 pb-1">
            <!-- logo -->
            <h1>
                <a class="navbar-brand" href="{{route('index')}}">fh
                </a>
            </h1>
            <!-- //logo -->
            <div class="w3ls_right_nav ml-auto d-flex">
                @if(session('message'))
                    <h3 style="text-align: center; color:#8b6812; font-weight: bold;" class="card-title">{{session('message')}}</h3>
                @endif
            </div>
            <div class="w3ls_right_nav ml-auto d-flex">
                <!-- search form -->
                <form class="nav-search form-inline my-0 form-control" action="#" method="post">
                    <label>
                        <select class="form-control input-lg" name="category">
                            <option value="all">Search our store</option>
                            <optgroup label="Mens">
                                <option value="T-Shirts">T-Shirts</option>
                                <option value="coats-jackets">Coats & Jackets</option>
                                <option value="Shirts">Shirts</option>
                                <option value="Suits & Blazers">Suits & Blazers</option>
                                <option value="Jackets">Jackets</option>
                                <option value="Sweat Shirts">Trousers</option>
                            </optgroup>
                            <optgroup label="Womens">
                                <option value="Dresses">Dresses</option>
                                <option value="T-shirts">T-shirts</option>
                                <option value="skirts">Skirts</option>
                                <option value="jeans">Jeans</option>
                                <option value="Tunics">Tunics</option>
                            </optgroup>
                            <optgroup label="Girls">
                                <option value="Dresses">Dresses</option>
                                <option value="T-shirts">T-shirts</option>
                                <option value="skirts">Skirts</option>
                                <option value="jeans">Jeans</option>
                                <option value="Tops">Tops</option>
                            </optgroup>
                            <optgroup label="Boys">
                                <option value="T-Shirts">T-Shirts</option>
                                <option value="coats-jackets">Coats & Jackets</option>
                                <option value="Shirts">Shirts</option>
                                <option value="Suits & Blazers">Suits & Blazers</option>
                                <option value="Jackets">Jackets</option>
                                <option value="Sweat Shirts">Sweat Shirts</option>
                            </optgroup>
                        </select>
                    </label>
                    <input class="btn btn-outline-secondary  ml-3 my-sm-0" type="submit" value="Search">
                </form>
                <!-- search form -->
                <div class="nav-icon d-flex">
                    <!-- sign in and sign up -->
                    <div class="shop-menu cart-mainf pull-right">
                        <div class="nav navbar-nav">
                            <?php $user = Session::get('user'); $id = Session::get('id'); ?>
                            <li class="dropdown">
                                @if($user)
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-user"></i> {{$user}}
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-menu-title">
                                            <span>Account Settings</span>
                                        </li> <br>
                                        <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li> <br>
                                        <li><a href="{{Route('logout')}}"><i class="halflings-icon off"></i>Logout</a></li>
                                    </ul>
                                @else
                                    <a href="{{Route('user-login')}}"><i class="fa fa-user"></i>Login</a>
                                @endif
                            </li>
                        </div>
                    </div>
                    <!-- sigin and sign up -->
                    <!-- shopping cart -->
                    <div class="cart-mainf">
                        <div class="hubcart hubcart2 cart cart box_1">
                            <form action="#" method="post">
                                <input type="hidden" name="cmd" value="_cart">
                                <input type="hidden" name="display" value="1">
                                <button class="btn top_hub_cart mt-1" type="submit" name="submit" value="" title="Cart">
                                    <i class="fas fa-shopping-bag"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- //shopping cart ends here -->
                </div>
            </div>
        </nav>
        <!-- //top nav -->
        <!-- bottom nav -->
        <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link  active" href="{{route('index')}}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown has-mega-menu" style="position:static;">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Men's clothing</a>
                        <div class="dropdown-menu" style="width:100%">
                            <div class="px-0 container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="dropdown-item" href="{{route('men')}}">T-Shirts</a>
                                        <a class="dropdown-item" href="{{route('men')}}">Coats</a>
                                        <a class="dropdown-item" href="{{route('men')}}">Shirts</a>
                                        <a class="dropdown-item" href="{{route('men')}}">Suits & Blazers</a>
                                        <a class="dropdown-item" href="{{route('men')}}">Jackets</a>
                                        <a class="dropdown-item" href="{{route('men')}}">Trousers</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="dropdown-item" href="{{route('men')}}">T-Shirts</a>
                                        <a class="dropdown-item" href="{{route('men')}}">Trousers</a>
                                        <a class="dropdown-item" href="{{route('men')}}">Shirts</a>
                                        <a class="dropdown-item" href="{{route('men')}}">Suits & Blazers</a>
                                        <a class="dropdown-item" href="{{route('men')}}">Coats & Jackets</a>
                                        <a class="dropdown-item" href="{{route('men')}}">Jackets</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="dropdown-item" href="{{route('men')}}">T-Shirts</a>
                                        <a class="dropdown-item" href="{{route('men')}}">Coats</a>
                                        <a class="dropdown-item" href="{{route('men')}}">Shirts</a>
                                        <a class="dropdown-item" href="{{route('men')}}">Suits & Blazers</a>
                                        <a class="dropdown-item" href="{{route('men')}}">Jackets</a>
                                        <a class="dropdown-item" href="{{route('men')}}">Trousers</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown has-mega-menu" style="position:static;">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Women's clothing</a>
                        <div class="dropdown-menu" style="width:100%">
                            <div class="px-0 container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="dropdown-item" href="{{route('women')}}">Dresses</a>
                                        <a class="dropdown-item" href="{{route('women')}}">T-shirts</a>
                                        <a class="dropdown-item" href="{{route('women')}}">Skirts</a>
                                        <a class="dropdown-item" href="{{route('women')}}">Jeans</a>
                                        <a class="dropdown-item" href="{{route('women')}}">Tunics</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="dropdown-item" href="{{route('women')}}">T-shirts</a>
                                        <a class="dropdown-item" href="{{route('women')}}">Dresses</a>
                                        <a class="dropdown-item" href="{{route('women')}}">Tunics</a>
                                        <a class="dropdown-item" href="{{route('women')}}">Skirts</a>
                                        <a class="dropdown-item" href="{{route('women')}}">Jeans</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="dropdown-item" href="{{route('women')}}">Dresses</a>
                                        <a class="dropdown-item" href="{{route('women')}}">T-shirts</a>
                                        <a class="dropdown-item" href="{{route('women')}}">Skirts</a>
                                        <a class="dropdown-item" href="{{route('women')}}">Jeans</a>
                                        <a class="dropdown-item" href="{{route('women')}}">Tunics</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown has-mega-menu" style="position:static;">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Kids Clothing</a>
                        <div class="dropdown-menu" style="width:100%">
                            <div class="container">
                                <div class="row w3_kids  py-3">
                                    <div class="col-md-3 ">
                                        <span class="bg-light">Boy's Clothing</span>
                                        <a class="dropdown-item" href="{{route('boy')}}">T-Shirts</a>
                                        <a class="dropdown-item" href="{{route('boy')}}">Coats</a>
                                        <a class="dropdown-item" href="{{route('boy')}}">Shirts</a>
                                        <a class="dropdown-item" href="{{route('boy')}}">Suits & Blazers</a>
                                        <a class="dropdown-item" href="{{route('boy')}}">Jackets</a>
                                        <a class="dropdown-item" href="{{route('boy')}}">Trousers</a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="dropdown-item mt-4" href="{{route('boy')}}">T-Shirts</a>
                                        <a class="dropdown-item" href="{{route('boy')}}">Coats</a>
                                        <a class="dropdown-item" href="{{route('boy')}}">Shirts</a>
                                        <a class="dropdown-item" href="{{route('boy')}}">Suits & Blazers</a>
                                        <a class="dropdown-item" href="{{route('boy')}}">Jackets</a>
                                        <a class="dropdown-item" href="{{route('boy')}}">Trousers</a>
                                    </div>
                                    <div class="col-md-3">
                                        <span>Girl's Clothing</span>
                                        <a class="dropdown-item" href="{{route('girl')}}">T-shirts</a>
                                        <a class="dropdown-item" href="{{route('girl')}}">Dresses</a>
                                        <a class="dropdown-item" href="{{route('girl')}}">Tunics</a>
                                        <a class="dropdown-item" href="{{route('girl')}}">Skirts</a>
                                        <a class="dropdown-item" href="{{route('girl')}}">Jeans</a>
                                        <a class="dropdown-item" href="{{route('girl')}}">Midi</a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="dropdown-item  mt-4" href="{{route('girl')}}">Tunics</a>
                                        <a class="dropdown-item" href="{{route('girl')}}">Skirts</a>
                                        <a class="dropdown-item" href="{{route('girl')}}">T-shirts</a>
                                        <a class="dropdown-item" href="{{route('girl')}}">Dresses</a>
                                        <a class="dropdown-item" href="{{route('girl')}}">Jeans</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog')}}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- //bottom nav -->
    </div>
    <!-- //header container -->
</header>
