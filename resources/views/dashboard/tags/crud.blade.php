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
                    <h5>Основной Теги</h5>
                </div>
                <form action="{{ route('dashboard.tags.update', $tags) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Файл</label>
                                    <div class="col-12 text-center">
                                        <div class="col-12 text-center mb-3">
                                            <img src="{{ $tags->photo }}" alt="" style="height: 100px; width: 100px"></td>
                                        </div>
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="photo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название</label>
                                    <div class="col-12 text-center">
                                        <i data-feather="loader" style="height: 110px; width: 100px" ></i>
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name" value="{{$tags->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <label class="form-label" for="exampleFormControlInput1">Описание</label>
                                <textarea name="discription" class="ckeditor" rows="10" cols="80">{{$tags->discription}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-header pb-0">
                        <h5>Каталоги Теги</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Файл</label>
                                    <div class="col-12 text-center">
                                        <div class="col-12 text-center mb-3">
                                            <img src="{{ $tags->catalog_photo }}" alt="" style="height: 100px; width: 100px"></td>
                                        </div>
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="catalog_photo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название</label>
                                    <div class="col-12 text-center">
                                        <i data-feather="loader" style="height: 110px; width: 100px" ></i>
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="catalog_name" value="{{$tags->catalog_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <label class="form-label" for="exampleFormControlInput1">Описание</label>
                                <textarea name="catalog_discription" class="ckeditor" rows="10" cols="80">{{$tags->catalog_discription}}</textarea>
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
