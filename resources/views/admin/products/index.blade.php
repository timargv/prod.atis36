@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Товары
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
              <h3 class="box-title">Список товаров</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group clearfix">
                <div class="btn-group pull-left" role="group">
                  <a href="{{ route('products.create')}}" class="btn btn-success">Добавить</a>
                  <a role="button" data-toggle="collapse" class="btn btn-success" href="#collapseTable" aria-expanded="false" aria-controls="collapseTable">Быстрое добавление</a>

                </div>
                <div class="form-group btn-group pull-right" role="group">
                  @if($products->count() != null)
                    <a href="{{ route('products.export') }}" class="btn btn-danger btn-flat"> <i class="fa fa-fw fa-cloud-download"></i> Export</a>
                  @endif
                    <a class="btn btn-danger btn-flat" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-fw fa-cloud-upload"></i> Import</a>
                </div>
              </div>
              <div class="collapse" id="collapseTable">

                <table class="table table-bordered table-striped" style="margin: 0 auto 15px;">
                  <thead>
                  <tr>
                    <th style="width: 20%">Название </th>
                    <th style="width: 10%">Артикул </th>
                    <th style="width: 12%">Ссылка на сайте </th>
                    <th style="width: 10%">Цена </th>
                    <th style="width: 8%">Картинка </th>
                    <th style="width: 20%">Цена </th>
                    <th style="width: 20%">Цена </th>
                  </tr>
                  </thead>

                  <tbody>
                  {{ Form::open(['route' => 'products.store', 'files' => true ])}}
                  @include('admin.errors')

                  <tr >
                    <td>
                      <input type="text" class="form-control" id="exampleInputTitle" placeholder="" name="title" value="{{ old('title') }}">
                    </td>
                    <td>
                      <input type="text" class="form-control" id="exampleInputNum" placeholder="" name="num" value="{{ old('num') }}">
                    </td>
                    <td>
                      <input type="url" class="form-control" id="exampleInputSite" placeholder="" name="site" value="{{ old('site') }}">
                    </td>
                    <td>
                      <input type="number" min="1" step="any" class="form-control" id="exampleInputPrc" placeholder="1.123,50" name="prc" value="{{ old('prc') }}">
                    </td>
                    <td>
                      <input type="file" id="exampleInputFile" name="image">
                    </td>
                    <td>
                      <div class="form-group">
                        {{ Form::select('category_id',
                          $categories,
                          null,
                          ['class' => 'form-control select2', 'style' => 'width: 100%;'])
                        }}

                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        {{ Form::select('provider_id',
                          $providers,
                          null,
                          ['class' => 'form-control select2', 'style' => 'width: 100%;'])
                        }}

                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="7">
                      <div class="" style="width: 200px; margin: auto; padding: 5px;">
                          <a role="button" data-toggle="collapse" class="btn btn-danger" href="#collapseTable" aria-expanded="false" aria-controls="collapseTable">Закрыть</a>
                          <button class="btn btn-success ">Добавить</button>
                      </div>
                    </td>
                  </tr>
                  {{ Form::close() }}
                </tbody>
                </table>
              </div>
              <div class="collapse" id="collapseExample">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th style="width: 12%">Название</th>
                      <th style="width: 12%">Артикул</th>
                      <th style="width: 12%">Цена</th>
                      <th style="width: 12%">Ссылка на сайт</th>
                      <th style="width: 12%">Картинка</th>
                      <th style="width: 12%">Статус опубликова</th>
                      <th style="width: 12%">Категория</th>
                      <th style="width: 12%">Поставщик</th>
                    </tr>

                    <tr>
                      <td class="text-red">title</td>
                      <td class="text-red">num</td>
                      <td class="text-red">prc</td>
                      <td>site</td>
                      <td>image</td>
                      <td>status</td>
                      <td class="text-yellow">category</td>
                      <td class="text-yellow">provider</td>
                    </tr>
                    <tr class="active">
                      <td colspan="4">
                        <br>

                        <div class="text-red">Обязательно</div>
                        <div class="text-yellow">Может быть пустым</div>
                        <br>

                      </td>
                      <td colspan="4">
                        <br>
                        <form class="form-inline pull-right" method="post" action="{{ route('products.import') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="file" name="file" id="exampleInputFile">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm	">Отправить</button>
                        </form>
                        <div class="clearfix"></div>
                        <br>

                      </td>
                    </tr>
                  </tbody>
                </table>
                <br />

              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 50px">ID</th>
                  <th>Название</th>
                  <th>Артикул</th>
                  <th>Поставщик</th>
                  <th>Цена</th>
                  <th>Картинка</th>
                  <th style="width: 100px">Действия</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                    <tr>
                      <td>{{ $product->id }}</td>
                      <td>{{ $product->title }}</td>
                      <td>

                        <a href="@if ($product->site == null)http://atis36.ru/shop/search?text={{ $product->num }}@else {{ $product->site }} @endif" target="_blank">
                          <i class="fa fa-external-link" aria-hidden="true"></i>
                          {{ $product->num }}
                        </a>
                      </td>
                      {{-- <td>{{ $product->getCategoryTitle() }}</td> --}}
                      <td>
                        @if ($product->getProviderID() != null)
                          <a href="{{ $product->getProviderLink() }}" target="_blank">{{ $product->getProviderTitle() }}</a>
                        @else
                          {{ $product->getProviderTitle() }}
                        @endif
                      </td>
                      <td>{{ $product->prc }} Руб.</td>
                      <td>
                        {{-- <img src="{{ $product->getImage() }}" alt="" width="50"> --}}
                        <a href="{{ $product->getImage() }}" data-toggle="lightbox" data-max-width="600">
                            <img src="{{ $product->getImage() }}" class="img-fluid" width="50">
                        </a>
                      </td>

                      <td>
                        <div class="btn-group" role="group">
                            <a href="{{route('products.edit', $product->id)}}"  class="btn btn-primary btn-sm"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                            {{ Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete', 'class' => 'btn btn-danger btn-sm'])}}
                            <button onclick="return confirm('Вы уверены?')" type="submit">
                                <i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>
                            </button>
                            {{Form::close()}}
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tfoot>
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
