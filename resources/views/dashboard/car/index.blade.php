@extends('dashboard.template.main')


@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cars</h1>
            <div>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                        class="fas fa-trash fa-sm text-white-50"></i>Trash</a>
                <a href="{{ route('dashboard.car.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i>Create</a>
            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Car</th>
                <th>Creator</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr>
                    {{--                    <td>{{ ($loop->index + 1) + (10 * (request()->get('page') - 1)) }}</td>--}}
                    <td>{{ ($loop->index + 1) + (10*(request()->get('page') ?? 1 - 1)) }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->creator }}</td>
                    <td>{{ $car->created_at }}</td>
                    <td>
                        <a href="{{ route('dashboard.car.edit', $car->id) }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $cars->links() }}
    </div>
    <!-- /.container-fluid -->
@endsection
