@extends('Layout.index')

@section('Title','Ürün Listesi')

@section('Body')

@if ($products)
<h4 class="widgettitle nomargin shadowed">Ürün Listesi</h4>
<div class="widgetcontent bordered shadowed nopadding">
    <table class="table table-bordered" id="dyntable">
        <thead>
        <tr>
            <th class="head0 nosort"></th>
            <th class="head0">Ürün Adı</th>
            <th class="head1">Resim</th>
            <th class="head1">Ücret</th>

            <th class="head0">İşlem</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
        <tr class="gradeX">
            <td style="width:20px"></td>
            <td>{{ $product['name'] }}</td>
            <td><a href="{{ADMIN_URL}}products/images/{{ $product['productID'] }}" class="btn" target="_blank"><i class="iconfa-picture"></i> Resimler</a></td>
            <td>{{ $product['price'] }}</td>

            <td class="center" style="width:280px">
                <a href="{{ADMIN_URL}}products/addImage/{{ $product['productID'] }}" class="btn dropdown-toggle"><i class="iconfa-picture"></i> Resim Ekle</a>
                <a href="{{ADMIN_URL}}products/update/{{ $product['productID'] }}" class="btn dropdown-toggle"><i class="iconfa-edit"></i> Düzenle</a>
                <a href="{{ADMIN_URL}}products/delete/{{ $product['productID'] }}" onclick="return confirm('Silmek istediğinizden emin misiniz?')" class="btn dropdown-toggle"><i class="iconfa-remove"></i> Sil</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
<div class="alert alert-info">
    <strong>Dikkat!</strong> Henüz hiç ürün eklenmemiş!
</div>
@endif

@endsection