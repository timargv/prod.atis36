@extends('admin.layout')

@section('content')
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Поставщики
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
                        <a href="{{route('providers.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 50px">ID</th>
                            <th>Название</th>
                            <th>Название</th>
                            <th>Название</th>
                            <th>Название</th>
                            <th>Название</th>
                            <th>Название</th>
                            <th>Название</th>
                            <th>Название</th>
                            <th>Название</th>
                            <th style="width: 100px">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($manager_providers as $managerprovider)

                        <tr>
                            <td>{{ $managerprovider->id }}</td>
                            <td>{{ $managerprovider->name_con_p }}</td>
                            <td>{{ $managerprovider->surname_con_p }}</td>
                            <td>{{ $managerprovider->patronymic_con_p }}</td>
                            <td>{{ $managerprovider->position_con_p }}</td>
                            <td>{{ $managerprovider->mobile_con_p }}</td>
                            <td>{{ $managerprovider->office_con_p }}</td>
                            <td>{{ $managerprovider->officedob_con_p }}</td>
                            <td>{{ $managerprovider->email_con_p }}</td>
                            <td>{{ $managerprovider->getProviderTitle() }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{route('manager-providers.edit', $managerprovider->id)}}"  class="btn btn-primary btn-sm"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                                    {{ Form::open(['route' => ['managerproviders.destroy', $managerprovider->id], 'method' => 'delete', 'class' => 'btn btn-danger btn-sm'])}}
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
