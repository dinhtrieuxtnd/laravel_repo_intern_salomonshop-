@extends('frontend/layout/master')

@section('title')
    Trang chủ Salomon Shop
@endsection

@section('content')
    <h1>Danh sách sản phẩm</h1>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($dsSp as $sp)
                <div class="col mb-4">
                    <div class="card h-100">
                        @if (count($sp->dsHinhSp) > 0)
                            <img src="/storage/uploads/{{ $sp->dsHinhSP[0]->hsp_tentaptin }}"
                                class="card-img-top"
                                alt="{{ $sp->sp_ten }}"
                                style="height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('assets/img/dft-img.jpg') }}"
                                class="card-img-top"
                                alt="Default image"
                                style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $sp->sp_ten }}</h5>
                            <div class="price-container mb-3">
                                <span class="current-price fw-bold me-2">{{ number_format($sp->sp_gia, 0, ',', '.') }}đ</span>
                                @if($sp->sp_giacu)
                                    <span class="old-price text-muted text-decoration-line-through">
                                        {{ number_format($sp->sp_giacu, 0, ',', '.') }}đ
                                    </span>
                                @endif
                            </div>
                            <a href="{{route('frontend.sp.detail', ['sp_ma' => $sp->sp_ma])}}" class="btn btn-primary mt-auto">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
