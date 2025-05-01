<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 style="margin: 0 auto;">Todo Details</h3>
                        <a href="{{ route('todos.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>

                    <div class="card-body">
                        <h4>"{{ $todo->title }}"</h4>
                        <p class="text-muted">
                            Status: <span class="badge {{ $todo->completed ? 'bg-success' : 'bg-warning' }} text-dark">
                                {{ $todo->completed ? 'Completed' : 'Pending' }}
                            </span>
                        </p>
                        
                        @if($todo->description)
                            <div class="card mb-3">
                                <div class="card-body">
                                    {{ $todo->description }}
                                </div>
                            </div>
                        @else
                            <p class="text-muted">No description provided.</p>
                        @endif

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('todos.edit', $todo) }}" class="btn btn-info" style="width: 80px;">Edit</a>
                            <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" style=" width: 80px;">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>