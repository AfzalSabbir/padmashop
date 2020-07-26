<!-- Full Structure -->
@extends('backend.layouts.master')

@section('fav_title', __('backend/report.report') )

<!-- Write Styles <style>In Here</style> -->
@section('styles')
@endsection

<!-- This Section Will Shown <body>In Here</body> -->
@section('content')
<!-- Top Management Part -->
<div class="app-title">
	<div>
		<h1><i class="{{ 'fa fa-clipboard' }}"></i> {{ __('backend/report.report_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
		<li class="breadcrumb-item active">{{ __('backend/report.report') }}</li>
	</ul>
</div>

<!-- Table Part -->
<div class="row">
	<div class="col-md-12">
		<div class="card">

			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="{{ 'fa fa-table' }}"></i> {{ __('backend/report.report_list') }}</h2></div>
					{{-- <div class="col-md-6"><a href="{{ route('admin.report.add') }}" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</a></div> --}}
					<div class="clearfix"></div>
				</div>
			</div>

            <div class="card-body">

                <form action="{{ route('admin.report.index') }}" method="post" class="none">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="input-group date" id="fromDate" data-provide="datepicker">
                                <input type="text" class="form-control" name="from_date" value="{{ $app->request->input('from_date') }}">
                                <div class="input-group-addon">
                                    <span><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group date" id="toDate" data-provide="datepicker">
                                <input type="text" class="form-control" name="to_date" value="{{ $app->request->input('to_date') }}">
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

                        <div class="col-md-1">
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

                @include('backend.partials.page_numbering', ['route' => 'admin.report.index'])


                <div class="table-responsive">
                    <table class="table table-bordered table-hover display">
                        <thead>
                            <th width="5%">{{ __('backend/default.sl') }}</th>
                            <th>{{ __('backend/default.date') }}</th>
                            <th width="5%">{{ __('backend/default.order_id') }}</th>
                            <th>{{ __('backend/user.name') }}</th>
                            <th>{{ __('backend/default.address') }}<br>{{ __('backend/user.mobile') }}</th>
                            {{-- <th>{{ __('backend/default.address') }}</th> --}}
                            <th>{{ __('backend/default.total') }}</th>
                            <th width="82">{{ __('backend/default.discount_and_delivery_cost') }}</th>
                            <th>{{ __('backend/default.grand_total') }}</th>
                            {{-- <th>{{ __('backend/default.quantity') }}</th> --}}
                            <th>{{ __('backend/default.payment_gateway') }}</th>
                            <th>{{ __('backend/default.transaction_id') }}</th>
                            <th>{{ __('backend/default.status') }}</th>
                            {{-- <th class="action" width="5%">{{ __('backend/default.action') }}</th> --}}
                        </thead>

                        <tbody>
                            @foreach($orders as $order)
                            @php
                            if($order->order_status == 0){
                                $status = 'Pending';
                                $color_ = 'text-secondary';
                                $icon_ = 'fa fa-hourglass-half';
                            }else if($order->order_status == 1){
                                $status = 'Received';
                                $color_ = 'text-info';
                                $icon_ = 'fa fa-handshake-o';
                            }else if($order->order_status == 2){
                                $status = 'Procesing';
                                $color_ = 'text-warning';
                                $icon_ = 'fa fa-spinner';
                            }else if($order->order_status == 3){
                                $status = 'On the Way';
                                $color_ = 'text-primary';
                                $icon_ = 'fa fa-motorcycle';
                            }else if($order->order_status == 4){
                                $status = 'Received';
                                $color_ = 'text-success';
                                $icon_ = 'fa fa-check';
                            }
                            @endphp

                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ date('d-m-Y', strtotime($order->date_)) }}</td>
                                <td>{{ "#000".$order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->address_ }}<br>{{ $order->alt_mobile }}</td>
                                {{-- <td>{{ $order->address }}</td> --}}
                                <td class="text-right">{{ $order->price }} ৳</td>
                                <td class="text-right">{{ ($order->grand_total ? $order->grand_total : $order->price + $order->shipping_cost) - $order->price }} ৳</td>
                                <td class="text-right">{{ $order->grand_total ? $order->grand_total : $order->price + $order->shipping_cost }} ৳</td>
                                {{-- <td>{{ $order->qty }}</td> --}}
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
                                <td title="{{ $status }}" class="{{ $color_ }}"><i class="{{ $icon_ }}"></i> {{ $status }}</td>
                                {{-- <td>
                                    <div class="btn-group">
                                        @foreach($permissions->submenus as $key => $permission)
                                        @if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
                                        @if($key == 0)
                                        <a href="{{route($permission->route, $order->id)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                        @endif
                                        @endif
                                        @endforeach
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                            <tr>
                            	<th colspan="5" class="text-right">Sum</th>
                            	<th class="text-right">{{ $orders->sum('price') }} ৳</th>
                            	<th class="text-right">{{ $orders->sum('grand_total') - $orders->sum('price') }} ৳</th>
                            	<th class="text-right">{{ $orders->sum('grand_total') }} ৳</th>
                            	<th colspan="3"></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @include('backend.partials.pagination', ['table' => $orders])
            </div>
		</div>
	</div>
</div>
@endsection

<!-- Write Scripts <script fileType="text/javascript">In Here</script> -->

@section('scripts')
<script>
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
</script>
@endsection