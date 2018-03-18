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
            <div class="box-body">
              <div class="col-md-6 row">
                <div class="form-group">
                  <label for="exampleInputEmail1">Поставщик</label>
                  <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputLink">Ссылка на Поставщика</label>
                  <input type="text" class="form-control" id="exampleInputLink" placeholder="" name="link" value="{{ old('link') }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputDesc">Описание Поставщика</label>
                  <textarea class="form-control" rows="10" cols="45"  id="exampleInputDesc" name="desc"  value="{{ old('desc') }}"></textarea>
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
