@extends('first.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('lists.create') }}"> Create New List</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>StreetFood</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($first as $lists)
        <tr>
            <td>{{ $lists->id }}</td>
            <td>{{ $lists->name }}</td>
            <td>{{ $lists->streetfood }}</td>
            <td>
                <form action="{{ route('lists.destroy',$lists->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('lists.show',$lists->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('lists.edit',$lists->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $first->links() }}


@endsection
