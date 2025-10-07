@extends('frontend.homepage.layout')
@section('content')
    <x-breadcrumb :breadcrumb="$breadcrumb" />
    <div class="product-catalogue page-wrapper">
        <div class="uk-container uk-container-center mt30">
            <div class="panel-body mb30">
                <div class="uk-container uk-container-center">
                    <div class="uk-grid uk-grid-medium">
                        <div class="uk-width-medium-1-4">
                            @include('frontend.component.sidebar')
                        </div>
                        <div class="uk-width-medium-3-4">
                            <h1 class="heading-2 mb10"><span>{{ $productCatalogue->name }}</span></h1>
                            <div class="description mb50">
                                {!! $productCatalogue->description !!}
                            </div>
                            @if (!is_null($products))
                                <div class="product-catalogue product-list">
                                    <div class="uk-grid uk-grid-medium">
                                        @foreach ($products as $key => $product)
                                            <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-4 wow fadeInDown mb30" data-wow-delay="{{ ($key + 1)  }}s">
                                                @php
                                                    $name = $product->languages->first()->pivot->name;
                                                    $canonical = write_url($product->languages->first()->pivot->canonical);
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
                                    <div class="uk-flex uk-flex-center">
                                        @include('frontend.component.pagination', ['model' => $products])
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="description dc">
                {!! $productCatalogue->content !!}
            </div>
        </div>
    </div>
@endsection
