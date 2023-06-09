@extends("layouts.sidebar")

@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Find Bills</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active">Finds</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->

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
                    <div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        Kindly Provide the Refid of the transaction you purchase on our website
                    </div>
                <form class="form-horizontal" method="POST" action="{{ route('check') }}">
                    @csrf
                    <div class="form-group row bg-white rounded text-center">
                        <div class="col-md-12">
                            <div class="input-group mt-2">
                                <div class="input-group-prepend"><span class="input-group-text">REF</span></div>
                                <input type="text" name="refid" placeholder="Enter server reference" class="form-control @error('ref') is-invalid @enderror" required>
                                <button class="btn btn-success" type="submit" style="align-self: center; align-content: center"><i class="fa fa-search"></i>Verify</button>
                            </div>
                            @error('ref')
                            <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <!--end row-->
                </form>
            </div>
        </div>
    </div>

@if($result ?? '')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Search Result(s)</h4>
{{--                    <p class="text-muted mb-4 font-13">Total Result <code>{{$count}}</code></p>--}}
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Username</th>
                                <th>Product</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$check->id}}</td>
                                    <td>{{\App\Console\encription::decryptdata($check->username) }}</td>
                                    <td>{{$check->product}}</td>
                                    <td>{{$check->number}}</td>
                                    <td>@if($check->status==1)
                                    <span class="badge badge-success">Successfully Delivered</span>
                                        @else
                                            <span class="badge badge-success">Pending Transaction</span>
                                        @endif
                                    </td>
                                    <td>{{$check->timestamp}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endif

@endsection
