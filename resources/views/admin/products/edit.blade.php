@extends('admin.layout')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Добавить Товар
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      {{ Form::open(['route' => ['products.update', $product->id], 'method' => 'put', 'files' => true ])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="margin: 10px 0 0;">Добавляем товар</h3>
          @include('admin.errors')

        </div>
        <div class="box-body">
          <div class="col-md-6 row">
            <div class="form-group">
              <label for="exampleInputTitle">Название</label>
              <input type="text" class="form-control" id="exampleInputTitle" placeholder="" name="title" value="{{ $product->title }}">
            </div>
            <div class="form-group">
              <label for="exampleInputNum">Артикул</label>
              <input type="text" class="form-control" id="exampleInputNum" placeholder="" name="num" value="{{ $product->num }}">
            </div>
            <div class="form-group">
              <label for="exampleInputSite">Атис36</label>
              <input type="url" class="form-control" id="exampleInputSite" placeholder="" name="site" value="{{ $product->site }}">
            </div>
            <div class="form-group">
              <label for="exampleInputPrc">Цена</label>
              <input type="number" min="1" step="any" class="form-control" id="exampleInputPrc" placeholder="" name="prc" value="{{ $product->prc }}">
            </div>
            <div class="form-group">
              <img src="{{ $product->getImage() }}" alt="" class="img-responsive" width="150">
              <label for="exampleInputFile">Картинка товара</label>
              <input type="file" id="exampleInputFile" name="image">

              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
            <div class="form-group">
              <label>Категория</label>
              {{ Form::select('category_id',

                $categories,
                $product->getCategoryID(),
                ['class' => 'form-control select2', 'style' => 'width: 100%;', 'data-placeholder'=>'Выберите Категорию'])
              }}

            </div>
            <div class="form-group">
              <label>Потсавщики</label>

              {{--
                Для тегов
               {{ Form::select('category_id',
                ['1' => 'Large', '2' => 'Small'],
                null,
                ['class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Выберите теги', 'style' => 'width: 100%;'])
              }} --}}

              {{ Form::select('provider_id',
                $providers,
                $product->getProviderID(),
                ['class' => 'form-control select2', 'style' => 'width: 100%;', 'data-placeholder'=>'Выберите Поставщика'])
              }}

            </div>


            <!-- checkbox -->
            <div class="form-group">
              <label>
                {{ Form::checkbox('status', '1', $product->status, ['class' => 'minimal']) }}
              </label>
              <label>
                Опубликовать
              </label>
            </div>
          </div>
          <div class="col-md-12 row">
            <div class="form-group">
              <label for="exampleInputEmail1">Полный текст</label>
              <textarea name="desc" id="" cols="30" rows="10" class="form-control">{{ $product->desc }}</textarea>
          </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer" style="padding: 15px 10px 15px;">
            <a href="{{ route('products.index') }}" class="btn btn-default" >Назад</a>
            <button class="btn btn-success pull-right">Обновить</button>
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
