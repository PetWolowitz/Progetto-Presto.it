<x-layout>
    
    
    <div class="container  mt-5 mb-5 ">
        <h1 class="accediCus animate__animated animate__swing animate__delay-1s">Accedi</h1>

    </div>
    
    <div class="container  mt-5 mb-5 loginCus">
        <div class="row justify-content-center ">
            <div class="col-12 col-md-6">
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-3 mt-3 ">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3 form-check ">
                        <input type="checkbox" class="form-check-input" name="remember">
                        <label for="exampleCheck1" class="form-check-label">Ricordati di me</label>
                    </div>
                    <button type="submit" class="btn btn-primary btnCus">Accedi</button>
                </form>
            </div>
        </div>
    </div>
    
</x-layout>