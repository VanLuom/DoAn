@extends('admin.layout')
@section('content')
    @if (Session::has('message'))
        <h3>{{ Session::get('message') }}</h3>
    @endif
    <div class="row">
        <a href="{{ route('admin.users.create') }}"> Create New</a>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Basic Table</h4>
                    <p class="card-description"> Add class <code>.table</code> </p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cates as $user)
                                <tr>
                                    <td>#</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a class="badge badge-danger"
                                            href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                                    </td>

                                    <td>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button onclick="return confirm('Bạn có muốn xóa không')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
