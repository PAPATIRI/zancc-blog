@extends('frontend.layout.layout')
{{--@section('title', 'zanccode | '.$category)--}}
@section('content')
    <div class="container">
        {{--filter by category--}}
        <div class="d-flex justify-content-center my-3">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check filter-radio" name="btnradio" id="btnradio1" data-filter="all"
                       autocomplete="off" value="all" checked>
                <label class="btn btn-outline-secondary filter-btn" for="btnradio1">Semua</label>
                @foreach($categories as $category)
                    <input type="radio" class="btn-check filter-radio" value="{{$category->name}}" name="btnradio"
                           id="btnradio1.{{$category->slug}}"
                           autocomplete="off" data-filter="{{$category->name}}">
                    <label class="btn btn-outline-secondary filter-btn"
                           for="btnradio1.{{$category->slug}}">{{$category->name}}</label>
                @endforeach
            </div>
        </div>
        <div class="d-flex gap-3 justify-content-center flex-wrap" id="articles-wrapper">
            @forelse($articles as $article)
                <div class="card shadow" style="width: 350px">
                    <div class="card-body">
                        <div class="text-muted mb-2 d-flex justify-content-between align-items-center w-100">
                            <p class="fs-6 m-0">{{ \Carbon\Carbon::parse($article->created_at)->formatLocalized('%d %B %Y') }}</p>
                            <a href="{{url('category/'.$article->Category->slug)}}"
                               class="text-decoration-none">{{$article->Category->name}}</a>
                        </div>
                        <a href="{{url('posts/'.$article->slug)}}"
                           class="card-title h3 fs-4 text-decoration-none custom-title">{{\Illuminate\Support\Str::limit($article->title,55)}}</a>
                        <hr class="card-divider my-3 p-0">
                        <p>{{\Illuminate\Support\Str::limit(str_replace('&nbsp;', ' ', strip_tags($article->desc)), 100)}}</p>
                    </div>
                </div>
            @empty
                <div class="p-5 my-5 rounded bg-warning w-100" id="warning-empty">
                    <h3 class="text-center">artikel yang kamu cari tidak tersedia</h3>
                </div>
            @endforelse
        </div>
        <div class="pagination justify-content-center my-4">
            {{--            {{$articles->links()}}--}}
        </div>
    </div>
    @push('js')
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script>
            function limitText(text, limit) {
                var cleanText = text.replace(/<[^>]+>/g, '').replace(/&nbsp;/g, ' ');
                var trimmedText = cleanText.substring(0, limit);
                if (cleanText.length > limit) {
                    trimmedText += '...';
                }
                return trimmedText;
            }

            //fungsi format date ke bahasa indo
            function formatDate(dateString) {
                var date = new Date(dateString);
                var options = {day: '2-digit', month: 'long', year: 'numeric'};
                var formattedDate = date.toLocaleDateString('id-ID', options);

                return formattedDate;
            }


            $(document).ready(function () {
                $('.filter-radio').change(function () {
                    var filter = $(this).data('filter')
                    var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Mendapatkan CSRF token
                    console.log('filter : ', filter)

                    $.ajax({
                        url: '/category', // Ganti dengan URL endpoint di Laravel Anda
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        data: {
                            category: filter
                        },
                        success: function (response) {
                            if (response) {
                                var articles = response.articles;

                                if (articles.length > 0) {
                                    var articleList = '';
                                    articles.forEach(function (article) {
                                        articleList += '<div class="card shadow" style="width: 350px">'
                                        articleList += '<div class="card-body">'
                                        articleList += '<div class="text-muted mb-2 d-flex justify-content-between align-items-center w-100">'
                                        articleList += '<p class="fs-6 m-0">' + formatDate(article.created_at) + '</p>'
                                        articleList += `<a href="{{url('category/')}}/${article.category.slug}" class="text-decoration-none">` + article.category.name + '</a>'
                                        articleList += '</div>'
                                        articleList += '<a href="{{url('posts/'.$article->slug)}}" class="card-title h3 fs-4 text-decoration-none custom-title">' + article.title + '</a>'
                                        articleList += '<hr class="card-divider my-3 p-0">'
                                        articleList += '<p>' + limitText(article.desc, 100) + '</p>'
                                        articleList += '</div>'
                                        articleList += '</div>';
                                    });
                                    $('#articles-wrapper').html(articleList);
                                } else {
                                    var emptyArticle = '<div class="p-5 my-5 rounded bg-warning w-100" id="warning-empty">'
                                    emptyArticle += '<h3 class="text-center">artikel yang kamu cari tidak tersedia</h3>'
                                    emptyArticle += '</div>'
                                    // Masukkan hasil ke dalam elemen
                                    $('#articles-wrapper').html(emptyArticle);
                                }
                            } else {
                                console.error('empty response')
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(error);
                        }
                    });
                });
                var selectedFilter = $('input[name="btnradio"]:checked').val();
                $('input[name="btnradio"][value="' + selectedFilter + '"]').prop('checked', true);
            })
        </script>
    @endpush
@endsection
