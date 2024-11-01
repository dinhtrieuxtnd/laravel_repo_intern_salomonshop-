@extends('frontend/layout/master')

@section('title')
    Đăng nhập
@endsection

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Đăng nhập</h3>
                    </div>
                    <div class="card-body">
                        <!-- Hiển thị thông báo lỗi nếu có -->
                        @if (!empty($errors->all()))
                        <ul>
                            @foreach ($errors->all() as $e)
                                <li class="alert alert-danger text-center">
                                    {{ $e }}
                                </li>
                            @endforeach
                           </ul>
                        @endif

                        <form action="{{ route('auth.login.login') }}" method="POST">
                            @csrf

                            <!-- Tên đăng nhập -->
                            <div class="mb-3">
                                <label for="kh_tendangnhap" class="form-label">Tên đăng nhập</label>
                                <input type="text" id="kh_tendangnhap" name="kh_tendangnhap" class="form-control" required autofocus>
                            </div>

                            <!-- Mật khẩu -->
                            <div class="mb-3">
                                <label for="kh_matkhau" class="form-label">Mật khẩu</label>
                                <input type="password" id="kh_matkhau" name="kh_matkhau" class="form-control" required>
                            </div>

                            <!-- Ghi nhớ đăng nhập -->
                            {{-- <div class="mb-3 form-check">
                                <input type="checkbox" id="remember" name="remember" class="form-check-input">
                                <label for="remember" class="form-check-label">Ghi nhớ đăng nhập</label>
                            </div> --}}

                            <!-- Nút đăng nhập -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                            </div>
                        </form>

                        <!-- Đường dẫn đăng ký hoặc quên mật khẩu -->
                        <div class="text-center mt-3">
                            <span>Chưa có tài khoản?<a href="{{-- route('frontend.register') --}}"> Đăng ký ngay</a></span><br>
                            <span>Hoặc <a href="{{-- route('frontend.password.reset') --}}">Quên mật khẩu?</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
