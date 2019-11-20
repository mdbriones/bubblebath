@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Shop Information',
    'activePage' => 'clientShop',
])

@section('content')
    
  <div class="panel-header panel-header-sm">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0; 
        }
        input[type=number] {
            -moz-appearance:textfield; /* Firefox */
        }
    </style>
  </div>
  <div class="content">
    <form method="post" action="{{ route('saveShopService') }}">
      <div class="row">
        @csrf
        <div class="col-md-4">
          {{-- client information --}}
          <div class="card">
            <div class="card-header">
              <h5 class="title">{{__(" Information")}}</h5>
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
                                  <input type="text" name="customerName" class="form-control" placeholder="Name" value="{{ old('customerName') }}">
                                  @include('alerts.feedback', ['field' => 'customerName'])
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" name="model" id="model" class="form-control" placeholder="Make / Model" value="{{ old('model') }}">
                        @include('alerts.feedback', ['field' => 'model'])
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" name="plateNumber" id="plateNumber" class="form-control" placeholder="Plate Number" value="{{ old('platenumber') }}">
                        @include('alerts.feedback', ['field' => 'plateNumber'])
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="date" name="dateOfService" id="dateOfService" class="form-control">
                        @include('alerts.feedback', ['field' => 'dateOfService'])
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email (Optional)" value="{{ old('email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                          <select name="terms" id="terms" class="form-control">
                              <option value="">Select Terms of Payment</option>
                              <option value="cash">Cash</option>
                              <option value="credit">Credit</option>
                          </select>
                          </div>
                      </div>
                  </div>
                  <hr class="half-rule"/>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          {{-- services --}}
          <div class="card">
            <div class="card-header">
                <h5 class="title">{{__("Services")}} </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            
                            
                            <table id="tableServices" class="table table-striped" style="width:100%">
                                <thead>
                                    <th colspan="2">Description</th>
                                    <th style="width: 15%;">Amount</th>
                                    <th style="width: 15%; text-align-last: right;"><a href="#" class="fa fa-plus" id="addRow"></a></th>
                                </thead>
                                <tbody id="tbl_tbody">
                                  <tr>
                                      <td colspan="2"> <input type="text" placeholder="Enter Description" class="form-control" name="desc[]"> </td>
                                      <td> <input type="number" placeholder="0" name="txtAmt[]" class="form-control computeTotal"> </td>
                                      <td style="text-align-last: right;">
                                        <button class="removeRow btn btn-danger" style="height: 20px; padding-top:2px;"><i class="fa fa-trash"></i></button>
                                      </td>
                                  </tr>
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <td ></td>
                                    <td style="text-align-last: right;">Total : &nbsp;<label style="font-size: 25px;">₱</label></td>
                                    <td >
                                      <label style="font-size: 25px; text-align-last: right;" id="totalAmount">0.00</label>
                                    </td>
                                    <td style="text-align-last: right;">
                                      <button type="submit" class="btn btn-primary" style="height: 30px; padding-left: 1.1em; padding-top: 7px; width: 70px;">{{__('Submit')}}</button>
                                    </td>
                                  </tr>
                                </tfoot>
                            </table>
                          
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
