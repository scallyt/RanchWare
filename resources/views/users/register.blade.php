<x-layout>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Register</h2>
    </header>

    <div class="form-container">
        <form method="POST" action="/users">
            @csrf
            <div class="mb-3">
                <label for="FirstName">First Name</label>
                <input type="text" name="FirstName" value="{{ old('FirstName') }}" />
                @error('FirstName')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="LastName">Last Name</label>
                <input type="text" name="LastName" value="{{ old('LastName') }}" />
                @error('LastName')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
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
            <p>Already have an account? <a href="/login" class="login-link">Login</a></p>
        </div>
    </div>
</x-layout>