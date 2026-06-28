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

    <form action="{{ route('profile.update') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <input type="hidden"
               name="field"
               value="image">

        <label for="image"
               class="profile-edit-btn">

            <i class="fa-solid fa-edit"></i>

        </label>

        <input type="file"
               id="image"
               name="image"
               hidden
               onchange="this.form.submit()">

    </form>

</div>

            <h2>{{ $user->name }}</h2>

            <p>{{ $user->email }}</p>

            <span class="role-badge">
                <i class="fa-solid fa-user-shield"></i>
                {{ $user->role->name ?? 'Administrator' }}
            </span>

            <div class="member-since">
                <i class="fa-solid fa-calendar-days"></i>
                Joined {{ $user->created_at->format('d M Y') }}
            </div>

        </div>

    </aside>

    <main class="profile-content">

        <section class="content-card">

            <div class="card-title">
                <h2>
                    <i class="fa-solid fa-user-pen"></i>
                    Profile Information
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

            <div class="details-grid">

                <div class="detail-item">

                    <div class="detail-header">

                        <label>Full Name</label>

                        <a href="javascript:void(0)"
                           class="edit-icon"
                           onclick="openModal('name')">

                            <i class="fa-solid fa-pen"></i>

                        </a>

                    </div>

                    <p>{{ $user->name }}</p>

                </div>

                <div class="detail-item">

                    <div class="detail-header">

                        <label>Email Address</label>

                        <a href="javascript:void(0)"
                           class="edit-icon"
                           onclick="openModal('email')">

                            <i class="fa-solid fa-pen"></i>

                        </a>

                    </div>

                    <p>{{ $user->email }}</p>

                </div>

                <div class="detail-item">

                    <label>Role</label>

                    <p>{{ $user->role->name ?? 'Administrator' }}</p>

                </div>

                <div class="detail-item">

                    <label>Member Since</label>

                    <p>{{ $user->created_at->format('d M Y') }}</p>

                </div>

            </div>

        </section>

        <section class="stats-grid">

            <div class="stat-card">

                <div class="icon">
                    <i class="fa-solid fa-newspaper"></i>
                </div>

                <div>
                    <h2>{{ $totalNews }}</h2>
                    <span>Total News</span>
                </div>

            </div>

            <div class="stat-card">

                <div class="icon">
                    <i class="fa-solid fa-folder"></i>
                </div>

                <div>
                    <h2>{{ $totalCategories }}</h2>
                    <span>Categories</span>
                </div>

            </div>

        </section>

    </main>

</div>

<!-- Modal -->

<div class="profile-modal" id="profileModal">

    <div class="modal-content">

        <button type="button"
                class="close-modal"
                onclick="closeModal()">

            <i class="fa-solid fa-xmark"></i>

        </button>

        <h2 id="modalTitle">Update Profile</h2>

        <form method="POST"
              action="{{ route('profile.update') }}">

            @csrf
           

            <input type="hidden"
                   name="field"
                   id="field">

            <div class="form-group">

                <input type="text"
                       name="value"
                       id="modalInput"
                       required>

            </div>

            <button type="submit"
                    class="save-btn">

                Update

            </button>

        </form>

    </div>

</div>
<script>

const userName = @json($user->name);
const userEmail = @json($user->email);

function openModal(type)
{
    document.getElementById('profileModal').style.display = 'flex';

    document.getElementById('field').value = type;

    if(type === 'name')
    {
        document.getElementById('modalTitle').innerText = 'Update Full Name';
        document.getElementById('modalInput').value = userName;
    }

    if(type === 'email')
    {
        document.getElementById('modalTitle').innerText = 'Update Email Address';
        document.getElementById('modalInput').value = userEmail;
    }
}

function closeModal()
{
    document.getElementById('profileModal').style.display = 'none';
}

</script>
</body>
</html>