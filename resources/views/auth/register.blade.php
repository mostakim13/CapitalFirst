<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('layouts.user.partials.style')
    <link rel="stylesheet" href="{{ asset('assets') }}/css/partner.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <title>Register Page - Capital First</title>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2 mx-auto" style="width: 30%">
                    <div class="auth-inner py-2">
                        <!-- Register v1 -->
                        <div class="card mb-0">
                            <div class="card-body">

                                <a href="/" class="d-flex justify-content-center"><img src="/login.png"
                                        alt="Capital first"></a>

                                <h4 class="card-title mb-1">Adventure starts here 🚀</h4>
                                <p class="card-text mb-2">Make your app management easy and fun!</p>

                                <form class="auth-register-form mt-2" method="POST" action="{{ route('register') }}"
                                    id="registerForm" novalidate>
                                    @csrf
                                    <div class="form-group">
                                        <label for="register-username" class="form-label">Enter Your Full
                                            Name</label>

                                        <input type="text" class="form-control" id="name"
                                            @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                                            required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="register-email" class="form-label">Email</label>

                                        <input type="email" class="form-control" id="email"
                                            @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="user_name" class="form-label">Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                            </div>
                                            <input type="text" class="form-control" id="user_name"
                                                @error('user_name') is-invalid @enderror" name="user_name"
                                                value="{{ old('user_name') }}" required autocomplete="user_name">
                                            @error('user_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="register-password" class="form-label">Password</label>

                                        <div class="input-group input-group-merge form-password-toggle">

                                            <input type="password" class="form-control" id="password"
                                                @error('password') is-invalid @enderror" name="password" required
                                                autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="register-password" class="form-label">Confirm Your
                                            Password</label>

                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control" id="password-confirm"
                                                name="password_confirmation" required autocomplete="new-password">

                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    @if (isset($_GET['ref']))
                                        <div class="form-group">
                                            <label class="form-label" for="basic-default-email">Sponsor</label>
                                            <input type="text" id="sponsor" name="sponsor" value="{{ $_GET['ref'] }}"
                                                class="form-control" placeholder="Enter User Name" required />

                                            <div id="suggestUser"></div>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label class="form-label" for="basic-default-email">Sponsor</label>
                                            <input type="text" id="sponsor" name="sponsor" class="form-control"
                                                placeholder="Enter User Name" required />

                                            <div id="suggestUser"></div>
                                        </div>
                                    @endif
                                    {{-- <div class="form-group">
                                        <label for="sponsor" class="form-label">Sponsor</label>
                                        <input type="text" class="form-control" id="sponsor"
                                            @error('sponsor') is-invalid @enderror" name="sponsor"
                                            value="{{ old('sponsor') }}" required autocomplete="sponsor">
                                        @error('sponsor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="basicSelect">Select Position</label>
                                        <select class="select2Me form-control" name="position" id="position">
                                            <option label="Choose position"></option>
                                            <option value="2">Right</option>
                                            <option value="1">Left</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-email">Placement ID</label>
                                        <input type="text" id="placement_id" name="placement_id"
                                            class="form-control" required readonly />

                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="terms" type="checkbox"
                                                id="register-privacy-policy" tabindex="4" />
                                            <label class="custom-control-label" for="register-privacy-policy">
                                                I agree to <a href="javascript:void(0);">privacy policy & terms</a>
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" tabindex="5">Sign up</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>Already have an account?</span>
                                    <a href="{{ route('login') }}">
                                        <span>Sign in instead</span>
                                    </a>
                                </p>

                                <div class="divider my-2">
                                    <div class="divider-text">or</div>
                                </div>

                                <div class="auth-footer-btn d-flex justify-content-center">
                                    <a href="javascript:void(0)" class="btn btn-facebook">
                                        <i data-feather="facebook"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-twitter white">
                                        <i data-feather="twitter"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-google">
                                        <i data-feather="mail"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-github">
                                        <i data-feather="github"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /Register v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                //select2Me('');
            });
            $("#successMessage").delay(10000).slideUp(300);
            $('#sponsor').on('change', function(e) {
                $('#placement_id').val('');
                $("#position").select2("val", "");
            });

            $('#position').on('change', function(e) {
                var position = $(this).val();
                if (position == '') {
                    return false;
                }
                var sponsor = $('#sponsor').val();
                if (sponsor == '') {
                    $(this).val('');
                    return alert('select a sponsor');
                }
                //var position=  $('#position').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    //url: $(this).attr('action'),
                    url: '{{ route('referrals-checkposition') }}',
                    type: 'POST',
                    data: {
                        sponsor: sponsor,
                        position: position
                    },
                    //dataType: 'json',
                    success: function(data) {
                        $('#placement_id').val(data);
                        //location.reload();
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });

            });

            $("body").on("keyup", "#sponsor", function() {
                let searchData = $("#sponsor").val();
                if (searchData.length > 0) {

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('get-sponsor') }}',
                        data: {
                            search: searchData
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(result) {
                            $('#suggestUser').html(result.success)
                            console.log(result.data)
                            if (result.data) {
                                $("#position").val("");
                                $("#placement_id").val("");
                                $("#position").removeAttr('disabled');
                            } else {
                                $("#position").val("");
                                $("#placement_id").val("");
                                $('#position').prop('disabled', true);
                            }
                        }
                    });
                }
                if (searchData.length < 1) $('#suggestUser').html("")
            })
        </script>
    @endpush
    @include('layouts.user.partials.script')
    <!-- END: Content-->
    <script>
        var checker = document.getElementById('acceptTerms');
        var sendbtn = document.getElementById('sendNewSms');
        // when unchecked or checked, run the function
        checker.onchange = function() {
            if (this.checked) {
                sendbtn.disabled = false;
            } else {
                sendbtn.disabled = true;
            }

        }
    </script>



    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
