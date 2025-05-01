<div class="sidebar">
    <h2 class="sidebar-title">My Dashboard</h2>
    
    <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        Dashboard
    </a>
    
    <a href="{{ route('todos.index') }}" class="sidebar-link {{ request()->routeIs('todos.index') ? 'active' : '' }}">
        View My Todos
    </a>
    
    <a href="{{ route('todos.create') }}" class="sidebar-link {{ request()->routeIs('todos.create') ? 'active' : '' }}">
        Create New Todo
    </a>
    <a href="{{ route('todos.edit', 1) }}" class="sidebar-link {{ request()->routeIs('todos.edit') ? 'active' : '' }}">
        Edit Todo
    </a>
    
    <!-- Add more sidebar links as needed -->
</div>