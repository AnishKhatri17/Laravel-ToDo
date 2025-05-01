<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 style="text-align: center;">Edit Todo</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('todos.update', $todo) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label" style="font-weight: bold; font-size: 18px;">Title</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" 
                                       name="title" value="{{ old('title', $todo->title) }}" required autofocus>
                                     @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div><br>

                            <div class="mb-3">
                                <label for="description" class="form-label" style="font-weight: bold; font-size: 18px;">Description</label>
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" 
                                          name="description" rows="3">{{ old('description', $todo->description) }}</textarea>
                                        @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="completed" id="completed" 
                                       {{ old('completed', $todo->completed) ? 'checked' : '' }}>
                                <label class="form-check-label" for="completed">
                                    Mark as completed
                                </label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('todos.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Todo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>