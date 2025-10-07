<footer id="footer">
    <div class="footer-upper">
        <div class="uk-container uk-container-center">
            <div class="name-company">
                <h3 class="heading-2 wow fadeInDown" data-wow-delay="0.3s"><span>{{ $system['homepage_company'] }}</span></h3>
            </div>
            <div class="uk-grid uk-grid-medium">
                <div class="uk-width-medium-1-2">
                    <div class="info-company wow fadeInDown" data-wow-delay="0.3s">
                        <p class="office">Office</p>
                        <p class="address">- Address: {{ $system['contact_office'] }}</p>
                        <p class="hotline">
                            - Hotline: <a href="tel:{{ $system['contact_hotline'] }}">{{ $system['contact_hotline'] }} </a>
                            - Phone: <a href="tel:{{ $system['contact_hotline'] }}"> {{ $system['contact_hotline'] }}</a>
                        </p>
                        <p class="address">- Email: <a href="mailto:{{ $system['contact_email'] }}">{{ $system['contact_email'] }}</a></p>
                        <p class="website">- Website: <a href="{{ $system['contact_website'] }}">{{ $system['contact_website'] }}</a></p>
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="uk-grid uk-grid-large">
                        <div class="uk-width-1-2">
                            <div class="uk-grid uk-grid-medium">
                                @if($menu['footer-menu'])
                                @foreach($menu['footer-menu'] as $key => $val)
                                    @php
                                        $name = $val['item']->languages->first()->pivot->name;
                                        $canonical = write_url($val['item']->languages->first()->pivot->canonical);
                                    @endphp
                                    <div class="uk-width-medium-1-1">
                                        <div class="footer-menu__item wow fadeInDown" data-wow-delay="0.3s">
                                            <h3 class="heading-2"><span>{{ $name }}</span></h3>
                                            @if($val['children'])
                                            <ul class="uk-list uk-clearfix">
                                                @foreach($val['children'] as $children)
                                                @php
                                                    $nameC = $children['item']->languages->first()->pivot->name;
                                                    $canonicalC = write_url($children['item']->languages->first()->pivot->canonical);
                                                @endphp
                                                <li>
                                                    <a href="{{ $canonicalC }}" title="{{ $nameC }}" >- {{ $nameC }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <div class="footer-menu__item wow fadeInDown" data-wow-delay="0.3s">
                                <h3 class="heading-2"><span>Social</span></h3>
                                <div class="panel-body">
                                    <div class="fb-page" data-href="{{ $system['social_facebook'] }}" data-tabs="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
                                </div><!-- .panel-body -->
                            </div>
                        </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
    <div class="copyright " >
        <div class="uk-container uk-container-center">
            <p class="wow fadeInUp" data-wow-delay="0.3s">{{ $system['homepage_copyright'] }}</p>
        </div>
    </div>
</footer>