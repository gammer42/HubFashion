@extends('layouts.admin')
@section('navbar')
    <a class="navbar-brand bold" href="#">Product Added by Authority</a>
@endsection
@section('content')

    <div class="wrapper ">

        @include('admin.partial.sidebar')

        <div class="main-panel">
            <!-- Navbar -->
        @include('admin.partial.nav')


        <!--  User Details -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title bold">{{ __('Add Product') }}</h4>
                                    <p class="card-category">{{ __('Authority can Add Product in Here...') }}</p>
                                </div>
                                <div class="card-body" >
                                    <form action="{{route('products.store')}}" method="POST">
                                        @CSRF
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <span><br/></span></div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating bold">{{ __('Product Name') }}</label>
                                                    <input type="text" id="product_name" class="form-control" name="name" value="{{old('name')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating bold">{{ __('Category') }}</label>
                                                    <select style="color:#888D9B;" class="form-control" name="category" data-placeholder="Category">
                                                        @foreach($categories as $parent)
                                                            <option class="bold" style="background-color:#0e0e40;" value="{{ $parent->id }}">{{ $parent->name }}</option>
                                                            @if($parent->children->count())
                                                                @foreach($parent->children as $child)
                                                                    <option style="background-color:#153140;" value="{{ $child->id }}"><span> {{ $child->name }}</span></option>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating bold">{{ __('Brands') }}</label>
                                                    <select style="color:#888D9B;" class="form-control" name="brand" data-placeholder="Brands">
                                                        @foreach($brands as $brand)
                                                            <option class="bold" style="background-color:#0e0e40;" value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">{{ __('Slug') }}</label>
                                                    <input type="text" id="slug_name" class="form-control" name="slug" value="{{old('slug')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">{{ __('Ideal For') }}</label>
                                                    <input type="text" id="ideal" class="form-control" name="ideal" value="{{old('ideal')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">{{ __('Size') }}</label>
                                                    <input type="text" id="size" class="form-control" name="size" value="{{old('size')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">{{ __('Fabric') }}</label>
                                                    <input type="text" id="fabric" class="form-control" name="fabric" value="{{old('fabric')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">{{ __('Color') }}</label>
                                                    <input type="text" id="color" class="form-control" name="color" value="{{old('color')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">{{ __('Price TK') }}</label>
                                                    <input type="text" id="price" class="form-control" name="price" value="{{old('price')}}">
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">{{ __('Image') }}</label>
                                                    <input type="text" id="price" class="form-control" name="price" value="{{old('image')}}">
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">{{ __('Description') }}</label>
                                                    <input type="text" id="description" class="form-control" name="description" value="{{old('description')}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary pull-right">Create Brands</button>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button class="btn btn-primary pull-right" type="reset" ><a href="{{route('brands.index')}}" >Cancel</a></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer -->
            @include('admin.partial.footer')
        </div>
    </div>

    {{--@include('admin.partial.plugin')--}}

    @include('admin.partial.script')
@endsection

@section('script')
    <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;

        function checkPermission() {
            let checkBox = document.getElementById("checkBox");
            let permissionBox = document.getElementById("permissionBox");
            if (checkBox.checked !== true){
                permissionBox.style.display = "block";
            } else {
                permissionBox.style.display = "none";
            }
        }

        function toggle(source) {
            let checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] !== source)
                    checkboxes[i].checked = source.checked;
            }
        }

        $("#product_name").keyup(function(){
            let text = $(this).val();
            // let parslug = $('#parent').find(":selected").text();
            // // let text = $('#category_name').val();
            // let slug = custom_str_concate(parslug,text);
            // slug = slug.trim();
            slug = text.trim();
            slug = slug.toLowerCase().replace(/ /g, '-').replace(/^\s+|\s+$[^\w-]+ /g, '').replace(/_->_/gm,"-");
            $("#slug_name").val(slug);
        });

        function custom_str_concate(val1,val2){
            if(val1 === "/")
                return '_'+val1.concat(val2);
            else
                return val1+'-'+val2;
        }
        $(document).ready(function(){
                $("select#parent").change(function(){
                let val1 = $('#parent').find(":selected").text();
                let val2 = $('#category_name').val();
                let slug = custom_str_concate(val1,val2);
                    slug = slug.trim();
                    slug = slug.toLowerCase().replace(/ /g, '_').replace(/^\s+|\s+$[^\w-]+ /g, '').replace(/_->_/gm,"-");
                $("#slug_name").val(slug);
            });
        });
    </script>



@endsection
