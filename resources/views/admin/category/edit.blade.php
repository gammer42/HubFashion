@extends('layouts.admin')
@section('navbar')
    <a class="navbar-brand bold" href="#">Category Updated by Authority</a>
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
                                    <h4 class="card-title bold">{{ __('Update Category') }}</h4>
                                    <p class="card-category">{{ __('Authority can Update Category Here...') }}</p>
                                </div>
                                <div class="card-body" >
                                    <form action="{{ route('categories.update',$categories->id) }}" method="POST">
                                        @CSRF
                                        @METHOD('PUT')
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
                                                    <label class="bmd-label-floating bold">{{ __('Category Name') }}</label>
                                                    <input type="text" id="category_name" class="form-control" name="cat_name" onclick="toSlug(this)" value="{{ $categories->cat_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating bold">{{ __('Parent Category') }}</label>
                                                    <select style="color: #ffffff;" class="form-control" name="parent" id="parent">
                                                        <option class=" bold" style="background-color:#202940; color:#fff;" value="{{ $categories->parent_id == 0? "0":"$categories->parent_id" }}">{{ $categories->parent_id == 0?"Root":"$categories->parent_name" }}</option>
                                                        @if($categories->parent_id != 0)
                                                        <option class=" bold" style="background-color:gray; color:#fff;" value="0">{{ __('/') }}</option>
                                                        @endif
                                                        @foreach($parents as $parent)
                                                            @if($categories->id > $parent->id)
                                                                @if($parent->id != $categories->parent_id)
                                                                    <option class=" bold" style="background-color:#0e0e40; color:#fff; "value="{{ $parent->id }}">{{ $parent->cat_name }}</option>
                                                                    @if($parent->children->count())
                                                                        @foreach($parent->children as $child)
                                                                            <option style="background-color:#153140;; "value="{{ $child->id }}">./{{ $child->cat_name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                @endif
                                                            @endif
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
                                                    <input type="text" id="slug_name" class="form-control" name="slug" value="{{ $categories->slug }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating bold">{{ __('Active Status') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-7">
                                                <div>
                                                    <input type="radio" id="active"
                                                           name="cat_status" value="1" {{$categories->cat_status == 1?"checked":""}}/>
                                                    <label for="active">{{ __('Active') }}</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="inactive"
                                                           name="cat_status" value="0" {{$categories->cat_status == 0?"checked":""}}/>
                                                    <label for="inactive">{{ __('Inactive') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary pull-right">Update Category</button>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button class="btn btn-primary pull-right" type="reset" ><a href="{{route('categories.index')}}" >Cancel</a></button>
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

        $("#category_name").keyup(function(){
            let text = $(this).val();
            let parslug = $('#parent').find(":selected").text();
            // let text = $('#category_name').val();
            let slug = custom_str_concate(parslug,text);
            slug = slug.trim();
            slug = slug.toLowerCase().replace(/ /g, '_').replace(/^\s+|\s+$[^\w-]+ /g, '').replace(/_->_/gm,"/");
            $("#slug_name").val(slug);
        });

        function custom_str_concate(val1,val2){
            if(val1 === "/")
                return val2;
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
