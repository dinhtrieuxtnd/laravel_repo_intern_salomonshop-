@extends('frontend/layout/master')

@section('title')
    Chi tiết sản phẩm
@endsection

@section('content')
    <h1>Chi tiết sản phảm {{ $sp->sp_ten }}</h1>
    <div class="container mt-5 mb-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{-- route('frontend.home') --}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $sp->loaiSP->lsp_ten }}</a></li>
                <li class="breadcrumb-item active">{{ $sp->sp_ten }}</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Phần hình ảnh sản phẩm -->
            <div class="col-md-6 mb-4">
                <div class="product-images">
                    <!-- Ảnh chính -->
                    <div class="main-image mb-3">
                        @if (count($sp->dsHinhSp) > 0)
                            <img src="/storage/uploads/{{ $sp->dsHinhSP[0]->hsp_tentaptin }}" class="img-fluid rounded"
                                alt="{{ $sp->sp_ten }}" id="main-product-image">
                        @else
                            <img src="{{ asset('assets/img/dft-img.jpg') }}" class="img-fluid rounded" alt="Default image"
                                id="main-product-image">
                        @endif
                    </div>

                    <!-- Thumbnail gallery -->
                    <div class="thumbnail-gallery d-flex">
                        @foreach ($sp->dsHinhSp as $hinhAnh)
                            <div class="thumbnail me-2" style="width: 100px; cursor: pointer;">
                                <img src="/storage/uploads/{{ $hinhAnh->hsp_tentaptin }}" class="img-fluid rounded"
                                    alt="Thumbnail" onclick="changeMainImage(this.src)">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Phần thông tin sản phẩm -->
            <div class="col-md-6">
                <h1 class="mb-3">{{ $sp->sp_ten }}</h1>

                <!-- Giá sản phẩm -->
                <div class="pricing mb-4">
                    <span class="h2 fw-bold text-primary me-2">
                        {{ number_format($sp->sp_gia, 0, ',', '.') }}đ
                    </span>
                    @if ($sp->sp_giacu)
                        <span class="h5 text-muted text-decoration-line-through">
                            {{ number_format($sp->sp_giacu, 0, ',', '.') }}đ
                        </span>
                    @endif
                </div>

                <!-- Mô tả ngắn -->
                <div class="short-description mb-4">
                    <p>{{ $sp->sp_mota_ngan }}</p>

                </div>

                <!-- Form đặt hàng -->
                <form action="{{ route('frontend.giohang.create') }}" method="POST" class="mb-4">
                    @csrf
                    <input type="hidden" name="sp_ma" value="{{ $sp->sp_ma }}">

                    <!-- Chọn số lượng -->
                    <div class="mb-3">
                        <label class="form-label" for="sp_soluong"><b>Số lượng:</b></label>
                        <div class="input-group" style="width: 130px;">
                            <input type="number" class="form-control text-center" id="sp_soluong" name="sp_soluong"
                                value="1" min="1">
                        </div>
                    </div>

                    <!-- Nút thêm vào giỏ và mua ngay -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Thêm vào giỏ hàng</button>
                    </div>
                </form>

                <!-- Thông tin thêm -->
                <div class="additional-info">
                    <div class="mb-2">
                        <span>
                            <b>Loại sản phẩm:</b>
                            {{ $sp->loaiSp->lsp_ten }}
                        </span>
                    </div>
                    <div class="mb-2">
                        <span>
                            <b>Nhà sản xuất:</b>
                            {{ $sp->nsx->nsx_ten }}
                        </span>
                    </div>
                    @if (isset($sp->km_ma) && !empty($sp->km_ma))
                        <div>
                            <span>
                                <b>Khuyến mãi:</b>
                                {{ $sp->khuyenMai->km_noidung }}
                                từ
                                {{ Carbon\Carbon::parse($sp->khuyenMai->km_tungay)->format('d/m/Y') }}
                                đến
                                {{ Carbon\Carbon::parse($sp->khuyenMai->km_denngay)->format('d/m/Y') }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Mô tả chi tiết và đánh giá -->
        <div class="row mt-5">
            <div class="col-12">
                <ul class="nav nav-tabs mb-4" id="productTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                            data-bs-target="#description" type="button" role="tab">
                            Mô tả chi tiết
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                            type="button" role="tab">
                            Đánh giá
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="productTabContent">
                    <!-- Nội dung mô tả -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        {!! $sp->sp_mota_chitiet !!}
                    </div>

                    <!-- Phần đánh giá -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <!-- Hiển thị đánh giá ở đây -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Sản phẩm liên quan -->
        <div class="related-products mt-5">
            <h3 class="mb-4">Sản phẩm liên quan</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <!-- Thêm vòng lặp foreach cho sản phẩm liên quan ở đây -->
            </div>
        </div>
    </div>

@endsection

<script>
    // Hàm đổi ảnh chính
    function changeMainImage(src) {
        document.getElementById('main-product-image').src = src;
    }
</script>

<style>
    .thumbnail img {
        border: 2px solid transparent;
        transition: border-color 0.2s ease-in-out;
    }

    .thumbnail img:hover {
        border-color: #0d6efd;
    }

    .btn-check:checked+.btn-outline-secondary {
        background-color: #0d6efd;
        border-color: #0d6efd;
        color: white;
    }

    .main-image img {
        max-height: 500px;
        width: auto;
        margin: 0 auto;
        display: block;
    }

    .additional-info i {
        margin-right: 8px;
    }
</style>
