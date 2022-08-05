

<x-app-layout>
<div class="p-6 flex flex-col  items-center">
  
      <div class="w-full bg-white border border-gray-200 rounded">
              <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">
              <h1 class = "p-3 text-slate-900">App Information</h1>
              <a href="/dashboard" class="p-3 text-gray-400"> Cancel</a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Add Student with IMAGE
                        <a href="{{ url('about') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('add-about') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="form-group mb-3">
                            <label for="">Student Name</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Student Email</label>
                            <input type="text" name="heading" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Student Course</label>
                            <input type="text" name="paragraf" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Student Course</label>
                            <input type="text" name="button" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Student Profile Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save Student</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>