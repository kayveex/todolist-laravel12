<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid col-md-7">
        <div class="navbar-brand">
            <a href="{{ route('todos') }}" class="text-decoration-none text-white">TakingNotes</a>
        </div>
        <div class="navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @ {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                        <li>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="/user/update">Update Data</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- 02. Logout Form --}}
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>