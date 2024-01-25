{{-- BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CB21133
Student Name: CHONG XUE LIANG --}}
@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Complaint'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6>Complaint List</h6>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-success" type="button" onclick="window.location='{{ route('complaint.create') }}'">Create</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Complaint List</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Date Apply</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($complaint as $complaint)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$complaint['title']}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">{{$complaint['created_at']}}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">{{$complaint['complaint_status']}}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <a href="{{ route('complaint.show', $complaint['complaint_ID']) }}" class="btn btn-minor">VIEW</a>
                                            <a href="{{ route('complaint.delete', $complaint['complaint_ID']) }}" class="btn btn-danger" title="Delete" onclick="return confirm('Confirm to delete?')">DELETE</a>
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
        @include('layouts.footers.auth.footer')
    </div>
@endsection
