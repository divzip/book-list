@extends('theme.default')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header h2">{{ ucfirst($type) }} Book {{$book->name}} | Author : {{$book->author}}</h1>
        </div>
    </div>

    @include(
        'theme.input',
        [
            'type' => $type,
            'id' => $id,
            'name' => $book->name,
            'author' => $book->author,
            'status' => $book->status
        ]
    )

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body row">
                <div class="control-group col-3 mb-1">
                    <div
                        class="input-group"
                        id="datetimepicker"
                        data-td-target-input="nearest"
                        data-td-target-toggle="nearest"
                    >
                        <span
                            role="button"
                            class="input-group-text"
                            data-td-target="#datetimepicker"
                            data-td-toggle="datetimepicker"
                        >
                            <span class="fa-solid fa-calendar"></span>
                        </span>
                        <input
                            id="datetimepickerInput"
                            type="text"
                            class="form-control pe-none"
                            data-td-target="#datetimepicker"
                        />
                        <div class="input-group-btn">
                            <button class="btn btn-success add-more" type="button">
                                <i class="glyphicon glyphicon-plus"></i>
                                Add
                            </button>
                        </div>
                    </div>
                </div>
                <form
                    class="simple"
                    method="post"
                    action="{{ route('addHistoryItems', $book->id) }}"
                    accept-charset="utf-8"
                >
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary btn-block mb-1 mt-1">Save new history items</button>
                    <div class="after-add-more row">
                    </div>
                </form>

                <!-- Copy Fields -->
                <div class="copy d-none">
                    <div class="control-group input-group w-25 mt-1 mr-1">
                        <input
                            type="text"
                            name="historyItems[]"
                            class="form-control pe-none date-value"
                            placeholder=""
                            value="">
                        <div class="input-group-btn">
                            <button class="btn btn-danger remove" type="button">
                                <i class="glyphicon glyphicon-remove"></i>
                                Remove
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Taken At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($historyItems as $historyItem)
            <tr class="align-middle">
                <th scope="row">{{ $historyItem->id }}</th>
                <td>{{ $historyItem->taken_at }}</td>
                <td>
                    <form
                        action="{{ route('deleteHistoryItem', $historyItem->id) }}"
                        method="POST"
                    >
                        {{ csrf_field() }}
                        <button
                            class="btn btn-sm text-dark delete-button"
                            type="submit"
                            onclick="return confirm('Are you sure?')"
                        >
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $historyItems->links('theme.paginator') }}
@endsection