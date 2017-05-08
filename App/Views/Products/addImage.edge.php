@extends('Layout.index')

@section('Title','Ürüne Resim Ekle')

@section('Body')

@if ($alert)
<div class="alert alert-{{ $alertType }}">
    <strong>Dikkat!</strong> {{ $alert }}
</div>
@endif

<h4 class="widgettitle nomargin shadowed">Ürüne Resim Ekle</h4>
<div class="widgetcontent bordered shadowed nopadding">
    <form class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
        <p>
            <label>Resimler</label>
            <span class="field">
                <input type="file" name="images[]" id="images">
            </span>
        </p>

        <p class="stdformbutton">
            <button class="btn btn-primary" name="gonder">Gönder</button>
            <button type="reset" class="btn">Temizle</button>
        </p>
    </form>
</div>

<script type="text/javascript">
    jQuery('#images').fileuploader({

    });
</script>
@endsection