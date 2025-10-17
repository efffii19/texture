<div class="col-lg-6">
    <div class="feature">
        <h3>featured properties for rent</h3>
        <ul id="flexiselDemo2">
            @foreach ($featuredForRent as $prop)
                <li>
                    <div class="team-grid">
                        <a href="{{ route('property.detail', $prop->slug) }}">
                            <img src="{{ $prop->first_image_url }}" alt="{{ $prop->title }}" />
                            <div class="spec">
                                <h4>AED {{ number_format($prop->price ?? 0, 0) }}</h4>
                                <ul>
                                    <li><img src="images/bed.png" /> {{ $prop->bedrooms ?? '-' }}</li>
                                    <li><img src="images/bath.png" /> {{ $prop->bathrooms ?? '-' }}</li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            <p>{{ Str::limit($prop->description ?? 'No description', 80) }}</p>
                            <p><span>{{ $prop->location ?? '-' }}</span></p>
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>


    </div><!--END OF FEATURE-->
</div><!--END OF COL LG 6-->
