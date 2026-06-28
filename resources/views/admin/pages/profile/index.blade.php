<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lingua News | Admin Profile</title>

    <link rel="stylesheet" href="{{ asset('css/admin/profile.css') }}">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<div class="profile-page">

    <!-- HEADER -->
    <header class="profile-header">

        <div class="overlay"></div>

        <div class="header-content">

            <h1>Administrator Profile</h1>

            <p>Manage your Lingua News account information</p>

        </div>

    </header>


    <div class="profile-container">

        <!-- ==========================
             LEFT SIDEBAR
        =========================== -->

        <aside class="profile-sidebar">

            <div class="profile-card">

                <div class="profile-image">

                    @if($user->image)
                        <img src="{{ asset('uploads/profile/'.$user->image) }}"
                             id="previewImage">
                    @else
                        <img src="https://i.pravatar.cc/300"
                             id="previewImage">
                    @endif

                </div>

                <h2>{{ $user->name }}</h2>

                <p>{{ $user->email }}</p>

                <span class="role-badge">

                    <i class="fa-solid fa-user-shield"></i>

                    {{ $user->role->name ?? 'Administrator' }}

                </span>

                <div class="member-since">

                    <i class="fa-solid fa-calendar-days"></i>

                    Joined

                    {{ $user->created_at->format('d M Y') }}

                </div>

            </div>

        </aside>





        <!-- ==========================
             MAIN CONTENT
        =========================== -->

        <main class="profile-content">


            <!-- EDIT PROFILE -->

            <section class="content-card">

                <div class="card-title">

                    <h2>

                        <i class="fa-solid fa-user-pen"></i>

                        Edit Profile

                    </h2>

                </div>

                @if(session('success'))

                    <div class="alert success">

                        {{ session('success') }}

                    </div>

                @endif

                @if($errors->any())

                    <div class="alert error">

                        <ul>

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <form action="{{ route('profile.update') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    @method('PUT')


                    <div class="form-layout">


                        <div class="image-upload">

                            @if($user->image)

                                <img src="{{ asset('uploads/profile/'.$user->image) }}"
                                     id="imagePreview">

                            @else

                                <img src="https://i.pravatar.cc/250"
                                     id="imagePreview">

                            @endif


                            <label for="image">

                                <i class="fa-solid fa-camera"></i>

                                Change Photo

                            </label>

                            <input type="file"
                                   id="image"
                                   name="image">

                        </div>




                        <div class="profile-form">

                            <div class="form-group">

                                <label>Full Name</label>

                                <input type="text"
                                       name="name"
                                       value="{{ old('name',$user->name) }}">

                            </div>

                            <div class="form-group">

                                <label>Email Address</label>

                                <input type="email"
                                       name="email"
                                       value="{{ old('email',$user->email) }}">

                            </div>

                            <div class="form-group">

                                <label>Role</label>

                                <input type="text"
                                       readonly
                                       value="{{ $user->role->name ?? 'Administrator' }}">

                            </div>

                            <div class="form-group">

                                <label>Member Since</label>

                                <input type="text"
                                       readonly
                                       value="{{ $user->created_at->format('d F Y') }}">

                            </div>

                            <button type="submit"
                                    class="save-btn">

                                <i class="fa-solid fa-floppy-disk"></i>

                                Save Changes

                            </button>

                        </div>

                    </div>

                </form>

            </section>




            <!-- STATISTICS -->

            <section class="stats-grid">

                <div class="stat-card">

                    <div class="icon">

                        <i class="fa-solid fa-newspaper"></i>

                    </div>

                    <div>

                        <h2>{{ $totalNews ?? 0 }}</h2>

                        <span>Total News</span>

                    </div>

                </div>

                <div class="stat-card">

                    <div class="icon">

                        <i class="fa-solid fa-folder"></i>

                    </div>

                    <div>

                        <h2>{{ $totalCategories ?? 0 }}</h2>

                        <span>Categories</span>

                    </div>

                </div>

                <div class="stat-card">

                    <div class="icon">

                        <i class="fa-solid fa-bell"></i>

                    </div>

                    <div>

                        <h2>{{ $unreadNotifications ?? 0 }}</h2>

                        <span>Notifications</span>

                    </div>

                </div>

            </section>




            <!-- QUICK ACTIONS -->

            <section class="content-card">

                <div class="card-title">

                    <h2>

                        <i class="fa-solid fa-bolt"></i>

                        Quick Actions

                    </h2>

                </div>

                <div class="action-grid">

                    <a href="{{ route('news.index') }}"
                       class="action-card">

                        <i class="fa-solid fa-newspaper"></i>

                        <h3>Manage News</h3>

                        <p>Create, edit and publish articles.</p>

                    </a>

                    <a href="{{ route('notifications.index') }}"
                       class="action-card">

                        <i class="fa-solid fa-bell"></i>

                        <h3>Notifications</h3>

                        <p>View all latest alerts.</p>

                    </a>

                    <a href="#"
                       class="action-card">

                        <i class="fa-solid fa-gear"></i>

                        <h3>Settings</h3>

                        <p>Manage account preferences.</p>

                    </a>

                </div>

            </section>


        </main>

    </div>

</div>

<script>

document.getElementById('image').onchange=function(e){

    const reader=new FileReader();

    reader.onload=function(){

        document.getElementById('imagePreview').src=reader.result;

        document.getElementById('previewImage').src=reader.result;

    }

    reader.readAsDataURL(e.target.files[0]);

}

</script>

</body>
</html>