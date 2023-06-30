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
                        <h1 class="fs-36" itemprop="name">Цены на металлолом</h1>
                        <span class="lead">
                          Металлический лом – ценное вторсырье и источник дохода. Работы по демонтажу и вывозу ненужных металлических отходов нередко откладываются из-за сложности подготовки и транспортировки металла. При этом упускается возможность получить за металлолом хорошую цену и тем самым заработать.
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
                        @foreach($marketPricesByCategory as $marketPrice)
                            @include('includes.category_price',['categoriesPrices' => $marketPrice])
                        @endforeach
                    </div>
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
                            Сколько стоит металлолом
                        </h2>
                        <p>
                            Цена вторичного сырья зависит от многих факторов и в немалой степени зависит от ситуации на
                            рынке. Так как металлический лом используется в разных отраслях промышленности, его
                            стоимость меняется в зависимости от состояния экономики – цена меняется в течение года, и
                            даже месяца очень сильно.
                        </p>
                        <p>
                            Легковесные отходы ценятся менее остальных. В большинстве случаев такое сырье только после
                            определенной обработки становится пригодно для вторичной переработки. Самую большую ценность
                            имеет кусковой лом, так как он требует минимальных затрат по переплавке. Крупногабаритный
                            лом получается при демонтаже зданий и сооружений, утилизации спецтехники. Чтобы подготовить
                            отходы к транспортировке, требуется специальный инструмент. При транспортировке используются
                            крупнотоннажная техника. Чтобы узнать конкретную цену металла за 1 кг, необходимо понимать
                            какое потребуется количество предварительной работы.
                        </p>
                        <h3>
                            Этапы работы
                        </h3>
                        <p>
                            Порядок приема металлолома состоит из нескольких этапов. Если есть необходимость,
                            специалисты компании осуществляют демонтаж металлоконструкций, резку элементов и разбор
                            спецтехники на территории заказчика. Затем металл загружается в ломовоз, и доставляется в
                            пункт приема. Для транспортировки используются грузовые автомобили, специально
                            приспособленные для перевозки металлолома.
                        </p>
                        <p>
                            Порядок приема металлолома состоит из нескольких этапов. Если есть необходимость,
                            специалисты компании осуществляют демонтаж металлоконструкций, резку элементов и разбор
                            спецтехники на территории заказчика. Затем металл загружается в ломовоз, и доставляется в
                            пункт приема. Для транспортировки используются грузовые автомобили, специально
                            приспособленные для перевозки металлолома.
                        </p>
                        <p>
                            В первом случае специалисты компании возьмут на себя все работы по утилизации ненужных
                            металлических изделий. Вам останется только получить деньги.

                            Компания «Металлолом-24» работает по всей территории Москвы и Московской области. Штат
                            квалифицированных специалистов, собственный автопарк и наличие профессионального
                            оборудования позволяет нам предложить клиентам оптимальные цены на металлолом в Москве.
                            Позвоните нам и наши менеджеры ответят на все ваши вопросы.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-b-30 p-t-10" itemscope="" itemtype="https://schema.org/FAQPage">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Часто задаваемые вопросы <small>(3)</small></h3>
                    <p>Ответы на популярные вопросы по ценам на металлолом</p>
                    <div class="accordion toggle fancy radius clean">
                        <div class="ac-item" itemprop="mainEntity" itemscope=""
                             itemtype="https://schema.org/Question">
                            <p class="ac-title" itemprop="name">
                                <i class="fa fa-question-circle"></i>
                               От чего зависит цена металлолома?
                            </p>
                            <div style="" class="ac-content" itemprop="acceptedAnswer"
                                 itemscope="" itemtype="https://schema.org/Answer">
                                           <span itemprop="text">
                                       Цена зависит от курса металла на рынке России, от объема вашего лома, от чистоты лома (примеси,засоры, химические примеси).
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
                                Как проходит процесс оплаты за сдачу лома?
                            </p>
                            <div style="" class="ac-content" itemprop="acceptedAnswer"
                                 itemscope="" itemtype="https://schema.org/Answer">
                                           <span itemprop="text">
                                               Оплата происходит сразу после взвешивания лома, любым удобным для вас образом.
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
                                Как получить высокую цену за металлолом?
                            </p>
                            <div style="" class="ac-content" itemprop="acceptedAnswer"
                                 itemscope="" itemtype="https://schema.org/Answer">
                                           <span itemprop="text">
                                               Чтобы получить более высокую цену, у вас должен быть большой объем (от 1 тонны).
                                               Также металл должен соответсвовать ГОСТ-ам с которыми вас могут ознакомить наши консультанты.
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
