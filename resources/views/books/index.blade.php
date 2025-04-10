<x-layout>
    <div class="container mx-auto px-6 my-10">
        <h2 class="text-3xl font-semibold text-center mb-6">📚 Tüm Kitaplar</h2>
        
        <div class="grid grid-cols-7 gap-6">

            @foreach ($books as $book )
            <div class="bg-[#4A3A3A] p-4 rounded-lg shadow-lg flex flex-col items-center">
                <a href="{{route("books.show",["book"=>$book->id])}}">
                    <img src="https://picsum.photos/150/220?random=1" class="rounded-lg">
                </a>
                <p class="text-sm mt-2 text-center">{{$book->name}}</p>
            </div>
            @endforeach

            @for ($i = 1; $i <= 49; $i++)
                <div class="bg-[#4A3A3A] p-4 rounded-lg shadow-lg flex flex-col items-center">
                    <a href="">
                        <img src="https://picsum.photos/150/220?random={{ $i }}" class="rounded-lg">
                    </a>
                    <p class="text-sm mt-2 text-center">Kitap {{$i}}</p>
                </div>
            @endfor
        </div>
    </div>
</x-layout>
