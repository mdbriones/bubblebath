@extends('layouts.app', [
    'namePage' => 'Shares',
    'class' => 'sidebar-mini',
    'activePage' => 'shares',
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
            <h5 class="title">{{__(" Shares Allocation")}}</h5>
          </div>
          <hr>
          <div class="card-body">
            <form action="{{ route('others.getShares') }}" method="get" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <table width="100%">
                    <tr>
                        <td colspan="2">
                            <label style="font-size: 20px; color: #142554;"> {{ $format_text }} </label>
                        </td>
                    </tr>
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
                            <button class="btn btn-info btn-sm" type="submit">Check</button>
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
            <table id="example" class="table" style="width:100%;">
                <tbody id="tbl_tbody">
                    <tr>
                        <td colspan="2" style="text-align-last:center;"><label>Morning Shift</label></td>
                        <td colspan="2" style="text-align-last:center; border-left:2pt solid #3e3f4b;"><label>Afternoon Shift</label></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="background-color: #3e3f4b"></td>
                    </tr>
                    <tr>
                        <td><label>Owner (70%)</label></td>
                        <td>₱ {{ isset($ownerAm) ? number_format($ownerAm, 2) : '0.00' }}</td>
                        <td style="border-left:2pt solid #3e3f4b;"><label>Owner (70%)</label></td>
                        <td>₱ {{ isset($ownerPm) ? number_format($ownerPm, 2) : '0.00' }}</td>
                    </tr>
                    <tr>
                        <td><label>Employee (30%)</label></td>
                        <td>₱ {{ isset($empAm) ? number_format($empAm, 2) : '0.00' }}</td>
                        <td style="border-left:2pt solid #3e3f4b;"><label>Employee (30%)</label></td>
                        <td>₱ {{ isset($empPm) ? number_format($empPm, 2) : '0.00' }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="background-color: #3e3f4b"></td>
                    </tr>
                    <tr>
                        <td><label>TOTAL</label></td>
                        <td>₱ {{ isset($totalAm) ? number_format($totalAm, 2) : '0.00' }}</td>
                        <td style="border-left:2pt solid #3e3f4b;"><label></label></td>
                        <td>₱ {{ isset($totalPm) ? number_format($totalPm, 2) : '0.00' }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="border: none;"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="border: none;"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align-last: left;"><strong><label>Today's Carwash Income</label></strong></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><label>Owner (70%)</label></td>
                        <td>₱ {{ isset($totalIncomeOwner) ? number_format($totalIncomeOwner, 2) : '0.00' }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><label>Employee (30%)</label></td>
                        <td>₱ {{ isset($totalIncomeEmployee) ? number_format($totalIncomeEmployee, 2) : '0.00' }}</td>
                        <td></td>
                    </tr>
                    <tr style="border-top:2pt solid #3e3f4b;">
                        <td></td>
                        <td><label>Overall</label></td>
                        <td>₱ {{ isset($totalIncome) ? number_format($totalIncome, 2) : '0.00' }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
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