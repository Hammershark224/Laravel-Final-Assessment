{{-- BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CB21133
Student Name: CHONG XUE LIANG --}}
@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit'])
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="get" action="{{ route('application.adminUpdate', $applications['application_ID']) }}" enctype="multipart/form-data">
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
                                        <input class="form-control" type="text" name="username"
                                            value="{{ $applications->vendor->user->username }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ $applications->vendor->user->email }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Booth Information</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Description</label>
                                        <textarea class="form-control" name="description" rows="3" readonly>{{ $applications['description'] }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Option</label>
                                    <select class="form-control" name="status" id="statusSelect">
                                        <option disabled selected>Select status</option>
                                        <option value="rejected">Reject</option>
                                        <option value="accepted">Accept</option>
                                    </select>
                                </div>
                                
                                <div class="form-group" id="boothselect" style="display: none;">
                                    <label>Booths</label>

                                    <select class="form-control" name="booth_ID" required>
                                        <option disabled selected value="">Select Booth</option>
                                        @foreach ($booths as $booth)
                                            <option value="{{ $booth['booth_ID'] }}">{{ $booth['description'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <script>
                                document.getElementById('statusSelect').addEventListener('change', function() {
                                    var status = this.value;
                                    var boothSelect = document.querySelector('#boothselect select[name="booth_ID"]');

                                    if (status === 'accepted') {
                                        boothSelect.closest('.form-group').style.display = 'block';
                                        boothSelect.setAttribute('required', 'required'); 
                                    } else {
                                        boothSelect.closest('.form-group').style.display = 'none';
                                        boothSelect.removeAttribute('required');
                                    }
                                });
                            </script>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
