@extends("layouts.sidebar")

@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3><b>Safe-Lock</b></h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active">All-Lock</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid user-card">
        <div class="row">
            @foreach($lock as $re)
            <div class="col-md-6 col-lg-6 col-xl-4 box-col-4">
                <div class="card custom-card">
                    <div class="card-header"><img class="img-fluid" src="{{asset('assets/images/user-card/7.jpg')}}" alt=""></div>
                    <div class="card-profile"><img class="rounded-circle" src="{{asset('bn.jpeg')}}" alt=""></div>
                    <div class="text-center profile-details"><a href="user-profile.html">
                            <h4><b>SAFE-LOCK</b></h4></a>
                        <h6><b>Username: </b>{{\App\Console\encription::decryptdata($re->username)}}</h6>
                        <h6><b>Starting-Date</b>: {{$re->Start_date}}</h6>
                    </div>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-money"></i>: ₦{{ number_format(intval($re->balance *1),2)}}</li>
                        <li><i class="fa fa-calendar">Withdraw-Date</i> : {{$re->date}}</li>
                    </ul>
                    <div class="card-footer row">
                        @if($re->status=="1")
                            <button type="button" class="btn btn-info btn-xs">
                                Running
                            </button>
                        @elseif($re->status=="0")
                            <button type="button" class="btn btn-primary btn-xs">
                                Completed
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$lock->links()}}
    </div>
@endsection
