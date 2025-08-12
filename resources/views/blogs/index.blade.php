@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Blogs List</h2>
    <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-2">Create Blog</a>
    <div>
        <select id="user-filter">
            <option value="">All Users</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <input type="text" id="tags-filter" placeholder="Tags (comma separated)">
    </div>
    <table id="blogs-table" class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Tags</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
$(function() {
    var table = $('#blogs-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route("blogs.index") }}',
            data: function (d) {
                d.user_id = $('#user-filter').val();
                d.tags = $('#tags-filter').val().split(',').map(function(tag){ return tag.trim(); });
            }
        },
        columns: [
            { data: 'title' },
            { data: 'user.name', name: 'user.name' },
            { data: 'tags', render: function(data){ return data ? data.join(', ') : ''; } },
            { data: 'created_at' },
            { data: 'action', orderable: false, searchable: false }
        ]
    });

    $('#user-filter, #tags-filter').on('change keyup', function() {
        table.ajax.reload();
    });
});
</script>
@endpush