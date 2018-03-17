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
     {{ Form::open(['route' => ['providers.update', $provider->id], 'method' => 'put']) }}
     <!-- Default box -->
      <div class="box-body">
        <div class="col-md-6 row">
          <div class="form-group">
            <label for="exampleInputEmail1">Поставщик</label>
            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="name" value="{{ $provider->name }}">
          </div>
          <div class="form-group">
            <label for="exampleInputLink">Ссылка на Поставщика</label>
            <input type="text" class="form-control" id="exampleInputLink" placeholder="" name="link" value="{{ $provider->link }}">
          </div>        
          <div class="form-group">
            <label for="exampleInputDesc">Описание Поставщика</label>
            <textarea class="form-control" rows="10" cols="45"  id="exampleInputDesc" name="desc" value="{{ $provider->desc }}"></textarea>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
       <!-- /.box-body -->
       <div class="box-footer" style="padding: 15px 10px 15px;">
           <a href="{{ route('providers.index') }}" class="btn btn-default">Назад</a>
           <button class="btn btn-warning pull-right">Изменить</button>
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
