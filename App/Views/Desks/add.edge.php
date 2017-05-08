@extends('Layout.index')

@section('Title','Masa Ekle')

@section('Body')

@if ($alert)
<div class="alert alert-{{ $alertType }}">
    <strong>Dikkat!</strong> {{ $alert }}
</div>
@endif

<h4 class="widgettitle nomargin shadowed">Masa Ekle</h4>
<div class="widgetcontent bordered shadowed nopadding">
    <form class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
        <p>
            <label>Masa Adı</label>
            <span class="field"><input type="text" name="name" value="{{ $name }}" id="firstname2" class="input-xxlarge"></span>
        </p>

        <p class="stdformbutton">
            <button class="btn btn-primary">Gönder</button>
            <button type="reset" class="btn">Temizle</button>
        </p>
    </form>
</div>

@endsection