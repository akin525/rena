@extends("layouts.sidebar")

@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Charge User</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active">Charge User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid default-dash">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">                        <!-- col-md-6 -->
                        <div class="col-md-12 col-12">

                            <div class="form-group">
                                <div class="cont  act-thumb card-body">
                                    <h1><i class="fa i-cl-4 fa-money"></i></h1>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <form action="{{route('cr')}}" method="post">
                                    @csrf

                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Enter Receiver's Username</label>
                                                <input type="text" class="form-control" id="email" name="username" placeholder="Enter Reveiver's Username" required />
                                                <input type="hidden" class="form-control" value="{{rand(111111111, 999999999)}}" name="refid" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Enter Amount </label>
                                                <input type="number" name="amount" class="form-control" placeholder="Amount to fund" required/>
                                            </div>
                                        </div>
                                    </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <br>
                                    <button type="submit" class="btn btn-rounded btn-outline-success btn-block">Fund Wallet</button>
                                </div>
                            </div>
                                </form>
                            </div>


                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
