@extends('layouts.app')
@section('title', 'Organisations')
@section('content')   

    <div class="container">
        <h1>Organisations</h1>
        <a href="{{ route('organisations.create') }}" class="btn btn-primary mb-3">Create Organisation</a>

        @if ($organisations->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Organisation Name</th>
                        <th>Organisation Type</th>
                        <th>NPI</th>
                        <th>VOIP</th>
                        <th>Created by</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($organisations as $organisation)
                    <tr>
                        <td>{{ $organisation->organisation_name }}</td>
                        <td>{{ $organisation->organisation_type }}</td>
                        <td>{{ $organisation->npi }}</td>
                        <td>{{ $organisation->voip_number }}</td>
                        <td>{{ $organisation->user->name }}</td>
                        <td>
                            <a href="{{ route('organisations.edit', $organisation->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('organisations.destroy', $organisation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button"  class="btn btn-danger btn-sm delete-confirm" onclick="return delete_confirmation({{$organisation->id}})" data-toggle="modal" data-target="#deleteModal">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $organisations->links('pagination::bootstrap-4') }}
            </div>
        @else
            <p>No organisations available.</p>
        @endif
    </div>
@endsection
