<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant App - Receipt - SaleID :  {{$sale->id }}</title>
</head>
<body>
<div id="wrapper">
    <div class="receipt-header">
        <h3 id="restaurant-name">Restaurnat App Devtamin</h3>
        <p>Address: 341 N Vakanda Ave</p>
        <p>Analpolis , MD 1234</p>
        <p>Tel , 473-XXXX-XXXX</p>
        <p>Reference Receipt: <strong>{{$sale->id}}</strong> </p>
    </div>
    <div class="receipt-body">
        <table class="tb-sale-detail" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($saleDetails as $saleDetail)
                <tr>
                    <td width="30" >{{$saleDetail->menu_id}}</td>
                    <td width="180" >{{$saleDetail->menu_name}}</td>
                    <td width="50" >{{$saleDetail->quantity}}</td>
                    <td width="55" >{{$saleDetail->menu_price}}</td>
                    <td width="65" >{{$saleDetail->menu_price * $saleDetail->quantity}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <table class="tb-sale-total">
            <tbody>
                <tr>
                    <td>Total Quantity</td>
                    <td>{{$saleDetail->count()}}</td>
                    <td>Total</td>
                    <td>${{number_format($sale->total_price,2)}}</td>
                </tr>
                <tr>
                    <tr>
                        <td colspan="2" >Payment Type</td>
                        <td colspan="2" >{{$sale->paymentType}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" >Paid Amount</td>
                        <td colspan="2" >${{number_format($sale->total_recieved,2)}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" >Payment Type</td>
                        <td colspan="2" >{{$sale->payment_type}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" >Change</td>
                        <td colspan="2" >${{number_format($sale->change,2)}}</td>
                    </tr>


                </tr>
            </tbody>
        </table>
    </div>
    <div class="receipt-footer">
        <p>Thank You!!!</p>
    </div>
    <div id="buttons">
        <a href="/service/cashier/">
            <div class="btn btn-back"  >
                Back to Cashier
            </div>
        </a>
        <div class="btn btn-print" type="button" onclick="window.print('');return false;"  >
            Print
        </div>
    </div>
</div>
</body>
</html>
