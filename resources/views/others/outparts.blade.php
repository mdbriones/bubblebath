@extends('layouts.app', [
    'namePage' => 'Outworks / Parts',
    'class' => 'sidebar-mini',
    'activePage' => 'outworks/parts',
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
            <h5 class="title">{{__(" Outworks / Parts")}}</h5>
              @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
              @endif
          </div>
          <div id="div_save" style="display: normal;">
            <form action="{{ route('others.submitOutparts') }}" autocomplete="off" enctype="multipart/form-data" method="post">
              @csrf
              <div class="card-body">
                  @include('alerts.success')
                    <div class="row" >
                      <div class="col-md-4">
                          <div class="form-group">
                                <input type="date" id="out_date" name="out_date" class="form-control" value="{{ old('out_date') }}">
                                @include('alerts.feedback', ['field' => 'out_date'])
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="text" name="description" id="description" class="form-control" placeholder="Description" value="{{ old('description') }}">
                          @include('alerts.feedback', ['field' => 'description'])
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity" value="{{ old('quantity') }}">
                          @include('alerts.feedback', ['field' => 'quantity'])
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="number" placeholder="Amount" name="amount" id="amount" class="form-control" value="{{ old('amount') }}">
                          @include('alerts.feedback', ['field' => 'amount'])
                        </div>
                        
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <select class="form-control" id="sel_supplier" name="sel_supplier">
                            <option value="">Select Supplier</option>
                            <option {{ old('sel_supplier') == 'Supplier 1' ? 'selected' : '' }} value="Supplier 1">Supplier 1</option>
                            <option {{ old('sel_supplier') == 'Supplier 2' ? 'selected' : '' }} value="Supplier 2">Supplier 2</option>
                            <option {{ old('sel_supplier') == 'Supplier 3' ? 'selected' : '' }} value="Supplier 3">Supplier 3</option>
                            <option {{ old('sel_supplier') == 'Others' ? 'selected' : '' }} value="Others">Others</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                              <label for="supplier"  style="color: red; font-size: 9px; display:{{ (old('sel_supplier') == 'Others' && old('supplier') == '') ? '' : 'none'  }};" id="supplierNote"><i>Please provide the Supplier Name</i></label>
                              <input type="text" {{ (old('sel_supplier') == 'Others' && old('supplier') == '') ? '' : 'readonly'  }} style="background-color: #ffffff;" name="supplier" placeholder="Supplier" id="supplier" class="form-control" value="{{ old('supplier') }}">
                              @include('alerts.feedback', ['field' => 'supplier'])
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
            <form action="{{ route('others.updateOutparts') }}" autocomplete="off" enctype="multipart/form-data" method="post">
              @csrf
              {{ method_field('PUT') }}
              <div class="card-body">
                @include('alerts.success')
                <div class="row" >
                  <div class="col-md-4">
                      <div class="form-group">
                          <input type="hidden" id="edit_id" name="edit_id">
                          <input type="date" id="edit_out_date" name="out_date" class="form-control" value="{{ old('out_date') }}">
                          @include('alerts.feedback', ['field' => 'out_date'])
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" name="description" id="edit_description" class="form-control" placeholder="Description" value="{{ old('edit_description') }}">
                      @include('alerts.feedback', ['field' => 'edit_description'])
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="number" name="quantity" id="edit_quantity" class="form-control" placeholder="Quantity" value="{{ old('edit_quantity') }}">
                      @include('alerts.feedback', ['field' => 'edit_quantity'])
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="number" placeholder="Amount" name="amount" id="edit_amount" class="form-control" value="{{ old('edit_amount') }}">
                      @include('alerts.feedback', ['field' => 'edit_amount'])
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <select class="form-control" id="edit_sel_supplier" name="edit_sel_supplier">
                        <option value="">Select Supplier</option>
                        <option {{ old('edit_sel_supplier') == 'Supplier 1' ? 'selected' : '' }} value="Supplier 1">Supplier 1</option>
                        <option {{ old('edit_sel_supplier') == 'Supplier 2' ? 'selected' : '' }} value="Supplier 2">Supplier 2</option>
                        <option {{ old('edit_sel_supplier') == 'Supplier 3' ? 'selected' : '' }} value="Supplier 3">Supplier 3</option>
                        <option {{ old('edit_sel_supplier') == 'Others' ? 'selected' : '' }} value="Others">Others</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                          <label for="edit_supplier"  style="color: red; font-size: 9px; display:{{ (old('edit_sel_supplier') == 'Others' && old('edit_supplier') == '') ? '' : 'none'  }};" id="supplierNote"><i>Please provide the Supplier Name</i></label>
                          <input type="text" {{ (old('edit_sel_supplier') == 'Others' && old('edit_supplier') == '') ? '' : 'readonly'  }} style="background-color: #ffffff;" name="supplier" placeholder="Supplier" id="edit_supplier" class="form-control" value="{{ old('supplier') }}">
                          @include('alerts.feedback', ['field' => 'edit_supplier'])
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
            <h5 class="title">{{__(" Outworks/Parts Table")}}</h5>
          </div>
          <hr>
          <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%;">
                <thead>
                    <th style="font-size: 10px;">{{ __('ID') }}</th>
                    <th style="font-size: 10px;">{{ __('Description') }}</th>
                    <th style="font-size: 10px;">{{ __('Quantity') }}</th>
                    <th style="font-size: 10px;">{{ __('Supplier') }}</th>
                    <th style="font-size: 10px;">{{ __('Date') }}</th>
                    <th style="font-size: 10px;">{{ __('Amount') }}</th>
                    <th style="font-size: 10px;">{{ __('Action') }}</th>
                    </thead>
                    <tbody id="tbl_tbody">
                    @if (isset($outparts))
                        @foreach( $outparts as $outpart )
                        <tr data_id="{{ $outpart->id }}">
                          <td style="font-size: 12px; width: 30px;">{{ $outpart->id }}
                            <input type="hidden" name="edit_id" id="edit_id">
                          </td>
                          <td style="font-size: 12px;">{{ $outpart->description }}</td>
                          <td style="font-size: 12px;">{{ $outpart->quantity }}</td>
                          <td style="font-size: 12px;">{{ $outpart->supplier }}</td>
                          <td style="font-size: 12px; width: 90px;">{{ $outpart->out_date }}</td>
                          <td style="font-size: 12px;">{{ number_format($outpart->amount, 2) }}</td>
                          <td style="font-size: 12px; text-align-last: center; width: 130px;">
                              <button type="button" style="float:right;" data-id="{{ $outpart->id }}" 
                                class="btnDelete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                              <button type="button" style="float:right; margin-right: 3px;" 
                                data-out_date = "{{ $outpart->out_date }}"
                                data-supplier = "{{ $outpart->supplier }}" 
                                data-description = "{{ $outpart->description }}" 
                                data-quantity = "{{ $outpart->quantity }}" 
                                data-amount = "{{ $outpart->amount }}" 
                                data-id = "{{ $outpart->id }}" 
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
            var out_date = $(this).data('out_date');
            var supplier = $(this).data('supplier');
            var description = $(this).data('description');
            var quantity = $(this).data('quantity');
            var amount = $(this).data('amount');
            
            $('#edit_id').val(row_id);
            $('#edit_out_date').val(out_date);
            $('#edit_supplier').val(supplier);
            $('#edit_description').val(description);
            $('#edit_quantity').val(quantity);
            $('#edit_amount').val(parseFloat(amount).toFixed(2));
            $('#edit_sel_supplier').val(supplier);

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
                    url: "deleteOutparts",
                    success : function(data){
                        $tr.find('td').fadeOut(1000,function(){ 
                            $(this).closest('tr.child').remove();
                            $('[data_id="'+ row_id +'"]').remove();  
                        });
                    }
                });
            }
        });

        $('#sel_supplier').on('change', () => {
          let supp = $('#sel_supplier').val();
          if(supp == 'Others'){
            $('#supplierNote').show();
            $("#supplier").val("");
            $("#supplier").attr("readonly", false); 
            $("#supplier").focus();
          }else{
            $('#supplierNote').hide();
            $("#supplier").val(supp);
          }
        });
        
      </script>
  </div>
@endsection