@extends("layouts.sidebar")

@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3><b>Daily Interest</b></h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active">Safe-lock Interest</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid user-card">
        <div class="row">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <div class="card">
                        <div class="card-body">
                            <h3>Dailly Interest Dropping</h3>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Username</th>
                                        <th>Amount</th>
                                        <!--                                                    <th>Action</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($in as $re)
                                        <tr>
                                            <td>{{$re->date}}</td>
                                            <td>{{\App\Console\encription::decryptdata($re->username)}}</td>
                                            <td>{{$re->profit}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$in->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection



































<script src="{{asset('asset/js/vendor.min.js')}}" type="847c8da2504a1915642ffbeb-text/javascript"></script>
<script src="{{asset('asset/js/app.min.js')}}" type="847c8da2504a1915642ffbeb-text/javascript"></script>
<script src="{{asset('asset/js/theme/default.min.js')}}" type="847c8da2504a1915642ffbeb-text/javascript"></script>


<script src="{{asset('asset/datatables.net/js/jquery.dataTables.min.js')}}" type="847c8da2504a1915642ffbeb-text/javascript"></script>
<script src="{{asset('asset/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}" type="847c8da2504a1915642ffbeb-text/javascript"></script>
<script src="{{asset('asset/datatables.net-responsive/js/dataTables.responsive.min.js')}}" type="847c8da2504a1915642ffbeb-text/javascript"></script>
<script src="{{asset('asset/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}" type="847c8da2504a1915642ffbeb-text/javascript"></script>
<script src="{{asset('asset/js/demo/table-manage-default.demo.js')}}" type="847c8da2504a1915642ffbeb-text/javascript"></script>
<script src="{{asset('asset/%40highlightjs/cdn-assets/highlight.min.js')}}" type="847c8da2504a1915642ffbeb-text/javascript"></script>
<script src="{{asset('asset/js/demo/render.highlight.js')}}" type="847c8da2504a1915642ffbeb-text/javascript"></script>


<script src="{{asset('asset/datatables.net/js/jquery.dataTables.min.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src="{{asset('asset/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src={{asset('"asset/datatables.net-responsive/js/dataTables.responsive.min.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src="{{asset('asset/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src="{{asset('asset/datatables.net-buttons/js/dataTables.buttons.min.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src="{{asset('asset/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src="{{asset('asset/datatables.net-buttons/js/buttons.colVis.min.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src="{{asset('asset/datatables.net-buttons/js/buttons.flash.min.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src="{{asset('asset/datatables.net-buttons/js/buttons.html5.min.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src="{{asset('asset/datatables.net-buttons/js/buttons.print.min.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src="{{asset('asset/pdfmake/build/pdfmake.min.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src="{{asset('asset/pdfmake/build/vfs_fonts.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src="{{asset('asset/jszip/dist/jszip.min.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src="{{asset('asset/js/demo/table-manage-buttons.demo.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src="{{asset('asset/%40highlightjs/cdn-assets/highlight.min.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src="{{asset('asset/js/demo/render.highlight.js')}}" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
<script src="{{asset('cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}" data-cf-settings="f1e2722e35a43ad4c1e3a0c8-|49" defer=""></script><script defer src="../../../../static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"6a910724bd190718","version":"2021.10.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":100}'></script>

