<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>INVOICE</title>
</head>
 <style> 
.card {
    margin-bottom: 1.5rem
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #c8ced3;
    border-radius: .25rem
}

.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0
}

.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: #f0f3f5;
    border-bottom: 1px solid #c8ced3
}
</style>
<body>
    <style> 
.card {
    margin-bottom: 1.5rem
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #c8ced3;
    border-radius: .25rem
}

.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0
}

.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: #f0f3f5;
    border-bottom: 1px solid #c8ced3
}
</style>
<div class="container-fluid">
    <div id="ui-view" data-select2-id="ui-view">
        <div>
            <div class="card">
                <div class="card-header">Invoice
                    <strong>#BBB-10010110101938</strong>
                    <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
                        <i class="fa fa-print"></i> Print</a>
                    
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <h6 class="mb-3">From:</h6>
                            <div>
                                <strong>SalePark</strong>
                            </div>
                            
                            <div>853, Azgar Villa, Baby Super Market</div>
                            <div> East Nasirabad 4210 Chittagong, Bangladesh</div>
                            <div>Email: admin@salepark.com</div>
                            <div>Phone: +8801991218038</div>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="mb-3">To:</h6>
                            <div>
                                <strong>{{$orders->name}}</strong>
                            </div>
                            <div>{{$orders->address}}</div>
                            
                            <div>{{$orders->mobile}}</div>
                        </div>
                        <div class="col-sm-4">
                           <img src="{{asset('/img/logo.png')}}" alt="" style="height:80px; width:300px;">
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">ID</th>
                                    <th>Item</th>
                                    
                                    <th class="center">Quantity</th>
                                    <th class="right">Unit Cost</th>
                                    <th class="right">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($order_details as $order)
                                
                             <tr>
                            <td>{{$order->id}}</td>
                            <td class="center">{{$order->Product->name}}</td> 
                            <td class="center">{{$order->product_sales_quantity}}</td>
                            <td class="center">&#2547; {{$order->product_price}} </td>
                           
                            <td class="center"> &#2547; {{$order->product_price*$order->product_sales_quantity}} </td>
                           
                            </tr>
                     @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                      
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                   
                                    <tr>
                                        <td class="left">
                                            <strong>Discount (0%)</strong>
                                        </td>
                                        <td class="right">: &#2547; 0</td>
                                    </tr>
                                  
                                    <tr>
                                        <td class="left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong>: &#2547; {{$orders->amount}}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>