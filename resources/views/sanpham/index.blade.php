@extends('layout/master')

@section('title')
    Danh sách sản phẩm
@endsection

@section('content')
    <h1>Danh sách sản phẩm</h1>
    <div class="mb-3">
        <a href="{{route('sp.create')}}" class="btn btn-primary">Thêm mới sản phẩm</a>
    </div>
    <table class="table table-bordered">
        <tr class="table-secondary">
            <th>Mã SP</th>
            <th>Tên SP</th>
            <th>Giá</th>
            <th>Giá cũ</th>
            <th>Mô tả ngắn</th>
            <th>Mô tả chi tiết</th>
            <th>Ngày cập nhật</th>
            <th>Số lượng</th>
            <th>Loại sản phẩm</th>
            <th>Nhà sản xuất</th>
            <th>Khuyến mãi</th>
            <th>Hành động</th>
        </tr>
        @foreach ($dssp as $sp)
            <tr>
                <td>{{ $sp->sp_ma }}</td>
                <td>{{ $sp->sp_ten }}</td>
                <td>{{ number_format($sp->sp_gia, 0, '.', ',') }}</td>
                <td>{{ number_format($sp->sp_giacu, 0, '.', ',') }}</td>
                <td>{{ $sp->sp_mota_ngan }}</td>
                <td>{{ $sp->sp_mota_chitiet }}</td>
                <td>{{ $sp->sp_ngaycapnhat }}</td>
                <td>{{ $sp->sp_soluong }}</td>
                <td>
                    @if($sp->loaiSP)
                        {{ $sp->loaiSP->lsp_ten }}
                    @endif
                </td>
                <td>
                    @if($sp->nsx)
                        {{ $sp->nsx->nsx_ten }}
                    @endif
                </td>
                <td>
                    @if ($sp->khuyenMai)
                        {{ $sp->khuyenMai->km_ten }}
                    @endif
                </td>
                <td>
                    <a href="{{ route('sp.edit', ['sp_ma' => $sp->sp_ma]) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('sp.delete') }}" style="display: inline" method="POST" name="form-delete">
                        @csrf
                        <input type="hidden" value="{{ $sp->sp_ma }}" name="sp_ma">
                        <button class="btn btn-danger">Xoá</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
