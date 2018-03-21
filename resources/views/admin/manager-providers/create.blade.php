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
         {{ Form::open(['route' => 'manager-providers.store'])}}
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title" style="margin: 10px 0 0;">Добавляем Менеджера</h3>
              @include('admin.errors')
            </div>
            <div class="box-body">
              <div class="col-md-6 row">
                <div class="form-group">
                  <label for="exampleInputName">Менеджера</label>
                  <input type="text" class="form-control" autofocus id="exampleInputName" placeholder="" name="name_con_p" value="{{ old('name_con_p') }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputSurname">Ссылка на Поставщика</label>
                  <input type="text" class="form-control" id="exampleInputSurname" placeholder="" name="surname_con_p" value="{{ old('surname_con_p') }}">
                </div>
                  <div class="form-group">
                      <label for="exampleInputLink">Ссылка на Поставщика</label>
                      <input type="text" class="form-control" id="exampleInputLink" placeholder="" name="patronymic_con_p" value="{{ old('patronymic_con_p') }}">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputLink">Ссылка на Поставщика</label>
                      <input type="text" class="form-control" id="exampleInputLink" placeholder="" name="position_con_p" value="{{ old('position_con_p') }}">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputLink">Мобильный телефон</label>
                      <input type="text" class="form-control" id="exampleInputMobil" placeholder="" name="mobile_con_p" value="{{ old('mobile_con_p') }}" data-inputmask="'alias': 'phone'">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputLink">Ссылка на Поставщика</label>
                      <input type="text" class="form-control" id="exampleInputOffice" placeholder="" name="office_con_p" value="{{ old('office_con_p') }}">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputLink">Ссылка на Поставщика</label>
                      <input type="text" class="form-control" id="exampleInputOfficeDob" placeholder="" name="officedob_con_p" value="{{ old('officedob_con_p') }}">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputLink">Email Менеджера</label>
                      <input type="text" class="form-control" id="exampleInputEmail" placeholder="" name="email_con_p" value="{{ old('email_con_p') }}" data-inputmask="'alias': 'email'">
                  </div>
                  <div class="form-group">
                      <label>Категория</label>
                      {{ Form::select('provider_id',
                        $providers,
                        null,
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
