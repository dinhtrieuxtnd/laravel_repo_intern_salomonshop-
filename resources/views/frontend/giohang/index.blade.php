@extends('frontend/layout/master')

@section('title')
    Giỏ hàng
@endsection

@section('content')
    <h1>Giỏ hàng</h1>
    <!-- resources/views/cart.blade.php -->

    <div class="container mt-5">
        <h2 class="mb-4">Giỏ Hàng của Bạn</h2>

        @if (session()->has('gioHangData'))
            @php
                $gioHangData = session('gioHangData');
            @endphp

            @if (!empty($gioHangData))
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($gioHangData as $gh)
                            <tr>
                                <td>{{ $i }}</td>
                                <td><img src="{{ $gh['sp_hinh'] }}" alt="{{ $gh['sp_ten'] }}" width="100"></td>
                                <td>{{ $gh['sp_ten'] }}</td>
                                <td>{{ number_format($gh['sp_gia'], 0, ',', '.') }} VND</td>
                                <td>{{ $gh['sp_soluong'] }}</td>
                                <td>{{ number_format($gh['sp_gia'] * $gh['sp_soluong'], 0, ',', '.') }} VND</td>
                                <td>
                                    <!-- Ví dụ nút xóa sản phẩm -->
                                    <form action="{{ route('frontend.giohang.delete') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="sp_ma" id="sp_ma" value="{{ $gh['sp_ma'] }}">
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>

                <!-- Tổng tiền -->
                <div class="mt-4">
                    <h4>
                        Tổng tiền:
                        {{ number_format(
                            array_sum(
                                array_map(function ($gh) {
                                    return $gh['sp_gia'] * $gh['sp_soluong'];
                                }, $gioHangData),
                            ),
                            0,
                            ',',
                            '.',
                        ) }}
                        VND
                    </h4>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <a href="{{ route('frontend.thanhtoan.index') }}" class="btn btn-success">Thanh toán</a>
                    <a href="{{ route('frontend.home.index') }}" class="btn btn-primary">Tiếp tục mua hàng</a>
                </div>
            @else
                <div class="alert alert-info">Giỏ hàng của bạn đang trống.</div>
                <div class="mb-3 d-grid gap-2">
                    <a href="{{ route('frontend.thanhtoan.index') }}" class="btn btn-success disabled" role="button" aria-disabled="true">Thanh toán</a>
                    <a href="{{ route('frontend.home.index') }}" class="btn btn-primary">Tiếp tục mua hàng</a>
                </div>
            @endif
        @else
            <div class="alert alert-info">Giỏ hàng của bạn đang trống.</div>
            <!-- Nút tiếp tục mua hàng -->
            <div class="mb-3 d-grid gap-2">
                <a href="{{ route('frontend.thanhtoan.index') }}" class="btn btn-success disabled" role="button" aria-disabled="true">Thanh toán</a>
                <a href="{{ route('frontend.home.index') }}" class="btn btn-primary">Tiếp tục mua hàng</a>
            </div>
        @endif

    </div>

@endsection
