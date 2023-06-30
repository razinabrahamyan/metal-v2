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
                        <h1 class="fs-36" itemprop="name">Демонтаж металлоконструкций</h1>
                        <span class="lead">
                            География нашей деятельности охватывает Москву и Московскую область. Готовы подать машину
                            в срок от 2 часов, но желательно оформлять заявку за день до
                            предполагаемой даты выполнения работ для более комфортного построения логистики.
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
                        <h2>
                            Услуги демонтажа
                        </h2>
                        <p>
                            Компания «Металлолом-24» предоставляет профессиональные услуги по демонтажу зданий на выгодных
                            условиях. Обратившись к нам, вы сможете в короткие сроки очистить территорию от зданий, срок
                            эксплуатации которых давно истек. Все работы осуществляются по предварительно
                            подготовленному генеральному плану, с учетом ППР и ПОС.
                        </p>
                        <p>
                            Разобрать старую конструкцию из металла и привезти ее в пункт приема не проблема, если сама
                            конструкция небольшая и не требует использования оборудования для резки. Однако чаще
                            квалифицированных специалистов, занимающихся демонтажем, погрузкой и вывозом металлолома
                            вызывают тогда, когда:
                        </p>
                        <ul class="list-icon list-icon-check list-icon-colored">
                            <li class="mt-2">
                                <div class="d-table">
                                    <span class="nav-text d-table-cell align-middle pl-2">
                                        Конструкция находится на ограниченной территории и ее разборка осложняется невозможностью подогнать крупную технику
                                    </span>
                                </div>
                            </li>
                            <li class="mt-2">
                                <div class="d-table">
                                    <span class="nav-text d-table-cell align-middle pl-2">
                                        Требуется выполнение опасных высотных работ
                                    </span>
                                </div>
                            </li>
                            <li class="mt-2">
                                <div class="d-table">
                                    <span class="nav-text d-table-cell align-middle pl-2">
                                        Необходимо разобрать крупный объект в сжатые сроки
                                    </span>
                                </div>
                            </li>
                        </ul>
                        <p>
                            Важно! Все работы должны выполняться профессионально. Не экономьте на безопасности: не стоит
                            подвергать себя или своих сотрудников опасности сорваться с высоты, попасть под обвал
                            старых, поврежденных коррозией каркасов и т.д.
                        </p>
                        <p>
                            Компания ООО «Металлолом-24» располагает крупным автопарком специализированной техники для реализации
                            сложных задач по демонтажу и вывозу металлолома. Мы имеем собственные поддерживающие
                            лестницы, строительные леса, страховки для организации безопасности на территории. У нас
                            работают ответственные специалисты в области резки, промышленного альпинизма, погрузки лома.
                            Мы осуществляем прием цветных и черных металлов по цене до 31 тысяч рублей за тонну, готовы
                            предложить действительно комфортные условия сотрудничества для каждого.
                        </p>
                        <p>
                            Выполнение демонтажных работ проводится при наличии лома весом более 1 тонны на территории!
                        </p>
                        <h3>
                            Перед проведением работ в обязательном порядке:
                        </h3>
                        <ul class="list-icon list-icon-check list-icon-colored">
                            <li class="mt-2">
                                <div class="d-table">
                                    <span class="nav-text d-table-cell align-middle pl-2">
                                        Составим график их выполнения и согласуем с вами
                                    </span>
                                </div>
                            </li>
                            <li class="mt-2">
                                <div class="d-table">
                                    <span class="nav-text d-table-cell align-middle pl-2">
                                        Определим необходимый спектр техники и оборудования для реализации поставленной задачи
                                    </span>
                                </div>
                            </li>
                            <li class="mt-2">
                                <div class="d-table">
                                    <span class="nav-text d-table-cell align-middle pl-2">
                                       Обеспечим оперативную очистку территории от ненужного лома.
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="seperator"><i class="fa fa-chevron-down"></i></div>
    <section class="p-b-30 p-t-10" itemscope="" itemtype="https://schema.org/FAQPage">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Часто задаваемые вопросы <small>(4)</small></h3>
                    <p>Ответы на популярные вопросы по демонтажным работам</p>
                    <div class="accordion toggle fancy radius clean">
                        <div class="ac-item" itemprop="mainEntity" itemscope=""
                             itemtype="https://schema.org/Question">
                            <p class="ac-title" itemprop="name">
                                <i class="fa fa-question-circle"></i>
                                Вы производите демонтажные работы в Москве?
                            </p>
                            <div style="" class="ac-content" itemprop="acceptedAnswer"
                                 itemscope="" itemtype="https://schema.org/Answer">
                                           <span itemprop="text">
                                             Да, у нас большой спектр техники для демонтажных работ.
                                             Также мы проводим очистку территорий от мусора асбсолютно бесплатно.
                                           </span>
                                <meta itemprop="upvoteCount" content="8">
                                <div itemprop="author" itemscope="" itemtype="https://schema.org/Person">
                                    <meta itemprop="name"
                                          content="{{\Illuminate\Support\Facades\Config::get('app.name_ru')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion toggle fancy radius clean">
                        <div class="ac-item" itemprop="mainEntity" itemscope=""
                             itemtype="https://schema.org/Question">
                            <p class="ac-title" itemprop="name">
                                <i class="fa fa-question-circle"></i>
                                Сколько стоят демонтажные работы?
                            </p>
                            <div style="" class="ac-content" itemprop="acceptedAnswer"
                                 itemscope="" itemtype="https://schema.org/Answer">
                                           <span itemprop="text">
                                            Стоимость будет оцениваться индивидуально, но в большинстве случаев это бесплатная услуга.
                                           </span>
                                <meta itemprop="upvoteCount" content="8">
                                <div itemprop="author" itemscope="" itemtype="https://schema.org/Person">
                                    <meta itemprop="name"
                                          content="{{\Illuminate\Support\Facades\Config::get('app.name_ru')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion toggle fancy radius clean">
                        <div class="ac-item" itemprop="mainEntity" itemscope=""
                             itemtype="https://schema.org/Question">
                            <p class="ac-title" itemprop="name">
                                <i class="fa fa-question-circle"></i>
                                Какие виды техники используются для проведения работ?
                            </p>
                            <div style="" class="ac-content" itemprop="acceptedAnswer"
                                 itemscope="" itemtype="https://schema.org/Answer">
                                           <span itemprop="text">
                                        Мы можем предоствить любую технику в любом количество, такие как Ломовозы с грейфером, Автокраны, Экскаваторы, Демонтажные роботы и т.д.
                                           </span>
                                <meta itemprop="upvoteCount" content="8">
                                <div itemprop="author" itemscope="" itemtype="https://schema.org/Person">
                                    <meta itemprop="name"
                                          content="{{\Illuminate\Support\Facades\Config::get('app.name_ru')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion toggle fancy radius clean">
                        <div class="ac-item" itemprop="mainEntity" itemscope=""
                             itemtype="https://schema.org/Question">
                            <p class="ac-title" itemprop="name">
                                <i class="fa fa-question-circle"></i>
                               Можно ли сделать демонтаж без покупки лома?
                            </p>
                            <div style="" class="ac-content" itemprop="acceptedAnswer"
                                 itemscope="" itemtype="https://schema.org/Answer">
                                           <span itemprop="text">
                                Нет. Демонтаж это дополнительная Бесплатная услуга при сдаче металлолома.
                                           </span>
                                <meta itemprop="upvoteCount" content="8">
                                <div itemprop="author" itemscope="" itemtype="https://schema.org/Person">
                                    <meta itemprop="name"
                                          content="{{\Illuminate\Support\Facades\Config::get('app.name_ru')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('includes.contacts-info')
@endsection
