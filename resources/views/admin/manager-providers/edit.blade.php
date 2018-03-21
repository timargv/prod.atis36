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
        {{ Form::open(['route' => ['manager-providers.update', $mprovider->id], 'method' => 'put'] )}}

        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" style="margin: 10px 0 0;">Добавляем Менеджера</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6 row">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Менеджера</label>
                            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="name_con_p" value="{{ $mprovider->name_con_p }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLink">Ссылка на Поставщика</label>
                            <input type="text" class="form-control" id="exampleInputLink" placeholder="" name="surname_con_p" value="{{ $mprovider->surname_con_p }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLink">Ссылка на Поставщика</label>
                            <input type="text" class="form-control" id="exampleInputLink" placeholder="" name="patronymic_con_p" value="{{ $mprovider->patronymic_con_p }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLink">Ссылка на Поставщика</label>
                            <input type="text" class="form-control" id="exampleInputLink" placeholder="" name="position_con_p" value="{{ $mprovider->position_con_p }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLink">Ссылка на Поставщика</label>
                            <input type="text" class="form-control" id="exampleInputLink" placeholder="" name="office_con_p" value="{{ $mprovider->office_con_p }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLink">Ссылка на Поставщика</label>
                            <input type="text" class="form-control" id="exampleInputLink" placeholder="" name="officedob_con_p" value="{{ $mprovider->officedob_con_p }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLink">Ссылка на Поставщика</label>
                            <input type="text" class="form-control" id="exampleInputLink" placeholder="" name="email_con_p" value="{{ $mprovider->email_con_p }}">
                        </div>
                        <div class="form-group">
                            <label>Компания</label>
                            {{ Form::select('id_provider',
                              $providers,
                              $mprovider->getProviderID(),
                              ['class' => 'form-control select2', 'style' => 'width: 100%;'])
                            }}

                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer" style="padding: 15px 10px 15px;">
                    <a href="{{ route('manager-providers.index') }}" class="btn btn-default">Назад</a>
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{ Form::close() }}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
