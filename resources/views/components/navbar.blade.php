<nav class="navbar navbar-expand-lg  navbar-custom">
    <div class="container-fluid containerMediaScreen ">
        
        <a href="{{ route('home') }}" ><img src="/media/logo2.png" alt="" class="btn myLogo" ></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            {{-- <span class="navbar-toggler-icon"></span> --}}
            <i class="bi bi-list fs-2 text-white "></i>
          </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
                @auth
                <li class="nav-item my-2 aCus mx-3">
                    Ciao {{ Auth::user()->name }}
                </li>
                    <li class="nav-item">
                        <a class="nav-link active  aCus btn   " aria-current="page" href="{{ route('announcement.create') }}">Crea
                            Annuncio</a>
                    </li>
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-success btn-sm position-relative  aCus" aria-current="page"
                                href="{{ route('revisor.index') }}">Pannello Revisore
                            <span>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                                    <span class="visually-hidden">unread notifications</span>
                                </span>
                            </span>
                        </a>
                        </li>
                    @endif
                @endauth
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-success aCus " href="{{ route('announcement.index') }}">Annunci</a>
                </li>

                @guest
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle btn btn-outline-success aCus" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Azioni di accessso
                    </a>
                    
                    <ul class="dropdown-menu bg-secondaryCus">
                        <li><a btn btn-outline-success class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                        <li><a btn btn-outline-success class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    </ul>
                </li>
                    @endguest
                        @auth
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn aCus ">Logout</button>
                                </form>
                            </li>
                        @endauth
                
                        
                    
                <li class="nav-item dropdown  ">
                    <a class="nav-link dropdown-toggle aCus " href="#" role="button" id="categoriesDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false" aria-expanded="false">Categoria</a>
                    <ul class="dropdown-menu bg-secondaryCus" aria-labelledby="categoriesDropdown">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('category.show', compact('category')) }}">{{ $category->name }}</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endforeach
                    </ul>
                </li>
                </ul>
                <div class="mt-3 mx-5 ul-mobile">
                    <ul class="list-unstyled d-flex justify-content-end ">
                        <li class="nav-item ">
                            <x-_locale lang='it' />
                        </li>
                        <li class="nav-item">
                            <x-_locale lang='en' />
                        </li>
                        <li class="nav-item">
                            <x-_locale lang='es' />
                        </li>
                    </ul>
                </div>
            <form action="{{ route('announcements.search') }}" method="GET" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Cerca" aria-label="Search" name="searched">
                <button class="btn btn-outline-success text-fourthCus" type="submit">Cerca</button>
            </form>
            </form>
    </div>
    </div>
</nav>
