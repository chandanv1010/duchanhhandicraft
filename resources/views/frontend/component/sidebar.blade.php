<aside class="sidebar uk-height-1-1">
    <div data-uk-sticky="{boundary: true}">
        @if(!is_null($widgets['product-category']))
        @foreach($widgets['product-category']->object as $cat)
        <div class="aside-category mb30">
            <div class="aside-heading">{{ $cat->languages->name }}</div>
            @if(!is_null($cat->childrens))
            <div class="aside-body">
                <ul class="uk-list uk-clearfix">
                    @foreach($cat->childrens as $children)
                    @php
                        $name = $children->languages->name;
                        $canonical = $children->languages->canonical;
                    @endphp
                    <li>
                        <a href="{{ write_url($canonical) }}" title="{{ $name }}">{{ $name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        @endforeach
        @endif

        {{-- <div class="aside-map">
            {!! $system['contact_map'] !!}
        </div> --}}
    </div>

</aside>