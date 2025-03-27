<x-layout>
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-[#4A3A3A] p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-semibold text-center mb-4">Kayıt Ol</h2>

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="firstname" class="block text-sm font-medium">Ad</label>
                    <input type="text" id="firstname" name="firstname" required
                        class="w-full p-3 rounded-lg bg-gray-100 text-black focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="lastname" class="block text-sm font-medium">Soyad</label>
                    <input type="text" id="lastname" name="lastname" required
                        class="w-full p-3 rounded-lg bg-gray-100 text-black focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium">E-Posta</label>
                    <input type="email" id="email" name="email" required
                        class="w-full p-3 rounded-lg bg-gray-100 text-black focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium">Şifre</label>
                    <input type="password" id="password" name="password" required
                        class="w-full p-3 rounded-lg bg-gray-100 text-black focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium">Şifre Tekrar</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full p-3 rounded-lg bg-gray-100 text-black focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full p-3 bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                    Kayıt Ol
                </button>
            </form>

            <p class="text-sm text-center mt-4">
                Zaten bir hesabın var mı? <a href="{{ route('login') }}" class="text-blue-400">Giriş Yap</a>
            </p>
        </div>
    </div>
</x-layout>
