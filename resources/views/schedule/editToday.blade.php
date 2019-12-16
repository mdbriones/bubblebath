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
    <div class="row" style="height: 400px;">
        <div class="col-sm-11 col-md-6" style="margin-top: -30px; height: 500px; margin-bottom: 50px;">
            <div class="card" style="background-color: #ecfbe0; min-height: 500px; max-height: 500px;  overflow-y: scroll;">
                <div class="card-header">
                    <button class="btn btn-warning btn-sm" type="button" id="back">Back</button>
                    <button class="btn btn-default btn-sm" type="button" style="float: right;" onclick="location.reload();" id="refresh">Refresh</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" id="tableMorning">
                                <thead>
                                    <tr style="text-align-last: center;">
                                        <td colspan="2" style="text-align-last: left;"><h6 style="font-size: 18px; color: #343b56;"><u>{{ __('Today Schedule') }}</u></label></td>
                                    </tr>
                                </thead>
                                <tbody id="groupAM">
                                    @if (isset($dataView))
                                        @foreach ($dataView as $dv)
                                            <tr style="padding-top: 0px; padding-bottom: 0px;">
                                                <td colspan="2">
                                                    <input type="text" placeholder="Enter Name" readonly style="background-color: #ecfbe0;"
                                                        class="form-control" value="{{ $dv->name }}">
                                                </td>
                                                <td>
                                                    <button type="button" style="float:right;" data-id="{{ $dv->id }}" class="btnDelete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                    <button type="button" style="float:right; margin-right: 3px;" data-id="{{ $dv->id }}" class="btnGetEdit btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
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
        </div>

        {{-- =========== --}}
        
        <div class="col-sm-11 col-md-6" style="margin-top: -30px; height: 600px; margin-bottom: 30px;">
            <div class="card" style="background-color: #ecfbe0; min-height: 300px; max-height: 300px; overflow-y: scroll;">
                <div class="card-header">
                    <label style="font-size: 30px;"><i class="fa fa-user"></i></label>
                    <label style="font-size: 20px; margin-left: 5px;">{{__(" Edit Name")}}</label>
                    @if(session()->has('message'))
                        <div class="alert alert-success" style="height: 30px; line-height: 1%">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <ul class="p-0 m-0" style="list-style: none;">
                        @foreach($errors->all() as $error)
                            <li><em class="error" style="color: red; font-size: 10px;">{{$error}}</em></li>
                        @endforeach
                    </ul>
                </div>
                <hr>
                <form action="updateGroup" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    @include('alerts.success')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" value="{{ $date_ }}" name="schedule_date">
                                    <input type="hidden" name="edit_id" id="edit_id">
                                    <label for="edit_name">New Name</label>
                                    <input type="text" class="form-control" id="edit_name" name="edit_name">
                                    <div align="center" id="divUpdate">
                                        <button class="btn btn-sm btn-warning" type="submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card" style="background-color: #ecfbe0; min-height: 370px; max-height: 370px; overflow-y: scroll;">
                <div id="divAdd">
                    <div class="card-header">
                        <table width="100%">
                            <tr>
                                <td>
                                    <label style="font-size: 30px;"><i class="fa fa-users"></i></label>
                                    <label style="font-size: 20px; margin-left: 5px;">Workers</label>
                                </td>
                                <td>
                                    <button type="button" id="btnAdd" class="btn btn-sm btn-info" style="float:right;"><i>Add Worker</i></button>
                                </td>
                            </tr>
                        </table>
                        <hr>
                    </div>
                    <div class="card-body">
                        <table width="100%" id="table_addWorker">
                            <tr></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
        $(document).ready(function() {
            $('#btnAdd').on('click', ()=>{
                if($('#sel_shift').val() != "0"){
                    $('#table_addWorker').append('<tr>' +
                                      '<td colspan="2"> ' +
                                        '<input type="text" placeholder="Enter Name" class="form-control" name="worker[]">' +
                                      '</td>' +
                                      '<td>'+
                                        '<button type="button" style="float:right;" class="btnAddNewWorker btn btn-success btn-sm"><i class="fa fa-download"></i></button>'+
                                    '</td>'+
                                      
                                    '</tr>');
                }else{
                    alert("Please specify the time(shift)");
                    $('#sel_shift').focus();
                }
            });
        });
        
        $('#back').on('click', () => {
            location.href = 'todaySchedule';
        });
        
        $('#tableMorning').on('click', '.btnGetEdit', function() {
            let conf = confirm("Edit the name?");
            if(conf === true){
                var row_id = $(this).data('id');
                var name = $(this).closest('tr').find("input").val();
                $('#edit_name').val(name);
                $('#edit_id').val(row_id);
            }
        });

        $('#tableAfternoon').on('click', '.btnGetEdit', function() {
            var row_id = $(this).data('id');
            var name = $(this).closest('tr').find("input").val();
            $('#edit_name').val(name);
            $('#edit_id').val(row_id);
        });
        
        $('#tableMorning').on('click', '.btnDelete', function() {
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
                    url: "deleteWorker",
                    success : function(data){
                        $tr.find('td').fadeOut(1000,function(){ 
                            $(this).closest('tr').remove();
                        });
                    }
                });
            }
        });

        $('#tableAfternoon').on('click', '.btnDelete', function() {
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
                    url: "deleteWorker",
                    success : function(data){
                        $tr.find('td').fadeOut(1000,function(){ 
                            $(this).closest('tr').remove();
                        });
                    }
                });
            }
        });

        $('#table_addWorker').on('click', '.btnAddNewWorker', function(e){
            let conf = confirm("Please confirm to add.");
            if(conf===true){
                var addedName = $(this).closest('tr').find("input").val();
                var shift = $('#sel_shift').val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var $tr = $(this).closest('tr');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    data: {'addedName' : addedName,
                            'shift': shift},
                    url: "additionalWorker",
                    success : function(data){
                        alert("Worker added!");
                        $tr.find('td').fadeOut(1000,function(){ 
                            $(this).closest('tr').remove();
                        });
                    }
                });
            }
        })
    </script>
  </div>
@endsection