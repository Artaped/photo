@extends('admin.layout')
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Админ-панель</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="">
                <div class="box-header">
                    <h2 class="box-title">Изменить категорию</h2>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-6">
                        <form action="/admin/category/update/<?=$category['id'];?>" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" value="<?=$category['title']?>" name="title">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-warning">Изменить</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            По вопросам к главному администратору.
        </div>
        <!-- /.box-footer-->
    </div>
@endsection