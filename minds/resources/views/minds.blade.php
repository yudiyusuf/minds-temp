@extends('layouts.master-without-nav')
@section('title')
    @lang('translation.Minds')
@endsection
@section('body')
<body>
@endsection
@section('content')
<div class="bg-soft-light min-vh-100">
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div class="row justify-content-center mb-5">
                            <div class="col-sm-3">
                                <div class="maintenance-img">
                                    <img src="{{ URL::asset('assets/images/maintenance.png') }}" alt="" class="img-fluid mx-auto d-block" max-width="80%">
                                </div>
                            </div>
                        </div>
                        <h3 class="mt-4">MINDS OS</h3>
                        <p>Management Intelligence and Network Database of Sanivokasi</p>

                        <div class="mt-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-microsoft font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">MDBC</h5>
                                           <p class="text-muted mb-0"><a href="https://businesscentral.dynamics.com/" target="_blank" rel="noopener noreferrer">Microsoft Dynamic Bisnis Center</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-email-outline font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">Synology</h5>
                                            <p class="text-muted mb-0"><a href="https://sanivokasi.synology.me/" target="_blank" rel="noopener noreferrer">Drive & Mail Synolgy</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-access-point-network font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">E-Ticketing</h5>
                                           <p class="text-muted mb-0"><a href="http://110.5.102.154:8000/login" target="_blank" rel="noopener noreferrer">Sales Ticketing From Pesanan</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-clock-outline font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">
                                                POS</h5>
                                            <p class="text-muted mb-0"><a href="http://54.179.58.215:8000/" target="_blank" rel="noopener noreferrer">Pos Cahaya Sani Vokasi</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-diamond font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">Parva Bisnis</h5>
                                            <p class="text-muted mb-0"><a href="https://parvabisnis.id" target="_blank" rel="noopener noreferrer">Catalog & Ecommerce Parva</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-book font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">
                                                Internal Memo</h5>
                                            <p class="text-muted mb-0"><a href="{{ route('internalmemo.request') }}" target="_blank" rel="noopener noreferrer">Memo Internal For CSV</a></p>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($dashboards as $dashboard)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="dropdown float-end">
                                                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <form action="{{url('/delete-dashboard', $dashboard->id)}}"
                                                        method="POST">
                                                        @csrf
                                                        <a onclick="this.closest('form').submit();return false;" class="dropdown-item deletetask" href="#" data-id="#uptask-1">Delete</a>
                                                    </form>
                                                </div>
                                            </div> <!-- end dropdown -->                                   
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-ticket-accountc font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">{{ $dashboard->name }}</h5>
                                           <p class="text-muted mb-0"><a href="{{ $dashboard->url }}" target="_blank" rel="noopener noreferrer">{{ $dashboard->description }}</a></p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".tambah-dashboard"><i class="me-1"></i>Tambah Dashboard</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
</div>
<div class="modal fade tambah-dashboard" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Dashboard</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('tambahdashboard') }}">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus placeholder="Contoh : Sanivokasi">
                        <div class="text-danger" id="nameError" data-ajax-feedback="name"></div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" autofocus placeholder="Contoh : Website PT. Cahaya Sani Vokasi">
                        <div class="text-danger" id="descriptionError" data-ajax-feedback="description"></div>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">Url / Link</label>
                        <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" autofocus placeholder="Contoh : https://sanivokasi.com">
                        <div class="text-danger" id="urlError" data-ajax-feedback="url"></div>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- end  -->
<!--  Update Profile example -->
<div class="modal fade update-profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="update-profile">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                    <div class="mb-3">
                        <label for="useremail" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail" value="{{ Auth::user()->email }}" name="email" placeholder="Enter email" autofocus>
                        <div class="text-danger" id="emailError" data-ajax-feedback="email"></div>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" id="username" name="name" autofocus placeholder="Enter username">
                        <div class="text-danger" id="nameError" data-ajax-feedback="name"></div>
                    </div>
                    <div class="mb-3">
                        <label for="avatar">Profile Picture</label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar" autofocus>
                            <label class="input-group-text" for="avatar">Upload</label>
                        </div>
                        <div class="text-start mt-2">
                            <img src="@if (Auth::user()->avatar != ''){{ URL::asset('images/'. Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.png') }}@endif" alt="" class="rounded-circle avatar-lg">
                        </div>
                        <div class="text-danger" role="alert" id="avatarError" data-ajax-feedback="avatar"></div>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light UpdateProfile" data-id="{{ Auth::user()->id }}" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/profile.init.js') }}"></script>
<script>
    $('#update-profile').on('submit', function(event) {
        event.preventDefault();
        var Id = $('#data_id').val();
        let formData = new FormData(this);
        $('#emailError').text('');
        $('#nameError').text('');
        $('#avatarError').text('');
        $.ajax({
            url: "{{ url('update-profile') }}" + "/" + Id,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#emailError').text('');
                $('#nameError').text('');
                $('#avatarError').text('');
                if (response.isSuccess == false) {
                    alert(response.Message);
                } else if (response.isSuccess == true) {
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            },
            error: function(response) {
                $('#emailError').text(response.responseJSON.errors.email);
                $('#nameError').text(response.responseJSON.errors.name);
                $('#avatarError').text(response.responseJSON.errors.avatar);
            }
        });
    });
</script>
@endsection
