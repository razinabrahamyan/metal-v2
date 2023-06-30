@if(!empty($productPrice->pricing))
    <section class="background-grey p-b-20 p-t-20">
        <div class="container">
                <div class="col-12 p-0 m-auto p-3">
                    <h2 class="text-center m-0 mb-3">
                        Цена на {{\Illuminate\Support\Str::lower($productPrice->title)}} на сегодня
                    </h2>
                </div>
                    <table class="table-bordered prices-table table">
                        <thead>
                        <tr>
                            @if($productPrice->pricing->weight == 'kilogram')
                                <th class="text-center  table-item m-auto align-middle ">
                                    Категория
                                    металла
                                </th>
                                <th class="text-center  table-item m-auto align-middle ">
                                    <span itemprop="weight">до 100 кг.</span>
                                </th>
                                <th class="text-center  table-item m-auto align-middle ">
                                    <span itemprop="weight">100 до 500 кг.</span>
                                </th>
                                <th class="text-center  table-item m-auto align-middle ">
                                    <span itemprop="weight">500 - 1000 кг.</span>
                                </th>
                                <th class="text-center  table-item m-auto align-middle ">
                                    <span itemprop="weight">Цена за 1 кг</span>
                                </th>
                            @else
                                <th class="text-center  table-item m-auto align-middle ">
                                    Категория
                                    металла
                                </th>
                                <th class="text-center  table-item m-auto align-middle ">
                                    <span itemprop="weight">От 1 т.</span>
                                </th>
                                <th class="text-center  table-item m-auto align-middle ">
                                    <span itemprop="weight">От 10 до 50 т.</span>
                                </th>
                                <th class="text-center  table-item m-auto align-middle ">
                                    <span itemprop="weight">От 50 до 100 т.</span>
                                </th>
                                <th class="text-center  table-item m-auto align-middle ">
                                    <span itemprop="weight">Цена за 1 т.</span>
                                </th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        <tr itemprop="offers" itemscope="" itemtype="https://schema.org/Offer">
                            <td class="text-center  table-item m-auto align-middle ">
                                {{$productPrice->title}}
                            </td>
                            <td class="text-center  table-item m-auto align-middle ">
                                <span>{{str_replace(' ', '', $productPrice->pricing->price_below)}}</span> руб.
                                <meta itemprop="price"
                                      content="{{str_replace(' ', '', $productPrice->pricing->price_below)}}">
                                <meta itemprop="priceCurrency" content="RUB"/>
                                <link itemprop="availability" href="https://schema.org/InStock">
                                <meta itemprop="priceValidUntil" content="{{date('Y-m-d')}}">
                                <link itemprop="url" href="{{\Illuminate\Support\Facades\URL::current()}}">
                            </td>
                            <td class="text-center  table-item m-auto align-middle ">
                                <span>{{str_replace(' ', '', $productPrice->pricing->price_from_to)}}</span> руб.
                                <meta itemprop="price"
                                      content="{{str_replace(' ', '', $productPrice->pricing->price_from_to)}}">
                                <meta itemprop="priceCurrency" content="RUB"/>
                                <link itemprop="availability" href="https://schema.org/InStock">
                                <meta itemprop="priceValidUntil" content="{{date('Y-m-d')}}">
                                <link itemprop="url" href="{{\Illuminate\Support\Facades\URL::current()}}">
                            </td>
                            <td class="text-center  table-item m-auto align-middle ">
                                <span>{{str_replace(' ', '', $productPrice->pricing->price_above_from_to)}}</span>
                                руб.
                                <meta itemprop="price"
                                      content="{{str_replace(' ', '', $productPrice->pricing->price_above_from_to)}}">
                                <meta itemprop="priceCurrency" content="RUB"/>
                                <link itemprop="availability" href="https://schema.org/InStock">
                                <meta itemprop="priceValidUntil" content="{{date('Y-m-d')}}">
                                <link itemprop="url" href="{{\Illuminate\Support\Facades\URL::current()}}">
                            </td>
                            <td class="text-center  table-item m-auto align-middle ">
                                <span>{{str_replace(' ', '', $productPrice->pricing->by_wholesale)}}</span> руб.
                                <meta itemprop="price"
                                      content="{{str_replace(' ', '', $productPrice->pricing->by_wholesale)}}">
                                <meta itemprop="priceCurrency" content="RUB"/>
                                <link itemprop="availability" href="https://schema.org/InStock">
                                <meta itemprop="priceValidUntil" content="{{date('Y-m-d')}}">
                                <link itemprop="url" href="{{\Illuminate\Support\Facades\URL::current()}}">
                            </td>
                        </tr>
                        </tbody>
                    </table>
        </div>
    </section>
@endif
