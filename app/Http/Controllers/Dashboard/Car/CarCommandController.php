<?php

namespace App\Http\Controllers\Dashboard\Car;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Car\CarStoreRequest;
use App\Http\Requests\Dashboard\Car\CarUpdateRequest;
use App\Util\MessageUtil\MessageUtil;
use Illuminate\Http\Request;
use App\Models\Car;

class CarCommandController extends Controller
{
    public function store(CarStoreRequest $request)
    {
        Car::query()
            ->create([
                'name' => $request->name,
                'created_by' => auth()->user()->id
            ]);

        return to_route('dashboard.car.index')->with('success', MessageUtil::CREATED);
    }

    public function update($id, CarUpdateRequest $request)
    {
        Car::query()
            ->where('id', $id)
            ->update([
                'name' => $request->name
            ]);

        return to_route('dashboard.car.edit', $id)->with('success', MessageUtil::UPDATED);

    }

    public function delete($id)
    {
        Car::query()
            ->where('id', $id)
            ->update([
                'deleted_at' => Carbon::now(),
                'deleted_by' => auth()->user()->id
            ]);

        return to_route('dashboard.car.index', $id)->with('success', MessageUtil::DELETED);
    }

    public function restore($id)
    {
        Car::query()
            ->where('id', $id)
            ->update([
                'deleted_at' => null,
                'deleted_by' => null
            ]);

        return to_route('dashboard.car.trash', $id)->with('success', MessageUtil::RESTORE);
    }

}
