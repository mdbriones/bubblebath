@extends('layouts.app', [
    'namePage' => 'shop history',
    'class' => 'sidebar-mini',
    'activePage' => 'shopHistory',
    // 'activeNav' => '',
])

@section('content')
  <div class="panel-header" style="height: 130px;">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
          <table width="100%" style="margin-bottom: -20px;">
              <tr>
                <td>
                    <img src="{{ asset('assets/img/carwash-history.png') }}" style="width: 80px; height: 65px; -webkit-filter: grayscale(1); opacity: 0.2; filter: grayscale(1); z-index: -1;">
                </td>
                <td style="width: 200px;  ">
                    <form method="get" action="{{ route('historyShop.record') }}" autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      <div class="input-group mb-3">
                        <input type="text" id="txtPlate" name="txtPlate" class="form-control" style="height: 40px; margin-top: 10px;" placeholder="Plate Number" aria-label="Plate Number">
                        <div class="input-group-append" style="height: 60px;">
                          <button class="btn btn-primary" type="submit" style=" border-radius: 0px 19px 19px 0px;"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <div class="card-body">
            <div class="toolbar">
              @if (isset($plateNumber))
                <table>
                  <tr>
                    <td><label>{{ __('Name') }}</label></td>
                    <td><label>:</label></td>
                    <td><label style=" margin-left: 10px; font-size: 15px; color: darkslategray">{{ $client_name }}</label></td>
                  </tr>
                  <tr>
                    <td><label>{{ __( 'Plate No.') }}</label></td>
                    <td><label>:</label></td>
                    <td><label style=" margin-left: 10px; font-size: 15px; color: darkslategray">{{ $plateNumber }}</label></td>
                  </tr>
                  <tr>
                    <td><label>{{ __( 'Make/Model') }}</label></td>
                    <td><label>:</label></td>
                    <td><label style=" margin-left: 10px; font-size: 15px; color: darkslategray">{{ $make_model }}</label></td>
                  </tr>
                  <tr>
                    <td><label>{{ __( 'Email') }}</label></td>
                    <td><label>:</label></td>
                    <td><label style=" margin-left: 10px; font-size: 15px; color: darkslategray">{{ $email ? $email : "n/a" }}</label></td>
                  </tr>
                </table>
              @endif
            </div>
            <hr class="half-rule">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th style="width: 180px;">{{ __('Date')}}</th>
                  <th>{{ __('Description') }}</th>
                  <th>{{ __('Amount') }}</th>
                </tr>
              </thead>
              
              <tbody>
               @if (isset($records))
                   @foreach ($records as $record)
                      <tr>
                        <td>{{ $record->date_ }}</td>
                        <td>{{ $record->service_description_ }}</td>
                        <td>{{ $record->service_amount_ }}</td>
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
                bFilter: true,
            } );
            table.buttons().container()
                .appendTo( '#example_wrapper .col-md-5:eq(0)' );
        } );
      </script>
  </div>
@endsection