@extends('admin.index')
@section('content')
<div style="text-align:center" id="quanly">
    <table width="100%" cellspacing="0" cellpadding="0">
        <th>STT</th>
        <th>Tên chủng loại</th>
        <td colspan="2">
            <div>
                <a href="{{route('themchungloai')}}" title="Thêm">
                    <i class="fa fa-plus-circle" aria-hidden="true" style="color:red"></i>
                </a>
            </div>
        </td>
            <?php $stt = 0; ?>
            @foreach($ds_chungloai as $chungloai)
            <tr>
                <td>{{$stt = $stt + 1}}</td>
                <td align="center">{{$chungloai->TenCL}}</td>
                <td>
                    <div>
                        <a href="xoa/{{$chungloai->idCL}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" title="Xóa"><i class="fa fa-trash-o" aria-hidden="true" style="color: #895FA4"></i>
                        </a>
                    </div>
                </td>
                <td>
                    <div>
                        <a href="sua-chung-loai/{{$chungloai->idCL}}" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color: #5021FE"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach		
    </table>
</div>
@endsection