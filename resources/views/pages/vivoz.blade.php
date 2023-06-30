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
                        <h1 class="fs-36" itemprop="name">Вывоз металлолома</h1>
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
                            Вывозим лом по всей Москве и области
                        </h2>
                        <p>
                            География нашей деятельности охватывает Москву и Московскую область. Готовы подать машину в
                            срок от 2 часов, но желательно оформлять заявку за день до предполагаемой даты выполнения
                            работ для более комфортного построения логистики.
                        </p>
                        <p>
                            Предположим, у вас есть металлолом, который вам больше не нужен, и вы хотите его сдать. Если
                            вы можете самостоятельно подготовить его к сдаче (порезать на габаритные куски), погрузить и
                            доставить в пункт приемки - тогда задача достаточно проста.
                        </p>
                        <p>
                            Но что делать в том случае, когда металл представлен в виде металлоконструкций, требующих
                            демонтажа, или крупногабаритных кусков разной длинны, превышающих 3 или 5 метров?
                        </p>
                        <p>
                            В таком случае есть 2 варианта действий:
                        </p>
                        <ul class="list-icon list-icon-check list-icon-colored">
                            <li class="mt-2">
                                <div class="d-table">
                                    <span class="nav-text d-table-cell align-middle pl-2">
                                      Самостоятельно резать металлолом, валить конструкции, и разбирать их. При этом необходимо использовать газорезку, грузчиков, самостоятельно осуществлять погрузку, и искать транспорт для вывоза.
                                    </span>
                                </div>
                            </li>
                            <li class="mt-2">
                                <div class="d-table">
                                    <span class="nav-text d-table-cell align-middle pl-2">
                                       Или же вы можете заказать в компании "Металлолом-24" вывоз лома "под ключ"
                                       Или же вы можете заказать в компании "Металлолом-24" вывоз лома "под ключ"
                                    </span>
                                </div>
                            </li>
                        </ul>
                        <h3>
                            Бесплатный вывоз металла в Москве и МО
                        </h3>
                        <p>
                            Наша компания предлагает вывезти металлолом с последующим выкупом, такая услуга избавит вас
                            от любых сложностей по подготовке сырья к утилизации. Выполнение работ по погрузке и
                            транспортировке не повлияет на стоимость утилизации, перевозка металлолома осуществляется
                            бесплатно.
                        </p>
                        <h4>
                            Чем удобно сдать металлолом с вывозом
                        </h4>
                        <ul class="list-icon list-icon-check list-icon-colored">
                            <li class="mt-2">
                                <div class="d-table">
                                    <span class="nav-text d-table-cell align-middle pl-2">
                                      Отсутствие финансовых затрат. Для перевозки металлолома необходимо привлекать специальную погрузочную технику, грузовые машины и ряд специалистов для проведения работ. Мы вывезем металл своими силами, и вам не придется платить деньги сторонним исполнителям   </span>
                                </div>
                            </li>
                            <li class="mt-2">
                                <div class="d-table">
                                    <span class="nav-text d-table-cell align-middle pl-2">
                                     Соблюдение норм технической безопасности. При взаимодействии с металлом необходимо соблюдать ряд обязательных правил, с которыми знакомы не все. Вы можете переложить всю ответственность за выполнение сложной работы с ломом на профессиональных специалистов, которые изучили все требования пожарной и технической безопасности.
                                    </span>
                                </div>
                            </li>
                            <li class="mt-2">
                                <div class="d-table">
                                    <span class="nav-text d-table-cell align-middle pl-2">
                                    Экономия времени. Если вы хотите сдать металлолом быстро, то лучше всего заказать комплексный прием. Мы вывезем металл в установленные сроки, используя современную технику и инструменты, а вы сможете организовать дальнейшую деятельность своего предприятия, опираясь на составленный график.
                                    </span>
                                </div>
                            </li>
                        </ul>
                        <h5>
                            Почему в Москве стоит обратиться к нам
                        </h5>
                        <p>
                            В "Металлолом-24" комплекс современного оборудования и бригады профессиональных рабочих которые смогут
                            провести работы любой сложности с условием максимального комфорта для наших клиентов. "Металлолом-24"
                            Может предложить лучшую цену на всем рынке!
                        </p>
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
                    <p>Ответы на популярные вопросы по вывозу металлалома</p>
                    <div class="accordion toggle fancy radius clean">
                        <div class="ac-item" itemprop="mainEntity" itemscope=""
                             itemtype="https://schema.org/Question">
                            <p class="ac-title" itemprop="name">
                                <i class="fa fa-question-circle"></i>
                                Как производиться оплата при вывозе лома?
                            </p>
                            <div style="" class="ac-content" itemprop="acceptedAnswer"
                                 itemscope="" itemtype="https://schema.org/Answer">
                                           <span itemprop="text">
                                               Оплата происходит сразу после взвешивания вашего лома любым удобным для вас способом.
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
                                Как быстро производится вывоз?
                            </p>
                            <div style="" class="ac-content" itemprop="acceptedAnswer"
                                 itemscope="" itemtype="https://schema.org/Answer">
                                           <span itemprop="text">
                                               Наша бригада может приехать в течении 2-х часов, со всем необходимым оборудованием.
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
                                Как получить индивидуальные условия при вывозе?
                            </p>
                            <div style="" class="ac-content" itemprop="acceptedAnswer"
                                 itemscope="" itemtype="https://schema.org/Answer">
                                           <span itemprop="text">
                                          При вывозе большого объема металлолома, мы можем предложить вам наивысшую цену на всем рынке!
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
                                Вы производите вывоз по договору?
                            </p>
                            <div style="" class="ac-content" itemprop="acceptedAnswer"
                                 itemscope="" itemtype="https://schema.org/Answer">
                                           <span itemprop="text">
                                  Да! Все необходимые документы будут составленые уже к моменту прибытия бригады!
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
