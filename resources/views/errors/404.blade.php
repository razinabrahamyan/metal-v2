@extends('layouts.app',[
        'title' => 'Страница не найдена'
])
@section('content')
    <!-- Header -->
    @include('includes.navbar')
    <section class="m-t-80 p-b-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-error-404">404</div>
                </div>
                <div class="col-lg-6">
                    <div class="text-start">
                        <h1 class="text-medium">Эту страницу не удалось найти!</h1>
                        <p class="lead">Страница, которую вы ищете, могла быть удалена, изменилось ее имя или временно недоступна.</p>
                        <div class="seperator m-t-20 m-b-20"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
