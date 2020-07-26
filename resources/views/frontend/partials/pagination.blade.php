<div class="container-fluid">
  <div class="row">
    @if ($total > 0)
    <div class="col-sm-6 pull-right">
      <label  style="float: left; margin-top: 9px;">{{ 'Showing '.($PreviousPageLastSN+1).' to '}} {{ ($PreviousPageLastSN+$items) >= $total ? $total : $PreviousPageLastSN+$items }}{{' of '.$total.' entries' }}</label>
    </div>
    @else
    <div class="col-xs-12 col-md-12 pull-right">
      <h3 class="alert alert-warning text-center" style="float: left; color: red; width: 100%;">{{ __('frontend/default.no_data') }}</h3>
    </div>
    @endif

    <div class="col-sm-6 pull-left">
      @if(isset($where))
      <label style="float: right">{{ $products->appends(\Request::query())->render() }}</label>
      @else
      <label style="float: right">{{ $products->appends(['items' => $items])->links() }}</label>
      @endif
      
    </div>
  </div>
</div>
