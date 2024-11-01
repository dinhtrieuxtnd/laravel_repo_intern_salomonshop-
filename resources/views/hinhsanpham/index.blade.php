@extends('layout/master')

@section('title')
    Danh sách hình sản phẩm
@endsection

@section('content')
    <h1>Danh sách hình sản phẩm</h1>
    <div class="mb-3">
        <a href="{{ route('hsp.create') }}" class="btn btn-primary">Thêm mới hình sản phẩm</a>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Mã HSP</th>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Hành động</th>
        </tr>
        @foreach ($dsHsp as $hsp)
            <tr>
                <td>{{ $hsp->hsp_ma }}</td>
                <td>
                    <img src="/storage/uploads/{{ $hsp->hsp_tentaptin }}" alt="" class="img-fluid" style="width: 100px">
                </td>
                <td>{{ $hsp->sanPham->sp_ten }}</td>
                <td>
                    <a href="{{ route('hsp.edit', ['hsp_ma' => $hsp->hsp_ma]) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('hsp.delete') }}" style="display: inline" method="POST" name="form-delete">
                        @csrf
                        <input type="hidden" value="{{ $hsp->hsp_ma }}" name="hsp_ma">
                        <button class="btn btn-danger">Xoá</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
