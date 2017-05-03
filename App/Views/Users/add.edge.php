@extends('Layout.index')

@section('Title','Kullanıcı Ekle')

@section('Body')

@if ($alert)
<div class="alert alert-{{ $alertType }}">
    <strong>Dikkat!</strong> {{ $alert }}
</div>
@endif

<h4 class="widgettitle nomargin shadowed">Kullanıcı Ekle</h4>
<div class="widgetcontent bordered shadowed nopadding">
    <form class="stdform stdform2" method="post" action="">
        <p>
            <label>Ad Soyad</label>
            <span class="field"><input type="text" name="name" value="{{ $name }}" id="firstname2" class="input-xxlarge"></span>
        </p>

        <p>
            <label>Kullanıcı Adı</label>
            <span class="field"><input type="text" name="username" value="{{ $username }}" id="lastname2" class="input-xxlarge"></span>
        </p>

        <p>
            <label>Şifre</label>
            <span class="field">
                <input type="password" name="password" id="email2" class="input-xxlarge">
                @if ($rank)
                    <br/>Boş bırakırsanız değişmez
                @endif
            </span>
        </p>

        <p>
            <label>Rütbe</label>
            <span class="field">
                <select name="rank">
                    <option value="1" @if ($rank == 1) selected @endif>Garson</option>
                    <option value="2" @if ($rank == 2) selected @endif>Aşçı</option>
                    <option value="3" @if ($rank == 3) selected @endif>Yönetici</option>
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