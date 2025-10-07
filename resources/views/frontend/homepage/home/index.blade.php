@extends('frontend.homepage.layout')
@section('content')
    @include('frontend.component.slide')

    <div class="uk-container uk-container-center mt30 mb30">
        <div class="uk-grid uk-grid-medium">
            <div class="uk-width-large-1-4">
                @include('frontend.component.sidebar')
            </div>
            <div class="uk-width-large-3-4">
                <div class="home-container">
                    @if(isset($widgets['featured-products']) && !is_null($widgets['featured-products']))
                        <div class="panel-bs-courses">
                            <div class="uk-container uk-container-center">
                                <div class="panel-head">
                                    @php
                                        $description_wg = $widgets['featured-products']->description[1];
                                        $name_wg = $widgets['featured-products']->name;
                                    @endphp
                                    <div class="bagde wow fadeInDown" data-wow-delay="1">
                                        {!! $description_wg !!}
                                    </div>
                                    <h3 class="heading-2 wow fadeIn" data-wow-delay="1.2"><span>{{ $name_wg }}</span></h3>
                                </div>
                                @if(count($widgets['featured-products']->object))
                                    @php
                                        $time = 0.3;
                                    @endphp
                                    <div class="panel-body">
                                        <div class="uk-grid uk-grid-medium">
                                            @foreach($widgets['featured-products']->object as $key => $val)
                                                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-4 wow fadeInDown mb30" data-wow-delay="{{ $time * ($key + 1)  }}s">
                                                    @include('frontend.component.product-feature', ['product' => $val])
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if(isset($widgets['product-category-highlight']) && !is_null($widgets['product-category-highlight']))
                    @foreach($widgets['product-category-highlight']->object as $cat)
                        @php
                            $name = $cat->languages->name;
                            $description = $cat->languages->description;
                            $canonical = write_url($cat->languages->canonical);
                        @endphp
                        <div class="panel-bs-courses">
                            <div class="uk-container uk-container-center">
                                <div class="panel-head mb40">
                                    <h3 class="heading-2 wow fadeIn" data-wow-delay="1.2"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                                    <div class="description">{!! $description !!}</div>
                                </div>
                                @if(count($cat->products))
                                    @php
                                        $time = 0.3;
                                    @endphp
                                    <div class="panel-body">
                                        <div class="uk-grid uk-grid-medium">
                                            @foreach($cat->products as $key => $product)
                                                @if($key > 11) @break @endif
                                                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-4 wow fadeInDown mb30" data-wow-delay="{{ $time * ($key + 1)  }}s">
                                                    @php
                                                        $name = $product->languages[0]->name;
                                                        $canonical = write_url($product->languages[0]->canonical);
                                                        $image = $product->image;
                                                    @endphp
                                                    <div class="product-item">
                                                        <a href="{{ $canonical }}" title="{{ $name }}" class="image img-scaledown img-zoomin">
                                                            <img  src="{{ $image }}" alt="{{ $name }}">
                                                        </a>
                                                        <div class="info">
                                                            <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>

                
                <section class="home-general">				
                    <section class="uk-panel home-introduction mb25">
                        <header class="panel-head"><div class="heading">Introduce</div></header>
                        <div class="panel-body">
                            <article class="article">
                                <div class="uk-grid uk-grid-collapse mb15">
                                    <div class="uk-width-small-1-2 uk-width-medium-1-1 uk-width-large-2-3">
                                        <div class="thumb img-flash"><a class="img-cover" href="{{ write_url('about-us') }}" title="Introduce"><img src="/uploads/.thumbs/images/bai-viet/post-1.png" alt="Introduce"></a></div>
                                    </div>
                                    <div class="uk-width-small-1-2 uk-width-medium-1-1 uk-width-large-1-3">
                                        <h3 class="title uk-text-center"><a href="{{ write_url('about-us') }}" title="Introduce">Duc hanh Handicraft</a></h3>
                                    </div>
                                </div>
                                <div class="description">
                                    Established in 2007,&nbsp;Duchanh Handicraft Co. Ltd has been proved itself to be a leading company in producing and exporting handicraft products in Vietnam. 								</div>
                            </article><!-- .article -->
                        </div><!-- .panel-body -->
                    </section><!-- .home-introduction -->
                </section>

            </div>
        </div>
        


    </div>

@endsection
