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
<body class="bg-[#3B2F2F] text-white">
    <!-- Navbar -->
    <header class="flex justify-between items-center p-6 bg-[#2A1F1F]">
        <div class="text-xl font-bold">📚 Philéō Bitig</div>
        <div>
            <a href="#" class="mr-4">Login</a>
            <a href="{{route('register')}}">Register</a>
        </div>
    </header>

    {{$slot}}

    <!-- Sohbet Butonu -->
    <div class="fixed bottom-4 right-4">
        <button id="chat-toggle" class="p-3 bg-blue-600 rounded-full">💬</button>
        <div id="chat-box" class="hidden fixed bottom-16 right-4 bg-white text-black p-4 w-64 h-80 rounded-lg shadow-lg">
            <p>Sohbet alanı</p>
        </div>
    </div>

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
