@extends("layouts.sidebar")

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>MCD Transaction</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active">Api Curl</li>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Reference Number</th>
                                    <th scope="col"> Date</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Device Details</th>
                                    <th scope="col">Amount Before</th>
                                    <th scope="col">Amount After</th>
                                    <th scope="col">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($success as $plan)
                            <tr>
                                <td>{{$plan['name'] }}</td>
                                <td>{{ $plan['ref'] }}</td>
                                <td>{{ $plan['date'] }}</td>
                                <td>{{ $plan['user_name']}}</td>
                                <td>{{ $plan['amount'] }}</td>
                                <td>{{ $plan['device_details'] }}</td>
                                <td>{{$plan['i_wallet'] }}</td>
                                <td>{{ $plan['f_wallet'] }}</td>
                                <td>{{$plan['description'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
