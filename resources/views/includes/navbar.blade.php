<header id="header" data-transparent="true" data-fullwidth="true"
        class="light submenu-light header-sticky sticky-active">
    <div class="header-inner">
        <div class="container">
            <div id="logo">
                <a href="{{route('home')}}">
                    <span class="logo-default">
                        <img src="{{asset('assets/images/core-img/logo.svg')}}" alt="Лого" title="Лого" loading="lazy"
                             width="62" height="62">
                        <span class="logo-text">
                            Глав-Металл
                        </span>
                    </span>
                </a>
            </div>
            <div class="header-extras">
                <ul>
                    <li class="social-call">
                        <a href="tel:+79254307977" rel="nofollow noindex" aria-label="Tel">
                            <i class="fas fa-phone-square-alt"></i>
                        </a>
                    </li>
                    <li class="social-whatsapp  m-l-5">
                        <a href="#" aria-label="WhatsApp">
                            <i class="fab fa-whatsapp-square"></i>
                        </a>
                    </li>
                    {{--                    <li class="social-telegram m-l-5">--}}
                    {{--                        <a href="#" aria-label="Telegram">--}}
                    {{--                            <i class="fab fa-telegram"></i>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                </ul>
            </div>
            <div id="mainMenu-trigger">
                <a class="lines-button x"><span class="lines"></span></a>
            </div>
            <div id="mainMenu" class="menu-center">
                <div class="container">
                    <nav itemscope="" itemtype="https://schema.org/SiteNavigationElement">
                        <ul>
                            <li class="dropdown">
                                <span class="link">
                                    Категории металла
                                </span>
                                <ul class="dropdown-menu">
                                    @foreach($nav_market as $market)
                                        <li class="dropdown-submenu">
                                            <a href="{{$market['slug']['name']}}" itemprop="url">
                                                <span itemprop="name">
                                                    {{$market->title}}
                                                </span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                @if(count($market->categories) > 0)
                                                    @foreach($market['categories'] as $category)
                                                        <li class="dropdown-submenu"><a
                                                                href="{{$category['slug']['name']}}">{{$category->title}}</a>
                                                            @desktop
                                                            <ul class="dropdown-menu @if(count($category['products']) >= 10) columns-2 @endif">
                                                                @elsedesktop
                                                                <ul class="dropdown-menu">
                                                                    @enddesktop
                                                                    @foreach($category['products'] as $product)
                                                                        <li>
                                                                            <a href="{{$product['slug']['name']}}"
                                                                               itemprop="url">
                                                                           <span itemprop="name">
                                                                                {{$product->title}}
                                                                           </span>
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                </li>
                                                                @endforeach
                                                                @else
                                                                    @if(count($market['products']) > 0)
                                                                        @foreach($market['products'] as $product)
                                                                            <li>
                                                                                <a href="{{$product['slug']['name']}}"
                                                                                   itemprop="url">
                                                                    <span itemprop="name">
                                                                        {{$product->title}}
                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    @endif
                                                                @endif
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{route('vivoz')}}" itemprop="url">
                                                <span itemprop="name">Вывоз</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('demontazh')}}" itemprop="url">
                                                <span itemprop="name">Демонтаж</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('prices')}}" itemprop="url">
                                                <span itemprop="name">Цены</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('contacts')}}" itemprop="url">
                                                <span itemprop="name">Контакты</span>
                                            </a>
                                        </li>
                                </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
