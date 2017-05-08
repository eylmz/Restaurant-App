@extends('Layout.index')

@section('Title','Ürün Düzenle')

@section('Body')

@if ($alert)
<div class="alert alert-{{ $alertType }}">
    <strong>Dikkat!</strong> {{ $alert }}
</div>
@endif

<h4 class="widgettitle nomargin shadowed">Ürün Düzenle</h4>
<div class="widgetcontent bordered shadowed nopadding">
    <form class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
        <p>
            <label>Ürün Adı</label>
            <span class="field"><input type="text" name="name" value="{{ $name }}" id="firstname2" class="input-xxlarge"></span>
        </p>

        <p>
            <label>Kısa Açıklama</label>
            <span class="field"><input type="text" name="description" value="{{ $description }}" id="lastname2" class="input-xxlarge"></span>
        </p>

        <p>
            <label>Ücret</label>
            <span class="field"><input type="text" name="price" value="{{ $price }}" class="input-xxlarge"></span>
        </p>

        <p>
            <label>Kategori</label>
            <span class="field">
                <select name="category">
                    <option value="0">Kategori Seçiniz</option>
                    {{ App\Helpers\MyHelpers::categoryShow($categories,$currentCategory,$parentID,"") }}
                </select>
            </span>
        </p>

        <p class="stdformbutton">
            <button class="btn btn-primary">Gönder</button>
            <button type="reset" class="btn">Temizle</button>
        </p>
    </form>
</div>
@endsection