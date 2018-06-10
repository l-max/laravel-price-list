@extends('layouts.app')

@section('content')

    <div class="panel-body">
    @include('common.errors')

        <form action="{{ url('price/update') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $price->id }}">
            <div class="form-group">
                <label for="item-name" class="col-sm-3 control-label">Наименование</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="item-name" class="form-control" value="{{ $price->name }}">
                </div>
            </div>
            <div class="form-group">
                <label for="item-measure" class="col-sm-3 control-label">Единица измерения</label>
                <div class="col-sm-6">
                    <input type="text" name="measure" id="item-measure" class="form-control" value="{{ $price->measure }}">
                </div>
            </div>
            <div class="form-group">
                <label for="item-price" class="col-sm-3 control-label">Цена</label>
                <div class="col-sm-6">
                    <input type="text" name="price" id="item-price" class="form-control" value="{{ $price->price }}">
                </div>
            </div>
            <div class="form-group">
                <label for="item-number" class="col-sm-3 control-label">Кол-во на складе</label>
                <div class="col-sm-6">
                    <input type="text" name="number" id="item-number" class="form-control" value="{{ $price->number }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Изменить
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection