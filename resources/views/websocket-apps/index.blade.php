@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @session('success')
                    <div class="alert alert-success alert-closable">{{ session('success') }}</div>
                @endsession
                <a href="{{ route('websocket-apps.create') }}" class="btn btn-sm btn-success mb-2">Add App</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>No</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Key</th>
                        <th>Secret</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($websocketApps as $websocketApp)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $websocketApp->id }}</td>
                                <td>{{ $websocketApp->name }}</td>
                                <td>{{ $websocketApp->key }}</td>
                                <td>{{ $websocketApp->secret }}</td>
                                <td>
                                    <a href="{{ route('websocket-apps.edit', $websocketApp) }}"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ route('websocket-apps.destroy', $websocketApp) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure!?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
