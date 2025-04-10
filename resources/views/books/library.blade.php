<x-layout>
    <div class="max-w-4xl mx-auto bg-[#2A1F1F] text-white p-6 rounded-lg shadow-lg mt-10 flex">
        <!-- Sol Taraf: Profil Fotoğrafı -->
        <div class="w-1/3 flex flex-col items-center">
            <img src="https://picsum.photos/200" alt="Profil Fotoğrafı" 
                 class="rounded-full w-32 h-32 border-4 border-gray-500">
            <h2 class="text-xl font-bold mt-3">John Doe</h2>
        </div>

        <!-- Sağ Taraf: İçerik -->
        <div class="w-2/3 pl-6">
            <!-- Sekmeler -->
            <div class="flex justify-between border-b border-gray-600 pb-2">
                <button class="tab-button text-gray-400 hover:text-white" data-tab="best">⭐ En Beğendikleri</button>
                <button class="tab-button text-gray-400 hover:text-white" data-tab="liked">👍 Beğendikleri</button>
                <button class="tab-button text-gray-400 hover:text-white" data-tab="disliked">👎 Beğenmedikleri</button>
            </div>

            <!-- Kitap Listesi -->
            <div id="tab-content" class="mt-6">
                <!-- En Beğendikleri -->
                <div id="best" class="tab-data">
                    <h3 class="text-lg font-bold">⭐ En Beğendiği Kitaplar</h3>
                    <div class="grid grid-cols-3 gap-4 mt-4">
                        @foreach(range(1, 3) as $i)
                            <div class="bg-[#4A3A3A] p-4 rounded-lg shadow-lg">
                                <img src="https://picsum.photos/150/220?random={{ $i }}" class="rounded-lg mx-auto w-40 h-60">
                                <h4 class="text-center mt-2">Kitap {{ $i }}</h4>
                            </div>
                        @endforeach
                    </div>
                    <!-- Hepsini Gör Butonu -->
                    <div class="flex justify-center mt-6">
                        <a href="#" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                            📖 Hepsini Gör
                        </a>
                    </div>
                </div>

                <!-- Beğendikleri -->
                <div id="liked" class="tab-data hidden">
                    <h3 class="text-lg font-bold">👍 Beğendiği Kitaplar</h3>
                    <div class="grid grid-cols-3 gap-4 mt-4">
                        @foreach(range(4, 6) as $i)
                            <div class="bg-[#4A3A3A] p-4 rounded-lg shadow-lg">
                                <img src="https://picsum.photos/150/220?random={{ $i }}" class="rounded-lg mx-auto w-40 h-60">
                                <h4 class="text-center mt-2">Kitap {{ $i }}</h4>
                            </div>
                        @endforeach
                    </div>
                    <!-- Hepsini Gör Butonu -->
                    <div class="flex justify-center mt-6">
                        <a href="#" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                            📚 Hepsini Gör
                        </a>
                    </div>
                </div>

                <!-- Beğenmedikleri -->
                <div id="disliked" class="tab-data hidden">
                    <h3 class="text-lg font-bold">👎 Beğenmediği Kitaplar</h3>
                    <div class="grid grid-cols-3 gap-4 mt-4">
                        @foreach(range(7, 9) as $i)
                            <div class="bg-[#4A3A3A] p-4 rounded-lg shadow-lg">
                                <img src="https://picsum.photos/150/220?random={{ $i }}" class="rounded-lg mx-auto w-40 h-60">
                                <h4 class="text-center mt-2">Kitap {{ $i }}</h4>
                            </div>
                        @endforeach
                    </div>
                    <!-- Hepsini Gör Butonu -->
                    <div class="flex justify-center mt-6">
                        <a href="#" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                            📕 Hepsini Gör
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sekme Değiştirme Mekanizması
        document.querySelectorAll(".tab-button").forEach(button => {
            button.addEventListener("click", () => {
                const tabId = button.getAttribute("data-tab");

                // Tüm sekmeleri gizle
                document.querySelectorAll(".tab-data").forEach(tab => {
                    tab.classList.add("hidden");
                });

                // Seçilen sekmeyi göster
                document.getElementById(tabId).classList.remove("hidden");

                // Aktif buton rengini güncelle
                document.querySelectorAll(".tab-button").forEach(btn => {
                    btn.classList.remove("text-white");
                    btn.classList.add("text-gray-400");
                });

                button.classList.remove("text-gray-400");
                button.classList.add("text-white");
            });
        });
    </script>
</x-layout>
