<x-layout>
    @php
        $firstName = $user->firstName;
        $lastName = $user->lastName;
        $rank = $user->rank;
        $bio = $user->bio;
    @endphp
    <div class="flex flex-col min-h-screen">
        <!-- İçerik Kısmı -->
        <div class="flex-grow">
            <div class="max-w-4xl mx-auto bg-[#2A1F1F] text-white p-6 rounded-lg shadow-lg mt-10 flex">
                <!-- Profil Fotoğrafı -->
                <div class="w-1/3 flex justify-center items-center">
                    <img id="profile-pic" src="https://picsum.photos/200" 
                         alt="Profil Fotoğrafı" 
                         class="rounded-full w-40 h-40 border-4 border-gray-500 cursor-pointer">
                </div>

                <!-- Kullanıcı Bilgileri -->
                <div class="w-2/3 pl-6">
                    <h2 class="text-2xl font-bold">{{$firstName}} {{$lastName}}</h2>
                    <p class="text-gray-300 mt-2">Rütbe: <strong>{{$rank}}</strong></p>
                    <p class="text-gray-300 mt-2">{{$bio}}</p>

                    <!-- Arkadaşlık Durumu -->
                    @if ($user->id != me()->id)
                    <button class="mt-4 bg-blue-600 p-2 rounded hover:bg-blue-700">➕ Arkadaşlık İsteği Gönder</button>
                    @endif

                    @can("create",$user)
                        <a>Blog Oluştur</a>
                    @endcan

                </div>
            </div>

            <!-- Kullanıcının Beğendiği Kitaplar (Dummy Data) -->
            <div class="max-w-4xl mx-auto mt-10">
                <h3 class="text-xl font-bold text-white">📚 Beğendiği Kitaplar</h3>
                <div class="grid grid-cols-3 gap-4 mt-4">
                    @foreach(range(1, 3) as $i)
                        <div class="bg-[#4A3A3A] p-4 rounded-lg shadow-lg">
                            <img src="https://picsum.photos/150/220?random={{ $i }}" class="rounded-lg mx-auto w-40 h-60">
                            <h4 class="text-center mt-2">Kitap {{ $i }}</h4>
                        </div>
                    @endforeach
                </div>

                <!-- Hepsini Gör Butonu -->
                <div class="text-center mt-6">
                    <a href="#" class="px-4 py-2 bg-yellow-700 rounded-lg hover:bg-yellow-800">📖 Hepsini Gör</a>
                </div>
            </div>
        </div>

    </div>

    <!-- Profil Resmi Modal -->
    <div id="profile-modal" class="fixed inset-0 bg-black bg-opacity-80 flex justify-center items-center hidden">
        <div class="relative">
            <img id="modal-img" src="https://picsum.photos/200" 
                 class="rounded-lg w-96 h-96 border-4 border-white">
            <button id="close-modal" class="absolute top-2 right-2 text-white text-3xl">✖</button>
        </div>
    </div>

    <script>
        const profilePic = document.getElementById("profile-pic");
        const profileModal = document.getElementById("profile-modal");
        const modalImg = document.getElementById("modal-img");
        const closeModal = document.getElementById("close-modal");

        // Profil fotoğrafına tıklanınca modalı aç
        profilePic.addEventListener("click", () => {
            profileModal.classList.remove("hidden");
        });

        // Kapatma butonuna veya modal dışına tıklanınca modalı kapat
        closeModal.addEventListener("click", () => {
            profileModal.classList.add("hidden");
        });

        profileModal.addEventListener("click", (e) => {
            if (e.target === profileModal) {
                profileModal.classList.add("hidden");
            }
        });

        // Escape tuşuna basınca modalı kapat
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape") {
                profileModal.classList.add("hidden");
            }
        });
    </script>
</x-layout>
