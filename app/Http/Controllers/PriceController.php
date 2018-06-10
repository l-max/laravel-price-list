<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PriceRepository;
use App\Price;

class PriceController extends Controller
{

    /**
     * @var PriceRepository
     */
    protected $prices;

    /**
     * PriceController constructor.
     * @param PriceRepository $prices
     */
    public function __construct(PriceRepository $prices)
    {
        $this->middleware('auth');
        $this->prices = $prices;
    }

    /**
     * Return view with price list.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('price.index', [
            'prices' => $this->prices->getAllForUser($request->user()),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('price.add');
    }

    /**
     * Create new price item
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'measure' => 'required|max:30',
            'number' => 'integer',
        ]);

        $request->user()->prices()->create([
            'name' => $request->name,
            'measure' => $request->measure,
            'price' => $request->price,
            'number' => $request->number,
        ]);

        return redirect('/price');
    }

    /**
     * @param Request $request
     * @param Price $price
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Request $request, Price $price)
    {
        $price = $this->prices->getById($request->user(), $price->id);
        if (!$price) {
            abort(404);
        }
        $this->authorize('update', $price);

        return view('price.edit', [
            'price' => $price
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request)
    {
        $price = $this->prices->getById($request->user(), $request->id);
        if (!$price) {
            abort(404);
        }

        $this->authorize('update', $price);
        $this->validate($request, [
            'name' => 'required|max:255',
            'measure' => 'required|max:30',
            'number' => 'integer',
        ]);

        $isUpdated = $price->update($request->all());
        if (!$isUpdated) {
            abort(500);
        }
        return redirect('/price');
    }

    /**
     * @param Request $request
     * @param Price $price
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request, Price $price)
    {
        $this->authorize('destroy', $price);
        $price->delete();

        return redirect('/price');
    }
}
