@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить категорию
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            {!! Form::open(['route' => 'categories.store', 'class' => 'awesome']) !!}

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" style="margin: 10px 0px 0;">Добавляем категорию</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title">
                        </div>
                    </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer" style="padding: 15px 10px 15px;">
                    <a href="{{ route('categories.index') }}" class="btn btn-default">Назад</a>
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

            {!! Form::close() !!}

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
