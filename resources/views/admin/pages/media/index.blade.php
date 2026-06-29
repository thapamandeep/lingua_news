@extends('admin.layouts.app')

@section('title', 'Media Management')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin/media.css') }}">

<div class="media-container">

    <div class="media-card">

        <!-- Header -->
        <div class="card-header">

            <div class="header-left">
                <h2>Media Management</h2>
                <p>Manage uploaded media files.</p>
            </div>

            <div class="header-right">

                <a href="{{ route('admin.media.create') }}" class="btn-save">

                    <i class="fas fa-plus"></i>

                    Upload Media

                </a>

            </div>

        </div>

        <!-- Success Message -->

        @if(session('success'))

            <div class="alert success">

                {{ session('success') }}

            </div>

        @endif

        <!-- Search -->

        <div class="table-search">

            <input
                type="text"
                id="searchInput"
                placeholder="Search news title...">

        </div>

        <!-- Table -->

        <div class="table-responsive">

            <table class="media-table">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Image</th>

                        <th>News</th>

                        <th>Type</th>

                        <th>Featured</th>

                        <th>Status</th>

                        <th>Size</th>

                        <th>Uploaded</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody id="mediaTable">

                    @forelse($media as $item)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            <img
                                src="{{ asset('storage/'.$item->image) }}"
                                class="table-image">

                        </td>

                        <td>

                            <strong>

                                {{ $item->news->title ?? 'No News' }}

                            </strong>

                        </td>

                        <td>

                            <span class="badge badge-type">

                                {{ ucfirst($item->media_type) }}

                            </span>

                        </td>

                        <td>

                            @if($item->is_featured)

                                <span class="badge badge-featured">

                                    Yes

                                </span>

                            @else

                                <span class="badge badge-normal">

                                    No

                                </span>

                            @endif

                        </td>

                        <td>

                            @if($item->status=='active')

                                <span class="badge badge-active">

                                    Active

                                </span>

                            @else

                                <span class="badge badge-inactive">

                                    Inactive

                                </span>

                            @endif

                        </td>

                        <td>

                            {{ $item->formatted_size }}

                        </td>

                        <td>

                            {{ $item->created_at->format('d M Y') }}

                        </td>

                        <td>

                            <div class="action-buttons">

                                <a
                                    href="{{ route('admin.media.edit',$item->id) }}"
                                    class="btn-edit">

                                    Edit

                                </a>

                                                                <form
                                    action="{{ route('admin.media.destroy', $item->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this media?');"
                                    style="display:inline-block;">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-delete">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="9" class="text-center">

                            No media found.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- Pagination -->

        <div class="pagination-wrapper">

            {{ $media->links() }}

        </div>

    </div>

</div>

<script>

document.getElementById("searchInput").addEventListener("keyup", function(){

    let value = this.value.toLowerCase();

    let rows = document.querySelectorAll("#mediaTable tr");

    rows.forEach(function(row){

        let text = row.textContent.toLowerCase();

        if(text.indexOf(value) > -1){

            row.style.display = "";

        }else{

            row.style.display = "none";

        }

    });

});

</script>

@endsection