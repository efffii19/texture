<!DOCTYPE html>
<html>
<head>
    <title>Property Enquiry</title>
</head>
<body>
    <h1>New Property Enquiry</h1>
    <p><strong>Property:</strong> {{ $enquiry->property->title }}</p>
    <p><strong>Name:</strong> {{ $enquiry->name }}</p>
    <p><strong>Email:</strong> {{ $enquiry->email }}</p>
    <p><strong>Phone:</strong> {{ $enquiry->phone }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $enquiry->message }}</p>
</body>
</html>
