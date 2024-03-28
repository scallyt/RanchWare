<x-layout>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Create Workspace</h2>
    </header>

    <div class="form-container">
        <form method="POST" action="/workspace/new">
            @csrf
            <div class="mb-3">
                <label for="name">Workspace Name</label>
                <input type="text" name="name" value="{{ old('name') }}" />
                @error('name')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
</x-layout>
