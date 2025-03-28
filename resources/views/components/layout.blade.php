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
            <a href="{{route('home')}}">📚 Philéō Bitig</a>
        </div>
        <div>
            @guest
            <a href="{{route('login')}}" class="mr-4 underline-offset-2 hover:underline">Login</a>
            <a href="{{route('register')}}" class="underline-offset-2 hover:underline">Register</a>
            @endguest

            @auth
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button  class=" bg-yellow-800 p-2 rounded-lg transform ease-in-out hover:scale-105">Logout</button>
            </form>
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
                        <a href="https://github.com" target="_blank" class="text-gray-400 hover:text-white transition">
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
</body>
</html>
