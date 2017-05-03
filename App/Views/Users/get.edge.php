@extends('Layout.index')

@section('Title','Kullanıcı Listesi')

@section('Body')

    @if ($users)
    <h4 class="widgettitle nomargin shadowed">Kullanıcı Listesi</h4>
    <div class="widgetcontent bordered shadowed nopadding">
        <table class="table table-bordered" id="dyntable">
            <thead>
            <tr>
                <th class="head0 nosort"></th>
                <th class="head0">Kullanıcı Adı</th>
                <th class="head1">Ad Soyad</th>
                <th class="head0">Rütbe</th>
                <th class="head0">İşlem</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
            <tr class="gradeX">
                <td style="width:1px"></td>
                <td>{{ $user['username'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['rank']==3?'Yönetici':($user['rank']==2?'Aşçı':'Garson') }}</td>
                <td class="center" style="width:150px">
                    <a href="{{ADMIN_URL}}users/update/{{$user['userID']}}" class="btn dropdown-toggle"><i class="iconfa-edit"></i> Düzenle</a>
                    <a href="{{ADMIN_URL}}users/delete/{{$user['userID']}}" onclick="return confirm('Silmek istediğinizden emin misiniz?')" class="btn dropdown-toggle"><i class="iconfa-remove"></i> Sil</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="alert alert-info">
        <strong>Dikkat!</strong> Henüz hiç kullanıcı eklenmemiş!
    </div>
    @endif

@endsection