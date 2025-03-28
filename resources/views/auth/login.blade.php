<x-layout>
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-[#4A3A3A] p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-semibold text-center mb-4">Giriş Yap</h2>

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="firstname" class="block text-sm font-medium">Ad</label>
                    <input type="text" id="firstname" name="firstname" required
                        class="w-full p-3 rounded-lg bg-gray-100 text-black focus:ring-2 focus:ring-blue-500" value="{{old('firstname')}}">
                        <x-error-input name="firstname"/>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium">E-Posta</label>
                    <input type="email" id="email" name="email" required
                        class="w-full p-3 rounded-lg bg-gray-100 text-black focus:ring-2 focus:ring-blue-500" value="{{old('email')}}">
                        <x-error-input name="email"/>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium">Şifre</label>
                    <input type="password" id="password" name="password" required
                        class="w-full p-3 rounded-lg bg-gray-100 text-black focus:ring-2 focus:ring-blue-500">
                        <x-error-input name="password"/>
                </div>


                <button type="submit" class="w-full p-3 bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                    Giriş Yap
                </button>
            </form>

            <p class="text-sm text-center mt-4">
                Hesabın yok mu? <a href="{{ route('register') }}" class="text-blue-400">Kayıt Ol</a>
            </p>
        </div>
    </div>
</x-layout>
