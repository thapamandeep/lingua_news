<div class="sidebar">

    <div class="logo">
        <h2>Lingua News</h2>
        <span>Admin Panel</span>
    </div>

    <ul>

        <!-- Dashboard -->
        <li class="active">
            <a href="#">
                <i class="fa-solid fa-house"></i>
                Dashboard
            </a>
        </li>

        <!-- Categories Dropdown -->
        <li class="dropdown">

            <a href="javascript:void(0);" class="dropdown-btn">
                <div>
                    <i class="fa-solid fa-layer-group"></i>
                    Categories
                </div>

                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>

            <ul class="dropdown-menu">

                <li>
                    <a href="{{route('get.categoryForm')}}">
                        <i class="fa-solid fa-plus"></i>
                        Category Form
                    </a>
                </li>

                <li>
                    <a href="{{route('get.categoryIndex')}}">
                        <i class="fa-solid fa-table"></i>
                        Category Table
                    </a>
                </li>

            </ul>

        </li>

          <li class="dropdown">

            <a href="javascript:void(0);" class="dropdown-btn">
                <div>
                    <i class="fa-solid fa-layer-group"></i>
                   Sub Categories
                </div>

                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>

            <ul class="dropdown-menu">

                <li>
                    <a href="{{route('get.subcategory')}}">
                        <i class="fa-solid fa-plus"></i>
                        Sub category Form
                    </a>
                </li>

                <li>
                    <a href="{{route('get.subcategory.index')}}">
                        <i class="fa-solid fa-table"></i>
                        Sub category Table
                    </a>
                </li>

            </ul>

        </li>


        
        <!-- News Dropdown -->
        <li class="dropdown">

            <a href="javascript:void(0);" class="dropdown-btn">
                <div>
                    <i class="fa-solid fa-newspaper"></i>
                    News
                </div>

                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>

            <ul class="dropdown-menu">

                <li>
                    <a href="{{route('get.addnews')}}">
                        <i class="fa-solid fa-plus"></i>
                        News Add
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa-solid fa-table"></i>
                        News Table
                    </a>
                </li>

            </ul>

        </li>

        <!-- Media Dropdown -->
        <li class="dropdown">

            <a href="javascript:void(0);" class="dropdown-btn">
                <div>
                    <i class="fa-solid fa-image"></i>
                    Media
                </div>

                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>

            <ul class="dropdown-menu">

                <li>
                    <a href="#">
                        <i class="fa-solid fa-plus"></i>
                        Media Index
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa-solid fa-table"></i>
                        Media Table
                    </a>
                </li>

            </ul>

        </li>

        <!-- Users Dropdown -->
        <li class="dropdown">

            <a href="javascript:void(0);" class="dropdown-btn">
                <div>
                    <i class="fa-solid fa-users"></i>
                    Users
                </div>

                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>

            <ul class="dropdown-menu">

                <li>
                    <a href="{{ route('get.usersForm') }}">
                        <i class="fa-solid fa-user-plus"></i>
                        Users Form
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa-solid fa-table"></i>
                        Users Table
                    </a>
                </li>

            </ul>

        </li>

        <!-- Roles Dropdown -->
<li class="dropdown">

    <a href="javascript:void(0);" class="dropdown-btn">
        <div>
            <i class="fa-solid fa-user-shield"></i>
            Roles
        </div>

        <i class="fa-solid fa-chevron-down arrow"></i>
    </a>

    <ul class="dropdown-menu">

        <li>
            <a href="{{route('get.rolesForm')}}">
                <i class="fa-solid fa-plus"></i>
                Role Forms
            </a>
        </li>

        <li>
            <a href="{{route('get.rolesIndex')}}">
                <i class="fa-solid fa-table"></i>
                Role Table
            </a>
        </li>

    </ul>

</li>

        <!-- Settings -->
        <li>
            <a href="#">
                <i class="fa-solid fa-gear"></i>
                Settings
            </a>
        </li>

        <!-- Logout -->
        <li>
            <a href="#">
                <i class="fa-solid fa-right-from-bracket"></i>
                Logout
            </a>
        </li>

    </ul>

</div>