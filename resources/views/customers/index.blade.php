@extends('layouts.app')

@section('css')
<style>
    .create-customer{    
        margin-bottom: -10px;
        margin-top: -7px;
    }
    .create-customer:not(.disabled):hover {    
        margin-top: -5px;
    }
</style>
@endsection
@section('content')
<div class="container-fuild">
    <div class="row justify-content-center">
        <div class="col-md-2 pull-left">
        <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-9 pull-right">
            <div class="card">
                <div class="card-header">
                    Example CRUD
                    <button type="button" class="btn btn-primary pull-right create-customer" ><i class="fa fa-plus-circle"></i>  Create Customer</button>
                        
                </div>

                <div class="card-body">
                    @include('alert')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Gender</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th style="width: 10vw;">Action</th>
                        </tr>
                        @foreach($customer as $key => $customers)
                        <tr>
                            <th>{{ ++$key }}</th>
                            <th>{{ $customers->customer }}</th>
                            <th>{{ $customers->gender }}</th>
                            <th>{{ $customers->telephone }}</th>
                            <th>{{ $customers->email }}</th>
                            <th>{{ $customers->address }}</th>
                            <th>
                                <button type="button" class="btn btn-default btn-sm show-customer" data-value="{{ $customers->id }}"><i class="fa fa-ellipsis-h"></i></button>
                                <button type="button" class="btn btn-primary btn-sm edit-customer" data-value="{{ $customers->id }}"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm destroy-customer" data-name="{{ $customers->customer }}" data-value="{{ $customers->id }}"><i class="fa fa-trash"></i></button>
                            </th>
                        </tr>                                           
                        @endforeach                                    
                    </table>
                    <div class="pull-left"><p style="font-size:16px">Total Current Customers : {{ $customer->count() }}     Items Total Customers : {{ $customer->total() }} Items</p></div>
                           
                            <div class="pull-right">{{ $customer->links('vendor.pagination.bootstrap-4') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('customers.modal-show')
@include('customers.modal-create')
@include('customers.modal-edit')
@include('customers.modal-destroy')
@endsection
@section('script')
<script>
    $(document).ready(function(){   
       
        $('.create-customer').click(function(e){
            $('#myModalCreate').modal('show');
        });
        console.log('welcome document')
        $('.save-customer').click(function(e){
            console.log('click button create customer');
            var customer = $("input[name='customer']").val();
            var gender = $("select[name='gender']").val();
            var telephone = $("input[name='telephone']").val();
            var email = $("input[name='email']").val();
            var address = $("textarea[name='address']").val();                
            $.ajax({
                type:'POST',
                url: '{{ url('customer/store')}}',
                dataType:'json',
                data:{ 
                    _token: '{!! csrf_token() !!}',
                    customer:customer, 
                    gender:gender,
                    telephone:telephone,
                    email:email,
                    address:address                      
                },
                success:function(data){   
                    console.log(data);
                    location.reload();
                },
                error: function(e) {
                    console.log(e.message);
                }           
            });           
        });
        $('.show-customer').click(function(){
            var id=$(this).data().value;
            console.log('click button show customer : '+id);
            $.ajax({
                type:'POST',
                url: '{{ url('customer/show')}}',
                dataType:'json',
                data:{
                    _token: '{!! csrf_token() !!}',
                    id :id                 
                },
                success:function(data){          
                    $("input[name='show-customer']").val(data.customer);
                    $("select[name='show-gender']").val(data.gender);
                    $("input[name='show-telephone']").val(data.telephone);
                    $("input[name='show-email']").val(data.email);
                   $("textarea[name='show-address']").val(data.address);
                    $("#myModalShow").modal('show');
                    console.log('seccuss');
                },
                error: function(e) {
                    console.log(e.message);
                }           
            });
        });
        
        $('.edit-customer').click(function(){
            var id = $(this).data().value;
            console.log('click button edit customer : '+id);
            $("#myModalEdit").modal('show');
           
            $.ajax({
                type:'POST',
                url: '{{ url('customer/edit')}}',
                dataType:'json',
                data:{
                    _token: '{!! csrf_token() !!}',
                    id :id                 
                },
                success:function(data){           
                    $("input[name='edit-id']").val(data.id);       
                    $("input[name='edit-uuid']").val(data.uuid);         
                    $("input[name='edit-customer']").val(data.customer);
                    $("select[name='edit-gender']").val(data.gender);
                    $("input[name='edit-telephone']").val(data.telephone);
                    $("input[name='edit-email']").val(data.email);
                   $("textarea[name='edit-address']").val(data.address);
                    $("#myModalEdit").modal('show');
                    console.log('seccuss');
                },
                error: function(e) {
                    console.log(e.message);
                }           
            });

        });

        $('.update-customer').click(function(){            
            var id =$("input[name='edit-id']").val();
            var uuid =$("input[name='edit-uuid']").val();
            var customer = $("input[name='edit-customer']").val();
            var gender = $("select[name='edit-gender']").val();
            var telephone = $("input[name='edit-telephone']").val();
            var email = $("input[name='edit-email']").val();
            var address = $("textarea[name='edit-address']").val();
            console.log('click button update customer : '+uuid);
       
            $.ajax({
                type:'POST',
                url: '{{ url('customer/update')}}',
                dataType:'json',
                data:{
                    _token: '{!! csrf_token() !!}',
                    id :id,
                    uuid:uuid,
                    customer:customer, 
                    gender:gender,
                    telephone:telephone,
                    email:email,
                    address:address
                },
                success:function(data){                    
                    location.reload();
                    $("#myModalEdit").modal('hide');
                    console.log(data);
                }         
            });
        });

        $('.destroy-customer').click(function(){
            $("#myModalDestroy").modal('show');
            $("input[name='destroy-customer-id']").val($(this).data().value);
            $("input[name='destroy-customer']").val($(this).data().name);
        });
        $('.destroy-modal-customer').click(function(){
            var id = $("input[name='destroy-customer-id']").val();
            console.log('click button edit customer : '+id); 
                
            $.ajax({
                type:'POST',
                url: '{{ url('customer/destroy')}}',
                dataType:'json',
                data:{ 
                    _token: '{!! csrf_token() !!}',
                    id :id                              
                },
                success:function(data){   
                    console.log(data);
                    location.reload();
                    $("#myModalDestroy").modal('hide');
                },
                error: function(e) {
                    console.log(e.message);
                }           
            });
        });
    })
</script>
@endsection
