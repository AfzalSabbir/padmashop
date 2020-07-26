@extends('backend.layouts.master')

@section('fav_title', 'Dashboard')

@section('styles')
<style>
  .widget-small .info h4 {
    text-transform: initial;
    margin: 0;
    margin-bottom: 5px;
    font-weight: 800;
    font-size: 0.9rem;
  }
</style>
@endsection

@section('content')

<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> {{ __('backend/default.dashboard') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> {{ __('backend/default.dashboard') }}</li>
  </ul>
</div>


@if(Auth::guard('admin')->user()->admin_role == 1)
  <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/user.user') }}</h4>
          <p><b>{{ $user }}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-hand-rock-o fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/order.pending_order') }}</h4>
          <p><b>{{ $pending_order }}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/order.completed_order') }}</h4>
          <p><b>{{ $completed_order }}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-archive fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/product.product') }}</h4>
          <p><b>{{ $product }}</b></p>
        </div>
      </div>
    </div>
{{-- 
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-pie-chart fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/category.category') }}</h4>
          <p><b>{{ $category }}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-yelp fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/subcategory.subcategory') }}</h4>
          <p><b>{{ $sub_category }}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-briefcase fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/brand.brand') }}</h4>
          <p><b>{{ $brand }}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-cloud fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/advertisement.advertisement') }}</h4>
          <p><b>{{ $advertisement }}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-money fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/payment.payment_method') }}</h4>
          <p><b>{{ $payment_method }}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-ticket fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/coupon.coupon') }}</h4>
          <p><b>{{ $coupon }}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-paint-brush fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/color.color') }}</h4>
          <p><b>{{ $color }}</b></p>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-arrows fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/size.size') }}</h4>
          <p><b>{{ $size }}</b></p>
        </div>
      </div>
    </div> 
    --}}

    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-shopping-bag fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/default.today_sale') }}</h4>
          <p><b>{{ $today_sale }}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-shopping-bag fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/default.this_week_sale') }}</h4>
          <p><b>{{ $this_week_sale }}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-shopping-bag fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/default.this_month_sale') }}</h4>
          <p><b>{{ $this_month_sale }}</b></p>
        </div>
      </div>
    </div>
  </div>
@else
  @php
      $product = DB::table('products')->where('admin_id', Auth::guard('admin')->user()->id)->where('status', 1)->count();
  @endphp
  <div class="row">
    {{-- <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-hand-rock-o fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/order.pending_order') }}</h4>
          <p><b>{{ $pending_order }}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/order.completed_order') }}</h4>
          <p><b>{{ $completed_order }}</b></p>
        </div>
      </div>
    </div> --}}
    
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-archive fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/product.product') }}</h4>
          <p><b>{{ $product }}</b></p>
        </div>
      </div>
    </div>

    {{-- <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-shopping-bag fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/default.today_sale') }}</h4>
          <p><b>{{ $today_sale }}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-shopping-bag fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/default.this_week_sale') }}</h4>
          <p><b>{{ $this_week_sale }}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-shopping-bag fa-3x"></i>
        <div class="info">
          <h4>{{ __('backend/default.this_month_sale') }}</h4>
          <p><b>{{ $this_month_sale }}</b></p>
        </div>
      </div>
    </div> --}}
  </div>
@endif

<br>

<!--div class="row">
  <div class="col-md-12">
    <div class="card">
      {{-- <div class="card-header">
        <h3>Circle Percent</h3>
      </div> --}}
      <div class="row">
        <div class="card-body">
          <div class="col-md-3">
            <div class="c100 p90">
              <span>90%</span>
              <div class="slice">
                <div class="bar"></div>
                <div class="fill"></div>
              </div>
              <h5 style="position: absolute; bottom: -40px; text-align:center;">Demo Circle</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="col-md-3">
            <div class="c100 p90">
              <span>90%</span>
              <div class="slice">
                <div class="bar"></div>
                <div class="fill"></div>
              </div>
              <h5 style="position: absolute; bottom: -40px; text-align:center;">Demo Circle</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="col-md-3">
            <div class="c100 p90">
              <span>90%</span>
              <div class="slice">
                <div class="bar"></div>
                <div class="fill"></div>
              </div>
              <h5 style="position: absolute; bottom: -40px; text-align:center;">Demo Circle</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="col-md-3">
            <div class="c100 p90">
              <span>90%</span>
              <div class="slice">
                <div class="bar"></div>
                <div class="fill"></div>
              </div>
              <h5 style="position: absolute; bottom: -40px; text-align:center;">Demo Circle</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div!-->

<!-- <script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Year', 'Collection', 'Expenses'],
      ['2004',  1000,      200],
      ['2005',  1170,      460],
      ['2006',  660,       1120],
      ['2007',  1030,      540],
      ['2008',  500,      250]
    ]);

    var options = {
      title: 'Collection Overview',
      curveType: 'function',
      legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
  }
</script>
<div id="curve_chart" style="width: 100%; height: 30rem;"></div> -->


<!-- <div class="mt-5">
  <div class="row">
    <div class="col-md-4">
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              ['Work',     11],
              ['Eat',      2],
              ['Commute',  2],
              ['Watch TV', 2],
              ['Sleep',    7]
            ]);

          var options = {
            title: 'Loan Status Overview'
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

          chart.draw(data, options);
        }
      </script>

      <div id="piechart" style="height: 300px; width: 100%;"></div>
    </div>
    <div class="col-md-4">
      <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ["Element", "Savings Balance", { role: "style" } ],
            ["Savings Balance", 25405005, "#b87333"]
          ]);

          var view = new google.visualization.DataView(data);
          view.setColumns([0, 1,
                          { calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation" },
                          2]);

          var options = {
            title: "Savings Balance Overview",
            // width: 600,
            // height: 400,
            bar: {groupWidth: "60%"},
            legend: { position: "none" },
          };
          var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
          chart.draw(view, options);
      }
      </script>
      <div id="columnchart_values" style="width: 100%; height: 300px;"></div>
    </div>
    <div class="col-md-4">
      <!DOCTYPE HTML>
      <html>
      <head>
        <script>
          window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
              animationEnabled: true,
              exportEnabled: true,
              theme: "light1",
              title:{
                text: "Software Sales Conversion"
              },
              data: [{
                type: "pyramid",
                yValueFormatString: "#\"%\"",
                indexLabelFontColor: "black",
                indexLabelFontSize: 16,
                indexLabel: "{label} - {y}",
                //reversed: true, // Reverses the pyramid
                dataPoints: [
                { y: 100, label: "Website Visit" },
                { y: 65, label: "Download Page Visit" },
                { y: 45, label: "Downloaded" },
                { y: 32, label: "Interested To Buy" },
                { y: 5, label: "Purchased" }
                ]
              }]
            });
            chart.render();

          }
        </script>
      </head>
      <body>
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
      </body>
      </html>
    </div>
  </div>
</div> -->

@endsection
@section('scripts')
  <script type="text/javascript"></script>
@endsection