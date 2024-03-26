<x-layout>
    
    
    <x-header title="Registrati"/>
    
    <div class="container mt-5 mb-5  registerCus">
        <div class="row justify-content-center ">
            <div class="col-12 col-md-6">
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="mb-3 mt-3 ">
                        <label class="form-label ">Nome</label>
                        <input type="text" class="form-control shadow " name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label ">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label ">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Conferma Password</label>
                        <input type="password" class="form-control " name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary btnCus">Registrati</button>
                </form>
            </div>
        </div>
    </div>
    
</x-layout>