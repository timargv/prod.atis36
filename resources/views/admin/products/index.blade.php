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
              <div class="form-group">
                <a href="{{ route('products.create')}}" class="btn btn-success">Добавить</a>
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
                      <td><a href="{{ $product->site }}" target="_blank">@if ($product->site != null)<i class="fa fa-external-link" aria-hidden="true"></i>@endif {{ $product->num }}</a></td>
                      {{-- <td>{{ $product->getCategoryTitle() }}</td> --}}
                      <td>
                        @if ($product->getProviderID() != null)
                          <a href="{{ $product->getProviderLink() }}" target="_blank">{{ $product->getProviderTitle() }}</a>
                        @else
                          {{ $product->getProviderTitle() }}
                        @endif
                      </td>
                      <td>{{ $product->prc }}</td>
                      <td>
                        <img src="{{ $product->getImage() }}" alt="" width="50">
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
