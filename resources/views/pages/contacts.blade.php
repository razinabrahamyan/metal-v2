@extends('layouts.app')
@section('content')
    <section class="background-grey p-b-30 p-t-30">
        <div class="container">
            <div class="breadcrumb">
                {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render(request()->segment(1))}}
            </div>
            <div class="row">
                <div class="d-flex col-lg-5 order-1 order-lg-0 order-md-0">
                    <div class="heading-text heading-section justify-content-center align-self-center">
                        <h1 class="fs-36" itemprop="name">Контакты компании</h1>
                        <span class="lead">
                            Компания "Металлолом-24" предлагает своим клиентам всевозможные варианты связи.
                            Вы можете позвонить нам по указанному номеру телефона, так же можете связаться с нами через Viber или WhatsApp.
                            Так же мы принимаем заявки на e-mail.
                            Если Вы хотите, что бы мы сами связались с Вами, просто оставьте заявку на обратный звонок.
                        </span>
                    </div>
                </div>
                <div class="col-lg-7 order-0 order-lg-1 order-md-1">
                    <div class="card">
                        @include('includes.marquee_prices')
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('includes.contacts-info')
@endsection
