@extends('dashboard.template.main')


@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cars</h1>
            <div>
                <a href="{{ route('dashboard.car.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-50"></i>Back</a>
            </div>
        </div>

        <form action="">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ request()->get('name') }}" class="form-control">
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Creator</label>
                        <input type="text" name="creator" value="{{ request()->get('creator') }}" class="form-control">
                    </div>
                </div>


                <div class="col-md-3">
                    <div for="" style="visibility: hidden">Button</div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>


        </form>

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
                        <a href="{{ route('dashboard.car.restore', $car->id) }}" class="btn btn-sm btn-warning">
                            <i class="fa fa-route"></i>
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
