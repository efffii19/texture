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

@php
    use Illuminate\Support\Str;
@endphp

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
                        <button type="button" class="btn" data-toggle="modal" data-target="#enquiryModal">Make Enquiry</button>
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

            {{-- Recommended Properties Sidebar --}}
            @if (isset($recommendedProperties) && $recommendedProperties->count() > 0)
                <div class="col-md-3 col-md-push-1">
                    <div class="similar_property">
                        <h3>Recommended <span>Properties</span></h3>
                        @foreach ($recommendedProperties as $recommended)
                            <div class="property_list">
                                <a href="{{ route('property.detail', $recommended->slug) }}">
                                    <img src="{{ $recommended->first_image_url }}" alt="{{ $recommended->title }}" class="img-responsive">
                                    <div class="spec">
                                        <h4>AED {{ number_format($recommended->price, 0) }}</h4>
                                        <ul>
                                            <li><img src="{{ asset('images/bed2.jpg') }}" alt="bed"> {{ $recommended->bedrooms ?? 'N/A' }}</li>
                                            <li><img src="{{ asset('images/bath2.jpg') }}" alt="bath"> {{ $recommended->bathrooms ?? 'N/A' }}</li>
                                        </ul>
                                    </div>
                                    <p>{{ Str::limit($recommended->title, 40) }}</p>
                                    <p><span>{{ $recommended->location ?? 'N/A' }}</span></p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div><!--END OF DETAIL-->
        <div class="clearfix"></div>
    </div><!--END OF CONTAINER-->

    {{-- Footer --}}
    @livewire('footer')

    {{-- Enquiry Modal --}}
    <div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enquiryModalLabel">Enquire About: {{ $property->title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="property-summary mb-4 p-3 bg-light rounded">
                        <h6 class="text-primary">Property Details</h6>
                        <p><strong>Reference:</strong> {{ $property->reference_no ?? 'N/A' }}</p>
                        <p><strong>Location:</strong> {{ $property->location ?? 'N/A' }}</p>
                        <p><strong>Price:</strong> AED {{ number_format($property->price, 0) }}</p>
                        <p><strong>Type:</strong> {{ ucfirst($property->property_type ?? 'N/A') }}</p>
                        <p><strong>Bedrooms:</strong> {{ $property->bedrooms ?? 'N/A' }}, <strong>Bathrooms:</strong> {{ $property->bathrooms ?? 'N/A' }}</p>
                    </div>
                    
                    <form id="enquiryForm">
                        <div class="form-group">
                            <label for="enquirerName">Your Name *</label>
                            <input type="text" class="form-control" id="enquirerName" required>
                        </div>
                        <div class="form-group">
                            <label for="enquirerEmail">Your Email *</label>
                            <input type="email" class="form-control" id="enquirerEmail" required>
                        </div>
                        <div class="form-group">
                            <label for="enquirerPhone">Your Phone</label>
                            <input type="tel" class="form-control" id="enquirerPhone">
                        </div>
                        <div class="form-group">
                            <label for="enquiryMessage">Message</label>
                            <textarea class="form-control" id="enquiryMessage" rows="4" placeholder="Please enter your enquiry or questions about this property...">Hi, I am interested in this property (Ref: {{ $property->reference_no ?? 'N/A' }}) and would like more information. Please contact me at your earliest convenience.</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="sendEnquiry()">Send Enquiry</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script type='text/javascript' src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
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

        function sendEnquiry() {
            // Get form values
            const name = document.getElementById('enquirerName').value.trim();
            const email = document.getElementById('enquirerEmail').value.trim();
            const phone = document.getElementById('enquirerPhone').value.trim();
            const message = document.getElementById('enquiryMessage').value.trim();

            // Validate required fields
            if (!name || !email) {
                alert('Please fill in your name and email address.');
                return;
            }

            // Get property details
            const propertyTitle = '{{ $property->title }}';
            const propertyRef = '{{ $property->reference_no ?? "N/A" }}';
            const propertyLocation = '{{ $property->location ?? "N/A" }}';
            const propertyPrice = '{{ number_format($property->price, 0) }}';
            const propertyBeds = '{{ $property->bedrooms ?? "N/A" }}';
            const propertyBaths = '{{ $property->bathrooms ?? "N/A" }}';
            const propertyType = '{{ ucfirst($property->property_type ?? "N/A") }}';
            const companyEmail = '{{ $property->company_email ?? config("app.enquiry_email") }}';

            // Create formatted email subject
            const subject = encodeURIComponent(`Enquiry for Property: ${propertyTitle} (Ref: ${propertyRef})`);
            
            // Create formatted email body
            let bodyText = `Dear Property Team,\n\n`;
            bodyText += `I am interested in the following property:\n\n`;
            bodyText += `Property Title: ${propertyTitle}\n`;
            bodyText += `Reference Number: ${propertyRef}\n`;
            bodyText += `Location: ${propertyLocation}\n`;
            bodyText += `Price: AED ${propertyPrice}\n`;
            bodyText += `Type: ${propertyType}\n`;
            bodyText += `Bedrooms: ${propertyBeds}\n`;
            bodyText += `Bathrooms: ${propertyBaths}\n\n`;
            bodyText += `My Details:\n`;
            bodyText += `Name: ${name}\n`;
            bodyText += `Email: ${email}\n`;
            if (phone) bodyText += `Phone: ${phone}\n`;
            bodyText += `\nEnquiry Message:\n${message}\n\n`;
            bodyText += `Please contact me with more information about this property.\n\n`;
            bodyText += `Best regards,\n${name}`;

            // Encode body properly
            const body = encodeURIComponent(bodyText);

            // Create and open Gmail compose link
            const gmailLink = `https://mail.google.com/mail/?view=cm&fs=1&to=${encodeURIComponent(companyEmail)}&su=${subject}&body=${body}`;
            window.open(gmailLink, '_blank');

            // Reset form and close modal
            document.getElementById('enquiryForm').reset();
            $('#enquiryModal').modal('hide');
        }
    </script>
</body>

</html>
