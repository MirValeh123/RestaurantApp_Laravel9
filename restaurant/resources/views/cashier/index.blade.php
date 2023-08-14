@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="table-detail"   ></div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <button class="btn btn-primary btn-block" id="btn-show-table" >View All Table</button>
            <div class="selected-table">


            </div>
            <div id="order-detail">

            </div>
        </div>
        <div class="col-md-7">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist" >
                    @foreach ($categories as $category)
                        <a class="nav-items nav-link"  data-id="{{$category->id}}" data-toggle="tab"  href="">
                            {{$category->name}}
                        </a>
                    @endforeach

                </div>
            </nav>
            <div id="list-menu" class="row mt-2">

            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>


$(document).ready(function(){
    $('#table-detail').hide();

    $('#btn-show-table').click(function(){
        if($('#table-detail').is(':hidden')){
            $.get('/cashier/getTable',function(data){
                $('#table-detail').html(data);
                $('#table-detail').slideDown('fast');
                $('#btn-show-table').html('Hide Tables').removeClass('btn-primary').addClass('btn-danger')
            })
        }
        else{
            $('#table-detail').slideUp('fast');
            $('#btn-show-table').html('View All Tables').removeClass('btn-danger').addClass('btn-primary ')

        }
    })
})

$('.nav-link').click(function(event){
    event.preventDefault();
    var categoryId = $(this).data('id');
    var url = '/cashier/getMenuByCategory/' + categoryId;

    $.get(url, function(data){
        $('#list-menu').html(data);
    });
});

var SELECTED_TABLE_ID = ''
var SELECTED_TABLE_NAME = ''
$('#table-detail').on('click','.btn-table',function(){
    SELECTED_TABLE_ID = $(this).data('id');
    console.log(SELECTED_TABLE_ID)
    SELECTED_TABLE_NAME=$(this).data('name')
    $('.selected-table').html('<br><h3>Table:'+SELECTED_TABLE_NAME+'</h3><hr>');
    $.get('/cashier/getSaleDetailsByTable/'+SELECTED_TABLE_ID,function(data){
        $('#order-detail').html(data);


    })
})
$('#list-menu').on('click','.btn-menu',function(){
    if(SELECTED_TABLE_ID == ''){
        alert('You need to select a table for the customer first')
    }
    else{
        var menu_id=$(this).data('id')
        console.log("SELECTED_TABLE_ID:", SELECTED_TABLE_ID);
        console.log("menu_id:", menu_id);

        $.ajax({
            type:'POST',
            data:{
                '_token':$('meta[name="csrf-token"]').attr('content'),
                'menu_id':menu_id,
                'table_id':SELECTED_TABLE_ID,
                'table_name':SELECTED_TABLE_NAME,
                'quantity':1,
            },
            url:'/cashier/orderFood',
            success:function(data){
                $('#order-detail').html(data);
            }
        })
    }

})
$('#order-detail').on('click','.btn-confirm-order',function () {
        var SaleID=$(this).data('id');
        $.ajax({
            type:'POST',
            data:{
                '_token':$('meta[name="csrf-token"]').attr('content'),
                'sale_id':SaleID,

            },
            url:'/cashier/confirmOrderStatus',
            success:function (data) {
                $('#order-detail').html(data);
            }
        })
    })
$('#order-detail').on('click','.btn-delete-saledetail',function(){
    var saledetailId=$(this).data('id');
    $.ajax({
        type:'POST',
        data:{
            '_token':$('meta[name="csrf-token"]').attr('content'),
            'saleDetail_id':saledetailId,
        },
        url:'/cashier/deleteSaleDetail',
        success:function (data) {
            $('#order-detail').html(data);

        }
    })
})
</script>
@endsection
