<section class="background-grey p-b-20 p-t-20">
    <div class="container">
            <div class="col-12 p-0 m-auto mb-3 p-3">
                <h2 class="fs-18 h-min-content text-center m-0">
                    @if(!empty($categoriesPrices->first()->category))
                        Цена на {{\Illuminate\Support\Str::lower($categoriesPrices->first()->category->title)}} на
                        сегодня
                    @else
                        Цена на {{\Illuminate\Support\Str::lower($categoriesPrices->first()->market->title)}} на сегодня
                    @endif
                </h2>
            </div>
            <table class="table table-bordered prices-table">
                <thead>
                <tr>
                    @if($categoriesPrices->first()->pricing->weight == 'kilogram')
                        <th class="text-center base-border-color table-item m-auto align-middle h-min-content">
                            Категория
                            металла
                        </th>
                        <th class="text-center base-border-color table-item m-auto align-middle h-min-content">
                            <span itemprop="weight">до 100 кг.</span>
                        </th>
                        <th class="text-center base-border-color table-item m-auto align-middle h-min-content">
                            <span itemprop="weight">100 до 500 кг.</span>
                        </th>
                        <th class="text-center base-border-color table-item m-auto align-middle h-min-content">
                            <span itemprop="weight">500 - 1000 кг.</span>
                        </th>
                        <th class="text-center base-border-color table-item m-auto align-middle h-min-content">
                            <span itemprop="weight">Цена за 1 кг</span>
                        </th>
                    @else
                        <th scope="col"
                            class="text-center base-border-color table-item m-auto align-middle h-min-content">
                            Категория <br> металла
                        </th>
                        <th scope="col"
                            class="text-center base-border-color table-item m-auto align-middle h-min-content">
                            От 1т.
                        </th>
                        <th scope="col"
                            class="text-center base-border-color table-item m-auto align-middle h-min-content">
                            От 10 до 50т.
                        </th>
                        <th scope="col"
                            class="text-center base-border-color table-item m-auto align-middle h-min-content">
                            От 50 до 100т.
                        </th>
                        <th scope="col"
                            class="text-center base-border-color table-item m-auto align-middle h-min-content">
                            Цена за 1т.
                        </th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($categoriesPrices as $categoryPrice)
                    <tr itemprop="offers" itemscope="" itemtype="https://schema.org/Offer">
                        <td scope="row"
                            class="text-center base-border-color table-item m-auto align-middle h-min-content">
                            {{$categoryPrice->title}}
                        </td>
                        <td scope="row"
                            class="text-center base-border-color table-item m-auto align-middle h-min-content">
                            <span>{{str_replace(' ', '', $categoryPrice->pricing->price_below)}}</span> руб.
                            <meta itemprop="price"
                                  content="{{str_replace(' ', '', $categoryPrice->pricing->price_below)}}">
                            <meta itemprop="priceCurrency" content="RUB"/>
                            <link itemprop="availability" href="https://schema.org/InStock">
                            <meta itemprop="priceValidUntil" content="{{date('Y-m-d')}}">
                            <link itemprop="url" href="{{\Illuminate\Support\Facades\URL::current()}}">
                        </td>
                        <td scope="row"
                            class="text-center base-border-color table-item m-auto align-middle h-min-content">
                            <span>{{str_replace(' ', '', $categoryPrice->pricing->price_from_to)}}</span> руб.
                            <meta itemprop="price"
                                  content="{{str_replace(' ', '', $categoryPrice->pricing->price_from_to)}}">
                            <meta itemprop="priceCurrency" content="RUB"/>
                            <link itemprop="availability" href="https://schema.org/InStock">
                            <meta itemprop="priceValidUntil" content="{{date('Y-m-d')}}">
                            <link itemprop="url" href="{{\Illuminate\Support\Facades\URL::current()}}">
                        </td>
                        <td scope="row"
                            class="text-center base-border-color table-item m-auto align-middle h-min-content">
                            <span>{{str_replace(' ', '', $categoryPrice->pricing->price_above_from_to)}}</span> руб.
                            <meta itemprop="price"
                                  content="{{str_replace(' ', '', $categoryPrice->pricing->price_above_from_to)}}">
                            <meta itemprop="priceCurrency" content="RUB"/>
                            <link itemprop="availability" href="https://schema.org/InStock">
                            <meta itemprop="priceValidUntil" content="{{date('Y-m-d')}}">
                            <link itemprop="url" href="{{\Illuminate\Support\Facades\URL::current()}}">
                        </td>
                        <td scope="row"
                            class="text-center base-border-color table-item m-auto align-middle h-min-content">
                            <span>{{str_replace(' ', '', $categoryPrice->pricing->by_wholesale)}}</span> руб.
                            <meta itemprop="price"
                                  content="{{str_replace(' ', '', $categoryPrice->pricing->by_wholesale)}}">
                            <meta itemprop="priceCurrency" content="RUB"/>
                            <link itemprop="availability" href="https://schema.org/InStock">
                            <meta itemprop="priceValidUntil" content="{{date('Y-m-d')}}">
                            <link itemprop="url" href="{{\Illuminate\Support\Facades\URL::current()}}">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</section>
