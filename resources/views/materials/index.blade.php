<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Course List</h2>
        <a href="{{ route('materials.create') }}" id="addModule" class="btn btn-secondary mb-3">Add</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>brand</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->department }}</td>
                    <td>{{ $course->designation }}</td>
                    <td>{{ $course->brand }}</td>
                    <td>#</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No course found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
