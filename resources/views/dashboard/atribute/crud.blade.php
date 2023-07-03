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
                    <h5>Добавить Дополнительная информация</h5>
                </div>
                <div class="card-footer text-end">
                    <a href="{{route('dashboard.product.index')}}"><button class="btn btn-primary" type="submit">Выход</button></a>
                </div>
                <form action="{{ route('dashboard.atribute.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" value="{{ $product_id }}" name="product_id">

                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название RU</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name_ru" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название UZ</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name_uz" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Название EN</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name_en" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Размер RU</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="size_ru">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Размер UZ</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="size_uz">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Размер EN</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="size_en">
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
                            <h5>Все информация</h5>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">Размер</th>
                                <th scope="col" class="text-center">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($atributes as $key => $atribute)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $atribute->name_ru }}</td>
                                    <td>{{ $atribute->size_ru }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-xs btn-success" type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter{{ $atribute->id }}Edit"><i
                                                class="bx bx-pencil"></i>Изменить</button>
                                        <div class="modal fade" id="exampleModalCenter{{ $atribute->id }}Edit"
                                            tabindex="-1" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document"
                                                style="max-width: 50vw">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Изменить</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('dashboard.atribute.update', $atribute) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            {{ method_field('put') }}
                                                            <div class="card-body">
                                                                <div class="card-body">
                                                                    <input type="hidden" value="{{ $product_id }}" name="product_id">
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label"
                                                                                    for="exampleFormControlInput1">Название
                                                                                    RU</label>
                                                                                <input class="form-control"
                                                                                    id="exampleFormControlInput1"
                                                                                    type="text" name="name_ru"
                                                                                    value="{{ $atribute->name_ru }}" required>
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
                                                                                    value="{{ $atribute->name_uz }}" required>
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
                                                                                    value="{{ $atribute->name_uz }}" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput1">Размер RU</label>
                                                                                <input class="form-control" id="exampleFormControlInput1" type="text" name="size_ru" value="{{ $atribute->size_ru }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput1">Размер UZ</label>
                                                                                <input class="form-control" id="exampleFormControlInput1" type="text" name="size_uz" value="{{ $atribute->size_uz }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="exampleFormControlInput1">Размер EN</label>
                                                                                <input class="form-control" id="exampleFormControlInput1" type="text" name="size_en" value="{{ $atribute->size_en }}">
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
                                            data-bs-target="#exampleModalCenter{{ $atribute->id }}"><i
                                                class="bx bx-trash"></i>Удалить</button>
                                        <div class="modal fade" id="exampleModalCenter{{ $atribute->id }}"
                                            tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Удалить?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form
                                                            action="{{ route('dashboard.atribute.destroy', $atribute->id) }}"
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
