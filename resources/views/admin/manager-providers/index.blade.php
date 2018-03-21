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
                    <h3 class="box-title">Контакты менеджеров</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('manager-providers.create') }}" class="btn btn-success">Добавить</a>
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
                            <td>{{ $mprovider->office_con_p }} <br /> <mark><small>доб</small> {{ $mprovider->officedob_con_p }}</mark></td>
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
                        {{ $mproviders->links() }}

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
