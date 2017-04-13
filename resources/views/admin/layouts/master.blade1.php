@extends('adminlte::layouts.app')

<div class="clearfix"></div>
<div class="page-container">
@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-40 col-md-offset-0">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">


                    @if (Session::has('message'))
                        <div class="note note-info">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif

                    @yield('content')

                </div>
            </div>
            <div class="scroll-to-top"
                 style="display: none;">
                 <i class="fa fa-arrow-up"></i>
            </div>
                        
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection
   
    
@include('admin.partials.javascripts')

@yield('javascript')
@include('admin.partials.footer')


