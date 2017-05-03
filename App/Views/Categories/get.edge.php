@extends('Layout.index')

@section('Title','Kategori Listesi')

@section('Body')

@if ($subcategory)
<div class="alert alert-info">
    <strong>Dikkat!</strong> <b>{{ $subcategory }}</b> isimli kategorinin alt kategorilerini listeliyorsunuz.
</div>
@endif

@if ($categories)
<h4 class="widgettitle nomargin shadowed">Kategori Listesi</h4>
<div class="widgetcontent bordered shadowed nopadding">
    <table class="table table-bordered" id="dyntable">
        <thead>
        <tr>
            <th class="head0 nosort"></th>
            <th class="head0">Kategori Adı</th>
            <th class="head1">Resim</th>
            <th class="head1">Sıralama</th>

            <th class="head0">İşlem</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
        <tr class="gradeX">
            <td style="width:20px"></td>
            <td>{{ $category['name'] }}</td>
            <td><a href="{{PUBLIC_URL}}Uploads/Categories/{{ $category['image'] }}" target="_blank"><img src="{{PUBLIC_URL}}Uploads/Categories/{{ $category['image'] }}" style="height:50px; width:50px"></a></td>
            <td>{{ $category['sort'] }}</td>

            <td class="center" style="width:280px">
                <a href="{{ADMIN_URL}}categories/get/{{$category['categoryID']}}" class="btn dropdown-toggle"><i class="iconfa-list"></i> Alt Kategorileri</a>
                <a href="{{ADMIN_URL}}categories/update/{{$category['categoryID']}}" class="btn dropdown-toggle"><i class="iconfa-edit"></i> Düzenle</a>
                <a href="{{ADMIN_URL}}categories/delete/{{$category['categoryID']}}" onclick="return confirm('Silmek istediğinizden emin misiniz?')" class="btn dropdown-toggle"><i class="iconfa-remove"></i> Sil</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
<div class="alert alert-info">
    <strong>Dikkat!</strong> Henüz hiç kategori eklenmemiş!
</div>
@endif

@endsection