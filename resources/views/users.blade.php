@extends("layouts.sidebar")

@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3><b>Users</b></h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active">All-Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid user-card">
        <div class="row">
            @foreach($users as $user )
            <div class="col-md-6 col-lg-6 col-xl-4 box-col-4">
                <div class="card custom-card">
                    <div class="card-header"><img class="img-fluid" src="{{asset('assets/images/user-card/6.jpg')}}" alt=""></div>

                    @if($user->profile_photo_path==NULL)
                        <center>
                    <div class="card-profile"><img class="rounded-circle" src="{{asset('bn.jpeg')}}" alt=""></div>
                    @else
                        <div class="card-profile"><img class="rounded-circle" src="https://renomobilemoney.com/{{$user->profile_photo_path}}" alt=""></div>
                        </center>
                    @endif
                        <div class="text-center profile-details"><a href="admin/profile/{{ $user->username }}">
                            <h4>{{\App\Console\encription::decryptdata($user->username)}}</h4></a>
                        <h6>ID: {{$user->id}}</h6>
                        <h6>EMAIL: {{\App\Console\encription::decryptdata($user->email)}}</h6>
                        <h6>PIN: {{$user->pin}}</h6>
                        <h6>BALANCE: ₦{{$user->parentData->balance}}</h6>
                            <h6>NAME: {{\App\Console\encription::decryptdata($user->name)}}</h6>
                            <h6>PHONE: {{\App\Console\encription::decryptdata($user->phone)}}</h6>

                        </div>
                    <button class="btn btn-warning sweet-5" type="button" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-5']);">Warning alert</button>

                    <a href="admin/profile/{{ $user->username }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
{{--                    <a href="delete/{{ $user->id}}" class="btn btn-sm btn-danger"><i class="fa fa-recycle"></i></a>--}}
                    <button type="button" class="btn btn-sm btn-danger" onclick="onPick"><i class="fa fa-recycle"></i></button>

                </div>
            </div>
            @endforeach
            {{$users->links()}}
            <script>
                const onPick = value => {
                    swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover this imaginary file!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                            .then((willDelete) => {
                                if (willDelete) {
                                    swal("Poof! Your imaginary file has been deleted!", {
                                        icon: "success",
                                    });
                                } else {
                                    swal("Your imaginary file is safe!");
                                }
                            })
                    }

            </script>
        </div>
    </div>
@endsection
