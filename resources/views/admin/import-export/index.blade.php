@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить Поставщика
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        {{--        {{ Form::open(['route' => 'providers.importProviders',  'method' => 'post', 'file' => true ])}}--}}
        <!-- Default box -->
            <form action="{{ route('') }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="margin: 10px 0 0;">Добавляем Поставщика</h3>
                        @include('admin.errors')
                    </div>
                    <div class="box-body ">
                        <div class="form-group">
                            <label for="exampleInputEmail1">File</label>
                            <input type="file" id="exampleInputFile" name="file">
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer" style="padding: 15px 10px 15px;">
                        <button type="submit" class="btn btn-success ">Добавить</button>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
                {{--{{ Form::close() }}--}}
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
