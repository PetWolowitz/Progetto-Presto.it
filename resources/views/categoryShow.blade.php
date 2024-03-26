<x-layout>
    <div class="contanier my-5 ">
        <div class="row justify-content-evenly  align-items-center ">
            @forelse ($category->announcements as $announcement)
            <x-card :announcement=$announcement/>
            
            {{-- <div class="col-12 col-md-4 my-2">
                <div class=" cardCus" style="width: 22rem;">
                    <img class="card-img-top" src="https://picsum.photos/id/1/200" alt="Card image cap" alt="...">
                    <div class="card-body">
                        <h5 class="card-title titleCus">{{$announcement->title}}</h5>
                        <p class="card-text">{{$announcement->body}}</p>
                        <p class="card-text">{{$announcement->price}}</p>
                        <a href="#" class="btn btn-primary btnCusCard">Dettaglio</a>
                        <a href="" class="my-2 shadow">Categoria : {{$announcement->category->name}}</a>
                        <p class="card-footer">Pubblicato il : {{$announcement->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
            </div> --}}
            @empty
            <div class="container my-5 ">
                <div class="row justify-content-center align-content-center">
                    <div class="col-12 col-md-6">
                        <h2 class ="h2Cus">Non ci sono annunci</h2>
                        <p class="h2">Pubblicane uno : <a href="{{route('announcement.create')}}" class="btn btn-success btnCus">Nuovo Annuncio</a></p>
                    </div>
                </div>
            </div>
            
            
            @endforelse
        </div>
    </div>
</x-layout>