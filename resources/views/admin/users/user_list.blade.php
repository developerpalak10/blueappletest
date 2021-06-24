@extends('admin.index')

@section('after-style')

    <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Audit Log</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Audit Log</h3>

                               
                            </div>
                           
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="user-list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S No.</th>
                                            <th>User Type</th>
                                            <th>User ID</th>
                                            <th>Email</th>
                                            <th>IP Address</th>
                                            <th>User Agent</th>
                                            
                                            <th>Logged At</th>
                                            
                                            <th>Loggout At</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                         <?php $sn =1;?> 

                                            @forelse($users as $user)
                                        <tr>
                                            <td>{{ $sn }}</td>
                                            <td>{{($user->user_type==1)?'Admin':'User'}}</td>
                                           
                                             <td>
                                                {{$user->id}}
                                            </td> 
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->ip_address ?? ''}}</td>
                                            <td>{{$user->user_agent ??''}}</td>
                                            <td>{{$user->login_at ??''}}</td>
                                            <td>{{$user->logout_at ??''}}</td>
                                            
                                            <td>
                                                
                                            </td>
                                            
                                            

                                        </tr>
                                        <?php $sn++;?>
                                        @empty
                                        <tr colspan="7">No data</tr>
                                        @endforelse
                                        
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
       
        <!-- /.content -->
    </div>

@endsection

@section('after-scripts')
<script src="{{asset('public/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
    $(function () {
        $("#user-list").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

    $("img").lazyload({
	    effect : "fadeIn"
	});
</script>
<script>
    function activate(id) {
        $.ajax({
            type: 'POST',
            url: "{{url('admin/activate-user')}}",
            data: {
                _token: "{{ csrf_token() }}",
                userId: id,
            },
            success: function(data) {
                location.reload();
            }
        });
    }
</script>
<script>
    function deactivate(id) {
        $.ajax({
            type: 'POST',
            url: "{{url('admin/deactivate-user')}}",
            data: {
                _token: "{{ csrf_token() }}",
                userId: id,
            },
            success: function(data) {
                location.reload();
            }
        });
    }
</script>

@endsection

