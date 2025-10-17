<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $property->title }} | {{ config('app.name') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
</head>

<body>

    {{-- Header --}}
    @livewire('header')

    <div class="clearfix"></div>
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active">{{ $property->title }}</li>
        </ol>

        <div class="detail">
            <div class="col-md-8">
                <div class="detail_header">
                    <h3>{{ $property->title }}</h3>
                    <p>
                        Location: {{ $property->location ?? 'N/A' }}
                        <span>Ref # {{ $property->reference_no ?? 'N/A' }}</span>
                    </p>
                    <h4>
                        AED {{ number_format($property->price, 0) }}
                        <a href="mailto:{{ $property->company_email ?? config('app.enquiry_email') }}?subject=Enquiry for {{ urlencode($property->title) }}" class="btn">Make Enquiry</a>
                    </h4>
                </div><!--END OF DETAIL HEADER-->

                <div class="clearfix"></div>
                <div class="slider_with_info">
                    <div class="short_detail">
                        <div class="col-md-4 col-sm-4">
                            <p>Area: {{ $property->area ?? 'N/A' }}</p>
                            <p>Property Type: {{ ucfirst($property->property_type ?? 'N/A') }}</p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <p>Bedrooms: {{ $property->bedrooms ?? 'N/A' }}</p>
                            <p>View: {{ $property->view ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <p>Bathrooms: {{ $property->bathrooms ?? 'N/A' }}</p>
                            <p>Status: {{ ucfirst($property->status ?? 'Available') }}</p>
                        </div>
                    </div><!--END OF SHORT DETAIL-->

                    <div class="clearfix"></div>

                    {{-- Property Image Slider --}}
                    <div class="product_slider">
                        <div class="advanced-slider" id="responsive-slider">
                            <ul class="slides">
                                @if (!empty($property->images))
                                    @foreach ($property->images as $image)
                                        <li class="slide">
                                            <img class="image" src="{{ asset('storage/' . $image) }}"
                                                alt="{{ $property->title }}">
                                            <img class="thumbnail" src="{{ asset('storage/' . $image) }}"
                                                alt="Thumbnail">
                                        </li>
                                    @endforeach
                                @else
                                    <li class="slide">
                                        <img class="image" src="{{ asset('images/no-image.jpg') }}" alt="No image">
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div><!--END OF PRODUCT SLIDER-->
                </div><!--END OF SLIDER WITH INFO-->

                <div class="clearfix"></div>

                <div class="more_detail">
                    {{-- Description --}}
                    <h5>{!! nl2br(e($property->description_long ?? ($property->description ?? 'No description available'))) !!}</h5>

                    {{-- Key Features --}}
                    @php
                        $features = preg_split('/[\n,]+/', $property->key_features ?? '', -1, PREG_SPLIT_NO_EMPTY);
                    @endphp
                    @if (!empty($features))
                        <h4>KEY FEATURES:</h4>
                        @foreach ($features as $feature)
                            <p>{{ trim($feature) }}</p>
                        @endforeach
                    @endif

                    {{-- Facilities & Amenities --}}
                    @if (!empty($property->amenities))
                        <div class="facility">
                            <h2>Facilities & Amenities</h2>
                            <ul>
                                @foreach ($property->amenities as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Map --}}
                    @if (!empty($sanitizedMapIframe))
                        <div class="location">
                            <h3>Property Location</h3>
                            {!! $sanitizedMapIframe !!}
                        </div>
                    @endif

                    {{-- Company Info --}}
                    <div class="company-info">
                        @if ($property->company_name)
                            <p>Company Name: {{ $property->company_name }}</p>
                        @endif
                        @if ($property->company_address)
                            <p>Address: {{ $property->company_address }}</p>
                        @endif
                        @if ($property->company_phone)
                            <p>Phone: {{ $property->company_phone }}</p>
                        @endif
                        @if ($property->company_email)
                            <p>Email: {{ $property->company_email }}</p>
                        @endif
                        @if ($property->company_website)
                            <p>Website: {{ $property->company_website }}</p>
                        @endif
                    </div>

                </div><!--END OF MORE DETAIL-->
            </div><!--END OF COL MD 8-->

            {{-- Related Properties (Optional) --}}
            {{-- Uncomment once related properties are stable --}}
            {{--
            @if (isset($relatedProperties) && $relatedProperties->count())
                <div class="col-md-3 col-md-push-1">
                    <div class="similar_property">
                        <h3>similar <span>property</span></h3>
                        @foreach ($relatedProperties as $related)
                            <div class="property_list">
                                <a href="{{ route('property.detail', $related->slug) }}">
                                    <img src="{{ asset('storage/'.($related->images[0] ?? 'default.jpg')) }}"
                                         alt="{{ $related->title }}" class="img-responsive">
                                    <div class="spec">
                                        <h4>AED {{ number_format($related->price, 0) }}</h4>
                                        <ul>
                                            <li><img src="{{ asset('images/bed2.jpg') }}"> {{ $related->bedrooms }}</li>
                                            <li><img src="{{ asset('images/bath2.jpg') }}"> {{ $related->bathrooms }}</li>
                                        </ul>
                                    </div>
                                    <p>{{ $related->title }}</p>
                                    <p><span>{{ $related->location }}</span></p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            --}}
        </div><!--END OF DETAIL-->
        <div class="clearfix"></div>
    </div><!--END OF CONTAINER-->

    {{-- Footer --}}
    @livewire('footer')

    {{-- Scripts --}}
    <script type='text/javascript' src='{{ asset('js/jquery.js') }}'></script>
    <script src="{{ asset('js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('js/jquery.touchSwipe.min.js') }}"></script>
    <script src="{{ asset('js/jquery.advancedSlider.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('select').niceSelect();
            $('#responsive-slider').advancedSlider({
                width: 940,
                height: 650,
                responsive: true,
                skin: 'glossy-square-gray',
                slideshow: true,
                pauseSlideshowOnHover: true,
                thumbnailType: 'scroller',
                thumbnailWidth: 111,
                thumbnailHeight: 80,
                thumbnailButtons: true
            });
        });
    </script>
</body>

</html>
