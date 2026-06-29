<div class="sidebar">

    <div class="logo">
        <h2>Lingua News</h2>
        <span>Admin Panel</span>
    </div>

    <ul>

        <!-- Dashboard -->
        <li class="active">
            <a href="{{ route('admin.dashboard') }}">
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
                    <a href="{{route('category.create')}}">
                        <i class="fa-solid fa-plus"></i>
                        Category Form
                    </a>
                </li>

                 <li>
                    <a href="{{route('category.translate')}}">
                        <i class="fa-solid fa-plus"></i>
                        Category translate
                    </a>
                </li>

                <li>
                    <a href="{{route('category.index')}}">
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
                    <a href="{{route('subcategories.create')}}">
                        <i class="fa-solid fa-plus"></i>
                        Sub category Form
                    </a>
                </li>

                
                <li>
                    <a href="{{route('subcategories.translate.create')}}">
                        <i class="fa-solid fa-plus"></i>
                        Sub category Translation
                    </a>
                </li>

                <li>
                    <a href="{{route('subcategories.index')}}">
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
                    <a href="{{route('news.create')}}">
                        <i class="fa-solid fa-plus"></i>
                        News Add
                    </a>
                </li>

                <li>
                    <a href="{{route('news.index')}}">
                        <i class="fa-solid fa-table"></i>
                        News Table
                    </a>
                </li>

                 <li>
                    <a href="{{route('translation.create')}}">
                        <i class="fa-solid fa-plus"></i>
                        Add Translate
                    </a>
                </li>

                  <li>
                    <a href="{{route('translation.index')}}">
                        <i class="fa-solid fa-table"></i>
                        Translate Table
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
                    <a href="{{ route('media.create') }}">
                        <i class="fa-solid fa-plus"></i>
                        Add Media 
                    </a>
                </li>

                <li>
                    <a href="{{ route('media.index') }}">
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
                    <a href="{{ route('users.create') }}">
                        <i class="fa-solid fa-user-plus"></i>
                        Users Form
                    </a>
                </li>

                <li>
                    <a href="{{ route('users.index') }}">
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
            <a href="{{route('roles.create')}}">
                <i class="fa-solid fa-plus"></i>
                Role Forms
            </a>
        </li>

        <li>
            <a href="{{route('roles.index')}}">
                <i class="fa-solid fa-table"></i>
                Role Table
            </a>
        </li>

    </ul>

</li>

        <!-- Language Dropdown -->
<li class="dropdown">

    <a href="javascript:void(0);" class="dropdown-btn">
        <div>
           <i class="fa-solid fa-language"></i>
            Languages
        </div>

        <i class="fa-solid fa-chevron-down arrow"></i>
    </a>

    <ul class="dropdown-menu">

        <li>
            <a href="{{route('languages.create')}}">
                <i class="fa-solid fa-plus"></i>
                Language Forms
            </a>
        </li>

        <li>

            <a href="{{route('languages.index')}}">
            <a href="{{route('lang.index')}}">

                <i class="fa-solid fa-table"></i>
                Language Table
            </a>
        </li>

    </ul>

</li>

        <!-- Settings -->
        <li>
            <a href="{{route('admin.settings')}}">
                <i class="fa-solid fa-gear"></i>
                Settings
            </a>
        </li>

        <!-- Logout -->
        <li>
            <a href="{{route('logout')}}">
                <i class="fa-solid fa-right-from-bracket"></i>
                Logout
            </a>
        </li>

    </ul>

</div>