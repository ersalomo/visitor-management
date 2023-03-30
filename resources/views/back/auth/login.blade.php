<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('back.layouts.inc.css')
</head>
<body>

<main class="main-content main-content-bg mt-0 ps">
    <div class="page-header min-vh-100" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-basic.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7">
                    <div class="card border-0 mb-0">
                        <div class="card-header bg-transparent">
                            <h5 class="text-dark text-center mt-2 mb-3">Sign in</h5>
{{--                            <div class="btn-wrapper text-center">--}}
{{--                                <a href="javascript:;" class="btn btn-neutral btn-icon btn-sm mb-0">--}}
{{--                                    <img class="w-30" src="../../../assets/img/logos/github.svg">--}}
{{--                                    Github--}}
{{--                                </a>--}}
{{--                                <a href="javascript:;" class="btn btn-neutral btn-icon btn-sm mb-0">--}}
{{--                                    <img class="w-30" src="../../../assets/img/logos/google.svg">--}}
{{--                                    Google--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </div>
                        <div class="card-body px-lg-5 pt-0">
                            <div class="text-center text-muted mb-4">
                                <small>Sign in with credentials</small>
                            </div>
                            <form role="form" class="text-start" action="/admin/dashboard/" method="get">
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Email" aria-label="Email">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" placeholder="Password" aria-label="Password">
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-100 my-4 mb-2">Sign in</button>
                                </div>
{{--                                <div class="mb-2 position-relative text-center">--}}
{{--                                    <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">--}}
{{--                                        or--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="text-center">--}}
{{--                                    <button type="button" class="btn bg-gradient-dark w-100 mt-2 mb-4">Sign up</button>--}}
{{--                                </div>--}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
