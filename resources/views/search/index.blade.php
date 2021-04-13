@extends('layouts.app')

@section('content')

<div>
    <h1>サウナグッズ検索</h1>
    
    {!! Form::open(['action' => 'SearchController@index']) !!}
    @csrf
    <div class="row">
        <div class="form-group col-10">
            {!! Form::text('keyword', $keyword, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-2">
            {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>

@if($items > 0)
    <h2>&quot;{{ $keyword }}&quot;の検索結果</h2>
    <table class="bg-muted">
        <thead class="table table-striped table-bordered">
            <tr>
                <th class="text-center">画像</th>
                <th>商品名</th>
                <th>価格</th>
            </tr>
        </thead>
        <tbody class="table table-striped table-bordered">
            @foreach($items as $item)
            <tr>
                <td class="text-center">
                    <img src="{{ $item['mediumImageUrls'] }}">
                </td>
                <td>
                    <a href="{{ $item['itemUrl'] }}" class="text-white">{{ $item['itemName'] }}</a>
                </td>
                <td>
                    &yen;{{ $item['itemPrice'] }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>検索結果はありません。</p>
@endif

@endsection