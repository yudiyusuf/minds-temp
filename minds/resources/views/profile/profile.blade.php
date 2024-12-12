@extends('layouts.master')
@section('title') @lang('translation.Profile') @endsection
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="profile-user"></div>
    </div>
</div>

<div class="row">
   <div class="profile-content">
       <div class="row align-items-end">
            <div class="col-sm">
                <div class="d-flex align-items-end mt-3 mt-sm-0">
                    <div class="flex-shrink-0">
                        <div class="avatar-xxl me-3">
                            <img src="@if (Auth::user()->avatar != ''){{ URL::asset('images/'. Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.png') }}@endif" alt="profile-image" class="img-fluid rounded-circle d-block img-thumbnail">
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <div>
                            <h5 class="font-size-16 mb-1">{{ Auth::user()->name }}</h5>
                            <p class="text-muted font-size-13 mb-2 pb-2">{{ Auth::user()->divisi->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="d-flex align-items-start justify-content-end gap-2 mb-2">
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".update-profile"><i class="me-1"></i> Edit Profile</button>
                    </div>
                </div>
            </div>
       </div>
   </div>
</div>

<div class="row">
    <div class="col-lg-12">
       <div class="card bg-transparent shadow-none">
           <div class="card-body">
                <ul class="nav nav-tabs-custom card-header-tabs border-top mt-2" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" data-bs-toggle="tab" href="#post" role="tab">Post</a>
                    </li>
                </ul>
           </div>
       </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-8 col-lg-8">
        <div class="tab-content">
            <div class="tab-pane active" id="overview" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">About</h5>
                    </div>

                    <div class="card-body">
                        <div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end tab pane -->

            <div class="tab-pane" id="post" role="tabpanel">
                <div class="card">
                    <!-- end card body -->
                </div>
                <!-- end card -->


                <div class="card">
                    <div class="card-body">
                            <!-- end blog post -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end tab pane -->
        </div>
        <!-- end tab content -->
    </div>
    <!-- end col -->

    <div class="col-xl-4 col-lg-4">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Team Members</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap">
                        @foreach ($users as $user)
                        <tbody>
                            <tr>
                                <td style="width: 50px;"><img src="{{ URL::asset('images/'. $user->avatar) }}" class="rounded-circle avatar-sm" alt=""></td>
                                <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">{{ $user->name }}</a></h5></td>
                                <td>
                                    <div>
                                        <a href="javascript: void(0);" class="badge bg-soft-primary text-primary font-size-11">{{ $user->divisi->name }}</a>
                                    </div>
                                </td>
                                <td>
                                    <i class="mdi mdi-circle-medium font-size-18 text-success align-middle me-1"></i> Online
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
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
                    <div class="mb-3">
                        <label for="sign">Sign Picture</label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('sign') is-invalid @enderror" id="sign" name="sign" autofocus>
                            <label class="input-group-text" for="sign">Upload</label>
                        </div>
                        <div class="text-start mt-2">
                            <img src="{{ URL::asset('images/'. Auth::user()->sign) }}" alt="" class="rounded-circle avatar-lg">
                        </div>
                        <div class="text-danger" role="alert" id="signError" data-ajax-feedback="sign"></div>
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
        $('#signError').text('');
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
                $('#signError').text('');
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
                $('#signError').text(response.responseJSON.errors.sign);
            }
        });
    });
</script>
@endsection
