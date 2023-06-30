<div id="marquee_list" class="row">
    <div class="product-image col-lg-7" itemscope itemtype="https://schema.org/ImageObject">
        <img src="{{asset('assets/images/image-by-slug/'.request()->segment(1).'.webp')}}" loading="lazy"
             itemprop="contentUrl" alt="Фото металла" title="Фото металла" class="img-thumbnail p-0">
    </div>
    <div class="col-lg-5">
        <div class="card-body p-10">
            <h2 class="text-center price-heading-text">
                Цена за 1кг лома
            </h2>
            @foreach($marquee as $actualPrice)
                <div onclick="window.location.replace('{{$actualPrice->slug->name}}')"  class="head-prices-row">
                    <span class="row-name">{{$actualPrice->title}}</span>
                    <span class="row-price">{{$actualPrice->price}}</span>
                </div>
            @endforeach
            <div onclick="window.location.replace('{{route('vivoz')}}')" class="head-prices-row">
                <span class="row-name">Вывоз лома</span>
                <span class="row-price">от 1000 кг</span>
            </div>
        </div>
    </div>
</div>
