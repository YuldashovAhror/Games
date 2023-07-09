@extends('layouts.dashboard.main')

@section('content')
    <!-- Tab panes -->
    <div class="tab-content p-3 text-muted">
        <div class="row">
            <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Все продукты</h5>
                </div>
                <div class="card-body">
                    <div class="tab-content p-3 text-muted">
                        {{-- @foreach($categories as $key=>$category) --}}
                            <div class="tab-pane active show"  role="tabpanel">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Фото</th>
                                        <th scope="col"> Категория Название</th>
                                        <th scope="col"> Pad Категория Название</th>
                                        <th scope="col">Название</th>
                                        <th scope="col">Названия игрушек</th>
                                        <th scope="col">Артикул</th>
                                        <th scope="col">Дополнительная информация</th>
                                        <th scope="col" class="text-center">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{-- @dd($products) --}}
                                    @php($k=1)
                                    @foreach($products as $product)
                                        <tr>
                                            <th scope="row">{{ $k }}</th>
                                            <td><img src="{{ $product->photos[0] }}" alt="" style="height: 100px; width: 100px"></td>
                                            @if ($product->categories != null)
                                                <td>{{ $product->categories->name_ru }}</td>
                                            @endif
                                            @if ($product->categories == null)
                                                <td><h3>Null</h3></td>
                                            @endif
                                            @if ($product->padcategories != null)
                                                <td>{{ $product->padcategories->name_ru }}</td>
                                            @endif
                                            @if ($product->padcategories == null)
                                                <td><h3>Null</h3></td>
                                            @endif
                                            <td>{{ $product->name_ru }}</td>
                                            <td>{{ $product->title_ru }}</td>
                                            <td>{{ $product->article }}</td>
                                            <td class="text-center"><a href="{{ route('dashboard.atribute.index', $product) }}"><button class="btn btn-primary"><i class="bx bxs-file-doc"></i>+</button></a></td>
                                            <td>
                                                <a href="{{ route('dashboard.product.edit', $product) }}">
                                                    <button class="btn btn-xs btn-success"> Изменить
                                                    </button>
                                                </a>
                                                <button class="btn btn-xs btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $product->id }}"><i class="bx bx-trash"></i> Удалить</button>
                                                <div class="modal fade" id="exampleModalCenter{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Удалить?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('dashboard.product.destroy', $product) }}" method="post">
                                                                    @csrf
                                                                    {{ method_field('delete') }}
                                                                    <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Да</button>
                                                                </form>
                                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Нет</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php($k++)
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        {{-- @endforeach --}}
                        {{-- <div class="table-responsive">
                        </div> --}}
                    </div>
                </div>
        </div>
    </div>
        </div>
    </div>
@endsection
