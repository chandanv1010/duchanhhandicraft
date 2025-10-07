
@extends('frontend.homepage.layout')
@section('content')

<x-breadcrumb :breadcrumb="$breadcrumb" />
<div class="post-detail">
    <div class="uk-container-center uk-container">
        <div class="uk-grid uk-grid-medium">
            <div class="uk-width-large-1-4">
                @include('frontend.component.sidebar')
            </div>
            <div class="uk-width-large-3-4">
                <div>
                    
                    <div class="post-container">
                        @if($post->post_type === 'normal')
                            <h1 class="post-heading">{{ $post->name }}</h1>
                            <div class="description">
                                {!! $post->description !!}
                            </div>
                        @endif
                        
                        <div class="content">
                            <x-table-of-contents :content="$contentWithToc" />
                            {!! $contentWithToc !!}
                        </div>
                        @if(!is_null($asidePost) && $post->post_type === 'post')
                        <div class="related-posts">
                            <h2 class="heading-9 mb40"><span>Bài viết liên quan</span></h2>
                            <div class="uk-grid uk-grid-medium">
                                @foreach($asidePost as $item)
                                @php
                                    $name = $item->languages->first()->pivot->name;
                                    $canonical = write_url($item->languages->first()->pivot->canonical);
                                    $image = $item->image;
                                    $createdAt = $item->created_at;
                                @endphp
                                <div class="uk-width-small-1-1 uk-width-medium-1-2 mb20">
                                    <div class="post-item related-item">
                                        <a href="{{ $canonical }}" class="image img-cover"><img src="{{ $image }}" alt="{{ $name }}"></a>
                                        <div class="info">
                                            <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                                            <div class="created_at">{{ $createdAt }}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
