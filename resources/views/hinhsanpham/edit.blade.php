@extends('layout/master')

@section('title')
    Sửa hình sản phẩm
@endsection

@section('content')
    <h1>Sửa hình sản phẩm</h1>
    <form action="{{ route('hsp.update') }}" name="form-edit" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="hsp_ma" value="{{ $editRecord->hsp_ma }}">
        <div class="mb_3">
            <label for="sp_ma" class="form-label">Sản phẩm:</label>
            <select name="sp_ma" id="sp_ma" class="form-control">
                <option value="" disabled>--Chọn sản phẩm--</option>
                @foreach ($dsSp as $sp)
                    @if ($sp->sp_ma == $editRecord->sp_ma)
                        <option value="{{ $sp->sp_ma }}" selected>
                            {{ $sp->sp_ten }}
                        </option>
                    @else
                        <option value="{{ $sp->sp_ma }}">
                            {{ $sp->sp_ten }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="hsp_taptin" class="form-label">Hình ảnh:</label>
            @if (isset( $editRecord->hsp_tentaptin) && !empty($editRecord->hsp_tentaptin))
                <div class="mb-3" style="border: 1px dashed black; padding: 8px">
                    <img style="width: 30%" src="/storage/uploads/{{ $editRecord->hsp_tentaptin }}" alt="">
                </div>
            @endif

            <input type="file" name="hsp_taptin" id="hsp_taptin" class="form-control">
        </div>
        <div class="mb-3 d-grid gap-2">
            <button class="btn btn-primary">Lưu</button>
            <a href="{{route('hsp.index')}}" class="btn btn-danger">Huỷ</a>
        </div>
    </form>
@endsection
