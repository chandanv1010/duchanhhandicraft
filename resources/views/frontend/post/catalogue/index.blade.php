@extends('frontend.homepage.layout')
@section('content')
    <x-breadcrumb :breadcrumb="$breadcrumb" />
    <div class="post-catalogue page">
        <div class="page-catalogue-container">
            <div class="uk-container uk-container-center mt30">
                <div class="uk-grid uk-grid-medium">
                    <div class="uk-width-large-1-4">
                        @include('frontend.component.sidebar')
                    </div>
                    <div class="uk-width-large-3-4">
                        <div class="post-catalogue-wrapper">
                        @if(isset($posts) && $posts->count() > 0)
                            @foreach($posts as $post)
                                @php
                                    $lang = $post->languages->first();
                                    $pivot = $lang ? $lang->pivot : null;

                                    $name = $pivot->name ?? '';
                                    $description = $pivot->description ?? '';
                                    $canonical = write_url($pivot->canonical ?? '');
                                    $image = $post->image ?? '/uploads/default.jpg';
                                    $created_at = $post->created_at ? $post->created_at->format('m/d/Y') : '';
                                @endphp

                                <article class="uk-grid uk-grid-collapse article-1">
                                    <div class="uk-width-small-2-5 uk-width-medium-1-3">
                                        <div class="thumb img-zoomin">
                                            <a class="cover img-cover" href="{{ $canonical }}" title="{{ $name }}">
                                                <img src="{{ $image }}" alt="{{ $name }}">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="uk-width-small-3-5 uk-width-medium-2-3">
                                        <div class="info">
                                            <h2 class="title mb10">
                                                <a class="link" href="{{ $canonical }}" title="{{ $name }}">
                                                    {{ $name }}
                                                </a>
                                            </h2>
                                            @if($created_at)
                                                <div class="time mb10">
                                                    <i class="fa fa-calendar"></i> {{ $created_at }}
                                                </div>
                                            @endif

                                            @if($description)
                                                <div class="description ec-line-3 mb10">
                                                    {!! $description !!}
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        @else
                            <p class="text-center py-4">Đang cập nhật bài viết...</p>
                        @endif
                    </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection

