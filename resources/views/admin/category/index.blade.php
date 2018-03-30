@extends('admin.layout')

@section('content')
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Категории
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг сущности</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('categories.create')}}" class="btn btn-success">Добавить</a>
                        <a href="{{ route('categories.export') }}" class="btn btn-success">Export</a>
                        <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Import</a>
                    </div>
                    <div class="collapse" id="collapseExample">
                        <div class="well">
                            <form method="post" action="{{ route('categories.import') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="file" name="file" id="exampleInputFile">
                                </div>
                                <button type="submit" class="btn btn-default">Отправить</button>
                            </form>

                        </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 50px">ID</th>
                            <th>Название</th>
                            <th style="width: 100px">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)

                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>
                              <div class="btn-group" role="group">
                                <a href="{{route('categories.edit', $category->id)}}"  class="btn btn-primary btn-sm"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                                {{ Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete', 'class' => 'btn btn-danger btn-sm'])}}
                                    <button onclick="return confirm('Вы уверены?')" type="submit">
                                        <i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>
                                    </button>
                                {{Form::close()}}
                              </div>
                            </td>
                        </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
