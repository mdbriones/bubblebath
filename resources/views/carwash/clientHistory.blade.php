@extends('layouts.app', [
    'namePage' => 'carwash history',
    'class' => 'sidebar-mini',
    'activePage' => 'clientHistory',
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
                      <form method="get" action="{{ route('history.record') }}" autocomplete="off" enctype="multipart/form-data">
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
          <hr>
          <div class="card-body">
            <div class="toolbar">
              @if (isset($plateNumber))
                <label>{{ __( 'Plate No. : ') }}</label><label style=" margin-left: 10px; font-size: 15px; color: darkslategray">{{ $plateNumber }}</label>                   
              @endif
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th style="width: 180px;">{{ __('Date')}}</th>
                  <th>{{ __('Services') }}</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th style="width: 180px;">{{ __('Date') }}</th>
                  <th>{{ __('Services') }}</th>
                </tr>
              </tfoot>
              <tbody>
                @if (isset($records))
                  @foreach( $records as $record )
                    <tr>
                      <td>{{ $record->dateOfService }}</td>
                      @php
                        $services = "";
                      @endphp
                      @if($record->bodyWash != 0.00)
                      @php
                          $services .= "Body Wash, ";
                      @endphp
                      @endif
                      @if($record->handWax!=0.00) 
                      @php
                          $services .= "Hand Wax, ";
                      @endphp
                      @endif
                      @if($record->engineWash!=0.00) 
                      @php
                          $services .= "Enginewash, ";
                      @endphp
                      @endif
                      @if($record->armorAll!=0.00) 
                      @php
                          $services .= "Armor All, ";
                      @endphp
                      @endif
                      @if($record->orbitalWax!=0.00) 
                      @php
                          $services .= "Orbital Wax, ";
                      @endphp
                      @endif
                      @if($record->underWash!=0.00) 
                      @php
                          $services .= "Underwash, ";
                      @endphp
                      @endif
                      @if($record->asphaltRemoval!=0.00) 
                      @php
                          $services .= "Asphalt Removal, ";
                      @endphp
                      @endif
                      @if($record->seatCover!=0.00) 
                      @php
                          $services .= "Seat Cover Installation, ";
                      @endphp
                      @endif
                      @if($record->leatherConditioning!=0.00) 
                      @php
                          $services .= "Leather Conditioning, ";
                      @endphp
                      @endif
                      @if($record->interior!=0.00) 
                      @php
                          $services .= "Interior Detail, ";
                      @endphp
                      @endif
                      @if($record->exterior!=0.00)
                      @php 
                          $services .= "Exterior Detail, ";
                      @endphp
                      @endif
                      @if($record->glassDetail!=0.00) 
                      @php
                          $services .= "Glass Detailing, ";
                      @endphp
                      @endif
                      @if($record->engineDetail!=0.00) 
                      @php
                          $services .= "Engine Detail, ";
                      @endphp
                      @endif
                      @if($record->full!=0.00) 
                      @php
                          $services .= "Full Auto Detailing, ";
                      @endphp
                      @endif
                      @php 
                        $services = rtrim($services, ', ');
                      @endphp
                      <td>{{ $services }}</td>
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
            } );
            table.buttons().container()
                .appendTo( '#example_wrapper .col-md-5:eq(0)' );
        } );
      </script>
  </div>
@endsection