@extends('layouts.app', [
    'namePage' => 'previous schedules',
    'class' => 'sidebar-mini',
    'activePage' => 'pastSChed',
    // 'activeNav' => '',
])

@section('content')
  <div class="panel-header" style="height: 130px;">
  </div>
  <div class="content">
    <div class="row" style="height: 500px;">
      <div class="col-sm-12 col-md-12" style="height: 500px; margin-bottom: 30px;">
        <div class="card">
          <div class="card-header">
            <table width="100%">
              <tr>
                <td>
                  <img src="{{ asset('assets/img/sched.png') }}" 
                          style="width: 80px; height: 65px; -webkit-filter: 
                              grayscale(1); opacity: 0.2; filter: grayscale(1); z-index: -1;">
                </td>
                <td style="width: 300px;">
                    <form method="get" action="{{ route('get_pastSchedule') }}" autocomplete="off" enctype="multipart/form-data">
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
                    <th style="font-size: 15px;">{{ __('Date') }}</th>
                    <th style="font-size: 15px;">{{ __('Client') }}</th>
                    <th style="font-size: 15px;">{{ __('Model') }}</th>
                    <th style="font-size: 15px;">{{ __('Plate#') }}</th>
                    {{-- <th style="font-size: 15px;">{{ __('Group Shift') }}</th> --}}
                    <th style="font-size: 15px;">{{ __('Services Done') }}</th>
              </thead>
              <tbody>
                  @if (isset($records))
                    @foreach( $records as $record )
                      <tr>
                        <td>{{ $record->dateOfService }}</td>
                        <td>{{ $record->customerName }}</td>
                        <td>{{ $record->model }}</td>
                        <td>{{ $record->plateNumber }}</td>
                        {{-- <td>{{ $record->shift == 'am' ? 'Morning' : 'Afternoon' }}</td> --}}
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
        </div>
      </div>
      
    </div>

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

        $('#format').on('change', () => {
            let format = $('#format').val();

            if( format == 'd' ){
                $('#day').show();
                $('#month').hide();
                $('#quarter').hide();
                $('#year').hide();
            }else if( format == 'mo' ){
                $('#day').hide();
                $('#month').show();
                $('#quarter').hide();
                $('#year').show();
            }else if( format == 'qtr' ){
                $('#day').hide();
                $('#month').hide();
                $('#quarter').show();
                $('#year').show();
            }else if( format == 'yr' ){
                $('#day').hide();
                $('#month').hide();
                $('#quarter').hide();
                $('#year').show();
            }
        });
      </script>
  </div>
@endsection