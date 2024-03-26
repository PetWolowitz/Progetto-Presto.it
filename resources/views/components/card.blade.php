<div class="card-sl mx-auto  my-5 bg-accent animate__animated animate__backInLeft animate__delay-1s ">
    <div class="card-image">
        <img class="img-fluid"
        
            src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/id/1/400/300'}}" alt="Foto generiche" />
    </div>


    <div class="card-heading ">
        <h5 class="card-title titleCus  bellaCard-h5 text-truncate">{{ $announcement->title }}</h5>
    </div>
    <div class="card-text">
        <p class="card-text mx-1 fw-bold text-truncate ">Descrizione {{ $announcement->body }}</p>
        <p class="card-text   fw-bold text-truncate">Prezzo : {{ $announcement->price }} </p>
        <p class="card-text  fw-bold text-truncate">Categoria : {{ $announcement->category->name }} </p>

        <p class="card-footer  fw-bold ">
            <small class="card-text">Creato : {{ $announcement->created_at->format('d/m/Y') }}</small>
        </p>
    </div>

    <a href="{{ route('announcement.show', $announcement->id) }}"
        class="card-button btn btn-primary btnCusCard fs-4 ">Dettaglio</a>
</div>
