<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
        <div class="w-full max-w-md p-8 bg-white rounded shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Welcome Back</h2>

            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                    <input id="email" name="email" type="email" required autofocus
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}" />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input id="password" name="password" type="password" required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('password') border-red-500 @enderror" />
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="mb-6 flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="mr-2 rounded">
                    <label for="remember_me" class="text-gray-700 text-sm">Remember me</label>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-md transition duration-200">
                    Log In
                </button>
            </form>

            <p class="mt-4 text-center text-gray-600 text-sm">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-700 font-semibold">
                    Register here
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
