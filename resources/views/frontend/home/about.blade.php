@extends('frontend.layout.layout')
@section('content')
    <div class="container py-5 d-flex align-items-center justify-content-center">
        <div class="card mx-2 mx-md-5 shadow" style="width: 500px">
            <div class="card-body">
                <h1 class="h1 fs-3 text-center fw-bold">tentang saya</h1>
                <hr>
                <div class="bg-secondary mb-4 overflow-hidden shadow"
                     style="height: 160px; width: 160px; border-radius: 50%;">
                    <img src="{{asset('frontend/images/zanccode.webp')}}" class="w-100 h-100" style="object-fit: cover;"
                         alt="zanccode writer">
                </div>
                <p class="fs-3 fw-bold">syarif taufik hidayat</p>
                <p class="fs-5">seorang pria tampan kelahiran 1997 dari pedalaman Kalimantan Barat. mencintai Teknologi sejak diajarkan membuat teks berjalan sendiri di browser dengan tag html 'marquee'. menyukai belajar hal hal baru dan menjadikan blog ini sebagai buku tulis untuk menjadi saksi perjalanan penulis menyelami dalamnya dunia software development.</p>
                <div class="d-flex gap-3">
                    <a href="https://web.facebook.com/sedapp.bang/" target="_blank"><i class="bi bi-facebook fs-3 text-dark"></i></a>
                    <a href="https://www.instagram.com/zancc_/" target="_blank"><i class="bi bi-instagram fs-3 text-dark"></i></a>
                    <a href="https://twitter.com/Syarif_T_H" target="_blank"><i class="bi bi-twitter fs-3 text-dark"></i></a>
                    <a href="https://www.tiktok.com/@zancc__" target="_blank"><i class="bi bi-tiktok fs-3 text-dark"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection