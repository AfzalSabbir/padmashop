<div class="col-sm-12 col-md-3 pull-left mb-3 none">
  <div class="row">    
    @if(isset($where) && $total > 0)

      <div class="alert alert-success" style="height: 38px; padding: 8px; margin-bottom: 8px;">
        <span class="text-success">Total <strong>{{ $total }}</strong> entities found</span>
      </div>

    @elseif(!isset($where))

      <div class="col-sm-12"  style="float: left">
        <label style="display: inline-block;">Show </label>
        <select style="display: inline-block; width: 75px; cursor: pointer; padding: 8px;" select class="form-control" onchange="location = this.value;">
          <option value="{{ route($route) }}?items=20&page=1" {{ $items == 20 ? 'selected' : '' }}>20</option>
          <option value="{{ route($route) }}?items=50&page=1" {{ $items == 50 ? 'selected' : '' }}>50</option>
          <option value="{{ route($route) }}?items=100&page=1" {{ $items == 100 ? 'selected' : '' }}>100</option>
          <option value="{{ route($route) }}?items=250&page=1" {{ $items == 250 ? 'selected' : '' }}>250</option>
        </select>
        <label style="display: inline-block;"> entries</label>
      </div>

    @endif
  </div>
</div>
