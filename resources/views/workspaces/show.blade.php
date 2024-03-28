<x-layout>

    <head>
        <link rel="stylesheet" href="{{ asset('mo.css') }}">
    </head>

    <body>
        <nav class="side-navbar">
            <ul class="navbar-nav">
                <li class="withborder">
                    <label for="code">Code: {{ $workspace_code }}</label>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Animals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sales/Chart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Another Link</a>
                </li>
            </ul>
            </div>
        </nav>
    </body>
</x-layout>
