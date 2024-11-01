@extends('frontend/layout.master')

@section('title')
    Thanh toán
@endsection

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-5">Thanh toán</h1>
        <form action="{{ route('frontend.thanhtoan.confirm') }}" method="POST">
            @csrf
            <!-- Giỏ hàng -->
            @if (session()->has('gioHangData'))
                @php $gioHangData = session('gioHangData'); @endphp
                @if (!empty($gioHangData))
                    <div class="card mb-5 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Giỏ Hàng</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gioHangData as $gh)
                                        <input type="hidden" name="sp_ma[]" value="{{ $gh['sp_ma'] }}">
                                        <input type="hidden" name="sp_dh_soluong[]" value="{{ $gh['sp_soluong'] }}">
                                        <input type="hidden" name="sp_dh_gia[]" value="{{ $gh['sp_gia'] }}">

                                        <tr>
                                            <td><img src="{{ $gh['sp_hinh'] }}" alt="{{ $gh['sp_ten'] }}" width="80">
                                            </td>
                                            <td>{{ $gh['sp_ten'] }}</td>
                                            <td>{{ number_format($gh['sp_gia'], 0, ',', '.') }} VND</td>
                                            <td>{{ $gh['sp_soluong'] }}</td>
                                            <td>{{ number_format($gh['sp_gia'] * $gh['sp_soluong'], 0, ',', '.') }} VND</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Tổng tiền -->
                            <div class="text-end">
                                <h5 class="text-danger">
                                    <b style="color: #000">Tổng tiền:</b>
                                    {{ number_format(array_sum(array_map(function ($gh) {return $gh['sp_gia'] * $gh['sp_soluong'];}, $gioHangData)),0,',','.') }}
                                    VND
                                </h5>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info text-center">Giỏ hàng của bạn đang trống.</div>
                @endif
            @else
                <div class="alert alert-info text-center">Giỏ hàng của bạn đang trống.</div>
            @endif

            <!-- Thông tin thanh toán và giao hàng -->
            @guest
                <div class="row g-4">
                    <!-- Thông Tin Khách Hàng -->

                    <div class="col-md-8">
                        <div class="card shadow-sm">
                            <div class="card-header bg-secondary text-white">
                                <h4 class="mb-0">Thông Tin Khách Hàng</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="kh_tendangnhap">Tên đăng nhập</label>
                                        <input type="text" class="form-control" id="kh_tendangnhap" name="kh_tendangnhap"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kh_matkhau">Mật khẩu</label>
                                        <input type="password" class="form-control" id="kh_matkhau" name="kh_matkhau" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="kh_diachi">Địa chỉ khách hàng</label>
                                        <input type="text" class="form-control" id="kh_diachi" name="kh_diachi" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kh_dienthoai">Số điện thoại</label>
                                        <input type="text" class="form-control" id="kh_dienthoai" name="kh_dienthoai"
                                            required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="kh_email">Email</label>
                                        <input type="email" class="form-control" id="kh_email" name="kh_email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kh_ten">Họ và Tên</label>
                                        <input type="text" class="form-control" id="kh_ten" name="kh_ten" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="kh_ngaysinh">Ngày sinh</label>
                                        <input type="date" class="form-control" id="kh_ngaysinh" name="kh_ngaysinh" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Giới tính</label>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="nam" name="kh_gioitinh"
                                                value="0" required>
                                            <label for="nam">Nam</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="nu" name="kh_gioitinh"
                                                value="1">
                                            <label for="nu">Nữ</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hình thức thanh toán và thông tin đơn hàng -->
                    <div class="col-md-4">
                        <!-- Hình thức thanh toán -->
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header bg-info text-white">
                                <h4 class="mb-0">Hình thức thanh toán</h4>
                            </div>
                            <div class="card-body">
                                @foreach ($dsHttt as $httt)
                                    <div class="form-check">
                                        <input type="radio" name="httt_ma" id="{{ $httt->httt_ma }}"
                                            value="{{ $httt->httt_ma }}" class="form-check-input" required>
                                        <label for="{{ $httt->httt_ma }}"
                                            class="form-check-label">{{ $httt->httt_ten }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Thông tin đơn hàng -->
                        <div class="card shadow-sm">
                            <div class="card-header bg-success text-white">
                                <h4 class="mb-0">Thông tin đơn hàng</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="dh_ngaygiao" class="form-label">Ngày giao</label>
                                    <input type="date" name="dh_ngaygiao" id="dh_ngaygiao" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="dh_noigiao" class="form-label">Địa chỉ giao hàng</label>
                                    <input type="text" name="dh_noigiao" id="dh_noigiao" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endguest
            @auth
                <?php $kh = auth()->user(); ?>
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h4 class="mb-0">Thông Tin Khách Hàng</h4>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="kh_tendangnhap" value="{{$kh->username}}">
                        <input type="hidden" name="kh_cu" value="1">
                        <table class="" border="0">
                            <tr>
                                <td>SĐT</td>
                                <td>: {{auth()->user()->kh_dienthoai}}</td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td>: {{auth()->user()->kh_diachi}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <!-- Hình thức thanh toán -->
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header bg-info text-white">
                                <h4 class="mb-0">Hình thức thanh toán</h4>
                            </div>
                            <div class="card-body">
                                @foreach ($dsHttt as $httt)
                                    <div class="form-check">
                                        <input type="radio" name="httt_ma" id="{{ $httt->httt_ma }}"
                                            value="{{ $httt->httt_ma }}" class="form-check-input" required>
                                        <label for="{{ $httt->httt_ma }}"
                                            class="form-check-label">{{ $httt->httt_ten }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Thông tin đơn hàng -->
                        <div class="card shadow-sm">
                            <div class="card-header bg-success text-white">
                                <h4 class="mb-0">Thông tin đơn hàng</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="dh_ngaygiao" class="form-label">Ngày giao</label>
                                    <input type="date" name="dh_ngaygiao" id="dh_ngaygiao" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="dh_noigiao" class="form-label">Địa chỉ giao hàng</label>
                                    <input type="text" name="dh_noigiao" id="dh_noigiao" class="form-control" required value="{{$kh->kh_diachi}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            @endauth
            <div class="mt-4">
                <button type="submit" class="btn btn-primary btn-lg w-100">Xác Nhận Thanh Toán</button>
            </div>
        </form>
    </div>
@endsection
