{{-- BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CB21133
Student Name: CHONG XUE LIANG --}}
@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create'])
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{route('application.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Application</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Username</label>
                                        <input class="form-control" type="text" name="username" value="{{ old('username', auth()->user()->username) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Application Information</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Description</label>
                                        <textarea class="form-control" name="description" rows="3"></textarea>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">SSM</label>
                                        {{-- <input class="form-control" type="file" name="SSM"> --}}
                                        <input type="file" id="file" class="form-control" name="file"
                                                    placeholder="document" accept=".pdf">

                                                <script>
                                                    // JavaScript function to validate file extension
                                                    function validateFileExtension() {
                                                        var allowedExtensions = /(\.pdf)$/i; // Regular expression to allow only PDF files

                                                        var fileInput = document.getElementById('file');
                                                        var filePath = fileInput.value;
                                                        var fileExtension = filePath.substr(filePath.lastIndexOf('.')).toLowerCase();

                                                        if (!allowedExtensions.exec(fileExtension)) {
                                                            alert('Only PDF files are allowed.');
                                                            fileInput.value = ''; // Clear the file input value
                                                            return false;
                                                        }

                                                        return true;
                                                    }
                                                    </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
