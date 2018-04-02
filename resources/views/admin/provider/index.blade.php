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
                    <h3 class="box-title">Листинг сущности</h3>
                </div>
                <!-- /.box-header -->


                    <div class="box-body">

                      <div class="form-group clearfix">
                        <div class="btn-group pull-left" role="group">
                            <a href="{{route('providers.create')}}" class="btn btn-success">Добавить</a>
                            <a role="button" data-toggle="collapse" class="btn btn-success" href="#collapseTable" aria-expanded="false" aria-controls="collapseTable">Быстрое добавление</a>
                        </div>
                        <div class="form-group btn-group pull-right" role="group">
                          @if($providers->count() != null)
                            <a href="{{ route('provider.export') }}" class="btn btn-default">Export</a>
                          @endif
                            <a class="btn btn-default" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Import</a>
                        </div>
                      </div>
                        <div class="collapse" id="collapseExample">
                            <div class="well">
                                <form method="post" action="{{ route('provider.import') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="file" name="file" id="exampleInputFile">
                                    </div>
                                    <button type="submit" class="btn btn-default">Отправить</button>
                                </form>

                            </div>
                        </div>

                        <div class="collapse" id="collapseTable">

                        <table class="table table-bordered table-striped" style="margin: 0 auto 15px;">
                          <thead>
                          <tr>
                            <th style="width: 33%">Поставщик </th>
                            <th style="width: 33%">Артикул поставщика </th>
                            <th style="width: 33%">Ссылка на Поставщика </th>
                          </tr>
                          </thead>

                          <tbody>
                          {{ Form::open(['route' => 'providers.store'])}}                            
                          <tr >
                            <td>
                              <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="АТИС" name="name" value="{{ old('name') }}">
                            </td>
                            <td>
                              <input type="text" class="form-control"  id="exampleInputEan" placeholder="Например: 100" name="ean" value="{{ old('ean') }}">
                            </td>
                            <td>
                              <input type="text" class="form-control" id="exampleInputLink" placeholder="http://atis36.ru" name="link" value="{{ old('link') }}">
                            </td>
                          </tr>
                          <tr>
                            <td colspan="4">
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


                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width: 50px">ID</th>
                                <th>Название</th>
                                <th style="width: 100px">Действия</th>
                                @if($providers->count())  <th width="20px"><input type="checkbox" id="checkAll"></th> @endif

                            </tr>
                            </thead>
                            <tbody>


                            {{-- <form method="POST" action="{{ route('provider.del') }}" id="delete-form">
                            {!! csrf_field() !!} --}}
                            @if($providers->count())
                            @foreach($providers as $provider)

                            <tr>
                                <td>{{ $provider->id }}</td>
                                <td>{{ $provider->name }}</td>
                                <td>
                                  <div class="btn-group" role="group">
                                    <a href="{{route('providers.edit', $provider->id)}}"  class="btn btn-primary btn-sm"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                                    {{ Form::open(['route' => ['providers.destroy', $provider->id], 'method' => 'delete', 'class' => 'btn btn-danger btn-sm'])}}
                                        <button onclick="return confirm('Вы уверены?')" type="submit">
                                            <i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>
                                        </button>
                                    {{Form::close()}}

                                  </div>
                                </td>
                                <td><input type="checkbox" name="delid[]" value="{{ $provider->id }}" >   </td>

                            </tr>
                             @endforeach
                             @endif
                           {{-- </form> --}}

                            </tbody>
                        </table>
                        {{-- <div class="">
                          <a href="#" class="btn btn-danger pull-right" id="deleteMany"  @if($providers->count() == null)disabled="disabled"@endif>Удалить</a>
                        </div> --}}
                    </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
