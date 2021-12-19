@extends('home')
@section('list')

    <div class="content">
        <div class="card card-info card-outline">
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No </th>
                    <th>Nama User</th>
                    <th>Email</th>
                </tr>
                @foreach ($listuser as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>

                    </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer">{{ $listuser->links() }}</div>
    </div>
@endsection
