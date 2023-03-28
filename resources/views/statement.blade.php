@extends("layouts.sidebar")

@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3><b>Generate Deposit Statement</b></h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Statement</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid default-dash">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="general-label">

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

                            <form class="form-horizontal" method="POST" action="{{ route('state1') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-users"></i></span>
                                            </div>
                                            <select style="margin-right: 20px"  name="username" class="form-control @error('') is-invalid @enderror">
                                                <option>Select Username</option>
                                                @foreach($user as $use)
                                                    <option value="{{$use['username']}}"><b>{{\App\Console\encription::decryptdata($use['username'])}}</b></option>
                                                @endforeach
                                            </select>

                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i> </span>
                                            </div>
                                            <input type="text" name="phoneno" value="Generate By Admin" class="form-control @error('phoneno') is-invalid @enderror" readonly>
                                        </div>

                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i> </span>
                                            </div>
                                            <input style="margin-right: 20px" type="date" name="from" placeholder="Search User group e.g agent, client, reseller" class="form-control @error('status') is-invalid @enderror">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-money"></i></span>
                                            </div>
                                            <input type="date" name="to" placeholder="Search for wallet value" class="form-control @error('wallet') is-invalid @enderror">
                                        </div>
                                        <div class="input-group mt-2" style="align-content: center">
                                            <button class="btn btn-primary btn-large" type="submit" style="align-self: center; align-content: center"><i class="fa fa-book"></i>Generate Statement</button>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if($result ?? '')
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Statement</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="display" id="export-button">
                                <thead>
                                <tr>
                                    <th>Username</th>
                                    <th> Transaction Id </th>
                                    <th> Date</th>
                                    <th>Amount</th>
                                    <th>Amount Before</th>
                                    <th>Amount After</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($deposit as $row)
                                    <tr>
                                        <td>{{\App\Console\encription::decryptdata($row->username)}}</td>
                                        <td>{{$row->payment_ref}}</td>
                                        <td>{{$row->date}}</td>
                                        <td>{{$row->amount}}</td>
                                        <td>{{$row->iwallet}}</td>
                                        <td>{{$row->fwallet}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Username</th>
                                    <th> Transaction Id </th>
                                    <th> Date</th>
                                    <th>Amount</th>
                                    <th>Amount Before</th>
                                    <th>Amount After</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
@endsection
