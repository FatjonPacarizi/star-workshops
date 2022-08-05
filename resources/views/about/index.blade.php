

<x-app-layout>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Laravel 8 IMAGE CRUD
                        <a href="{{ url('add-about') }}" class="btn btn-primary float-end">Add Student</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>title</th>
                                <th>heading</th>
                                <th>paragraf</th>
                                <th>button</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($about as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <img src="{{ asset('uploads/abouts/'.$item->image_section) }}" width="70px" height="70px" alt="Image">
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->heading }}</td>
                                <td>{{ $item->button }}</td>
                                <td>{{ $item->paragraf }}</td>
                                <td>
                                    <img src="{{ asset('uploads/abouts/'.$item->image) }}" width="70px" height="70px" alt="Image">
                                </td>
                               
                                <td>
                                    <a href="{{ url('edit-about/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                <td>
                                    {{-- <a href="{{ url('delete-about/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                    <form action="{{ url('delete-about/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
</div>

</x-app-layout>