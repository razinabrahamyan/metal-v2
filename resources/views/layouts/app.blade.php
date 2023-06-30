<!DOCTYPE html>
<html lang="en">
@include('includes.header')
<body>
<!-- Body Inner -->
<div class="body-inner">
    <!-- Header -->
@include('includes.navbar')
<!-- end: Header -->
    @yield('content')
</div>
<!-- end: Body Inner -->
<!-- Scroll top -->
<footer id="footer" class="inverted">
    <div class="footer-content">
        <div class="container m-b-50">
            <div class="row">
                <div class="col-lg-6">
                    <div id="ymap"></div>
                </div>
                <div class="calculator_block col-lg-6 m-auto">
                    <div class="col-12 h5 text-light p-0 text-center">
                        <h3 class="h3 text-light m-b-0">Рассчитайте стоимость металла сами!</h3>
                        <span>
                            Закажите звонок для получения консультации.
                        </span>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-lg-4 mx-auto calc-select-block mb-2">
                            <label for="met_type_1" class="col-12 text-left text-light p-0 m-0 ml-1">Вид металла</label>
                            <select name="met_type_1" id="calc_select" @change="calc"
                                    v-model="calc_quiz_category" class="form-control base-br">
                                @foreach($nav_market as $market)
                                    @foreach($market->categories as $category)
                                        <option :value="{{$category->id}}">
                                            {{$category->title}}
                                        </option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 col-lg-4 mx-auto mb-2">
                            <label class="col-12 text-left text-light p-0 m-0 ml-1" for="met_type_2">Тип металла</label>
                            <select class="form-control base-br" name="met_type_2" @change="calc">
                                @foreach($nav_market as $market)
                                    @foreach($market->categories as $category)
                                        @foreach($category->products as $product)
                                            <option v-if="calc_quiz_category == {{$category->id}}"
                                                    value="{{$product->pricing->by_wholesale}}">
                                                {{$product->title}}
                                            </option>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 col-lg-4 mx-auto mb-2">
                            <label for="calc-weight" class="col-12 text-left text-light p-0 m-0 ml-1">Вес лома
                                (Кг)</label>
                            <input type="number" class="form-control base-br" id="calc-weight" v-model="weight" min="1"
                                   name="calc-weight" placeholder="Вес металла в кг" @input="calc" required>
                        </div>
                        <div class="col-12 text-center">
                    <span class="h6 text-light text-center">
                        Стоимость металла составляет: <span id="totalPrice">0</span> ₽
                    </span>
                        </div>
                        <div class="col-12 float-right b-btn-secondary pr-0 mx-auto text-center mt-2">
                            <button class="btn mx-auto text-center base-br lmk_scb_open_call">
                                Заказать звонок
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="widget">
                        <div class="widget-title">Компания «Металлолом-24»</div>
                        <p class="mb-5">
                            Цены и другие данные на сайте не являются публичной офертой, а позиционируются
                            исключительно, как ознакомительная информация.
                        </p>
                        <a href="#" class="btn btn-inverted" target="_blank">Позвоните нам</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="widget width-max">
                                <div class="widget-title">Популярное</div>
                                <ul class="list">
                                    <li>
                                        <a href="{{route('home',['slug'=>'priem-chernogo-loma'])}}">
                                            Прием черного металла
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('home',['slug'=>'priem-czvetnogo-metalla'])}}">
                                            Прием цветного металла
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('home',['slug'=>'priem-akkumulyatorov'])}}">
                                            Прием аккумуляторов
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('home',['slug'=>'priem-loma-kabelya'])}}">
                                            Прием кабеля
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('home',['slug'=>'priem-transformatorov'])}}">
                                            Прием трансформаторов
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('home',['slug'=>'priem-elektrodvigatelej'])}}">
                                            Прием электродвигателей
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="widget width-max">
                                <div class="widget-title">Меню</div>
                                <ul class="list">
                                    <li><a href="{{route('demontazh')}}">Демонтаж</a></li>
                                    <li><a href="{{route('vivoz')}}">Вывоз</a></li>
                                    <li><a href="{{route('prices')}}">Цены</a></li>
                                    <li><a href="{{route('contacts')}}">Контакты</a></li>
                                    <li><a href="{{route('sitemap')}}">Карта сайта</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="widget width-max">
                                <div class="widget-title">Расскажите о нас</div>
                                <ul class="list">
                                    <li><a href="#">FACEBOOK</a></li>
                                    <li><a href="#">ВКОНТАКТЕ</a></li>
                                    <li><a href="#">TWITTER</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-content">
        <div class="container">
            <div class="copyright-text text-center text-light">
                &copy; 2021 Металлолом-24 - Прием и вывоз металлолома. все права защищены.
            </div>
        </div>
    </div>
</footer>
{{--SEO--}}
<meta itemprop="brand" content="Металлолом-24">
<div itemscope="" itemtype="https://schema.org/RecyclingCenter">
    <meta itemprop="name" content="Металлолом-24">
    <link itemprop="url" href="{{request()->getSchemeAndHttpHost()}}">
    <link itemprop="logo" href="{{asset('assets/images/core-img/logo.png')}}">
    <link itemprop="image" href="{{asset('assets/images/core-img/logo.png')}}">
    <link itemprop="sameAs" href="https://www.facebook.com/LMKmsk">
    <link itemprop="sameAs" href="https://www.instagram.com/lmk.moscow/">
    <link itemprop="sameAs" href="https://twitter.com/LmkMoscow">
    <link itemprop="sameAs" href="https://vk.com/lmk_msk">
    @foreach($addresses as $address)
        <div itemprop="address" itemscope="" itemtype="https://schema.org/PostalAddress">
            <meta itemprop="addressCountry" content="Россия">
            <meta itemprop="addressLocality" content="Москва">
            <meta itemprop="streetAddress" content="{{$address->address}}">
        </div>
    @endforeach
    <meta itemprop="telephone" content="+7 (495) 414-41-80">
    <meta itemprop="telephone" content="+7 (925) 430-79-77">
    <meta itemprop="email" content="m-lom24@yandex.ru">
    <meta itemprop="openingHours" content="Mo-Su">
    <meta itemprop="priceRange" content="12 руб. - 1300 руб.">
    <meta itemprop="foundingDate" content="2016">
</div>
<div itemscope itemtype="https://schema.org/Organization" style="display: none">
    <span itemprop="name">Металлолом-24</span>
    Контакты:
    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
        Адрес:
        <span itemprop="streetAddress">Каширское шоссе 23 км, вл3а</span>
        <span itemprop="postalCode">142715</span>
        <span itemprop="addressLocality">Москва</span>,
    </div>
    Телефон:<span itemprop="telephone">+7 (495) 414-41-80</span>,
    Электронная почта: <span itemprop="email">lmk.moscow@yandex.ru</span>
</div>
{{--SEO--}}
<!--Plugins-->
<script src="{{asset('assets/js/jquery.js')}}"></script>
{{--<script async src="{{asset('assets/js/plugins.js')}}"></script>--}}
<script async src="{{asset('assets/js/plugins-ligth.min.js')}}"></script>
<script async src="{{asset('assets/js/vue.min.js')}}"></script>
<script async src="{{asset('assets/js/axios.min.js')}}"></script>
<!--Template functions-->
<script async src="{{asset('assets/js/functions.min.js')}}"></script>
<script>
    const addresses = @json($addresses);
</script>
@stack('scripts')
@stack('vue')
<script async src="{{asset('assets/js/vue_core.min.js')}}"></script>
</body>
</html>
