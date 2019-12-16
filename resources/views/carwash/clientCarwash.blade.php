@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Carwash Information',
    'activePage' => 'clientCarwash',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-6 col-sm-11" style="overflow: scroll; height: 600px;">
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
        <form method="post" action="{{ route('saveCarwashService') }}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.success')
              
                <div class="row" >
                    <div class="col-md-11 pr-1">
                        <div class="form-group">
                                <input type="text" name="customerName" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                @include('alerts.feedback', ['field' => 'customerName'])
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-11 pr-1">
                    <div class="form-group">
                      <input type="text" name="model" id="model" class="form-control" placeholder="Make / Model" value="{{ old('model') }}">
                      @include('alerts.feedback', ['field' => 'model'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-11 pr-1">
                    <div class="form-group">
                      <input type="text" name="plateNumber" id="plateNumber" class="form-control" placeholder="Plate Number" value="{{ old('platenumber') }}">
                      @include('alerts.feedback', ['field' => 'plateNumber'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-11 pr-1">
                    <div class="form-group">
                      <input type="date" name="dateOfService" id="dateOfService" class="form-control">
                      @include('alerts.feedback', ['field' => 'dateOfService'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-11 pr-1">
                    <div class="form-group">
                      <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                      @include('alerts.feedback', ['field' => 'email'])
                    </div>
                  </div>
                </div>
                <hr class="half-rule"/>
          </div>
        </div>
        
        {{-- services --}}
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__("Services")}} </h5>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-11 pr-1">
                  <div class="form-group">
                    <select name="carSize" id="carSize" class="form-control">
                      <option value="">Select Car Size</option>
                      <option value="s">Small</option>
                      <option value="md">Medium</option>
                      <option value="lg">Large</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-11 pr-1">
                  <table class="table">
                    <thead>
                      <th>Service Name</th>
                      <th colspan="2">Price</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="chkBodyWash">
                              <label class="custom-control-label" for="chkBodyWash">Bodywash w/ Vacuum</label>
                          </div>
                        </td>
                        <td><label for="">₱</label><label id="lbl_Bodywash"></label></td>
                        <td>
                            <input readonly type="text" class="prices form-control" value="0" placeholder="0" name="bodyWash" id="txtBodyWash">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="chkHandWax">
                            <label class="custom-control-label" for="chkHandWax">Hand Wax</label>
                          </div>
                        </td>
                        <td><label for="">₱</label><label id="lbl_HandWax"></label></td>
                        <td>
                          <input readonly type="text" class="prices form-control" value="0" placeholder="0" name="handWax" id="txtHandWax">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="chkEngineWash">
                            <label class="custom-control-label" for="chkEngineWash">Engine Wash</label>
                          </div>
                        </td>
                        <td><label for="">₱</label><label id="lbl_EngineWash"></label></td>
                        <td>
                          <input readonly type="text" class="prices form-control" value="0" placeholder="0" name="engineWash" id="txtEngineWash">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="chkArmor">
                            <label class="custom-control-label" for="chkArmor">Armor All</label>
                          </div>
                        </td>
                        <td><label for="">₱</label><label id="lbl_Armor"></label></td>
                        <td>
                          <input readonly type="text" class="prices form-control" value="0" placeholder="0" name="armorAll" id="txtArmor">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="chkOrbital">
                            <label class="custom-control-label" for="chkOrbital">Orbital Wax</label>
                          </div>
                        </td>
                        <td><label for="">₱</label><label id="lbl_Orbital"></label></td>
                        <td>
                          <input readonly type="text" class="prices form-control" value="0" placeholder="0" name="orbitalWax" id="txtOrbital">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="chkUnderwash">
                            <label class="custom-control-label" for="chkUnderwash">Underwash</label>
                          </div>
                        </td>
                        <td><label for="">₱</label><label id="lbl_Underwash"></label></td>
                        <td>
                          <input readonly type="text" class="prices form-control" value="0" placeholder="0" name="underWash" id="txtUnderWash">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="chkAsphaltRem">
                            <label class="custom-control-label" for="chkAsphaltRem">Asphalt Removal</label>
                          </div>
                        </td>
                        <td><label for="">₱</label><label id="lbl_AsphaltRem"></label></td>
                        <td>
                          <input readonly type="text" class="prices form-control" value="0" placeholder="0" name="asphaltRemoval" id="txtAsphaltRem">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="chkSeatCover">
                            <label class="custom-control-label" for="chkSeatCover">Seat Cover(Install/Remove)</label>
                          </div>
                        </td>
                        <td><label for="">₱</label><label id="lbl_SeatCover"></label></td>
                        <td>
                          <input readonly type="text" class="prices form-control" value="0" placeholder="0" name="seatCover" id="txtSeatCover">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="chkLeather">
                            <label class="custom-control-label" for="chkLeather">Leather Conditioning</label>
                          </div>
                        </td>
                        <td><label for="">₱</label><label id="lbl_Leather"></label></td>
                        <td>
                          <input readonly type="text" class="prices form-control" value="0" placeholder="0" name="leatherConditioning" id="txtLeather">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>

        {{-- auto detailing --}}
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__("Auto Detailing")}} </h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-11 pr-1">
                <table class="table">
                  <thead>
                    <th>Service Name</th>
                    <th colspan="2">Price</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="chkInteriorDetail">
                            <label class="custom-control-label" for="chkInteriorDetail">Interior Detail</label>
                        </div>
                      </td>
                      <td><label for="">₱</label><label id="lbl_InteriorDetail"></label></td>
                      <td>
                          <input readonly type="text" class="prices form-control" value="0" placeholder="0" name="interior" id="txtInterior">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="chkExterior">
                          <label class="custom-control-label" for="chkExterior">Exterior (3 Step Detailing)</label>
                        </div>
                      </td>
                      <td><label for="">₱</label><label id="lbl_Exterior"></label></td>
                      <td>
                        <input readonly type="text" class="prices form-control" value="0" placeholder="0" name="exterior" id="txtExterior">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="chkGlass">
                          <label class="custom-control-label" for="chkGlass">Glass Detailing</label>
                        </div>
                      </td>
                      <td><label for="">₱</label><label id="lbl_Glass"></label></td>
                      <td>
                        <input readonly type="text" class="prices form-control" value="0" placeholder="0" name="glassDetail" id="txtGlassDetail">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="chkEngine">
                          <label class="custom-control-label" for="chkEngine">Engine Detail</label>
                        </div>
                      </td>
                      <td><label for="">₱</label><label id="lbl_Engine"></label></td>
                      <td>
                        <input readonly type="text" class="prices form-control" value="0" placeholder="0" name="engineDetail" id="txtEngineDetail">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="chkFull">
                          <label class="custom-control-label" for="chkFull">Full Auto Detailing</label>
                        </div>
                      </td>
                      <td><label for="">₱</label><label id="lbl_Full"></label></td>
                      <td>
                        <input type="number" class="prices form-control" value=0 placeholder="0" name="full" id="txtFull">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-sm-11">
        <div class="card">
          <div class="card-body">
            <table width="100%">
              <tr>
                <td>
                  <label style="font-size: 30px;">Total</label>
                </td>
                <td style="text-align: right;"><label style="font-size: 30px;">₱</label></td>
                <td style="text-align: right;">
                  <label style="font-size: 25px;" id="totalAmount">0.00</label>
                </td>
              </tr>
            </table>
            <hr>
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="form-group">
                  <label>{{__(" Mode of Payment :")}}</label>
                  <div class="form-group">
                    <select name="payment_method" id="payment_method" class="form-control">
                      <option value="cash">Cash</option>
                      <option value="credit">Credit</option>
                    </select>
                  </div>
                </div>

                {{-- <div class="form-group">
                  <label>{{__(" Worker's Category :")}}</label>
                  <div class="form-group">
                    <select name="shift" id="shift" class="form-control" style="width: 200px;">
                      <option value="am">Morning Shift</option>
                      <option value="pm">Afternoon Shift</option>
                    </select>
                  </div>
                </div> --}}
              </div>
            </div>
            <hr>
          </div>
          <div class="button-container" >
            <div class="card-footer ">
              <button type="submit" class="btn btn-primary btn-round" style="min-width: 200px;">{{__('Submit')}}</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
    

  
  </div>
@endsection