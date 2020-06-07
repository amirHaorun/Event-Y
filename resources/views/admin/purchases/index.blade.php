@extends('admin.admin-dashboard')

@section('content')
<div class="content">
<div class="row">
    <div class="card">
        <div class="card-header">
            <h5 class="title">All Orders</h5>
        </div>
        <div class="card-body">

            <table id="users_table" class="table">
                <thead>
                <tr>
                    <th class="text-center">ID </th>
                    <th class="text-center">FULL NAME</th>
                    <th class="text-center">EVENT NAME</th>
                    <th class="text-center">TICKET</th>
                    <th class="text-center">QUANTITY</th>
                    <th class="text-center">PRICE</th>
                    <th class="text-center">Status</th>

                </tr>
                </thead>
                <tbody>
                @if($purchases)
                    @foreach($purchases as $purchase)
                        <tr>
                            <td class="text-center">{{$purchase->id}}</td>
                            <td class="text-center">   {{$purchase->user->full_name}}</td>
                            <td class="text-center">   {{$purchase->ticket->event->name}}</td>
                            <td class="text-center">   {{$purchase->ticket->type}}</td>
                            <td class="text-center">   {{$purchase->quantity}}</td>
                            <td class="text-center">   {{$purchase->value}}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        STATUS
                                    </button>
                                    <div style="background-color: midnightblue " class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a  style="color: white" class="dropdown-item" href="/admin/orders/{{$purchase->id}}/{{"PENDING"}}/status">PENDING</a>
                                        <a style="color: white"class="dropdown-item" href="/admin/orders/{{$purchase->id}}/{{"DELIVERING"}}/status">DELIVERING</a>
                                        <a style="color: white" class="dropdown-item" href="/admin/orders/{{$purchase->id}}/{{"DELIVERED"}}/status">DELIVERED</a>
                                        <a style="color: white" class="dropdown-item" href="/admin/orders/{{$purchase->id}}/{{"CANCEL"}}/status">CANCEL</a>
                                    </div>
                                </div>

                                @if($purchase->status == "cancel request")
                                    Cancel Request
                                    @else
                                    {{$purchase->status}}
                                @endif
                            </td>
                    @endforeach
                @endif

                </tbody>
            </table>

        </div>
        <div class="card-footer">
        </div>
    </div>
</div>
</div>
    @endsection
