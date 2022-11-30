@extends('theme.default')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Book List</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <section class="pb-4">
                <div class="bg-white border rounded-5">
                    <section class="w-100 p-4">
                        <form class="simple" action="{{ route('index') }}" method="GET" role="search">
                            {{ csrf_field() }}
                            <div class="input-group mb-4">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="advanced-search-input"
                                    placeholder="book name or author"
                                    name="search"
                                    value="{{ $search }}"
                                >
                                <button class="btn btn-primary" id="advanced-search-button" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Book Name</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">
                                        <i
                                            class="datatable-sort-icon fas fa-arrow-up active"
                                            style="transform: rotate(180deg);"
                                        ></i>
                                        This Month Popularity
                                    </th>
                                    <th scope="col">All Time</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listItems as $listItem)
                                    <tr class="align-middle">
                                        <th scope="row">{{ $listItem->id }}</th>
                                        <td>{{ $listItem->name }}</td>
                                        <td>{{ $listItem->author }}</td>
                                        <td>{{ $listItem->status ? 'Taken' : 'Available' }}</td>
                                        <td>{{ $listItem->monthlyPopularity }}</td>
                                        <td>{{ $listItem->totalPopularity }}</td>
                                        <td>
                                            <a
                                                class="me-2 btn btn-sm text-dark edit-button"
                                                href="{{ route('editBook', $listItem->id) }}"
                                            >
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <form
                                                action="{{ route('deleteBook', $listItem->id) }}"
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
                        {{ $listItems->links('theme.paginator') }}
                    </section>
                </div>
            </section>
        </div>
    </div>
@endsection