<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitap Sitesi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        .swiper-slide {
            transition: transform 0.5s, opacity 0.5s;
        }
        .swiper-slide-active {
            transform: scale(1.3);
            z-index: 10;
        }
        .swiper-slide-prev, .swiper-slide-next {
            transform: scale(0.9);
            opacity: 0.7;
        }
    </style>
</head>
<body class="bg-[#3B2F2F] text-white flex flex-col min-h-screen">
    <!-- Navbar -->
    <header class="flex justify-between items-center p-6 bg-[#2A1F1F]">
        <div class="text-xl font-bold">
            <a href="{{route('home')}}" class="hover:opacity-90">📚 Philéō Bitig</a>
        </div>
        <div>
            @guest
            <a href="{{route('login')}}" class="mr-4 underline-offset-2 hover:underline">Login</a>
            <a href="{{route('register')}}" class="underline-offset-2 hover:underline">Register</a>
            @endguest

            @auth
                <div class="relative">
                    <!-- Avatar -->
                    <p id="avatar-btn" class="bg-yellow-800 p-2 rounded-full w-12 h-12 flex items-center justify-center transform ease-in-out hover:scale-105">
                        <img src="https://i.pravatar.cc/100" alt="Avatar" class="w-10 h-10 rounded-full">
                    </p>
                
                    <!-- Modal Arkaplan -->
                    <div id="modal-overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                        <!-- Modal İçeriği -->
                        <div class="bg-[#2A1F1F] text-white p-6 rounded-lg w-80 shadow-lg">
                            <h3 class="text-lg font-semibold mb-4">👤 Kullanıcı Menüsü</h3>
                            <ul class="space-y-3">
                                <li><a href="{{route('dashboard',["user"=>me()->id])}}" class="block p-2 hover:bg-gray-700 rounded">📄 Profile</a></li>
                                <li><a href="{{route('library')}}" class="block p-2 hover:bg-gray-700 rounded">📚 Library</a></li>
                                <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">💾 Saves</a></li>
                                <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">🧑‍🤝‍🧑 Friends</a></li>
                                <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">⚙️ Settings</a></li>
                            </ul>
                            <button id="close-modal" class="mt-4 w-full bg-red-600 p-2 rounded hover:bg-red-700">Kapat</button>
                        </div>
                    </div>
                </div> 
            @endauth
        </div>
    </header>

    <!-- İçerik (Sayfa içeriği buraya gelecek) -->
    <main class="flex-1">
        {{$slot}}
    </main>

    <!-- Sohbet Butonu -->
    <div class="fixed bottom-4 right-4">
        <button id="chat-toggle" class="p-3 bg-blue-600 rounded-full">💬</button>
        <div id="chat-box" class="hidden fixed bottom-16 right-4 bg-white text-black p-4 w-64 h-80 rounded-lg shadow-lg">
            <p>Sohbet alanı</p>
        </div>
    </div>

    <!-- Footer (Artık her zaman en altta duracak) -->
    <footer class="bg-[#2A1F1F] text-white py-6">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center md:text-left">
                <!-- Hakkımızda -->
                <div>
                    <h3 class="text-lg font-semibold mb-2">Hakkımızda</h3>
                    <p class="text-sm">Philéō Bitig, kitap severler için oluşturulmuş bir platformdur. Burada kitaplar hakkında konuşabilir, yeni kitaplar keşfedebilirsiniz.</p>
                </div>

                <!-- İletişim -->
                <div>
                    <h3 class="text-lg font-semibold mb-2">İletişim</h3>
                    <p class="text-sm">📧 info@phileobitig.com</p>
                    <p class="text-sm">📍 İstanbul, Türkiye</p>
                </div>

                <!-- Sosyal Medya -->
                <div>
                    <h3 class="text-lg font-semibold mb-2">Bizi Takip Edin</h3>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <a href="https://instagram.com" target="_blank" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-twitter text-2xl"></i>
                        </a>
                        <a href="https://github.com/ozdmreren" target="_blank" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-github text-2xl"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Telif Hakkı -->
            <div class="text-center text-sm mt-6 border-t border-gray-600 pt-4">
                © 2025 Philéō Bitig - Tüm Hakları Saklıdır.
            </div>
        </div>
    </footer>

    <!-- FontAwesome for Social Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Swiper.js Carousel
        new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            centeredSlides: true,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            }
        });

        // Sohbet Kutusu Aç/Kapat
        document.getElementById("chat-toggle").addEventListener("click", function () {
            document.getElementById("chat-box").classList.toggle("hidden");
        });
    </script>
    

    
    <!-- AVATAR JS -->
    <script>
        document.getElementById("avatar-btn").addEventListener("click", function () {
            document.getElementById("modal-overlay").classList.remove("hidden");
        });

        document.getElementById("close-modal").addEventListener("click", function () {
            document.getElementById("modal-overlay").classList.add("hidden");
        });
    </script>
</body>
</html>
