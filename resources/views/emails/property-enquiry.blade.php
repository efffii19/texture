<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Enquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            border-bottom: 3px solid #007bff;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #007bff;
            margin: 0;
            font-size: 24px;
        }
        .property-section {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 4px solid #007bff;
        }
        .property-section h3 {
            color: #007bff;
            margin-top: 0;
        }
        .property-detail {
            margin: 10px 0;
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }
        .property-detail:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: bold;
            color: #555;
            display: inline-block;
            width: 140px;
        }
        .value {
            color: #333;
        }
        .enquirer-section {
            background-color: #f0f8ff;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 4px solid #28a745;
        }
        .enquirer-section h3 {
            color: #28a745;
            margin-top: 0;
        }
        .message-section {
            background-color: #fff9e6;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 4px solid #ffc107;
        }
        .message-section h3 {
            color: #ffc107;
            margin-top: 0;
        }
        .message-text {
            white-space: pre-wrap;
            word-wrap: break-word;
            color: #333;
            line-height: 1.5;
        }
        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Property Enquiry</h1>
        </div>

        <div class="property-section">
            <h3>Property Details</h3>
            <div class="property-detail">
                <span class="label">Property:</span>
                <span class="value">{{ $enquiry->property->title }}</span>
            </div>
            <div class="property-detail">
                <span class="label">Reference:</span>
                <span class="value">{{ $enquiry->property->reference_no ?? 'N/A' }}</span>
            </div>
            <div class="property-detail">
                <span class="label">Location:</span>
                <span class="value">{{ $enquiry->property->location ?? 'N/A' }}</span>
            </div>
            <div class="property-detail">
                <span class="label">Price:</span>
                <span class="value">AED {{ number_format($enquiry->property->price, 0) }}</span>
            </div>
            <div class="property-detail">
                <span class="label">Type:</span>
                <span class="value">{{ ucfirst($enquiry->property->property_type ?? 'N/A') }}</span>
            </div>
            <div class="property-detail">
                <span class="label">Bedrooms:</span>
                <span class="value">{{ $enquiry->property->bedrooms ?? 'N/A' }}</span>
            </div>
            <div class="property-detail">
                <span class="label">Bathrooms:</span>
                <span class="value">{{ $enquiry->property->bathrooms ?? 'N/A' }}</span>
            </div>
        </div>

        <div class="enquirer-section">
            <h3>Enquirer Information</h3>
            <div class="property-detail">
                <span class="label">Name:</span>
                <span class="value">{{ $enquiry->name }}</span>
            </div>
            <div class="property-detail">
                <span class="label">Email:</span>
                <span class="value"><a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a></span>
            </div>
            @if ($enquiry->phone)
                <div class="property-detail">
                    <span class="label">Phone:</span>
                    <span class="value">{{ $enquiry->phone }}</span>
                </div>
            @endif
        </div>

        @if ($enquiry->message)
            <div class="message-section">
                <h3>Enquiry Message</h3>
                <div class="message-text">{{ $enquiry->message }}</div>
            </div>
        @endif

        <div class="footer">
            <p>This is an automated email from Texture Property. Please do not reply to this email.</p>
            <p>Enquiry ID: {{ $enquiry->id }} | Date: {{ $enquiry->created_at->format('M d, Y H:i') }}</p>
        </div>
    </div>
</body>
</html>
