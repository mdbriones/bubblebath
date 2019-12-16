@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
  <div align="center" class="panel-header panel-header-lg">
      <h5 class="card-category"><strong>Carwash / Shop Income ({{ date("Y") }})</strong></h5>
      <canvas id="bigDashboardChart" style="padding-bottom: 50px;"></canvas>
  </div>

  <div class="content" style="background-image: linear-gradient(to right, #0F2A4B , #295483);">
    <div class="row">
      <div class="col-md-6">
        <div id="carwash" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card card-tasks">
                  <div class="card-header">
                      <div>
                          <h5 style="float: left;" class="card-category">Receivables</h5> 
                          <label style="float: right;">(as of {{ date("F d, Y")}} )</label>
                      </div>
                      <div class="clearfix"></div>
                      <div>
                        <h4 style="float: left;" class="card-title">Unpaid Job (Carwash)</h4>
                        <div class="dropdown" style="float: right;">
                            <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                              <i class="now-ui-icons loader_gear"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item text-danger" href="carwashReceivables"><i class="now-ui-icons transportation_bus-front-12"></i> See more...</a>
                          </div>
                        </div>
                      </div>
                  </div>
                  <hr style="margin-top: -5px;">
                  <div class="card-body">
                    <div class="table-full-width table-responsive" style="max-height: 220px; min-height: 220px;">
                      <table class="table">
                        <thead class="text-primary">
                          <th style="font-size: 13px;">Customer Name</th>
                          <th style="font-size: 13px;">Amount</th>
                          <th style="font-size: 13px;">Plate Number</th>
                          <th>&nbsp;</th>
                        </thead>
                        <tbody id="unpaidCarwash">
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <div class="stats">
                      <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                    </div>
                  </div>
                </div>
            </div>
            <div class="carousel-item">
              <div class="card card-tasks">
                <div class="card-header">
                    <div>
                        <h5 style="float: left;" class="card-category">Total Income</h5> 
                        <label style="float: right;">(as of {{ date("F d, Y")}} )</label>
                    </div>
                    <div class="clearfix"></div>
                    <div align="center">
                      
                      
                    </div>
                </div>
                <hr style="margin-top: -5px;">
                <div class="card-body" align="center">
                  <div style="max-height: 220px; min-height: 220px;">
                    <h4 class="card-title">Carwash Income</h4>  
                    <label style="font-size: 40px; color: #2d3a69">₱&nbsp;</label><strong><label id="overallCarwash" style="font-size: 40px; color: #2d3a69"></label></strong>
                  </div>
                </div>
                <div class="card-footer ">
                  <hr>
                  <div class="stats">
                    <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carwash" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carwash" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="col-md-6">
        <div id="shop" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card card-tasks">
                <div class="card-header">
                  <div>
                      <h5 class="card-category" style="float: left;">Receivables</h5>
                      <label style="float: right;">(as of {{ date("F d, Y")}} )</label>
                  </div>
                  <div class="clearfix"></div>
                  <div>
                    <h4 style="float: left;" class="card-title">Unpaid Items (Shop)</h4>
                    <div class="dropdown" style="float: right;">
                        <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                          <i class="now-ui-icons loader_gear"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item text-danger" href="shopReceivables"><i class="now-ui-icons design_app"></i>See more...</a>
                      </div>
                    </div>
                  </div>
                </div>
                <hr style="margin-top: -5px;">
                <div class="card-body">
                  <div class="table-full-width table-responsive" style="max-height: 220px; min-height: 220px;">
                    <table class="table">
                      <thead class=" text-primary">
                        <th style="font-size: 13px;">Name</th>
                        <th style="font-size: 13px;">Description</th>
                        <th style="font-size: 13px;">Amount</th>
                        <th style="font-size: 13px;">Aging</th>
                        <th style="font-size: 13px;">&nbsp;</th>
                      </thead>
                      <tbody id="unpaidShop">
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer ">
                  <hr>
                  <div class="stats">
                    <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card card-tasks">
                <div class="card-header">
                    <div>
                        <h5 style="float: left;" class="card-category">Total Income</h5> 
                        <label style="float: right;">(as of {{ date("F d, Y")}} )</label>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <hr style="margin-top: -5px;">
                <div class="card-body" align="center">
                  <div style="max-height: 220px; min-height: 220px;">
                    <h4 class="card-title">Shop Income</h4>  
                    <label style="font-size: 40px; color: #2d3a69">₱&nbsp;</label><strong><label id="overallShop" style="font-size: 40px; color: #2d3a69"></label></strong>
                  </div>
                </div>
                <div class="card-footer ">
                  <hr>
                  <div class="stats">
                    <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#shop" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#shop" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">Stocks Remaining</h5>
            <h4 class="card-title">Stocks</h4>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="barChartSimpleGradientsNumbers"></canvas>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons ui-2_time-alarm"></i> As of {{ date("F d, Y") }}
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="col-lg-4 col-md-6">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">Schedule Today</h5>
            <h4 class="card-title">Workers</h4>
            <div class="dropdown">
              <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                <i class="now-ui-icons loader_gear"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item text-danger" href="{{ route('schedule.today') }}"><i class="now-ui-icons users_circle-08"></i>View/Set Schedule</a>
              </div>
            </div>
          </div>
          <div class="card-body" style="overflow-y: scroll; max-height: 250px;">
            <div class="chart-area">
              <div class="row container-fluid">
                  <div class="col-sm-6">
                    <table id="am">
                      <tr>
                        <td><strong><label>Morning Shift</label></strong></td>    
                      </tr>
                    </table>
                  </div>
                  <div class="col-sm-6">
                    <table id="pm">
                      <tr>
                        <td><strong><label>Afternoon Shift</label></strong></td>    
                      </tr>
                    </table>
                  </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
            </div>
          </div>
        </div>
      </div> --}}
      
      {{-- <div class="col-lg-4 col-md-6">
        <div class="card card-chart" style="height: 350px;">
          <div class="card-header">
            <h5 class="card-category">2018 Sales</h5>
            <h4 class="card-title">All products</h4>
            <div class="dropdown">
              <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                <i class="now-ui-icons loader_gear"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <a class="dropdown-item text-danger" href="#">Remove Data</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
            </div>
          </div>
        </div>
      </div> --}}
      
    </div>
  </div>

  
  {{-- <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-category">Receivables</h5>
            <div>
              <h4 style="float: left;" class="card-title">Unpaid Items (Shop)</h4>
              <div class="dropdown" style="float: right;">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item text-danger" href="shopReceivables">See more...</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th style="font-size: 13px;">Name</th>
                  <th style="font-size: 13px;">Description</th>
                  <th style="font-size: 13px;">Amount</th>
                  <th style="font-size: 13px;">Aging</th>
                  <th style="font-size: 13px;">&nbsp;</th>
                </thead>
                <tbody id="unpaidShop">
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">Global Sales</h5>
            <h4 class="card-title">Shipped Products</h4>
            <div class="dropdown">
              <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                <i class="now-ui-icons loader_gear"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <a class="dropdown-item text-danger" href="#">Remove Data</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="lineChartExample"></canvas>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">2018 Sales</h5>
            <h4 class="card-title">All products</h4>
            <div class="dropdown">
              <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                <i class="now-ui-icons loader_gear"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <a class="dropdown-item text-danger" href="#">Remove Data</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">Email Statistics</h5>
            <h4 class="card-title">24 Hours Performance</h4>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="barChartSimpleGradientsNumbers"></canvas>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

      function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
      }

      $.ajax({
        type: "get",
        url: "getReceivablesCarwash",
        data: {'foo' : 'foo'},
        success: function(data){
          $('#overallCarwash').text(formatNumber(data[1].toFixed(2)));
          for(var obj in data[0]){
            $('#unpaidCarwash').append('<tr>' +
                                '<td style="font-size: 13px;" class="text-left">' + data[0][obj]["customerName"] + '</td>' +
                                '<td style="font-size: 13px;">₱ ' + formatNumber(data[0][obj]["totalAmount"]) + '</td>' +
                                '<td style="font-size: 13px;">' + data[0][obj]["plateNumber"] + '</td>' +
                                '<td class="td-actions text-right">' +
                                  '<button type="button" rel="tooltip" title="" ' + 
                                      'class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">' +
                                      '<i class="now-ui-icons travel_info"></i>' +
                                  '</button>' +
                                '</td>' +
                              '</tr>')
          }
        }
      });

      $.ajax({
        type: "get",
        url: "getReceivablesShop",
        data: {'foo' : 'foo'},
        success: function(data){
          $('#overallShop').text(formatNumber(data[1].toFixed(2)));
          for(var obj in data[0]){
            $('#unpaidShop').append('<tr>' +
                                '<td style="font-size: 13px;" class="text-left">' + data[0][obj]["name_"] + '</td>' +
                                '<td style="font-size: 13px;">'+ data[0][obj]['service_description_'] +'</td>' +
                                '<td style="font-size: 13px;">₱ ' + formatNumber(data[0][obj]["service_amount_"]) + '</td>' +
                                '<td style="font-size: 13px;">' + data[0][obj]["aging"] + ' days</td>' +
                                '<td class="td-actions text-right">' +
                                  '<button type="button" rel="tooltip" title="" ' + 
                                      'class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">' +
                                      '<i class="now-ui-icons travel_info"></i>' +
                                  '</button>' +
                                '</td>' +
                              '</tr>')
          }
        }
      });

      $.ajax({
        type: "get",
        url: "getTodayEmployees",
        data: {'foo' : 'foo'},
        success: function(data){
          for(var obj in data[0]){
            $('#am').append('<tr><td><label>' + data[0][obj]['name'] + '</label></td></tr>');
          }

          for(var obj in data[1]){
            $('#pm').append('<tr><td><label>' + data[1][obj]['name'] + '</label></td></tr>');
          }
        }
      });

    });
  </script>
@endpush