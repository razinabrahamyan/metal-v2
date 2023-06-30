@extends('layouts.app')
@section('content')
<!-- end: Page title -->
<section>
    <div class="container-fluid mb-3">
        <div class="breadcrumb">
            {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render(request()->segment(1))}}
        </div>
        <ul class="sitemap">
            <li class="sitemap-root animate__animated animate__rubberBand"><a href="/">Главная</a></li>
            <li class="sitemap-main">
                <ul>
                    @foreach($markets as $market)
                        <li class="mt-5">
                            <a class="animate__animated animate__bounceInDown" href="{{$market['slug']['name']}}">{{$market->title}}</a>
                            @if(count($market->categories) > 0)
                                <ul>
                                    @foreach($market->categories as $category)
                                        <li class="animate__animated animate__bounceInLeft"><a href="{{$category['slug']['name']}}">{{$category->title}}</a>
                                            <ul>
                                                @foreach($category->products as $product)
                                                    @if($category->title !== $product->title)
                                                        <li>
                                                            <a href="{{$product['slug']['name']}}">{{$product->title}}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <ul>
                                    @foreach($market->products as $product)
                                        <li class="animate__animated animate__bounceInRight"><a href="{{$product['slug']['name']}}">{{$product->title}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
{{--                    <li>--}}
{{--                        <a href="/czenyi-na-metall">Цены на металлолом</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="/kak-sdat-metall">Как сдать металлолом</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="/uslugi">Услуги</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="/punkt-priema-metalla">Пункты приема металла</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="/vyivoz-metalloloma">Вывоз металлолома</a>--}}
{{--                        <ul>--}}
{{--                            @foreach($vyvoz as $item)--}}
{{--                                <li>--}}
{{--                                    <a href="/{{$item->slug}}">{{$item->slugable->title}}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="/demontazh">Демонтаж</a>--}}
{{--                        <ul>--}}
{{--                            @foreach($demontazh as $item)--}}
{{--                                <li>--}}
{{--                                    <a href="/{{$item->slug}}">{{$item->slugable->title}}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="/vyiezdnoj-priyomnyij-punkt">Прием металла с выездом</a>--}}
{{--                        <ul>--}}
{{--                            @foreach($priem_s_vyiezdom as $item)--}}
{{--                                <li>--}}
{{--                                    <a href="/{{$item->slug}}">{{$item->slugable->title}}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                </ul>
            </li>
        </ul>
    </div>
</section>
@include('includes.contacts-info')
@endsection

@push('styles')
    <link rel="preload" as="style" onload="this.rel='stylesheet'" href="{{asset('assets/css/sitemap.css')}}">
    <link rel="preload" as="style" onload="this.rel='stylesheet'" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
@endpush
