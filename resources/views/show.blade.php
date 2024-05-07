<!-- resources/views/resources/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Resource</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Show Resource</h1>
        <div>
            <p><strong>Name:</strong> {{ $resource->name }}</p>
            <p><strong>NID:</strong> {{ $resource->nid }}</p>
            <p><strong>Age:</strong> {{ $resource->age }}</p>
            <p><strong>Address:</strong> {{ $resource->address }}</p>
            <p><strong>Gender:</strong> {{ $resource->gender }}</p>
            @if ($resource->image)
                <img src="{{ asset('images/' . $resource->image) }}" alt="Resource Image" style="max-width: 200px;">
            @else
                <p>No image available</p>
            @endif
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
