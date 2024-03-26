<div>

    @if(session()->has('status'))
    <div class="flex flex-row justify-center my-2 alert alert-success">
    {{session('status')}}
    </div>
    @endif
    <form wire:submit="store">
        @csrf


        <div class="mb-3">
            <label class="form-label animate__animated animate__backInRight animate__delay-0.5s">Titolo Annuncio</label>
            <input type="text" class="form-control  " wire:model.live="title">
            @error('title')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label animate__animated animate__backInRight animate__delay-0.5s">Descrizione Annuncio</label>
            <input type="text" class="form-control" wire:model.live="body" @error('body') is-invalid @enderror>
            @error('body')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label animate__animated animate__backInRight animate__delay-0.5s">Prezzo</label>
            <input type="number" class="form-control" wire:model.live="price" @error('price') is-invalid @enderror>
            @error('price')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label animate__animated animate__backInRight animate__delay-0.5s" for="category">Categoria</label>
            <select wire:model.defer="category" id="category" class="form-control">
                <option value="">Scegli la categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="my-5">
            <input  type="file" name="images" multiple class="form-control  animate__animated animate__backInRight animate__delay-0.5s" wire:model.live="temporary_images" @error('temporary_images.*') is-invalid @enderror placeholder="Seleziona le tue immagini">
            @error('temporary_images.*')
                <div class="alert alert-danger">
                  <p class="text-danger mt-2">{{ $message }}</p>  
                </div>
            @enderror
        </div>
            @if (!empty ($images))
            <div class="row">
                <div class="col-12">
                    <p class="pCustom">Foto preview</p>
                    <div class="row border border-3 border-success rounded py-3">
                        @foreach ($images as $key => $image)
                        <div class="col-6 my-3">
                            <div class="img-preview d-flex justify-content-center  rounded " >
                                <img class="img-fluid imgaltezza-custom" src="{{ $image->temporaryUrl() }}" alt="">
                            </div>
                            <button type="button" class="btn btn-danger d-block text-center mt-2 mx-auto" wire:click="removeImage({{ $key }})">Cancella</button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            <div class="d-flex justify-content-center mt-5 ">
                <button type="submit" class="btn btn-primary btnCus" >Submit</button>
            </div>
        
    </form>
</div>
