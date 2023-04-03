@extends("layouts.sidebar")

@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3><b>Resellers</b></h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active">All-Reseller</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid user-card">
        <div class="row">
            @foreach($u as $user )
            <div class="col-md-6 col-lg-6 col-xl-4 box-col-4">
                <div class="card custom-card">
                    <div class="card-header"><img class="img-fluid" src="{{asset('assets/images/user-card/6.jpg')}}" alt=""></div>

                    @if($user->profile_photo_path==NULL)
                    <div class="card-profile"><img class="rounded-circle" src="{{asset('bn.jpeg')}}" alt=""></div>
                    @else
                        <div class="card-profile"><img class="rounded-circle" src="https://renomobilemoney.com/{{$user->profile_photo_path}}" alt=""></div>
                    @endif
                        <div class="text-center profile-details"><a href="admin/profile/{{ $user->username }}">
                            <h4>{{\App\Console\encription::decryptdata($user->username)}}</h4></a>
                            <h6>APIKEY: <span class="badge badge-success">{{$user->apikey}}</span></h6>
                        <h6>ID: {{$user->id}}</h6>
                        <h6>EMAIL: {{\App\Console\encription::decryptdata($user->email)}}</h6>
{{--                        <h6>PIN: {{$user->pin}}</h6>--}}
                        <h6>BALANCE: ₦{{$user->parentData->balance}}</h6>
{{--                            <h6>NAME: {{\App\Console\encription::decryptdata($user->name)}}</h6>--}}
{{--                            <h6>PHONE: {{\App\Console\encription::decryptdata($user->phone)}}</h6>--}}

                        </div>

                    <a href="admin/profile/{{ $user->username }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
{{--                    <a href="delete/{{ $user->id}}" class="btn btn-sm btn-danger"><i class="fa fa-recycle"></i></a>--}}
                    <button type="button" class="btn btn-sm btn-info" onclick="onPick">Block Reseller</button>
                    <button type="button" class="btn btn-sm btn-warning" onclick="onPick">Reset Key</button>

                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
