@extends('Layout.index')

@section('Title','Sipariş Listesi')

@section('Body')

@if ($baskets)
<h4 class="widgettitle nomargin shadowed">Sipariş Listesi</h4>
<div class="widgetcontent bordered shadowed nopadding">
    <?php
        $toplam = 0;
    ?>
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
            <td>{{ $basket['price'] }} TL</td>
            <td>{{ $basket['piece'] * $basket['price'] }} TL</td>
            <td>{{ $basket['status'] == 2 ? 'Onaylı' : $basket['status'] == 1 ? 'Onay Bekliyor' : 'Boş' }}</td>
        </tr>

        <?php $toplam += $basket['piece'] * $basket['price']; ?>

        @endforeach
        </tbody>
    </table>

    <div style="padding:10px; padding-bottom:0"><b>Toplam Tutar : </b><?=$toplam?> TL</div>

    <form action="" style="padding:10px" method="post">
        <button class="btn" name="kapat" value="1" onclick="return confirm('Kapatmak istediginizden emin misiniz?')"><i class="iconfa-remove"></i> Kapat</button>
    </form>
</div>
@else
<div class="alert alert-info">
    <strong>Dikkat!</strong> Henüz bu masaya sipariş girilmemiş!
</div>
@endif

@endsection