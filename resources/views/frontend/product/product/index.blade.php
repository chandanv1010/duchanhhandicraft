@php
    $name = $product->name;
    $canonical = write_url($product->canonical);
    $image = image($product->image);
    $price = getPrice($product);
    $catName = $productCatalogue->name;
    $review = getReview($product);
    $description = $product->description;
    $attributeCatalogue = $product->attributeCatalogue;
    $gallery = json_decode($product->album);
    $iframe = $product->iframe;
    $total_lesson = $product->total_lesson;
    $lessionContent = !is_null($product->lession_content) ? explode(',', $product->lession_content) : null;
@endphp
@extends('frontend.homepage.layout')
@section('content')
        <x-breadcrumb :breadcrumb="$breadcrumb" />
    <div class="product-container">
        <div class="cources-info">
            <div class="uk-container uk-container-center uk-container-1260">
                <div class="panel-body">
                    @include('frontend.product.product.component.detail', ['product' => $product, 'productCatalogue' => $productCatalogue])
                </div>
            </div>
        </div>
        <div class="uk-container uk-container-center">
            <div class="main-content product-main-content mt30 uk-hidden">
                <div class="uk-grid uk-grid-medium">
                    <div class="uk-width-medium-3-4">
                        <div class="tabs-content">
                            <ul data-uk-switcher="{connect:'#my-id'}" class="nab-tavs uk-grid uk-grid-collapse uk-width-small-1-2 uk-grid-width-medium-1-4">
                                <li  class="uk-active"><a href="">Product Detail</a></li>
                            </ul>

                            <ul id="my-id" class="uk-switcher">
                                <li>
                                    <div class="product-tabs-content">
                                        {!! $product->content !!}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-4">
                        @include('frontend.component.sidebar')
                    </div>
                </div>
            </div>
            <div class="uk-container uk-container-center">
                <div class="product-related mt30 mb30">
                    <div class="uk-container uk-container-center">
                        <div class="panel-product">
                            <div class="main-heading">
                                <div class="panel-head">
                                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                        <h2 class="heading-2" style="text-transform:uppercase"><span>Featured product</span></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body list-product">
                                @if(count($productCatalogue->products))
                                    <div class="product-related-wrapper uk-grid uk-grid-medium">
                                        @foreach($productCatalogue->products as $index => $product)
                                            <div class="uk-width-medium-1-4 wow fadeInDown mb30" data-wow-delay="{{ ($index + 1)  }}s">
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
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
