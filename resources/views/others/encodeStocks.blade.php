@extends('layouts.app', [
    'namePage' => 'shop report',
    'class' => 'sidebar-mini',
    'activePage' => 'encodeStocks',
    // 'activeNav' => '',
])

@section('content')
  <div class="panel-header" style="height: 130px;">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
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
          <div id="div_save" style="display: normal;">
            <form action="{{ route('others.submitStocks') }}" autocomplete="off" enctype="multipart/form-data" method="post">
              @csrf
              <div class="card-body">
                  @include('alerts.success')
                    <div class="row" >
                      <div class="col-md-4">
                          <div class="form-group">
                                <input type="date" id="stocks_date" name="stocks_date" class="form-control" value="{{ old('date_') }}">
                                @include('alerts.feedback', ['field' => 'stocks_date'])
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="text" name="reference" id="reference" class="form-control" placeholder="Reference Number" value="{{ old('reference') }}">
                          @include('alerts.feedback', ['field' => 'reference'])
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="text" name="supplier" id="supplier" class="form-control" placeholder="Supplier" value="{{ old('supplier') }}">
                          @include('alerts.feedback', ['field' => 'supplier'])
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="text" placeholder="Description" name="description" id="description" class="form-control">
                          @include('alerts.feedback', ['field' => 'description'])
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity" value="{{ old('quantity') }}">
                          @include('alerts.feedback', ['field' => 'quantity'])
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                              <input type="number" name="amount" id="amount" class="form-control" placeholder="Amount" value="{{ old('amount') }}">
                              @include('alerts.feedback', ['field' => 'amount'])
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12" align="right">
                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                      </div>
                    </div>
                    <hr class="half-rule"/>
              </div>
            </form>
          </div>
          <div id="div_update" style="display: none;">
            <form action="{{ route('others.updateStocks') }}" autocomplete="off" enctype="multipart/form-data" method="post">
              @csrf
              {{ method_field('PUT') }}
              <div class="card-body">
                @include('alerts.success')
                <div class="row" >
                  <div class="col-md-4">
                      <div class="form-group">
                            <input type="hidden" id="edit_id" name="edit_id">
                            <input type="date" id="edit_stocks_date" name="stocks_date" class="form-control" value="{{ old('date_') }}">
                            @include('alerts.feedback', ['field' => 'date_'])
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" name="reference" id="edit_reference" class="form-control" placeholder="Reference Number" value="{{ old('reference') }}">
                      @include('alerts.feedback', ['field' => 'reference'])
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" name="supplier" id="edit_supplier" class="form-control" placeholder="Supplier" value="{{ old('supplier') }}">
                      @include('alerts.feedback', ['field' => 'supplier'])
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" placeholder="Description" name="description" id="edit_description" class="form-control">
                      @include('alerts.feedback', ['field' => 'description'])
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="number" name="quantity" id="edit_quantity" class="form-control" placeholder="Quantity" value="{{ old('quantity') }}">
                      @include('alerts.feedback', ['field' => 'quantity'])
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                          <input type="number" name="amount" id="edit_amount" class="form-control" placeholder="Amount" value="{{ old('amount') }}">
                          @include('alerts.feedback', ['field' => 'amount'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12" align="right">
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                  </div>
                </div>
                <hr class="half-rule"/>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Stocks Table")}}</h5>
          </div>
          <hr>
          <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%;">
                <thead>
                    <th style="font-size: 10px;">{{ __('ID') }}</th>
                    <th style="font-size: 10px;">{{ __('Description') }}</th>
                    <th style="font-size: 10px;">{{ __('Ref') }}</th>
                    <th style="font-size: 10px;">{{ __('Date') }}</th>
                    <th style="font-size: 10px;">{{ __('Supplier') }}</th>
                    <th style="font-size: 10px;">{{ __('Quantity') }}</th>
                    <th style="font-size: 10px;">{{ __('Amount') }}</th>
                    <th style="font-size: 10px;">{{ __('Action') }}</th>
                    </thead>
                    <tbody id="tbl_tbody">
                    @if (isset($stocks))
                        @foreach( $stocks as $stock )
                        <tr data_id="{{ $stock->id }}">
                          <td style="font-size: 12px; width: 30px;">{{ $stock->id }}
                            <input type="hidden" name="edit_id" id="edit_id">
                          </td>
                          <td style="font-size: 12px;">{{ $stock->description }}</td>
                          <td style="font-size: 12px;">{{ $stock->reference }}</td>
                          <td style="font-size: 12px; width: 90px;">{{ $stock->stocks_date }}</td>
                          <td style="font-size: 12px;">{{ $stock->supplier }}</td>
                          <td style="font-size: 12px;">{{ $stock->quantity }}</td>
                          <td style="font-size: 12px;">{{ number_format($stock->amount, 2) }}</td>
                          <td style="font-size: 12px; text-align-last: center; width: 130px;">
                              <button type="button" style="float:right;" data-id="{{ $stock->id }}" 
                                class="btnDelete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                              <button type="button" style="float:right; margin-right: 3px;" 
                                data-stocks_date = "{{ $stock->stocks_date }}"
                                data-reference = "{{ $stock->reference }}" 
                                data-supplier = "{{ $stock->supplier }}" 
                                data-description = "{{ $stock->description }}" 
                                data-quantity = "{{ $stock->quantity }}" 
                                data-amount = "{{ $stock->amount }}" 
                                data-id = "{{ $stock->id }}" 
                                class="btnGetEdit btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                          </td>
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
                bFilter: true,
                "pageLength": 8
            } );
            table.buttons().container()
                .appendTo( '#example_wrapper .col-md-5:eq(0)' );

        } );
        var showUpdate = 0;

        $('#example').on('click', '.btnGetEdit', function() {
          let conf = confirm("Please confirm edit.");
          if(conf===true){
            var row_id = $(this).data('id');
            var stocks_date = $(this).data('stocks_date');
            var reference = $(this).data('reference');
            var supplier = $(this).data('supplier');
            var description = $(this).data('description');
            var quantity = $(this).data('quantity');
            var amount = $(this).data('amount');
            
            $('#edit_id').val(row_id);
            $('#edit_stocks_date').val(stocks_date);
            $('#edit_reference').val(reference);
            $('#edit_supplier').val(supplier);
            $('#edit_description').val(description);
            $('#edit_quantity').val(quantity);
            $('#edit_amount').val(parseFloat(amount).toFixed(2));

            showUpdate = 1;

            if(showUpdate == 1){
              $('#div_save').hide();
              $('#div_update').show();
            }else{
              $('#div_save').show();
              $('#div_update').hide();
            }

          }
        });

        $('#example').on('click', '.btnDelete', function() {
            var row_id = $(this).data('id');
            let conf = confirm("Confirm delete?");
            var $tr = $(this).closest('tr');
            
            if(conf === true){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    type: "DELETE",
                    data: {'row_id' : row_id},
                    url: "deleteStocks",
                    success : function(data){
                        $tr.find('td').fadeOut(1000,function(){ 
                            // $(this).closest('tr').remove();
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