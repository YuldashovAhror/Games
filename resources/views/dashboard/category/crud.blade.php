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
                    <h5>Добавить документ</h5>
                </div>
                <form action="{{ route('dashboard.category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        {{-- <input type="hidden" value="{{ $product_id }}" name="product_id"> --}}

                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название RU</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name_ru">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название UZ</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name_uz">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название EN</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name_en">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Файл</label>
                                    <div class="col-12 text-center">
                                        {{-- <i data-feather="loader" style="height: 100px; width: 100px"></i> --}}
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="photo" required>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Иконки</label>
                                    <div class="col-12 text-center">
                                        {{-- <i data-feather="loader" style="height: 100px; width: 100px"></i> --}}
                                    </div>
                                    <input class="form-control" id="exampleFormControlInput1" type="file" name="icon">
                                </div>
                            </div>
                            <div class="col-1">
                                <label class="form-label" for="name_en">Популярный</label>
                                <div class="input-group" style="font-size: 15px">
                                    <input type="checkbox" id="ok" name="ok">
                                </div>
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
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Все документы</h5>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">Файл</th>
                                <th scope="col">Иконки</th>
                                <th scope="col" class="text-center">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $category->name_ru }}</td>
                                    <td><img src="{{ $category->photo }}" alt="" style="width: 100px; height: 100px;"></td>
                                    <td><img src="{{ $category->icon }}" alt="" style="width: 100px; height: 100px;"></td>
                                    <td class="text-center">
                                        <button class="btn btn-xs btn-success" type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter{{ $category->id }}Edit"><i
                                                class="bx bx-pencil"></i>Изменить</button>
                                        <div class="modal fade" id="exampleModalCenter{{ $category->id }}Edit"
                                            tabindex="-1" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document"
                                                style="max-width: 50vw">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Изменить</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('dashboard.category.update', $category) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            {{ method_field('put') }}
                                                            <div class="card-body">
                                                                <div class="card-body">
                                                                    {{-- <input type="hidden" value="{{ $product_id }}" name="product_id"> --}}
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="exampleFormControlInput1">Файл</label>
                                                                                <div class="col-12 text-center">
                                                                                    <a href="{{ $category->photo }}"></a>
                                                                                </div>
                                                                                <input class="form-control"
                                                                                    id="exampleFormControlInput1"
                                                                                    type="file" name="file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-5">
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="exampleFormControlInput1">Иконки</label>
                                                                                <div class="col-12 text-center">
                                                                                    <a href="{{ $category->icon }}"> </a>
                                                                                </div>
                                                                                <input class="form-control"
                                                                                    id="exampleFormControlInput1"
                                                                                    type="file" name="file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <label class="form-label" for="name_en">Популярный</label>
                                                                            <div class="input-group" style="font-size: 15px">
                                                                                <input type="checkbox" id="ok" name="ok"
                                                                                    @if ($category->ok != 0) checked @endif>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="exampleFormControlInput1">Название
                                                                                    RU</label>
                                                                                <input class="form-control"
                                                                                    id="exampleFormControlInput1"
                                                                                    type="text" name="name_ru"
                                                                                    value="{{ $category->name_ru }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="exampleFormControlInput1">Название
                                                                                    UZ</label>
                                                                                <input class="form-control"
                                                                                    id="exampleFormControlInput1"
                                                                                    type="text" name="name_uz"
                                                                                    value="{{ $category->name_uz }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="exampleFormControlInput1">Название
                                                                                    EN</label>
                                                                                <input class="form-control"
                                                                                    id="exampleFormControlInput1"
                                                                                    type="text" name="name_en"
                                                                                    value="{{ $category->name_uz }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-end">
                                                                <button class="btn btn-primary"
                                                                    type="submit">Изменить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter{{ $category->id }}"><i
                                                class="bx bx-trash"></i>Удалить</button>
                                        <div class="modal fade" id="exampleModalCenter{{ $category->id }}"
                                            tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Удалить?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form
                                                            action="{{ route('dashboard.category.destroy', $category->id) }}"
                                                            method="post">
                                                            @csrf
                                                            {{ method_field('delete') }}
                                                            <button class="btn btn-primary" type="submit"
                                                                data-bs-original-title="" title="">Да</button>
                                                        </form>
                                                        <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal" data-bs-original-title=""
                                                            title="">Нет</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
