@extends("layouts.sidebar")

@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Airtime Controller</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Switch</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid default-dash">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>SWITCH</h5>
                    </div>
                    <div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                        @foreach($air as $seller)
                                        <tr>
                                            <td class="pills-component">@if($seller->server=="MCD")
                                                    <img width="50" src="{{asset('tar.png')}}"/>
                                                @else
                                                    <img width="50" src="https://play-lh.googleusercontent.com/Cl5NJPMl2ISza-X56AZ5QfDKapZn-MdwbFakJLrRrL0mDEFsn-9YjuQH4zy-W2Cbs_8=w240-h480-rw"/>
                                                @endif
                                                    {{$seller->server}} </td>
                                            <td class="w-50">
                                                <label class="switch">
                                                    <input type="checkbox"  value="0"
                                                        {{$seller->status =="1"?'checked':''}}
                                                        onclick="window.location='{{route('up1', $seller->id)}}'"
                                                    />
                                                    <span class="switch-state"></span>
                                                </label>
                                            </td>
                                            <td>@if($seller->status=="1")<span class="badge badge-success">Active</span>@else<span
                                                    class="badge badge-warning">
                                                    Not-Active</span> @endif</td>
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


        </div>

        </div>

@endsection
