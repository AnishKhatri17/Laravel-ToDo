 {{-- <x-app-layout> --}}
     <!DOCTYPE html>
     <html lang="en">

     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>My Todos</title>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
         <style>
             .todo-card {
                 transition: all 0.2s ease;
                 border-left-width: 4px;
             }

             .todo-card:hover {
                 transform: translateY(-2px);
                 box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) !important;
             }

             .todo-title {
                 font-size: 1.1rem;
                 text-decoration: none;
             }

             .todo-title:hover {
                 color: #0056b3 !important;
             }

             .status-dot {
                 display: inline-block;
                 width: 10px;
                 height: 10px;
                 border-radius: 50%;
             }

             .empty-state {
                 border: 2px dashed #dee2e6;
                 transition: all 0.3s ease;
             }

             .empty-state:hover {
                 border-color: #adb5bd;
             }
         </style>

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     </head>

     <body>
         <div class="container mt-5">
             <div class="row justify-content-center">
                 <div class="col-md-8">
                     <div class="card">
                         <div class="card-header d-flex justify-content-between align-items-center">
                             <h3 style="margin: 0 auto;">My Todos</h3>
                             <a href="{{ route('todos.create') }}" class="btn btn-primary" style="width: 150px;">Create
                                 New Todo</a>
                         </div>

                         <div class="card-body">
                             @if (session('success'))
                                 <div class="alert alert-success" style="text-align:center; font-weight: bold;"
                                     role="alert">
                                     {{ session('success') }}
                                 </div>
                             @endif

                             @if ($todos->count() > 0)
                                 <div class="todo-list">
                                     @foreach ($todos as $todo)
                                         <div
                                             class="todo-card mb-3 p-3 bg-white rounded shadow-sm border-start border-{{ $todo->completed ? 'success' : 'primary' }} border-4">
                                             <div class="row align-items-center">
                                                 <div class="col-md-7">
                                                     <div class="d-flex align-items-center">
                                                         <span
                                                             class="status-dot me-2 bg-{{ $todo->completed ? 'success' : 'warning' }}"></span>
                                                         <div>
                                                             <a href="{{ route('todos.show', $todo) }}"
                                                                 class="todo-title {{ $todo->completed ? 'text-decoration-line-through text-muted' : 'text-dark' }} fw-bold">
                                                                 {{ $todo->title }}
                                                             </a>
                                                             <small class="text-muted d-block mt-1">Created:
                                                                 {{ $todo->created_at->format('M d, Y') }}</small>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-5">
                                                     <div class="d-flex justify-content-end gap-2">
                                                         <span
                                                             class="badge bg-{{ $todo->completed ? 'success' : 'warning' }} text-white py-2 d-flex align-items-center">
                                                             {{ $todo->completed ? 'Completed' : 'Pending' }}
                                                         </span>
                                                         <a href="{{ route('todos.edit', $todo) }}"
                                                             class="btn btn-sm btn-outline-primary">
                                                             <i class="fas fa-edit me-1"></i> Edit
                                                         </a>
                                                         <form action="{{ route('todos.destroy', $todo) }}"
                                                             method="POST" class="d-inline">
                                                             @csrf
                                                             @method('DELETE')
                                                             <button type="submit"
                                                                 class="btn btn-sm btn-outline-danger"
                                                                 onclick="return confirm('Are you sure you want to delete this todo?')">
                                                                 <i class="fas fa-trash me-1"></i> Delete
                                                             </button>
                                                         </form>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     @endforeach
                                 </div>
                             @else
                                 <div class="empty-state text-center p-5 bg-light rounded">
                                     <div class="mb-3">
                                         <i class="fas fa-clipboard-list fa-3x text-muted"></i>
                                     </div>
                                     <h5>No todos yet!</h5>
                                     <p class="text-muted">Create your first todo to get started.</p>
                                     <a href="{{ route('todos.create') }}" class="btn btn-primary">
                                         <i class="fas fa-plus me-1"></i> Create Todo
                                     </a>
                                 </div>
                             @endif




                             <div class="col-md-8 mt-3">
                                 <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
                             </div>
                         </div>
                     </div>

                     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     </body>

     </html>
 {{-- </x-app-layout> --}}
