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
        {{ Form::open(['route' => 'providers.store'])}}
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title" style="margin: 10px 0 0;">Добавляем Поставщика</h3>
              @include('admin.errors')
            </div>
            <div class="box-body row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Поставщик *</label>
                  <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="АТИС" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputLink">Ссылка на Поставщика *</label>
                  <input type="text" class="form-control" id="exampleInputLink" placeholder="http://atis36.ru" name="link" value="{{ old('link') }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputDesc">Описание Поставщика</label>
                  <textarea class="form-control" rows="10" cols="45"  id="exampleInputDesc" placeholder="Необязательно Поле для комментарий" name="desc">{{ old('desc') }}</textarea>
                </div>
              </div>

              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="exampleInputEmail1">Полное наименование</label>
                  <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="Общество с ограниченной ответственностью «АТИС»" name="full_name_provider" value="{{ old('full_name_provider') }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Юридический адрес</label>
                  <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="394026,РФ, г.Воронеж, ул.Солнечная, д.31-а,офис 201" name="ur_address_provider" value="{{ old('ur_address_provider') }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Фактический адрес</label>
                  <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="394016,РФ, г.Воронеж, ул.Антонова-Овсеенко, д.7" name="fz_address_provider" value="{{ old('fz_address_provider') }}">
                </div>
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">ИНН</label>
                      <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="3662193920" name="inn_provider" value="{{ old('inn_provider') }}">
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">КПП</label>
                      <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="366201001" name="kpp_provider" value="{{ old('kpp_provider') }}">
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Р./сч.</label>
                      <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="40702810708200027322" name="rsch_provider" value="{{ old('rsch_provider') }}">
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Кор./сч.</label>
                      <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="30101810000000000201" name="krch_provider" value="{{ old('krch_provider') }}">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Банк</label>
                  <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="ПАО АКБ «АВАНГАРД» г. Воронеж" name="bancon_provider" value="{{ old('bancon_provider') }}">
                </div>
                <div class="row">
                  <div class="form-group col-xs-6">
                    <label for="exampleInputEmail1">БИК</label>
                    <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="044525201" name="bik_provider" value="{{ old('bik_provider') }}">
                  </div>
                  <div class="form-group col-xs-6">
                    <label for="exampleInputEmail1">ОГРН</label>
                    <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="1133668043310" name="ogrn_provider" value="{{ old('ogrn_provider') }}">
                  </div>
                  <div class="form-group col-xs-6">
                    <label for="exampleInputEmail1">Телефон</label>
                    <input type="text" class="form-control" autofocus id="exampleInputMobil" placeholder="+7 (920) ___-__-__" name="telephone_provider" value="{{ old('telephone_provider') }}" data-inputmask="'alias': 'phone'">
                  </div>
                  <div class="form-group col-xs-6">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" class="form-control" autofocus id="exampleInputEmail" placeholder="info@atis36.ru" name="email_provider" value="{{ old('email_provider') }}" data-inputmask="'alias': 'email'">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Директор</label>
                  <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="Лютиков Борис Геннадьевич" name="director_provider" value="{{ old('director_provider') }}">
                </div>


              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="padding: 15px 10px 15px;">
                <a href="{{ route('providers.index') }}" class="btn btn-default">Назад</a>
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
