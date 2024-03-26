<x-layoiut>
    <x-navbar />

    <x-header title="Crea il tuo articolo" />

{{-- Form creazione articoli --}}
<form method="POST" action="{{route('articles.create')}}" enctype="multipart/form-data">
    @csrf
    {{-- Input titolo --}}
    <div class="mb-3">
      <label  class="form-label">titolo</label>
      <input type="text" class="form-control" name="title">
     {{-- Input Genere--}}
    </div>
    <div class="mb-3">
      <label  class="form-label">Genere</label>
      <input type="text" class="form-control" name="">
    </div>
    {{-- Input descrizione--}}
    <div class="mb-3">
        <label  class="form-label">Descrzizione</label>
        <textarea name="body" id="" cols="30" rows="10" class="form-control" ></textarea>
       
      </div>
      {{-- Input immagine --}}
      <div class="mb-3">
        <label  class="form-label">Prezzo</label>
        <input type="number" class="form-control" name="price">
       
      </div>

      <div class="mb-3">
        <label  class="form-label">Inserici un immagine</label>
        <input type="file" class="form-control" name="img>
       
      </div>
   
  </form>

</x-layout>