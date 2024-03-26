<x-layout>
    <div class="container-fluid my-5">
        <div class="row ">

            <h1 class="text-center display-5 my-4">Tutti gli annunci:</h1>
            
            
            
            @forelse ($announcements as $announcement)
            <div class="col-12 col-md-4">
                <x-card :announcement="$announcement"/>
            </div>
            
            
            @empty
            <div class="col-12">
                <div class="alert alert-danger py-3 ">
                    
                    <p class="lead">Non ci sono annunci per questa ricerca. Prova a cambiare</p>
                </div>
                
                
                
                
            </div>
            @endforelse
            <div class="row">
                <div class="col-12 d-flex justify-content-center my-5">
                    {{$announcements->links()}}
                    
                </div>
                
            </div>
            
            
        </div>
    </div>
    
</x-layout>