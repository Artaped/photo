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
                    <h2 class="box-title">Изменить изображение</h2>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-6">
                        <form action="/admin/photos/update/<?=$photo['id'];?>" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" value="<?=$photo['title']?>" name="title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Автор</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="author" value="<?=$photo['author']?>">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Краткое описание</label>
                                <textarea class="form-control" name="descriptions"><?=$photo['descriptions']?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Категория</label>
                                <select class="form-control select2" style="width: 100%;" name="category_id">
                                    <?php foreach($categorys as $category): ?>
                                    <option value="<?= $category['id'];?>"><?= $category['title'];?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Теги</label>
                                <select class="form-control select2" style="width: 100%;" name="tag_id">
                                <?php foreach($tags as $tag): ?>
                                <option value="<?= $tag['id'];?>"><?= $tag['title'];?></option>
                                <?php endforeach?>
                                </select>
                            </div>
                            <!-- Date -->
                            <div class="form-group">
                                <label>Дата:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="date" id="datepicker"
                                           value="{{$photo->date}}">
                                </div>
                            <div class="form-group">
                                <label>Изображение</label>
                                <input type="file"  name="image"> <br>
                                <img src="{{$photo->getImage()}}" width="200" alt="">
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
    <!-- /.box -->
@endsection