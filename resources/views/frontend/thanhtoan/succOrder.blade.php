@extends('frontend/layout/master')

@section('title')
    Đặt hàng thành công
@endsection

@section('content')
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h1 class="text-success"><i class="bi bi-check-circle-fill"></i></h1>
                <h2 class="text-success">Đặt hàng thành công!</h2>
                <p class="mt-3">Cảm ơn bạn đã tin tưởng và mua sắm tại cửa hàng của chúng tôi.</p>
                <p>Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để xác nhận đơn hàng.</p>

                <div class="mt-4">
                    <a href="{{ route('frontend.home.index') }}" class="btn btn-primary">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    </div>
@endsection
