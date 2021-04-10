@extends('layouts.app')

@section('content')
<div id="app">
  <div class="container">

    <p>
      <input type="number" v-model.number="left">
      +
      <input type="number" v-model.number="right">
      =
      {{ total }}
    </p>

    <p v-if="isComputedCalled" class="message">
      Computedが呼び出されました。
    </p>

  </div>
</div>
@endsection