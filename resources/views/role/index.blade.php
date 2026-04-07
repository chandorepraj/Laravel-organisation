@extends('layouts.app')
@section('title', 'Roles') 
@section('content')   
@vite('resources/js/role_create.js')

    <div class="container">
        <h1>Roles</h1>
        <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Create Role</a>
        @if ($roles->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Role</th>
                        <th>Created by</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    
                    <tr>
                        <td>{{ $role->role }}</td>
                        <td>{{ $role->user->name }}</td>
                        <td>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button"  class="btn btn-danger btn-sm deleteRole" data-id="{{$role->id}}" data-toggle="modal" >Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $roles->links('pagination::bootstrap-4') }}
            </div>
        @else
            <p>No roles available.</p>
        @endif
    </div>
<!-- DataTables CSS -->

@push('scripts')
<script>
var rolesDatatableUrl = "{{ route('roles.datatable') }}";
</script>
<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
<!-- jQuery (already in Sneat) -->

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets/js/role.js') }}"></script>
@endpush    
@endsection

