<x-layout>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Login</h2>
    </header>

    <div class="form-container">
        <form method="POST" action="/users/authenticate">
            @csrf
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" />
                @error('email')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" value="{{ old('password') }}" />
                @error('password')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit">Sign Up</button>
            </div>
        </form>

        <div class="mt-3">
            <p>Don't have an account? <a href="/register" class="login-link">Register</a></p>
        </div>
    </div>
</x-layout>