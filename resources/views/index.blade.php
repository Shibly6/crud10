<!-- resources/views/resources/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resource Index</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Resources</h1>
        <a href="{{ route('resources.create') }}" class="btn btn-primary mb-3">Add New Resource</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>NID</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resources as $resource)
                        <tr>
                            <td>{{ $resource->id }}</td>
                            <td>{{ $resource->name }}</td>
                            <td>{{ $resource->nid }}</td>
                            <td>{{ $resource->age }}</td>
                            <td>{{ $resource->address }}</td>
                            <td>{{ $resource->gender }}</td>
                            <td>
                                <a href="{{ route('resources.show', $resource->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('resources.edit', $resource->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('resources.destroy', $resource->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
