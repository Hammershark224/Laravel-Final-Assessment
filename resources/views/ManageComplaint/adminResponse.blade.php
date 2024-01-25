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
                    <form role="form" method="POST" action="{{ route('response.create', $dataComplaints['complaint_ID']) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Complaint</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Response</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p class="text-uppercase text-sm">User Information</p>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Full Name</label>
                                        <input class="form-control" type="text" name="username" value="{{ $dataComplaints->vendor->user->username }}" readonly>
                                    </div>
                                </div> 
                            <p class="text-uppercase text-sm">Complaint Info</p>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Title</label>
                                        <input class="form-control" type="text" name="title" value = "{{$dataComplaints->title}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Description</label>
                                        <textarea class="form-control" name="description" rows="3" readonly>{{$dataComplaints->description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="inputName5" class="form-label">Status</label>
                                    <select class="form-select" name="complaint_status" aria-label="Default select example">
                                        <option selected>Select...</option>
                                        <option value="In Progress" @if($dataComplaints->complaint_status=='In Progress') selected @endif>In Progress</option>
                                        <option value="Response" @if($dataComplaints->complaint_status=='Response') selected @endif>Response</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Reply</label>
                                        <textarea class="form-control" name="reply" rows="3">{{$dataComplaints->reply}}</textarea>
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
