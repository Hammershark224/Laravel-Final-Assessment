{{-- BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CB21133
Student Name: CHONG XUE LIANG --}}
@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Booth'])
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        @if(!$dataRentals)
        <div class="row">
            <!-- if user is participant and not yet applied for kiosk, render this-->
            <div class="card card-background col m-4">
                <div class="full-background" style="background-image: url('https://images.unsplash.com/photo-1541451378359-acdede43fdf4?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80')"></div>
                <div class="card-body">
                    <p class="card-title h5 d-block text-white">You have not applied for Booth Access</p>
                    <p class="card-description mb-4">It appears that you haven't yet applied for Booth access. To streamline your experience and take advantage of our Booth services, please click the button below to register Booth.</p>
                    <a href="{{ route('application.manage') }}" class="btn bg-gradient-primary mt-3">Apply Booth</a>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="get" action="/complaint" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Booth Information</p>
                                <div class="col-md-12">
                                <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Booth Number</label>
                                        <input class="form-control" type="number" name="username" value = "{{$dataRentals->booth->number}}" readonly>
                                    </div>
                                </div>
                               
                                <div class="col-md-12">
                                <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Booth Description</label>
                                        <input class="form-control" type="text" name="username" value = "{{$dataRentals->booth->description}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
        @endif
        @include('layouts.footers.auth.footer')
    </div>
@endsection
