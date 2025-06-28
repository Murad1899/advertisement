<?php

namespace App\Http\Controllers\Dashboard\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;


class CarQueryController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::query()
            ->from('cars as c')
            ->select(
                'c.id', 'c.name', 'c.created_at', 'u.name as creator'
            )
            ->join('users as u', 'u.id', 'c.created_by')
            ->whereNull('c.deleted_at');

        $this->filterIndex($request, $cars);

        $cars = $cars
            ->orderByDesc('c.id')
            ->paginate(10);

        return view('dashboard.car.index', compact('cars'));
    }


    private function filterIndex(Request $request, $cars): void
    {
        if ($request->name != null) {
            $cars = $cars->where('c.name', 'like', "%$request->name%");
        }

        if ($request->creator != null) {
            $cars = $cars->where('u.name', 'like', "%$request->creator%");
        }
    }

    public function create()
    {
        return view('dashboard.car.create');
    }

    public function edit($id)
    {
        $car = Car::query()
            ->where('id', $id)
            ->first();

        if (!$car)
            abort(404);

        return view('dashboard.car.edit', compact('car'));
    }

    public function trash(Request $request)
    {
        $cars = Car::query()
            ->from('cars as c')
            ->select(
                'c.id', 'c.name', 'c.created_at', 'u.name as creator'
            )
            ->join('users as u', 'u.id', 'c.created_by')
            ->whereNotNull('c.deleted_at');

        $this->filterIndex($request, $cars);

        $cars = $cars
            ->orderByDesc('c.id')
            ->paginate(10);

        return view('dashboard.car.trash', compact('cars'));
    }
}
