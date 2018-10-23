<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
    <!--
              Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

              Tip 2: you can also add an image using data-image tag
          -->
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active  ">
                <a class="nav-link" href="{{route('dashboard.index')}}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin-user.index')}}">
                    <i class="material-icons">group</i>
                    <p>{{ __('Users') }}</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('roles.index')}}">
                    <i class="material-icons">people_outline</i>
                    <p>{{ __('Designation (Role)') }}</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('permission.index')}}">
                    <i class="material-icons">content_paste</i>
                    <p>{{ __('Permission List') }}</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('categories.index')}}">
                    <i class="material-icons">library_books</i>
                    <p>{{ __('Categroy') }}</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./icons.html">
                    <i class="material-icons">bubble_chart</i>
                    <p>Icons</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./map.html">
                    <i class="material-icons">location_ons</i>
                    <p>Maps</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./notifications.html">
                    <i class="material-icons">notifications</i>
                    <p>Notifications</p>
                </a>
            </li>
             {{--<li class="nav-item active-pro ">--}}
                  {{--<a class="nav-link" href="./upgrade.html">--}}
                      {{--<i class="material-icons">unarchive</i>--}}
                      {{--<p>Upgrade to PRO</p>--}}
                  {{--</a>--}}
              {{--</li>--}}
        </ul>
    </div>
</div>