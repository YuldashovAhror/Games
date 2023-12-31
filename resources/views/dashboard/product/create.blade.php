@extends('layouts.dashboard.main')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success') != null)
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Добавить продукт</h5>
                </div>
                <div class="card-footer text-end">
                    <a href="{{route('dashboard.product.index')}}"><button class="btn btn-primary" type="submit">Выход</button></a>
                </div>
                <form action="{{ route('dashboard.product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Выберите категорию</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name_ru }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Выберите категорию</label>
                                <select name="padcategory_id" class="form-control">
                                    @foreach ($padcategories as $padcategory)
                                        <option value="{{ $padcategory->id }}">{{ $padcategory->name_ru }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Фотографии продукта</label>
                                    <div class="col-12 text-center">
                                        {{-- <i data-feather="loader" style="height: 100px; width: 100px"></i> --}}
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" required="" type="file"
                                        name="photos[]" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Название RU</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_ru" required>
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Название UZ</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_uz" required>
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Название EN</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="name_en" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Названия игрушек Uz</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="title_uz">
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Названия игрушек Ru</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="title_ru">
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Названия игрушек En</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="title_en">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Описание RU</label>
                                <textarea name="discription_ru" class="ckeditor" rows="10" cols="80"></textarea>
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Описание UZ</label>
                                <textarea name="discription_uz" class="ckeditor" rows="10" cols="80"></textarea>
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Описание EN</label>
                                <textarea name="discription_en" class="ckeditor" rows="10" cols="80"></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Сертификаты</label>
                                <input class="form-control" id="exampleFormControlInput1" type="file" name="sertificat">
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Артикул</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="article">
                            </div>
                            <div class="col-4">
                                <label class="form-label" for="exampleFormControlInput1">Звезды</label>
                                <input class="form-control" id="exampleFormControlInput1" type="number" name="star"
                                    min="1" max="5">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
