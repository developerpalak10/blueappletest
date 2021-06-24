@extends('admin.index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Admin Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                 @include('admin.partials.messages')
                 
                @if(session('welcome_msg'))
                <div class="col-12 col-sm-12 col-md-3">
                   
                        <div class="info-box mb-3">
                           
                             
                            <div class="info-box-content">
                                <span class="info-box-text">{{session('welcome_msg')}}</span>
                                
                            </div>
                            
                            <!-- /.info-box-content -->
                        </div>
                    
                    <!-- /.info-box -->
                </div>
                  @endif
                <!-- /.col -->

                
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div> 
                <!-- -->
                <!-- /.col -->
            </div>
            <!-- /.row -->

            
            <!-- /.row -->


            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>

    <!-- /.content -->
</div>
@endsection
