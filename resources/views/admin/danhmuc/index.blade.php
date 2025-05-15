@extends('home')

@section('content')

 <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">danh sách</h3>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="table table-responsive">
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Created date</th>
                        <th scope="col">Updated date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($danhmuc as $key => $danhmuc )
                        <tr>
                            <th scope="row">{{ $key }}</th>
                            <td>{{ $danhmuc->title }}</td>
                            <td><img height="240" width="240" src="{{ asset('uploads/danhmuc/' . $danhmuc->image) }}">
                            </td>
                            <td>{{ $danhmuc->description }}</td>
                            <td>{{ $danhmuc->slug }}</td>
                            <td>{{ $danhmuc->created_at }}</td>
                            <td>{{ $danhmuc->updated_at }}</td>
                            <td>
                                @if ($danhmuc->status == 1)
                                    <span class="text text-success">Active</span>
                                @else
                                    <span class="text text-success">Unactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('danhmuc.edit', [$danhmuc->id]) }}" class="btn btn-warning">Edit</a>
                                <form onsubmit="return confirm('Bạn có muốn xóa không?');"
                                    action="{{ route('danhmuc.destroy', [$danhmuc->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Xóa">
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

@endsection
