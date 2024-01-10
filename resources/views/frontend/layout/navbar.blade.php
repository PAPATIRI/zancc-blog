<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark text-bg-dark fixed-top" >
    <div class="container font-paragraph">
        <a class="navbar-brand fs-5 font-title" href="{{url('/')}}">zanccode</a>
        <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-6">
                <li class="nav-item"><a class="nav-link {{request()->routeIs('/') ? 'active' : ''}}" href="{{url('/')}}">Home</a></li>
{{--                <li class="nav-item"><a class="nav-link {{request()->routeIs('posts') ? 'active' : ''}}" href="{{url('/posts')}}">Artikel</a></li>--}}
                <li class="dropdown nav-item">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                    <ul class="dropdown-menu">
                        @foreach($categories as $category)
                        <li><a class="dropdown-item" href="{{url('category/'.$category->slug)}}">{{$category->name}}</a></li>
                        @endforeach
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="{{url('/category')}}">Semua Kategori</a></li>

                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link {{request()->routeIs('about') ? 'active' : ''}}" href="{{url('/about')}}">Tentang</a></li>
            </ul>
        </div>
    </div>
</nav>
