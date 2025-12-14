@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection

@section('content')
<form class="form" action="/products/detail/update" method="post">
    @method('PATCH')
    @csrf
    <div class="detail_content">
        @foreach ($products as $product)
        <div class="detail_content-image">
            <input type="img" name="image" value="{{ $product['image'] }}" />
        </div>
        <div class="detail_content-right">
            <div class="form_group-title">
                <span class="form_label-item">商品名</span>
            </div>
            <div class="form_group-content">
                <input type="text" name="name" value="{{ $product['name'] }}" />
                <input type="hidden" name="id" value="{{ $product['id'] }}" />
            </div>
            <div class="form_group-title">
                <span class="form_label-item">値段</span>
            </div>
            <div class="form_group-content">
                <input type="number" name="price" value="{{ $product['price'] }}" />
                <input type="hidden" name="id" value="{{ $product['id'] }}" />
            </div>
        </div>
        <div class="detail_content-under">
            <div class="form_group-title">
                <span class="form_label-item">商品説明</span>
            </div>
            <div class="form_group-content">
                <input type="text" name="description" value="{{ $product['description'] }}">
                <input type="hidden" name="id" value="{{ $product['id'] }}" />
            </div>
        </div>
        <div class="form__button">
            <button class="form_button-return" type="button" onClick="history.back()">戻る</button>
            <button class="form_button-update" type="submit">登録</button>
        </div>
        @endforeach
    </div>
</form>
<form class="delete-form" action="/products/detail/delete" method="post">
    @method('DELETE')
    @csrf
    <div class="delete-form_button">
        <input type="hidden" name="id" value="{{ $product['id'] }}">
        <button class="delete-form_button-submit" type="submit">削除</button>
    </div>
</form>
@endsection