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
     <div class="box">

     <!-- Default box -->
      <div class="box-body row">
        <div class="col-md-6 ">
          <div class="form-group">
            <label for="exampleInputEmail1">Поставщик *</label>
            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="name" value="{{ $provider->name }}">
          </div>
          <div class="form-group">
            <label for="exampleInputLink">Ссылка на Поставщика *</label>
            <input type="text" class="form-control" id="exampleInputLink" placeholder="" name="link" value="{{ $provider->link }}">
          </div>
          <div class="form-group">
            <label for="exampleInputDesc">Описание Поставщика</label>
            <textarea class="form-control" rows="10" cols="45"  id="exampleInputDesc" name="desc">{{ $provider->desc }}</textarea>
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="form-group">
            <label for="exampleInputEmail1">Полное наименование</label>
            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="full_name_provider" value="{{ $provider->full_name_provider }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Юридический адрес</label>
            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="ur_address_provider" value="{{ $provider->ur_address_provider }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Фактический адрес</label>
            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="fz_address_provider" value="{{ $provider->fz_address_provider }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">ИНН</label>
            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="inn_provider" value="{{ $provider->inn_provider }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">КПП</label>
            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="kpp_provider" value="{{ $provider->kpp_provider }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Р./сч.</label>
            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="rsch_provider" value="{{ $provider->rsch_provider }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Кор./сч.</label>
            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="krch_provider" value="{{ $provider->krch_provider }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Банк</label>
            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="bancon_provider" value="{{ $provider->bancon_provider }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">БИК</label>
            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="bik_provider" value="{{ $provider->bik_provider }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">ОГРН</label>
            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="ogrn_provider" value="{{ $provider->ogrn_provider }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Телефон</label>
            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="telephone_provider" value="{{ $provider->telephone_provider }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Директор</label>
            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="director_provider" value="{{ $provider->director_provider }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">E-mail</label>
            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" name="email_provider" value="{{ $provider->email_provider }}">
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
