<x-layout>
        <!-- Arama Çubuğu -->
        <div class="flex justify-center my-6">
            <input type="text" placeholder="Kitap Ara..." class="w-1/2 p-3 rounded-lg text-black">
        </div>
    
        <!-- Kitap Carousel -->
        <div class="swiper mySwiper w-full max-w-4xl mx-auto">
            <div class="swiper-wrapper">
                @for ($i = 1; $i <= 5; $i++)
                <div class="swiper-slide flex justify-center">
                    <div class="bg-[#4A3A3A] p-4 rounded-lg shadow-lg w-64 h-80 flex justify-center items-center">
                        <img src="https://picsum.photos/250/350?random={{ $i }}" class="rounded-xl mx-auto">
                    </div>
                </div>
                @endfor
            </div>
        </div>
            <!-- Metin Alanı -->
    <div class="text-center my-6">
        <h2 class="text-2xl font-semibold">Yeni kitaplar keşfedin ve başka kitap kurtları ile sohbet edin!</h2>
    </div>
</x-layout>