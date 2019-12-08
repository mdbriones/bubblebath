@extends('layouts.app', [
    'namePage' => 'shop report',
    'class' => 'sidebar-mini',
    'activePage' => 'reportsShop',
    // 'activeNav' => '',
])

@section('content')
  <div class="panel-header" style="height: 130px;">
  </div>
  <div class="content">
    <div class="row">
            <div class="col-md-4">
                    {{-- stock information --}}
                    <div class="card">
                      <div class="card-header">
                        <h5 class="title">{{__(" Stocks")}}</h5>
                          @if(session()->has('message'))
                              <div class="alert alert-success">
                                  {{ session()->get('message') }}
                              </div>
                          @endif
                      </div>
                      <div class="card-body">
                          @include('alerts.success')
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                          <input type="date" name="date_" class="form-control" value="{{ old('date_') }}">
                                          @include('alerts.feedback', ['field' => 'date_'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="text" name="reference" id="reference" class="form-control" placeholder="Reference Number" value="{{ old('reference') }}">
                                  @include('alerts.feedback', ['field' => 'reference'])
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="text" name="supplier" id="supplier" class="form-control" placeholder="Supplier" value="{{ old('supplier') }}">
                                  @include('alerts.feedback', ['field' => 'supplier'])
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="text" placeholder="Description" name="description" id="description" class="form-control">
                                  @include('alerts.feedback', ['field' => 'description'])
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="number" name="qty" id="qty" class="form-control" placeholder="Quantity" value="{{ old('qty') }}">
                                  @include('alerts.feedback', ['field' => 'qty'])
                                </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                          <input type="number" name="amount" id="amount" class="form-control" placeholder="Amount" value="{{ old('amount') }}">
                                          @include('alerts.feedback', ['field' => 'amount'])
                                    </div>
                                </div>
                            </div>
                            <hr class="half-rule"/>
                      </div>
                    </div>
                  </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <table width="100%" style="margin-bottom: -20px;">
                <tr>
                  <td>
                      <img src="{{ asset('assets/img/carwash-history.png') }}" style="width: 80px; height: 65px; -webkit-filter: grayscale(1); opacity: 0.2; filter: grayscale(1); z-index: -1;">
                  </td>
                  <td style="width: 300px;">
                      <form method="get" action="{{ route('shop.report') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <table width="100%">
                            <tr>
                                <td>
                                    <select name="format" id="format" class="form-control" style="height: 30px; padding-top: 5px;">
                                        <option read-only value="">Select Format</option>
                                        <option value="d">Daily</option>
                                        <option value="mo">Monthly</option>
                                        <option value="qtr">Quarterly</option>
                                        <option value="yr">Annual</option>
                                    </select>
                                </td>
                                <td style="text-align-last: right;">
                                    <button class="btn btn-info btn-sm" type="submit">Proceed</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" name="day" id="day" class="form-control" style="display: none; height: 30px; padding-top: 5px;">
                                    <select name="month" id="month" class="form-control" style="display: none; height: 30px; padding-top: 5px;">
                                        <option read-only value="">Select Month</option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <select name="quarter" id="quarter" class="form-control" style="display: none; height: 30px; padding-top: 5px;">
                                        <option read-only value="">Select Quarter</option>
                                        <option value="1">1st</option>
                                        <option value="2">2nd</option>
                                        <option value="3">3rd</option>
                                        <option value="4">4th</option>
                                    </select>
                                    <input type="number" placeholder="Year" name="year" id="year" class="form-control" style="display: none; height: 30px; padding-top: 5px;">
                                </td>
                                <td></td>
                            </tr>
                        </table>
                      </form>
                      <br>
                    </div>
                  </td>
                </tr>
              </table>
          </div>
          <hr>
          <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <th style="font-size: 10px;">{{ __('Date') }}</th>
                    <th style="font-size: 10px;">{{ __('Ref') }}</th>
                    <th style="font-size: 10px;">{{ __('Supplier') }}</th>
                    <th style="font-size: 10px;">{{ __('Description') }}</th>
                    <th style="font-size: 10px;">{{ __('Quantity') }}</th>
                    <th style="font-size: 10px;">{{ __('Amount') }}</th>
                    </thead>
                    <tbody id="tbl_tbody">
                    @if (isset($stocks))
                        @foreach( $stocks as $stock )
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
    <!-- end row -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                lengthChange: false,
                buttons: [ 'excel', 'pdf' ],
                responsive: true,
                bFilter: false,
                "pageLength": 8
            } );
            table.buttons().container()
                .appendTo( '#example_wrapper .col-md-5:eq(0)' );
        } );

        
      </script>
  </div>
@endsection