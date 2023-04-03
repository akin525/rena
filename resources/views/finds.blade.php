@extends("layouts.sidebar")

@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3><b>Finds User</b></h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active">Search</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid user-card">
        <div class="row">
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

            <form class="form-horizontal" method="POST" action="{{ route('finduser') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input style="margin-right: 20px" type="text" name="user_name" placeholder="Search for username" class="form-control @error('user_name') is-invalid @enderror">

                        </div>
                        <div class="input-group mt-2" style="align-content: center">
                            <button class="btn btn-primary btn-large" type="submit" style="align-self: center; align-content: center"><i class="fa fa-search"></i> Search</button>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </form>

                @if($result ?? '')
                    <div class="row">
                        <h4 class="mt-0 header-title">Search Result(s)</h4>
                        <p class="text-muted mb-4 font-13">Total Result <code>{{$count}}</code></p>
                        @foreach($users as $user)
                        <div class="col-xl-3 xl-40 box-col-5">
                            <div class="job-sidebar md-sidebar">
                                <div class="">
                                    <div class="default-according style-1 job-accordion">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0 p-0">
                                                            <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseicon1">{{\App\Console\encription::decryptdata($user->username)}}</button>
                                                        </h5>
                                                    </div>
                                                    <div class="collapse show" id="collapseicon1" aria-labelledby="collapseicon1" data-bs-parent="#accordion">
                                                        <div class="categories">
                                                            <div class="learning-header"><span class="f-w-600">{{$user->role}}</span></div>
                                                            <ul>
                                                                <li><a href="#">Name</a><span class="badge badge-primary pull-right">{{\App\Console\encription::decryptdata($user->name)}}</span></li>
                                                                <li><a href="#">Phone</a><span class="badge badge-primary pull-right">{{\App\Console\encription::decryptdata($user->phone)}}</span></li>
                                                                <li><a href="#">Balance</a><span class="badge badge-primary pull-right">₦{{$user->parentData->balance}}</span></li>
                                                                <li><a href="#">Pin</a><span class="badge badge-primary pull-right">{{$user->pin}}</span></li>
                                                            </ul>
                                                        </div>
                                                        <div class="categories pt-0">
                                                            <div class="learning-header"><span class="f-w-600">Account Details</span></div>
                                                            <ul>
                                                                <li><a href="#">Account No</a><span class="badge badge-primary pull-right">{{$user->parentData->account_number}}</span></li>
                                                                <li><a href="#">Account Name</a><span class="badge badge-primary pull-right">{{$user->parentData->account_name}}</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-xl-9 xl-60 box-col-7">
                                <div class="blog-single">
                                    <div class="card custom-card">
                                        <div class="card-header"><img class="img-fluid" src="{{asset('assets/images/user-card/6.jpg')}}" alt=""></div>

                                        @if($user->profile_photo_path==NULL)
                                            <div class="card-profile"><img class="rounded-circle" src="{{asset('bn.jpeg')}}" alt=""></div>
                                        @else
                                            <div class="card-profile"><img class="rounded-circle" src="https://renomobilemoney.com/{{$user->profile_photo_path}}" alt=""></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
        </div>
    </div>
@endsection
