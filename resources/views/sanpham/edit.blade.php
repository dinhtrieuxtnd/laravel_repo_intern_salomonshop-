@extends('layout/master')

@section('title')
    Sửa sản phẩm
@endsection

@section('content')
    <h1>Sửa sản phẩm có mã #{{ $editRecord->sp_ma }}</h1>
    <form action="{{ route('sp.update') }}" id="form-edit" name="form-edit" method="POST">
        @csrf
        <input type="hidden" name="sp_ma" id="" value="{{ $editRecord->sp_ma }}">
        <div class="mb-3">
            <label for="sp_ten" class="form-label">Tên loại sản phẩm:</label>
            <input type="text" name="sp_ten" id="sp_ten" class="form-control" value="{{ $editRecord->sp_ten }}">
        </div>
        <div class="mb-3">
            <label for="sp_gia" class="form-label">Giá:</label>
            <input type="number" name="sp_gia" id="sp_gia" class="form-control" value="{{ $editRecord->sp_gia }}">
        </div>
        <div class="mb-3">
            <label for="sp_giacu" class="form-label">Giá cũ:</label>
            <input type="number" name="sp_giacu" id="sp_giacu" class="form-control" value="{{ $editRecord->sp_giacu }}">
        </div>
        <div class="mb-3">
            <label for="sp_mota_ngan" class="form-label">Mô tả ngắn:</label>
            <textarea name="sp_mota_ngan" id="sp_mota_ngan" class="form-control">{{ $editRecord->sp_mota_ngan }}</textarea>
        </div>
        <div class="mb-3">
            <label for="sp_mota_chitiet" class="form-label">Mô tả chi tiết:</label>
            <textarea name="sp_mota_chitiet" id="sp_mota_chitiet" class="form-control" rows="3">{{ $editRecord->sp_mota_chitiet }}</textarea>
        </div>
        <div class="mb-3">
            <label for="sp_ngaycapnhat" class="form-label">Ngày cập nhật:</label>
            <input type="datetime-local" name="sp_ngaycapnhat" id="sp_ngaycapnhat" class="form-control"
                value="{{ $editRecord->sp_ngaycapnhat }}">
        </div>
        <div class="mb-3">
            <label for="sp_soluong" class="form-label">Số lượng:</label>
            <input type="number" name="sp_soluong" id="sp_soluong" class="form-control"
                value="{{ $editRecord->sp_soluong }}">
        </div>
        <div class="mb-3">
            <label for="lsp_ma" class="form-label">Loại sản phẩm:</label>
            <select name="lsp_ma" id="lsp_ma" class="form-control">
                <option value="" disabled selected>--Chọn loại sản phẩm--</option>
                @foreach ($dsLsp as $lsp)
                    @if ($lsp->lsp_ma == $editRecord->lsp_ma)
                        <option value="{{ $lsp->lsp_ma }}" selected>
                            {{ $lsp->lsp_ten }}
                        </option>
                    @else
                        <option value="{{ $lsp->lsp_ma }}">
                            {{ $lsp->lsp_ten }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nsx_ma" class="form-label">Nhà sản xuất:</label>
            <select name="nsx_ma" id="nsx_ma" class="form-control">
                <option value="" disabled>--Chọn nhà sản xuất--</option>
                @foreach ($dsNsx as $nsx)
                    @if ($nsx->nsx_ma == $editRecord->nsx_ma)
                        <option value="{{ $nsx->nsx_ma }}" selected>
                            {{ $nsx->nsx_ten }}
                        </option>
                    @else
                        <option value="{{ $nsx->nsx_ma }}">
                            {{ $nsx->nsx_ten }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="km_ma" class="form-label">Khuyến mãi:</label>
            <select name="km_ma" id="km_ma" class="form-control">
                <option value="" disabled>--Chọn khuyến mãi--</option>
                @foreach ($dsKm as $km)
                    @if ($km->km_ma == $editRecord->km_ma)
                        <option value="{{ $km->km_ma }}" selected>
                            {{ $km->km_ten }} -- Từ {{ $km->km_tungay }} đến {{ $km->km_denngay }}
                        </option>
                    @else
                        <option value="{{ $km->km_ma }}">
                            {{ $km->km_ten }} -- Từ {{ $km->km_tungay }} đến {{ $km->km_denngay }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3 d-grid gap-2">
            <button class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('sp.index') }}" class="btn btn-danger">Huỷ</a>
        </div>
    </form>
@endsection
