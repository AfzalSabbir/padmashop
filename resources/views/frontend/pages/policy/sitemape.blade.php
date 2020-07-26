@extends('frontend.layouts.master')


@section('content')
<div class="container mt-5 mb-5">
  <div class="card">
    @if(!empty($sitemapeInfo))

      <div class="card-header">
          <h3 class="mb-0">{{ $sitemapeInfo->title }}</h2>
      </div>

      <div class="card-body">
        {!! $sitemapeInfo->content !!}
      </div>
    @else
      <div class="card-body">
          <p>Data Not Found....!</p>
      </div>
    @endif
  </div>
</div>
@endsection

