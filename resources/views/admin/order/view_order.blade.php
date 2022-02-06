@extends('admin.admin_master')
@section('admin_content')

    <div class="row" >

        <div class="invoice">
            <a role="button" class="btn btn-info" href="{{url('/invoice/'.$orders->id)}} " style="float: right;">Invoice</a>
        </div>

    </div>

    <br>
    <div class="row-fluid sortable">
        <div class="box span4">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Information</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer Mobile No</th>


                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$orders->Customer->name}}</td>
                        <td class="center">{{$orders->Customer->mobile}}</td>


                    </tr>


                    </tbody>
                </table>

            </div>
        </div><!--/span-->




        <div class="box span8">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Shipping Address</th>
                        <th>Mobile No</th>
                        <th>Email</th>
                        <th>Payment Method</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>{{$orders->Shipping->name}}</td>
                        <td class="center">{{$orders->Shipping->address}}</td>
                        <td class="center">{{$orders->Shipping->mobile}}</td>
                        <td class="center">{{$orders->Shipping->email}}</td>
                        <td class="center">{{$orders->Payment->payment}}</td>

                    </tr>



                    </tbody>
                </table>


            </div>
        </div><!--/span-->




        <div class="box span12" style="margin-left: auto;">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Product price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                    </tr>
                    </thead>
                    <tbody>
                       
                            @foreach ($order_details as $order)
                                
                             <tr>
                            <td>{{$order->Order->id}}</td>
                            <td class="center">{{$order->Product->name}}</td>
                            <td class="center">&#2547; {{$order->product_price}} </td>
                            <td class="center">{{$order->product_sales_quantity}}</td>
                            <td class="center"> &#2547; {{$order->product_price*$order->product_sales_quantity}} </td>
                           
                            </tr>
                     @endforeach

                    </tbody>

                    <tfoot>
                    <tr>
                        <td colspan="4" style="font-size: 20px;font-weight: 521;text-align: right; color: red"> Total Amount to pay</td>
                        <td><strong style="font-size: 20px; color: #007cff;">&#2547; {{$orders->total}} </strong></td>
                    </tr>
                    </tfoot>
                </table>


            </div>
        </div><!--/span-->


    </div><!--/row-->

@endsection