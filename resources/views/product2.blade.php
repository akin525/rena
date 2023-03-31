@extends("layouts.sidebar")

@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>EASYACCESS Product</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Products</h5>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="order-history table-responsive">
                            <table class="table table-bordernone display" id="basic-1">
                                <thead>
                                <tr>
                                    <th scope="col">Network</th>
                                    <th scope="col">Plan</th>
                                    <th scope="col">Actual Amount</th>
                                    <th scope="col">Selling Amount</th>
                                    <th scope="col">Reseller Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Switch</th>
                                    <th scope="col">Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product as $seller)
                                    <tr>
                                        <td> {{$seller->network}} </td>
                                        <td> {{$seller->plan}}</td>
                                        <td> {{$seller->amount}}</td>
                                        <td> {{$seller->tamount}}</td>
                                        <td> {{$seller->ramount}}</td>
                                        <td>@if($seller->status=="1")<h6 class="badge badge-success">Active</h6>@else<h6
                                                class="badge badge-warning">
                                                Not-Active</h6> @endif</td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" name="status" value="0" id="myCheckBox"
                                                       {{$seller->status =="1"?'checked':''}}
                                                       onclick="window.location='{{route('pd2', $seller->id)}}'"/>
                                                <span class="switch-state"></span>

                                                <a></a>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="{{route('editproduct2', $seller->id)}}" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$product->links()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
