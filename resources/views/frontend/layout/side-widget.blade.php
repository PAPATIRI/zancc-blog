<!-- Side widgets-->
<div class="col-lg-3">
    <!-- Search widget-->
    <div class="card shadow-sm mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <form action="{{url('/articles/search')}}" method="post">
                @csrf
                <div class="input-group">
                    <input
                            class="form-control"
                            type="text"
                            name="keyword"
                            placeholder="cari artikel..."
                    />
                    <button
                            class="btn btn-primary"
                            id="button-search"
                            type="submit"
                    >cari
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card shadow-sm mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <ul class="list-unstyled d-flex flex-wrap w-100 gap-2">
                @foreach($categories as $category)
                    <li class="bg-dark px-2 py-1 rounded"><a href="#!"
                                                             class="text-decoration-none text-light">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card shadow-sm mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">
            You can put anything you want inside of these side widgets. They
            are easy to use, and feature the Bootstrap 5 card component!
        </div>
    </div>
</div>
