<x-layout>
    <header>
        <link rel="stylesheet" href="{{ asset('workspacecard.css') }}">
    </header>

    <body>
        <nav class="side-navbar">
            <div class="container-fluid">
                <h2 class="mb-5"></h2>
                <div class="join-container">
                    <form method="POST" action="workspace/join">
                        @csrf
                        <label for="code" name="code">Join Ranch</label>
                        <input type="text" name="code" class="nav-link active" aria-current="page"
                            placeholder="5Xy98"></input>
                        <button type="submit" class="btn btn-success">Join</button>
                    </form>
                </div>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Another Link</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main>
            @foreach ($workspaces as $workspace)
                <div
                    class="workspace-card @if ($workspace->ownerId == Auth::id()) workspace-owned @else workspace-joined @endif">
                    <a href="workspaces/view/{{ $workspace->code }}">
                        <h1>Workspace Name: {{ $workspace->name }}</h1>
                        @if ($workspace->ownerId != Auth::id())
                            <p>Owner Name: {{ $workspace->ownerName }}</p>
                            <p>Joine at: 2024/03/23</p>
                        @else
                            <p>Code: {{ $workspace->code }}</p>
                            <p>Owner: You are the owner</p>
                            <p>Created At: {{ $workspace->created_at }}</p>
                            <p>Updated At: {{ $workspace->updated_at }}</p>
                        @endif
                    </a>
                </div>
            @endforeach
        </main>
        <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
            <p class="ml-2">Copyright &copy; 2024, All Rights reserved</p>
        </footer>
    </body>
</x-layout>
