@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Users List</h2>
    <table id="users-table" class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Blogs Count</th>
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
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("users.index") }}',
        columns: [
            { data: 'name' },
            { data: 'email' },
            { data: 'mobile' },
            { data: 'gender' },
            { data: 'blogs_count', name: 'blogs_count' },
            { data: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush