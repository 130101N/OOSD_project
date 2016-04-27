@extends('admin.index')

@section('content')
  <section class="content" style="min-height:150px;">
          <!-- Info boxes -->
          <div class=" row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><span class="glyphicon glyphicon-barcode"></span></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Income</span>
                  <span class="info-box-number">${{$income}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><span class="glyphicon glyphicon-thumbs-up"></span></span>
                <div class="info-box-content">
                  <span class="info-box-text">Likes</span>
                  <span class="info-box-number">1,410</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><span class="glyphicon glyphicon-heart"></span></span>
                <div class="info-box-content">
                  <span class="info-box-text">Sales</span>
                  <span class="info-box-number">{{$sales}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><span class="glyphicon glyphicon-user"></span></span>
                <div class="info-box-content">
                  <span class="info-box-text">New Members</span>
                  <span class="info-box-number">{{$newmembers}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h2>Total orders vs Month</h2>
          <div style="width: 100%">
            <canvas id="canvas5" height="450" width="600"></canvas>
          </div>
        </div>
          <div class="col-md-6">
          <h2>Total income vs Month</h2>
          <div style="width: 100%">
            <canvas id="canvas1" height="450" width="600"></canvas>
          </div>
        </div>
        </div>
      </div>
    </div>
  </section>

  <script>

  window.onload = function(){
    var ctx = document.getElementById("canvas1").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
      responsive : true
    });
    var ctx5 = document.getElementById("canvas5").getContext("2d");
    window.myBar = new Chart(ctx5).Line(dataline, {
    bezierCurve: true
});
  }


  </script>
  <script>
  var dataline = {
    labels: [ "June", "July","August","September","October","November","December"],
    datasets: [
        {
            label: "Order COunt",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [{{DB::table('order')->whereBetween('created_at',['2015-06-01', '2015-07-01'])->count()}}, {{DB::table('order')->whereBetween('created_at',['2015-07-01', '2015-08-01'])->count()}}, {{DB::table('order')->whereBetween('created_at',['2015-08-01', '2015-09-01'])->count()}}, {{DB::table('order')->whereBetween('created_at',['2015-09-01', '2015-10-01'])->count()}}, {{DB::table('order')->whereBetween('created_at',['2015-10-01', '2015-11-01'])->count()}}, {{DB::table('order')->whereBetween('created_at',['2015-11-01', '2015-12-01'])->count()}},{{DB::table('order')->whereBetween('created_at',['2015-12-01', '2016-01-01'])->count()}}]
        }
    ]
};
  </script>
  <script>
  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

  var barChartData = {
    labels : [ "June", "July","August","September","October","November","December"],
    datasets : [
      {
        fillColor : "rgba(151,187,205,0.5)",
        strokeColor : "rgba(151,187,205,0.8)",
        highlightFill : "rgba(151,187,205,0.75)",
        highlightStroke : "rgba(151,187,205,1)",
        data : [{{DB::table('order')->whereBetween('created_at',['2015-06-01', '2015-07-01'])->sum('amount')}},{{DB::table('order')->whereBetween('created_at',['2015-07-01', '2015-08-01'])->sum('amount')}},{{DB::table('order')->whereBetween('created_at',['2015-08-01', '2015-09-01'])->sum('amount')}},{{DB::table('order')->whereBetween('created_at',['2015-09-01', '2015-10-01'])->sum('amount')}}, {{DB::table('order')->whereBetween('created_at',['2015-10-01', '2015-11-01'])->sum('amount')}}, {{DB::table('order')->whereBetween('created_at',['2015-11-01', '2015-12-01'])->sum('amount')}},{{DB::table('order')->whereBetween('created_at',['2015-12-01', '2016-01-01'])->sum('amount')}}]
      }
    ]

  }
  </script>

@stop