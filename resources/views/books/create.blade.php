<x-layout>
    <div class="flex flex-col items-center justify-center min-h-screen p-6">
        <div class="bg-[#2A1F1F] text-white p-6 rounded-lg shadow-lg w-full max-w-2xl">
            <h2 class="text-2xl font-bold text-center mb-4">📚 Yeni Kitap Ekle</h2>

            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Kitap Adı -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-semibold">Kitap Adı:</label>
                    <input type="text" id="title" name="name" required 
                        class="w-full px-4 py-2 mt-2 text-black rounded-lg border border-gray-300 focus:ring focus:ring-blue-400">
                        <x-error-input name="name"/>
                </div>

                <!-- Yazar Adı -->
                <div class="mb-4">
                    <label for="author" class="block text-sm font-semibold">Yazar:</label>
                    <input type="text" id="author" name="author" required
                        class="w-full px-4 py-2 mt-2 text-black rounded-lg border border-gray-300 focus:ring focus:ring-blue-400">
                        <x-error-input name="author"/>
                </div>

                <!-- Kitap Kapak Fotoğrafı -->
                <div class="mb-4">
                    <label for="cover" class="block text-sm font-semibold">Kitap Kapağı:</label>
                    <input type="file" id="cover" name="image" accept="image/*" required
                        class="w-full px-4 py-2 mt-2 text-white bg-gray-700 rounded-lg cursor-pointer border border-gray-500 focus:ring focus:ring-blue-400">
                        <x-error-input name="image"/>
                </div>

                <!-- Kitap Ana Fikri -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-semibold">Ana Fikir:</label>
                    <textarea id="description" name="content" rows="5" required
                        class="w-full px-4 py-2 mt-2 text-black rounded-lg border border-gray-300 focus:ring focus:ring-blue-400"></textarea>
                        <x-error-input name="content"/>
                </div>

                <!-- Kaydet Butonu -->
                <div class="flex justify-center">
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                        📥 Kitabı Kaydet
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
