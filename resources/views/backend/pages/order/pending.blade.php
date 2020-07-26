@extends('backend.layouts.master')

@section('fav_title', 'Order | Pending Order')

@section('styles')
<style>
    .action{
        min-width: 70px;
    }
    .table th, .table td{
        vertical-align: middle;
    }
</style>
@endsection

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-shopping-basket"></i> {{ __('backend/order.order_management') }}{{--  / {{ __('backend/order.pending_order') }} --}}</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('backend/order.pending_order') }}</li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6"><h2><i class="fa fa-table"></i> {{ __('backend/order.pending_order') }}</h2></div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.order.pending') }}" method="post" class="none">
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col-md-2">
                            <div class="input-group date" id="fromDate" data-provide="datepicker">
                                <input type="text" class="form-control" name="from_date" value="{{ $app->request->input('from_date') }}" autocomplete="off">
                                <div class="input-group-addon">
                                    <span><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group date" id="toDate" data-provide="datepicker">
                                <input type="text" class="form-control" name="to_date" value="{{ $app->request->input('to_date') }}" autocomplete="off">
                                <div class="input-group-addon">
                                    <span><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <input type="text" name="mobile" class="form-control" placeholder="mobile" value="{{ $app->request->input('mobile') }}">
                        </div>

                        <div class="col-md-2">
                            <input type="text" name="id" class="form-control" placeholder="order id" value="{{ $app->request->input('id') }}">
                        </div>

                        <div class="col-md-2">
                            <select class="form-control" name="status_choose">
                                <option disabled="" selected="">--Status--</option>
                                <option value="0" {{ $app->request->input('status_choose') == '0' ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ $app->request->input('status_choose') == '1' ? 'selected' : '' }}>Received</option>
                                <option value="2" {{ $app->request->input('status_choose') == '2' ? 'selected' : '' }}>Processing</option>
                                {{-- <option value="3">On the way</option>
                                <option value="4">Delivered</option> --}}
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit">{{ __('backend/default.search') }}</button>
                        </div>
                    </div>
                </form>

                @php
                $permissions = \App\Models\Menu::orderBy('id', 'desc')->where('url', substr(url()->current(), 1+strlen(url('/'))))
                ->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
                $bodyMenu = \App\Models\Role::where('role', Auth::guard('admin')->user()->admin_role)->first();
                @endphp

                @php
                    // Pagination Serial
                    if (request()->filled('page')){
                        $PreviousPageLastSN = $items*(request()->page-1); //PreviousPageLastSerialNumber
                        $PageNumber = request()->page;
                    }
                    else{
                        $PreviousPageLastSN = 0; //PreviousPageLastSerialNumber
                        $PageNumber = 1;
                    }

                    //Last Page Items Change Restriction
                    if ($PageNumber*$items > $total + $items){
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        die();
                    }
                @endphp

                <div class="row mx-0 mb-2 alert-secondary pt-3 px-1 br-2">
                    @include('backend.partials.page_numbering', ['route' => 'admin.order.pending'])
                    <div class="col-sm-12 col-md-9 pull-right text-right pt-2 none">
                        <span class="cursor-help alert alert-secondary px-2 py-1" style="font-weight: bold; box-shadow: -5px 4px 6px #888896 !important;">Pending: {{ array_key_exists(0, $orders_sum) ? $orders_sum[0][0]->total : '0' }}</span>
                        <span class="cursor-help alert alert-info px-2 py-1" style="font-weight: bold; box-shadow: -2px 2px 4px #888896 !important;">Received: {{ array_key_exists(1, $orders_sum) ? $orders_sum[1][0]->total : '0' }}</span>
                        <span class="cursor-help alert alert-warning px-2 py-1" style="font-weight: bold; box-shadow: 0px 0px 4px #888896 !important;">Procesing: {{ array_key_exists(2, $orders_sum) ? $orders_sum[2][0]->total : '0' }}</span>
                        <span class="cursor-help alert alert-primary px-2 py-1" style="font-weight: bold; box-shadow: 2px -2px 4px #888896 !important;">On the way: {{ array_key_exists(3, $orders_sum) ? $orders_sum[3][0]->total : '0' }}</span>
                        <span class="cursor-help alert alert-success px-2 py-1" style="font-weight: bold; box-shadow: 5px -4px 6px #888896 !important;">Delivered: {{ array_key_exists(4, $orders_sum) ? $orders_sum[4][0]->total : '0' }}</span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover display">
                        <thead>
                            <th width="5%">{{ __('backend/default.sl') }}</th>
                            <th>{{ __('backend/default.order_id') }}</th>
                            <th>{{ __('backend/user.name') }}</th>
                            <th>{{ __('backend/default.address') }}<br>{{ __('backend/user.mobile') }}</th>
                            {{-- <th>{{ __('backend/default.address') }}</th> --}}
                            {{-- @if(Auth()->user()->admin_role != 1)
                                <th>{{ __('backend/default.price_quantity') }}</th>
                            @else --}}
                            <th class="text-center">{{ __('backend/default.total') }}</th>
                            {{-- @endif --}}
                            <th>{{ __('backend/default.quantity') }}</th>
                            <th>{{ __('backend/default.payment_gateway') }}</th>
                            <th>{{ __('backend/default.transaction_id') }}</th>
                            <th>{{ __('backend/default.status') }}</th>
                            <th class="action none" width="5%">{{ __('backend/default.action') }}</th>
                        </thead>

                        <tbody>
                            @foreach($orders as $order)
                                @php
                                    if($order->order_status == 0) {
                                        $status = 'Pending';
                                        $color_ = 'text-secondary';
                                        $icon_ = 'fa fa-hourglass-half';
                                    } else if($order->order_status == 1) {
                                        $status = 'Received';
                                        $color_ = 'text-info';
                                        $icon_ = 'fa fa-handshake-o';
                                    } else if($order->order_status == 2) {
                                        $status = 'Procesing';
                                        $color_ = 'text-warning';
                                        $icon_ = 'fa fa-spinner';
                                    } else if($order->order_status == 3) {
                                        $status = 'On the Way';
                                        $color_ = 'text-primary';
                                        $icon_ = 'fa fa-motorcycle';
                                    } else if($order->order_status == 4) {
                                        $status = 'Received';
                                        $color_ = 'text-success';
                                        $icon_ = 'fa fa-check';
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ '#'.\App\Helpers\CalculationHelper::generateVoucher($order->id) }}</td>
                                    <td>{{ $order->name }} {!! $order->is_return == 1 ? "<span class='badge badge-success'>return</span>" : ""  !!}</td>
                                    <td>{{ $order->address_ }}<br>{{ $order->alt_mobile }}</td>
                                    {{-- <td>{{ $order->address_ }}</td> --}}

                                    @if(Auth()->user()->admin_role != 1)
                                        @php
                                            $new_OrderItem = \App\Models\OrderItem::where(['order_id' => $order->id, 'admin_id' => Auth()->user()->id])->select(DB::raw('sum(quantity * price) as total'), DB::raw('sum(quantity) as quantity'))->get();
                                            //dd($new_OrderItem);
                                        @endphp
                                        <td class="text-right">
                                            {{ sprintf("%.2f",$new_OrderItem[0]->total) }}&nbsp;TK
                                        </td>
                                        <td class="text-center">
                                            {{ $new_OrderItem[0]->quantity }}
                                        </td>
                                    @else
                                        <td class="text-right">
                                            {{ sprintf("%.2f", $order->grand_total ? $order->grand_total : '0') }}&nbsp;TK
                                            {{-- {{ $order->grand_total ? $order->grand_total : $order->price + $order->shipping_cost }}&nbsp;TK --}}
                                        </td>
                                        <td class="text-center">
                                            {{ $order->qty }}
                                        </td>
                                    @endif

                                    <td>
                                        @if($order->is_paid == 1)
                                            {{ $order->gateway_title }}
                                        @else
                                            {{ "Not Paid" }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $order->txnid ? $order->txnid : 'N/A' }}
                                    </td>
                                    <td title="{{ $status }}" class="{{ $color_ }}">
                                        <i class="{{ $icon_ }}"></i> {{ $status }}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            @foreach($permissions->submenus as $key => $permission)
                                                @if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
                                                    @if($key == 0)
                                                        <a href="{{route($permission->route, $order->id)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('backend.partials.pagination', ['table' => $orders])
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
 $(document).ready(function(){
    $('#fromDate').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight:'TRUE',
        autoclose: true,
    });

    $('#toDate').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight:'TRUE',
        autoclose: true,
    });
});
</script>
@endsection   
