<x-layout>


    
    <x-header title="Presto.it" />
    @if (session()->has('access.denied'))
        <div class="flex flex-row justify-center my-2 alert alert-danger">
            {{ session('access.denied') }}
        </div>
    @endif
    {{-- Invio mail per diventare revisore --}}
    @if (session()->has('message'))
        <div class="flex flex-row justify-center my-2 alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    {{-- Conferma revisore --}}
    @if (session()->has('messageSendMail'))
        <div class="flex flex-row justify-center my-2 alert alert-success">
            {{ session('messageSendMail') }}
        </div>
    @endif
    <div class="container-fluid  mt-2 mb-5 ">
        <div class="row justify-content-evenly  align-content-center  ">
            @foreach ($announcements as $announcement)
                <div class="col-12 col-md-4">
                    <x-card :announcement=$announcement />
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
