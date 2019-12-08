@extends('layouts.app', [
    'namePage' => 'Schedule Management',
    'class' => 'sidebar-mini',
    'activePage' => 'todaySched',
    // 'activeNav' => '',
])

@section('content')
  <div class="panel-header" style="height: 130px;">
  </div>
  <div class="content">
    <div class="row" style="height: 500px;">
      
      <div class="col-sm-6 col-md-6" style="margin-top: -30px; height: 500px; margin-bottom: 50px;">
        <div class="card" style="background-color: #ecfbe0; min-height: 500px; max-height: 500px; overflow-y: scroll;">
          <div class="card-header">
            <label><h6 class="title">{{__(" Morning Schedule")}}</h6></label>
              @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
              @endif
              <ul class="p-0 m-0" style="list-style: none;">
                  @foreach($errors->all() as $error)
                    <li><em class="error" style="color: red; font-size: 10px;">{{$error}}</em></li>
                  @endforeach
              </ul>
          </div>
          <form action="{{ route('saveGroup') }}" method="post">
            @csrf
            @include('alerts.success')
            <div class="card-body">
              <input type="hidden" value="{{ $date_ }}" name="schedule_date">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="schedule_time">Select Shift</label>
                    <select name="schedule_time" id="schedule_time" class="form-control">
                      <option value="am" {{ old('schedule_time') == 'am' ? 'selected' : '' }} > 7AM - 2PM </option>
                      <option value="pm" {{ old('schedule_time') == 'pm' ? 'selected' : '' }} > 2PM onwards </option>
                    </select>
                    <hr>
                    <table id="tableServices" class="table table-striped" style="width:100%">
                      <thead>
                          <th colspan="2">Name</th>
                          <th style="text-align-last: right;"><a href="#" class="fa fa-plus" id="addRow"></a></th>
                      </thead>
                      <tbody id="list_for_am">
                        @if ($errors->any())
                          @foreach ( old('worker') as $item)
                            <tr>
                              <td colspan="2"> 
                                <input type="text" placeholder="Enter Name" class="form-control" name="worker[]" value="{{ old('worker')[$loop->index] }}" style="{{ (old('worker')[$loop->index] == '') ? 'border-color: red' : '' }}">
                              </td>
                              <td>
                                  <button type="button" style="float:right;" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                              </td>
                            </tr>
                          @endforeach
                        @else
                          <tr>
                            <td colspan="2"> 
                              <input type="text" placeholder="Enter Name" class="form-control" name="worker[]" value="">
                            </td>
                            <td>
                              <button type="button" style="float:right;" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </td>
                          </tr>
                        @endif
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-12" align="center" style="position: relative; bottom: 0px;">
                  <button type="submit" class="btn btn-success btn-sm">Save Group</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      {{-- =========== --}}
      
      <div class="col-sm-6 col-md-6" style="margin-top: -30px; height: 500px; margin-bottom: 30px;">
          <div class="card" style="background-color: #ecfbe0; min-height: 500px; max-height: 500px;  overflow-y: scroll;">
            <div class="card-header">
              <form action="{{ route('getTodaySched') }}" method="get">
                <input type="hidden" value="{{ $date_ }}" name="dateNow">
                <button class="btn btn-info btn-sm" type="submit" id="viewToday" style="width: 100%;">View today Schedule</button>
              </form>
              <div align="center">
                @if (isset($data_am))
                  @if ($data_am != "null")
                    <button class="btn btn-sm btn-warning" id="editToday" type="button" style="width: 100%;"><i>Edit today Schedule</i></button>
                  @else
                    <label><i>No record found</i></label>
                  @endif
                @endif
              </div>
              
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-12">
                    <table width="100%" id="group1">
                      <thead>
                        @if (isset($data_am))
                          @if ($data_am != "null")
                          <tr style="text-align-last: center;">
                            <td><h6 style="font-size: 20px;">{{ __('Morning') }}</label></td>
                          </tr>
                          <tr>
                            <td></td>
                          </tr>
                          @endif
                        @endif
                      </thead>
                      <tbody id="groupAM">
                        @if (isset($data_am))
                          @if ($data_am != "null")
                            @foreach ($data_am as $am)
                              <tr style="text-align-last: center;">
                                <td><label> {{ $am->name }} </label></td>
                              </tr>
                            @endforeach
                          @endif
                        @endif
                      </tbody>
                    </table>
                  </div>
                  
                  <div class="col-md-12">
                    <table width="100%" id="group2">
                      <thead>
                        <th>
                          @if (isset($data_pm))
                            @if ($data_pm != "null")
                              <tr style="text-align-last: center;">
                                <td colspan=><h6 style="font-size: 18px;">{{ __('Afternoon') }}</h6></label>
                              </tr>
                              <tr>
                                <td></td>
                              </tr>
                            @endif
                          @endif
                        </th>
                      </thead>
                      <tbody id="groupPM">
                         @if (isset($data_pm))
                          @if ($data_pm != "null")
                            @foreach ($data_pm as $pm)
                              <tr style="text-align-last: center;">
                                <td><label> {{ $pm->name }} </label></td>
                              </tr>
                            @endforeach
                          @endif
                         @endif
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
        $(document).ready(function() {
          $('#addRow').on('click', () => {
              $('#list_for_am').append('<tr>' +
                                      '<td colspan="2"> ' +
                                        '<input type="text" placeholder="Enter Name" class="form-control" name="worker[]">' +
                                      '</td>' +
                                      '<td>'+
                                        '<button type="button" style="float:right;" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>'+
                                      '</td>' +
                                    '</tr>');
          });

          $('#editToday').on('click', () => {
             location.href = 'viewEditTodaySched';
          });

        });
      </script>
  </div>
@endsection