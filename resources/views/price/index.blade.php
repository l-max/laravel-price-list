@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="float-right">
            <form action="/price/add/">
                <button class="btn btn-success" title="Добавить товар">+</button>
            </form>
        </div>
    </div>

    <div class="container">
        <div>
            @if (count($prices) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Прайс-лист</h1>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped price-list-table">
                            <thead>
                            <th>Наименование продукции</th>
                            <th>Ед. изм.</th>
                            <th>Цена</th>
                            <th>Кол-во на складе</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($prices as $price)
                                <tr>
                                    <td class="table-text"><div>{{ $price->name }}</div></td>
                                    <td class="table-text"><div>{{ $price->measure }}</div></td>
                                    <td class="table-text"><div>{{ $price->price }}</div></td>
                                    <td class="table-text"><div>{{ $price->number }}</div></td>

                                    <td>
                                        <form action="{{url('price/' . $price->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-item-{{ $price->id }}" class="btn btn-danger"
                                                    onclick="return confirm('Вы действительно хотите удалить элемент?');">
                                                <i class="fa fa-btn fa-trash"></i>Удалить
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ url('price/edit/' . $price->id) }}">
                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-btn fa-edit"></i>Изменить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection