@extends('author.layouts.template')

@section('title', 'My Profile')

@section('content')

<div class="page-header">

    <div>
        <h2>My Profile</h2>
        <p>Manage your account information</p>
    </div>

</div>

{{-- Hidden values for JS --}}
<input type="hidden" id="currentName" value="{{ auth()->user()->name }}">
<input type="hidden" id="currentEmail" value="{{ auth()->user()->email }}">

<div class="profile-container">

    <div class="profile-card">

        @php
            $words = explode(' ', auth()->user()->name);
            $initials = '';

            foreach($words as $word){
                $initials .= strtoupper(substr($word,0,1));
            }

            $initials = substr($initials,0,2);
        @endphp

        <div class="profile-avatar">
            {{ $initials }}
        </div>

        <h3>{{ auth()->user()->name }}</h3>

        <span class="profile-role">
            {{ auth()->user()->role->name ?? 'Author' }}
        </span>

    </div>

    <div class="profile-details">

        <div class="details-grid">

            {{-- Full Name --}}
            <div class="detail-item">

                <div class="detail-header">

                    <label>Full Name</label>

                    <a href="javascript:void(0)"
                       class="edit-icon"
                       onclick="openModal('name')">

                        <i class="fa-solid fa-pen"></i>

                    </a>

                </div>

                <p>{{ auth()->user()->name }}</p>

            </div>

            {{-- Email --}}
            <div class="detail-item">

                <div class="detail-header">

                    <label>Email Address</label>

                    <a href="javascript:void(0)"
                       class="edit-icon"
                       onclick="openModal('email')">

                        <i class="fa-solid fa-pen"></i>

                    </a>

                </div>

                <p>{{ auth()->user()->email }}</p>

            </div>

            {{-- Role --}}
            <div class="detail-item">

                <label>Role</label>

                <p>{{ auth()->user()->role->name ?? 'Author' }}</p>

            </div>

            {{-- Member Since --}}
            <div class="detail-item">

                <label>Member Since</label>

                <p>{{ auth()->user()->created_at->format('d M Y') }}</p>

            </div>

            {{-- Status --}}
            <div class="detail-item">

                <label>Account Status</label>

                <p class="status-active">Active</p>

            </div>

        </div>

    </div>

</div>

{{-- Modal --}}
<div class="profile-modal" id="profileModal">

    <div class="modal-content">

        <button type="button"
                class="close-modal"
                onclick="closeModal()">

            <i class="fa-solid fa-xmark"></i>

        </button>

        <h2 id="modalTitle">Update Profile</h2>

        <form method="POST"
              action="{{ route('author.profile.update') }}">

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

            <button type="submit" class="save-btn">
                Update
            </button>

        </form>

    </div>

</div>

@endsection

<script>

const userName = @json(auth()->user()->name);
const userEmail = @json(auth()->user()->email);

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