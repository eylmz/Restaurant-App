@extends('Layout.index')

@section('Title','Sipariş Listesi')

@section('Body')

@if ($baskets)
<h4 class="widgettitle nomargin shadowed">Sipariş Listesi</h4>
<div class="widgetcontent bordered shadowed nopadding">
    <table class="table table-bordered" id="dyntable">
        <thead>
        <tr>
            <th class="head0 nosort"></th>
            <th class="head0">Ürün Adı</th>
            <th class="head0">Adet</th>
            <th class="head0">Fiyatı</th>
            <th class="head0">Tutar</th>
            <th class="head0">Durum</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($baskets as $basket)
        <tr class="gradeX">
            <td style="width:20px"></td>
            <td>{{ $basket['name'] }}</td>
            <td>{{ $basket['piece'] }}</td>
            <td>{{ $basket['price'] }}</td>
            <td>{{ $basket['piece'] * $basket['price'] }}</td>
            <td>{{ $basket['status'] == 2 ? 'Onaylı' : $basket['status'] == 1 ? 'Onay Bekliyor' : 'Boş' }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <form action="" style="padding:10px" method="post">
        <button class="btn" name="kapat" value="1"><i class="iconfa-remove"></i> Kapat</button>
    </form>
</div>
@else
<div class="alert alert-info">
    <strong>Dikkat!</strong> Henüz bu masaya sipariş girilmemiş!
</div>
@endif

@endsection