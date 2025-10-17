<div class="col-lg-9">
    <div class="main_list">
        <h3>latest property listed</h3>
        <div class="row">
            @foreach ($latestProperties as $prop)
                <div class="col-lg-3 col-md-4">
                    <div class="property_list">
                        <a href="{{ route('property.detail', $prop->slug) }}">
                            <img src="{{ $prop->first_image_url }}" alt="{{ $prop->title }}"
                                class="img-responsive" />
                            <div class="spec">
                                <h4>AED {{ number_format($prop->price ?? 0, 0) }}</h4>
                                <ul>
                                    <li><img src="images/bed2.jpg" /> {{ $prop->bedrooms ?? '-' }}</li>
                                    <li><img src="images/bath2.jpg" /> {{ $prop->bathrooms ?? '-' }}</li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            <p>{{ Str::limit($prop->description ?? 'No description', 80) }}</p>
                            <p><span>{{ $prop->location ?? '-' }}</span></p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div><!--END OF ROW-->
    </div><!--END OF MAIN LIST-->
</div><!--END OF COL LG 8-->
