<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
<!-- Body Inner -->
<div class="body-inner">
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-md-8 col-lg-7 d-flex align-items-center">
                <div class="w-100 px-3 px-sm-5 px-xl-7">

                    <div class="mb-5"><h6 class="h3 mb-1">Добро пожаловать!</h6><p class="text-muted mb-0">Доступ к панели управления</p></div>
                    <form class="form-validate" action="{{route('admin.login')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Почта</label>
                            <div class="input-group">
                                <input type="email" class="form-control" name="email" placeholder="Введите адрес почты " required="">
                                <span class="input-group-text"><i class="icon-user"></i></span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="password">Пароль</label>
                            <div class="input-group show-hide-password">
                                <input class="form-control" name="password" placeholder="Введите пароль" type="password" required="">
                                <span class="input-group-text"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                            </div>
                        </div>
                        <div class="mt-4"><button type="submit" class="btn btn-primary btn-block btn-primary">Войти</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-lg-5 d-none d-md-block bg-cover" style="background-color: #1c78ac">
                <a href="{{route('home')}}"
                   class="btn btn-white btn-rounded-only btn-rounded position-absolute left-4 mt-3"
                   data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="Вернуться на главную страницу"><i
                            class="icon-home"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- end: Body Inner -->
<!-- Scroll top -->
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
<!--Plugins-->
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/plugins.js')}}"></script>
<!--Template functions-->
<script src="{{asset('assets/js/functions.js')}}"></script>
</body>

</html>