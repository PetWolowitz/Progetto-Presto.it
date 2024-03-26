<x-layout>
    <div class="container-fluid my-5  ">
        <div class="row justify-content-center ">
            <div class="col-12 col-md-6 mb-5">
                <h1 class="display-2 text-center">{{$announcement->title}}</h1>
                
            </div>
        </div>
    </div>
    
    <div class="container registerCus my-5 ">
        <div class="row justify-content-evenly  align-items-center">
            <div class="col-12 col-md-4 mt-5 mb-5  d-flex justify-content-center ">
                <div class="card-body">
                    {{-- <h5 class="titleCus  ">{{$announcement->title}}</h5> --}}
                    <p class=" mx-1 fw-bold titleCus ">Descrizione  </p>
                    <p class=" titleCus2">{{$announcement->body}}</p>
                    <p class=" titleCus fw-bold">Prezzo : </p>
                    <p class=" titleCus"> {{$announcement->price}}</p>
                    <p  class="  titleCus fw-bold">Categoria : </p>
                    <p  class=" titleCus2 "> {{$announcement->category->name}}</p>
                    <p class="card-footer titleCus  fw-bold ">
                        <small class="">Pubblicato il : {{$announcement->created_at->format('d/m/Y')}}</small>
                    </p>
                    <div class="d-flex justify-content-center">
                        <a href="{{route('home')}}" class="btn btn-primary btnCus   "> Home </a>
                    </div>   
                </div>
            </div>
            <div class="col-10 col-md-3 d-flex justify-content-center ">
                @if ($announcement->images->isNotEmpty())
                <div class="swiper mySwiper  ">
                    <div class="swiper-wrapper  ">
                        @foreach ($announcement->images as $image)
                        <div class="swiper-slide @if ($loop->first) active @endif">
                            <img  src="{{$image->getUrl(400,300)}}" class="img-swiper-custom img-fluid rounded"/>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                @else
                <div class="swiper mySwiper me-5  ">
                    <div class="swiper-wrapper  ">
                        <div class="swiper-slide ">
                            <img src="https://picsum.photos/id/1/200" />
                        </div>
                        <div class="swiper-slide ">
                            <img src="https://picsum.photos/id/2/200" />
                        </div>
                        <div class="swiper-slide ">
                            <img src="https://picsum.photos/id/4/200" />
                        </div>
                        <div class="swiper-slide ">
                            <img src="https://picsum.photos/id/5/200" />
                        </div>
                    </div>
                    @endif
                    <div class="swiper-pagination"></div>
                </div>
            </div>
</x-layout>