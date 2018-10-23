<h5 class="row shop_w3 text-capitalize">
    Boy's Collection</h5>
<div class="card-group my-5">
    <!-- row1-->
    <!-- card -->
    <div class="col-lg-3 col-sm-6">
        <div class="card product-men p-3">
            <div class="men-thumb-item">
                <img src="{{asset('frontend/images/pb9.jpg')}}" alt="img" class="card-img-top">
                <div class="men-cart-pro">
                    <div class="inner-men-cart-pro">
                        <a href="{{route('boy')}}" class="link-product-add-cart">Quick View</a>
                    </div>
                </div>
            </div>
            <!-- card body -->
            <div class="card-body  py-3 px-2">
                <h5 class="card-title text-capitalize">Festive Kurta And Pyjama Set</h5>
                <div class="card-text d-flex justify-content-between">
                    <p class="text-dark font-weight-bold">$18.00</p>
                    <p class="line-through">$25.00</p>
                </div>
            </div>
            <!-- card footer -->
            <div class="card-footer d-flex justify-content-end">
                <form action="#" method="post">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="add" value="1">
                    <input type="hidden" name="hub_item" value="Festive Kurta And Pyjama Set">
                    <input type="hidden" name="amount" value="18.00">
                    <button type="submit" class="hub-cart phub-cart btn">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                    </button>
                    <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                </form>
            </div>
        </div>
    </div>
    <!-- //card -->
    <!-- card -->
    <div class="col-lg-3 col-sm-6 mt-sm-0 mt-5">
        <div class="card product-men p-3">
            <div class="men-thumb-item">
                <img src="{{asset('frontend/images/pb10.jpg')}}" alt="img" class="card-img-top">
                <div class="men-cart-pro">
                    <div class="inner-men-cart-pro">
                        <a href="{{route('boy')}}" class="link-product-add-cart">Quick View</a>
                    </div>
                </div>
            </div>
            <!-- card body -->
            <div class="card-body  py-3 px-2">
                <h5 class="card-title text-capitalize">Party Shirt and Trouser Set</h5>
                <div class="card-text d-flex justify-content-between">
                    <p class="text-dark font-weight-bold">$30.99</p>
                    <p class="line-through">$45.99</p>
                </div>
            </div>
            <!-- card footer -->
            <div class="card-footer d-flex justify-content-end">
                <form action="#" method="post">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="add" value="1">
                    <input type="hidden" name="hub_item" value="Party Shirt and Trouser Set">
                    <input type="hidden" name="amount" value="30.99">
                    <button type="submit" class="hub-cart phub-cart btn">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                    </button>
                    <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                </form>
            </div>
        </div>
    </div>
    <!-- //card -->
    <!-- card -->
    <div class="col-lg-3 col-sm-6  mt-lg-0 mt-5">
        <div class="card product-men p-3">
            <div class="men-thumb-item">
                <img src="{{asset('frontend/images/pb1.jpg')}}" alt="img" class="card-img-top">
                <div class="men-cart-pro">
                    <div class="inner-men-cart-pro">
                        <a href="{{route('boy')}}" class="link-product-add-cart">Quick View</a>
                    </div>
                </div>
            </div>
            <!-- card body -->
            <div class="card-body  py-3 px-2">
                <h5 class="card-title text-capitalize">Shirt, Waistcoat And Pant Set</h5>
                <div class="card-text d-flex justify-content-between">
                    <p class="text-dark font-weight-bold">$14.99</p>
                    <p class="line-through">$24.99</p>
                </div>
            </div>
            <!-- card footer -->
            <div class="card-footer d-flex justify-content-end">
                <form action="#" method="post">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="add" value="1">
                    <input type="hidden" name="hub_item" value="Shirt, Waistcoat And Pant Set">
                    <input type="hidden" name="amount" value="14.99">
                    <button type="submit" class="hub-cart phub-cart btn">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                    </button>
                    <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                </form>
            </div>
        </div>
    </div>
    <!-- //card -->
    <div class="col-lg-3 col-sm-6">
        <div class="card py-sm-5 border-0">
            <a class="btn-lg btn-secondary text-center m-5" href="boys.blade.php">View More</a>
        </div>
        <!-- //row  -->
    </div>
</div>
<!-- //card group -->