<x-layout>
    <div class="container-fluid  p-5  mb-4">
        <div class="row">
            <div class="col-12 ">
                <h1 class="display-5 text-center">{{$announcement_to_check ? 'Ecco l\'annuncio da revisionare :' : 'Non ci sono annunci da revisionare'}}</h1>
                
            </div>
        </div>
    </div>
    
    
    
    
    @if ($announcement_to_check)
    <div class="container registerCus my-5 ">
        <div class="row justify-content-start mx-5   align-items-center">
            <div class="col-12 col-md-4 mt-5 mb-5  d-flex justify-content-center ">
                <div class="card-body">
                    
                    
                    <h5 class="titleCus  ">{{$announcement_to_check->title}}</h5>
                    <p class=" mx-1 fw-bold titleCus ">Descrizione  </p>
                    <p class=" titleCus2">{{$announcement_to_check->body}}</p>
                    <p class=" titleCus fw-bold">Prezzo : </p>
                    <p class=" titleCus"> {{$announcement_to_check->price}}</p>
                    <p  class="  titleCus fw-bold">Categoria : </p>
                    <p  class=" titleCus2 "> {{$announcement_to_check->category->name}}</p>
                    <p class="card-footer titleCus  fw-bold ">
                        <small class="">Pubblicato il : {{$announcement_to_check->created_at->format('d/m/Y')}}</small>
                    </p>
                    {{-- <div class="d-flex justify-content-center">
                        <a href="{{route('home')}}" class="btn btn-primary btnCus   "> Home </a>
                    </div> --}}
                    <div class="row justify-content-center align-items-center ">
                        <div class="col-12 col-md-6  ">
                            <form action="{{route('revisor.accept_announcement', ['announcement' => $announcement_to_check])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btnCus ">Approva</button>
                            </form>
                        </div>
                        <div class="col-12 col-md-6 text-end">
                            <form action="{{route('revisor.reject_announcement', ['announcement' => $announcement_to_check])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger btnCus">Rifiuta</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-12 col-md-3 d-flex  justify-content-center ">
                @if ($announcement_to_check->images->isNotEmpty())
                <div class="swiper mySwiper me-5 ">
                    <div class="swiper-wrapper   ">
                        @foreach ($announcement_to_check->images as $image)
                        <div class="swiper-slide @if ($loop->first) active @endif">
                            <img src="{{$image->getUrl(400,300)}}" class="img-fluid rounded"/>
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
                    
                    <div class="swiper-pagination"></div>
                    
                </div>
                @endif
            </div>
            <div class="col-md-2  marginCusRevImg  ">
                <h5 class="fs-3">Tags: </h5>
                @foreach ($announcement_to_check->images as $image)
                @if($image->labels)
                @foreach($image->labels as $label)
                    <p class="d-inline pe-2 m-0"> #{{ $label }}, </p>
                @endforeach
                @endif
                @endforeach

            </div>
            <div class="col-md-3   marginCusRevImg  ">
                <div class="   ">
                    <h5 class="fs-3  ">Revisione Immagine</h5>
                    <p class="fs-5">Adulti: <span class="{{$image->adult}} "></span></p>
                    <p class="fs-5">Satira: <span class="{{$image->spoof}}"></span></p>
                    <p class="fs-5">Medicina: <span class="{{$image->medical}}"></span></p>
                    <p class="fs-5">Violenza: <span class="{{$image->violence}}"></span></p>
                    <p class="fs-5">Contenuto ammiccante: <span class="{{$image->racy}}"></span></p>
                </div>

            </div>
            
            
        </div>
    </div>
    
    @endif
</x-layout>