@extends('layouts.app', [
    'namePage' => 'carwash receivables',
    'class' => 'sidebar-mini',
    'activePage' => 'receivableCarwash',
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
            <table width="100%" style="margin-bottom: -30px;">
              <tr>
                <td>
                    <img src="{{ asset('assets/img/carwash-rec.png') }}" style="width: 80px; height: 65px; -webkit-filter: grayscale(1); opacity: 0.2; filter: grayscale(1); z-index: -1;">
                </td>
                <td style="text-align-last:right;"><label style="font-size: 20px;">Total ₱&nbsp;</label><label style='font-size: 25px;' id=totalAmt>{{ number_format($overallTotal, 2) }}</label></td>
                {{--  --}}
              </tr>
            </table>
          </div>
          <div class="card-body">
            <hr class="half-rule">
            <table id="tblReceivables" class="table table-striped display responsive nowrap table-bordered data-table-export" style="width:100%">
              <thead>
                <tr>
                  <th style="font-size: 15px;">{{ __('Client')}}</th>
                  <th style="font-size: 15px;">{{ __('Service Date') }}</th>
                  <th style="font-size: 15px;">{{ __('Plate #') }}</th>
                  <th style="font-size: 15px;">{{ __('Amount') }}</th>
                  <th style="font-size: 15px;">{{ __('Model') }}</th>
                  <th style="font-size: 15px;">{{ __('Aging') }}</th>
                  <th style="font-size: 15px;">{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                    <tr data_id="{{ $item->id }}">
                      <td><label style="color:#292929;">{{ $item->customerName }}</label></td>
                      <td><label style="color:#292929;">{{ $item->dateOfService }}</label></td>
                      <td><label style="color:#292929;">{{ $item->plateNumber }}</label></td>
                      <td><label style="color:#292929;">{{ number_format($item->totalAmount, 2) }}</label></td>
                      <td><label style="color:#292929;">{{ $item->model }}</label></td>
                      <td><label style="color:#292929;">{{ $item->aging }} day/s</label></td>
                      <td align="center">
                        <button class="btn btn-sm btn-info deleteRow"><i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                        <input type="hidden" class="data_id" value="{{ $item->id }}">
                      </td>
                    </tr>
                @endforeach
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
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    
    <script>
      $(document).ready(function() {
          $('#tblReceivables').DataTable( {
              lengthChange: false,
              buttons: [ 'excel', 'pdf' ],
              responsive: true,
              bFilter: true,
              "language": {
                "info": "_START_-_END_ of _TOTAL_ entries",
              },
          });
      } );

      $('.data-table-export').on('click', '.deleteRow', function(){
        let conf = confirm("Pay this account?");

        if(conf === true){
          var row_id = $(this).closest('tr').find(".data_id").val();
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          var $tr = $(this).closest('tr'); // hold the reference tr to be use later..

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            type: "POST",
            data: {'row_id' : row_id},
            url: "updateRowReceivableCarwash",
            success : function(data){
              $tr.find('td').fadeOut(1000,function(){ 
                $(this).closest('tr.child').remove();
                $('[data_id="'+ row_id +'"]').remove(); 
              });
            }
          });
        }
      });
    </script>
  </div>
@endsection