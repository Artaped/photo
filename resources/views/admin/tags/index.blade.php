@extends('admin.layout')
@section('content')
    <!-- Default box -->
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
                    <h2 class="box-title">Все тэги</h2>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="/admin/tags/create" class="btn btn-success btn-lg">Добавить</a> <br> <br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tags as $tag):?>
                        <tr>
                            <td><?=$tag['id']?></td>
                            <td><?=$tag['title']?></td>
                            <td>
                                <a href="/admin/tags/edit/<?=$tag['id']?>" class="btn btn-warning">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="/admin/tags/destroy/<?=$tag['id']?>" class="btn btn-danger" onclick="return confirm('Вы уверены?');">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach;?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Действия</th>
                        </tr>
                        </tfoot>
                    </table>
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