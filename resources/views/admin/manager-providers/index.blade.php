@extends('admin.layout')

@section('content')
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Менеджеры
                <small>...</small>
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
                    <h3 class="box-title">Контакты менеджеров</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group clearfix">
                      <div class="btn-group pull-left" role="group">
                        <a href="{{ route('manager-providers.create') }}" class="btn btn-success">Добавить</a>
                      </div>
                      <div class="form-group btn-group pull-right" role="group">
                        @if($mproviders->count() != null)
                          <a href="{{ route('mprovider.export') }}" class="btn btn-default">Export</a>
                        @endif
                          <a class="btn btn-default" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Import</a>
                      </div>
                    </div>
                    <div class="collapse" id="collapseExample">
                        <div class="well">
                            <form method="post" action="{{ route('mprovider.import') }}" enctype="multipart/form-data">
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
                            <th style="width: 10px">ID</th>
                            <th>Имя Фамилия</th>
                            {{--<th>Фамилия</th>--}}
                            {{--<th>Отчество</th>--}}
                            <th>Должность</th>
                            <th>Моб.</th>
                            <th>Тел.</th>
                            {{--<th>Доб.</th>--}}
                            <th>Email</th>
                            <th>Компания</th>
                            <th style="width: 50px">Действия</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($mproviders as $mprovider)
                        <tr>
                            <td>{{ $mprovider->id }}</td>
                            <td>{{ $mprovider->name_con_p }} {{ $mprovider->surname_con_p }}</td>
                            {{--<td>{{ $mprovider->surname_con_p }}</td>--}}
{{--                            <td>{{ $mprovider->patronymic_con_p }}</td>--}}
                            <td>{{ $mprovider->position_con_p }}</td>
                            <td>{{ $mprovider->mobile_con_p }}</td>
                            <td><h5>{{ $mprovider->office_con_p }}  <span class="label label-default" data-toggle="tooltip" data-placement="top" title="Добавочный номер">{{ $mprovider->officedob_con_p }}</span></h5></td>
{{--                            <td>{{ $mprovider->officedob_con_p }}</td>--}}
                            <td>{{ $mprovider->email_con_p }}</td>
                            <td>{{ $mprovider->getProviderTitle() }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{route('manager-providers.edit', $mprovider->id)}}"  class="btn btn-primary btn-sm"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                                    {{ Form::open(['route' => ['manager-providers.destroy', $mprovider->id], 'method' => 'delete', 'class' => 'btn btn-danger btn-sm'])}}
                                    <button onclick="return confirm('Вы уверены?')" type="submit">
                                        <i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>
                                    </button>
                                    {{Form::close()}}
                                </div>
                                </div>
                            </td>
                        </tr>
                         @endforeach
                        </tbody>

                    </table>
                    {{ $mproviders->links() }}

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
