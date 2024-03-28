<x-layout>
    <body>
        <h1>Name: {{ $user->FirstName }} {{ $user->LastName }}</h1>
        <p>Email: {{ $user->email }}</p>
        <p>Created At: {{ $user->created_at}}</p>
        <p>Owned Workspaces: {{$user->ownedWorkspaces}}</p>
        <p>ID: {{$user->id}}</p>
    </body>
</x-layout>
