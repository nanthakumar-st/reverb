<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CityController extends Controller
{
    public function index(): View
    {
        $cities = City::orderBy('name')->paginate(15);

        return view('cities.index', compact('cities'));
    }

    public function create(): View
    {
        return view('cities.create');
    }

    public function store(CityRequest $request): RedirectResponse
    {
        $city = City::create($request->validated());

        return redirect()->route('cities.show', $city)->with('status', 'City created.');
    }

    public function show(City $city): View
    {
        return view('cities.show', compact('city'));
    }

    public function edit(City $city): View
    {
        return view('cities.edit', compact('city'));
    }

    public function update(CityRequest $request, City $city): RedirectResponse
    {
        $city->update($request->validated());

        return redirect()->route('cities.show', $city)->with('status', 'City updated.');
    }

    public function destroy(City $city): RedirectResponse
    {
        $city->delete();

        return redirect()->route('cities.index')->with('status', 'City deleted.');
    }
}
