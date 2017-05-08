@extends('Layout.index')

@section('Title','Masa Listesi')

@section('Body')

@if ($desks)
<h4 class="widgettitle nomargin shadowed">Masa Listesi</h4>
<div class="widgetcontent bordered shadowed nopadding">
    <table class="table table-bordered" id="dyntable">
        <thead>
        <tr>
            <th class="head0 nosort"></th>
            <th class="head0">Masa Adı</th>

            <th class="head0">İşlem</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($desks as $desk)
        <tr class="gradeX">
            <td style="width:20px"></td>
            <td>{{ $desk['name'] }}</td>

            <td class="center" style="width:150px">
                <a href="{{ADMIN_URL}}desks/update/{{$desk['desksID']}}" class="btn dropdown-toggle"><i class="iconfa-edit"></i> Düzenle</a>
                <a href="{{ADMIN_URL}}desks/delete/{{$desk['desksID']}}" onclick="return confirm('Silmek istediğinizden emin misiniz?')" class="btn dropdown-toggle"><i class="iconfa-remove"></i> Sil</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
<div class="alert alert-info">
    <strong>Dikkat!</strong> Henüz hiç masa eklenmemiş!
</div>
@endif

@endsection