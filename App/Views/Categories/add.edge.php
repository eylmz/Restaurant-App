@extends('Layout.index')

@section('Title','Kategori Ekle')

@section('Body')

@if ($alert)
<div class="alert alert-{{ $alertType }}">
    <strong>Dikkat!</strong> {{ $alert }}
</div>
@endif

<h4 class="widgettitle nomargin shadowed">Kategori Ekle</h4>
<div class="widgetcontent bordered shadowed nopadding">
    <form class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
        <p>
            <label>Kategori Adı</label>
            <span class="field"><input type="text" name="name" value="{{ $name }}" id="firstname2" class="input-xxlarge"></span>
        </p>

        <p>
            <label>Sıralama</label>
            <span class="field"><input type="text" name="sort" value="{{ $sort }}" id="lastname2" class="input-xxlarge"></span>
        </p>

        <p>
            <label>Resim</label>
            <span class="field">
                <input type="file" name="image" id="email2" class="input-xxlarge">
                @if ($file)
                    <br/>Boş bırakırsanız değişmez
                @endif
            </span>
        </p>

        <p>
            <label>Üst Kategori</label>
            <span class="field">
                <select name="parentID">
                    <option value="0">Üst Kategori Yok</option>
                    {{ App\Helpers\MyHelpers::categoryShow($categories,$currentCategory) }}
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