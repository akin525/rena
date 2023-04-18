@extends("layouts.sidebar")

@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3><b>Check Data Selling Price from Mcd</b></h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active">Check Price</li>
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

            <form class="form-horizontal" method="POST" action="{{ route('ser') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-get-pocket"></i></span>
                            </div>
                            <select style="margin-right: 20px"  name="name"  class="form-control @error('user_name') is-invalid @enderror">
                                <option>Select Network</option>
                                <option value="m">MTN</option>
                                <option value="g">GLO</option>
                                <option value="A">AIRTEL</option>
                                <option value="9">9MOBILE</option>
                            </select>

                        </div>
                        <div class="input-group mt-2" style="align-content: center">
                            <button class="btn btn-primary btn-large" type="submit" style="align-self: center; align-content: center"><i class="fa fa-book"></i>VIEW</button>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </form>

            @if($result ?? '')
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Zero Configuration  Starts-->
                            <div class="col-sm-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="display" id="basic-1">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Code</th>
                                                    <th>Amount</th>
                                                    <th>Discount</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data as $body)
                                                <tr>
                                                    <td>{{$body['name']}}</td>
                                                    <td>{{$body['code']}}</td>
                                                    <td>{{$body['amount']}}</td>
                                                    <td>{{$body['discount']}}</td>
                                                    @if($body['status']=="1")
                                                        <td><span class="badge badge-success">Active</span> </td>
                                                    @else
                                                    <td><span class="badge badge-warning">Not-Active</span> </td>
                                                        @endif
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
            @endif
        </div>
    </div>
@endsection
