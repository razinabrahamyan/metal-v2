@extends('layouts.app')
@section('content')
    <div itemscope="" itemtype="https://schema.org/Product">
        <section class="background-grey p-b-30 p-t-30">
            <div class="container">
                <div class="breadcrumb">
                    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render(request()->segment(1))}}
                </div>
                <div class="row">
                    <div class="d-flex col-lg-5 order-1 order-lg-0 order-md-0">
                        <div class="heading-text heading-section m-auto">
                            <h1 class="fs-36" itemprop="name">{{$slug->meta->h1}}</h1>
                            <span class="lead">
                                «Металлолом-24» одна из крупнейших компаний на российском рынке,
                                которая занимается выкупом лома черных металлов от физических и юридических лиц
                                в большом количестве по самой высокой цене.Готовы подать машину в срок от 2 часов.
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
        <section class="p-b-10 p-t-10">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @include('includes.form')
                    </div>
                </div>
            </div>
        </section>
        <section id="page-content" class="p-b-30 p-t-30">
            <div class="container">
                <div class="row">
                    <!-- content -->
                    <div class="content col-12">
                        <div class="heading-text text-start">
                            {!! $content->content_text !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if(!empty($productPrice))
            @include('includes.product_price')
        @elseif(!empty($categoriesPrices))
            @include('includes.category_price')
        @elseif(!empty($marketPrices))
            @foreach($marketPrices as $categoriesPrices)
                @include('includes.category_price',['categoriesPrices' => $categoriesPrices])
            @endforeach
        @endif
        @if(!empty($faqs))
            <div class="seperator"><i class="fa fa-chevron-down"></i></div>
            <section class="p-b-30 p-t-10" itemscope="" itemtype="https://schema.org/FAQPage">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3>Часто задаваемые вопросы <small>({{count($faqs->data)}})</small></h3>
                            <p>{{$faqs->header}}</p>
                            <div class="accordion toggle fancy radius clean">
                                @foreach($faqs->data as $faq)
                                    <div class="ac-item" itemprop="mainEntity" itemscope=""
                                         itemtype="https://schema.org/Question">
                                        <p class="ac-title" itemprop="name">
                                            <i class="fa fa-question-circle"></i>
                                            {{$faq->question}}
                                        </p>
                                        <div style="" class="ac-content"  >
                                           <span itemprop="text">
                                               {{$faq->answer}}
                                           </span>
                                            <meta itemprop="upvoteCount" content="8">
                                            <div itemprop="author" itemscope="" itemtype="https://schema.org/Person">
                                                <meta itemprop="name"
                                                      content="{{\Illuminate\Support\Facades\Config::get('app.name_ru')}}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @include('includes.contacts-info')
    </div>
@endsection
