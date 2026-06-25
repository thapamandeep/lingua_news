@extends('admin.layouts.template')

@section('content')

<div class="table-container">

    <h2>Search Results for "{{ $search }}"</h2>

    <table>

        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>

        @forelse($news as $item)

            <tr>
                <td>
                    {{ optional($item->translations->first())->title }}
                </td>

                <td>
                    {{ $item->created_at->format('d M Y') }}
                </td>
            </tr>

        @empty

            <tr>
                <td colspan="2">
                    No results found.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

    {{ $news->links() }}

</div>

@endsection