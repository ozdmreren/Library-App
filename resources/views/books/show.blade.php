<x-layout>
    <div class="flex flex-col min-h-screen">
        <!-- İçerik Alanı -->
        <div class="flex-grow flex flex-col justify-center items-center text-white text-center p-6">
            <div class="max-w-2xl bg-[#2A1F1F] p-6 rounded-lg shadow-lg">
                <!-- Kitap Kapak Resmi -->
                <img src="https://picsum.photos/250/350" alt="Kitap Kapağı" class="rounded-lg mx-auto shadow-lg">

                <!-- Kitap Bilgileri -->
                <h2 class="text-2xl font-bold mt-4">{{$book->name}}</h2>
                <p class="text-gray-400 text-sm mt-1">{{$book->author}}</p>

                <!-- Ana Fikir -->
                <div class="mt-4 bg-[#4A3A3A] p-4 rounded-lg">
                    <h3 class="text-lg font-semibold">📌 Ana Fikir</h3>
                    <p class="text-gray-300 text-sm mt-2">
                        {{$book->content}}
                    </p>
                </div>

                <!-- Butonlar -->
                <div class="mt-6 flex justify-center space-x-4">
                    <button class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition duration-300">
                        👍 Beğendim {{$book->like}}
                    </button>
                    <button class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 transition duration-300">
                        👎 Beğenmedim {{$book->dislike}}
                    </button>
                    <button class="px-6 py-3 bg-yellow-600 text-white font-semibold rounded-lg shadow-md hover:bg-yellow-700 transition duration-300">
                        ⭐ Kaydet
                    </button>
                </div>

                <!-- Beğenenleri Gör Butonu -->
                <div class="mt-6">
                    <button id="show-likers" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                        📖 Beğenenleri Gör
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout>
