@extends("layouts.sidebar")

@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>User Details</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active">User Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="container-fluid">
        <div class="user-profile social-app-profile">
            <div class="row">
                <div class="col-sm-14">
                    <div class="card profile-header"><img class="img-fluid bg-img-cover" src="{{asset('assets/images/user-card/3.jpg')}}" alt="">
                        <div class="profile-img-wrrap"><img class="img-fluid bg-img-cover" src="{{asset('assets/images/user-card/3.jpg')}}" alt=""></div>
                        <div class="userpro-box">
                            <div class="img-wrraper">
                                @if($user->profile_photo_path==NULL)
                                <div class="avatar"><img class="img-fluid" alt="" src="{{asset('bn.jpeg')}}"></div><a class="icon-wrapper" href="edit-profile.html"><i class="fa fa-pencil">                              </i></a>
                                @else
                                <div class="avatar"><img class="img-fluid" alt="" src="https://renomobilemoney.com/{{$user->profile_photo_path}}"></div><a class="icon-wrapper" href="edit-profile.html"><i class="fa fa-pencil">                              </i></a>
                                    @endif
                            </div>
                            <div class="user-designation">
                                <div class="title"><a target="_blank" href="#">
                                        <h4>{{\App\Console\encription::decryptdata($user->name)}}</h4>
                                        <h6>{{$user->role}}</h6></a></div>
                                <div class="social-media">
                                    <ul class="user-list-social">
                                        @if($wallet->account_number != "1")
                                            <br>
                                            <li class="mt-2"><i class="fa fa-phone text-info "></i> <b>Account-No</b> : {{$wallet->account_number}}</li>
                                            <br>
                                            <li class="mt-2"><i class="fa fa-user text-info "></i> <b>Account-Name</b> : {{$wallet->account_name}}</li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="follow">
                                    <ul class="follow-list">
                                        <li>
                                            <div class="follow-num counter m-2">&#8358;{{number_format($wallet->balance)}}</div><span>Balance</span>
                                        </li>
                                        <li>
                                            <div class="follow-num counter m-2">&#8358;{{number_format($sumtt)}}</div><span>Total Deposit</span>
                                        </li>
                                        <li>
                                            <div class="follow-num counter m-2">&#8358;{{number_format($sumbo)}}</div><span>Total Bills                           </span>
                                        </li>
{{--                                        <li>--}}
{{--                                            <div class="follow-num counter">&#8358;{{number_format($sumch)}}</div><span>Total Charges                           </span>--}}
{{--                                        </li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  user profile first-style start-->
                <div class="col-sm-12 box-col-12">
                    <div class="card">
                        <div class="social-tab">
                            <ul class="nav nav-tabs" id="top-tab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="top-timeline" data-bs-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true"><i data-feather="money"></i>All Deposit</a></li>
                                <li class="nav-item"><a class="nav-link" id="top-about" data-bs-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><i data-feather="alert-circle"></i>All Purchase                                </a></li>
                                <li class="nav-item"><a class="nav-link" id="top-friends" data-bs-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false"><i data-feather="lock"></i>All Safelock</a></li>
                                <li class="nav-item"><a class="nav-link" id="top-photos" data-bs-toggle="tab" href="#charge" role="tab" aria-controls="charge" aria-selected="false"><i data-feather="money"></i>All Charges</a></li>
                            </ul>
                            <div class="input-group">
                                <a href="#" class="badge badge-primary active">Reset Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="top-tabContent">
                <div class="tab-pane fade show active" id="timeline" role="tabpanel" aria-labelledby="timeline">
                    <div class="card">
                        <div class="card-header">
                            <h5>Transactions</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Username</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>I. Wallet</th>
                                    <th>F. Wallet</th>
                                    <th>Ref</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($td as $dat)
                                    <tr>
                                        <td>{{$dat->id}}</td>
                                        <td>{{\App\Console\encription::decryptdata($dat->username)}}
                                        </td>
                                        <td>{{$dat->amount}}</td>
                                        <td class="center">

                                            @if($dat->status=="1")
                                                <span class="badge badge-success">Delivered</span>
                                            @elseif($dat->status=="0" || $dat->status=="Not Delivered" || $dat->status=="Error" || $dat->status=="ORDER_CANCELLED" || $dat->status=="Invalid Number" || $dat->status=="Unsuccessful")
                                                <span class="badge badge-warning">{{$dat->status}}</span>
                                            @else
                                                <span class="badge badge-info">{{$dat->status}}</span>
                                            @endif

                                        </td>
                                        <td>{{$dat->iwallet}}</td>
                                        <td>{{$dat->fwallet}}</td>
                                        <td>{{$dat->payment_ref}}</td>
                                        <td>{{$dat->date}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $td->links() }}
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about">
                    <div class="card">
                        <div class="card-header">
                            <h5>Bills Table</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Username</th>
                                    <th>Amount</th>
                                    <th>Product</th>
                                    <th>Number</th>
                                    <th>Token</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($version as $dat)
                                    <tr>
                                        <td>{{$dat->id}}</td>
                                        <td>{{\App\Console\encription::decryptdata($dat->username)}}</td>
                                        <td>&#8358;{{$dat->amount}}</td>
                                        <td>{{$dat->product}}</td>
                                        <td>{{$dat->number}}</td>
                                        <td>{{$dat->token}}</td>
                                        <td> @if($dat->status=="1")
                                                <span class="badge badge-success">Delivered</span>
                                            @elseif($dat->status=="0")
                                                <span class="badge badge-warning">Not-Delivered</span>
                                            @else
                                                <span class="badge badge-info">Not-Delivered</span>
                                            @endif</td>
                                        <td>{{$dat->created_at}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $td->links() }}
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="friends" role="tabpanel" aria-labelledby="friends">
                    <div class="row">
                        @foreach($lock as $safe)
                        <div class="col-sm-6 col-lg-6 col-xl-4">
                            <div class="card custom-card">
                                <div class="card-header"><img class="img-fluid" src="{{asset('assets/images/user-card/2.jpg')}}" alt=""></div>
                                <div class="card-profile"><img class="rounded-circle" src="{{asset('bn.jpeg')}}" alt=""></div>
                                <div class="text-center profile-details">
                                    <h4>Tittle: {{$safe->tittle}}</h4>
                                    <h6>Start Date: {{$safe->Start_date}}</h6>
                                </div>
                                <ul class="card-social text-white">
                                    <li><i class="fa fa-money"></i>: ₦{{ number_format(intval($safe->balance *1),2)}}</li>
                                    <li><i class="fa fa-calendar">Withdraw-Date</i> : {{$safe->date}}</li>
                                </ul>
                                <div class="card-footer row">
                                    <div class="col-4 col-sm-4">
                                        @if($safe->status=="1")
                                            <button type="button" class="btn btn-info btn-xs">
                                                Running
                                            </button>
                                        @elseif($safe->status=="0")
                                            <button type="button" class="btn btn-primary btn-xs">
                                                Completed
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{$lock->links()}}
                    </div>
                </div>

                <div class="tab-pane fade" id="charge" role="tabpanel" aria-labelledby="charge">
                    <div class="card">
                        <div class="card-header">
                            <h5>Charges</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Username</th>
                                    <th>Amount</th>
                                    <th>Refid</th>
                                    <th>I-Wallet</th>
                                    <th>F-Wallet</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($charge as $dat)
                                    <tr>
                                        <td>{{$dat->id}}</td>
                                        <td>{{\App\Console\encription::decryptdata($dat->username)}}</td>
                                        <td>&#8358;{{$dat->amount}}</td>
                                        <td>{{$dat->payment_ref}}</td>
                                        <td>{{$dat->iwallet}}</td>
                                        <td>{{$dat->fwallet}}</td>
                                        <td>{{$dat->date}}</td>

                                @endforeach
                                </tbody>
                            </table>
                            {{ $td->links() }}
                        </div>
                    </div>

                </div>


            </div>


        </div>
    </div>
@endsection
