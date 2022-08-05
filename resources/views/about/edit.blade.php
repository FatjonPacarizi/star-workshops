<x-app-layout>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit about with IMAGE
                        <a href="{{ url('abouts') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-about/'.$about->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">about Profile Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('uploads/abouts/'.$about->image_section) }}" width="70px" height="70px" alt="Image">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">about Name</label>
                            <input type="text" name="title" value="{{$about->title}}" class="form-control">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="">about heading</label>
                            <input type="text" name="heading" value="{{$about->heading}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">about paragraf</label>
                            <input type="text" name="paragraf" value="{{$about->paragraf}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">about paragraf</label>
                            <input type="text" name="button" value="{{$about->button}}" class="form-control">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="">about Profile Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('uploads/abouts/'.$about->image) }}" width="70px" height="70px" alt="Image">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update about</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>