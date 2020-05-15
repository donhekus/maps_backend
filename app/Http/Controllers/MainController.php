<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MainController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        return Response::json(Popup::all());
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $popup = Popup::create($request->all());
        foreach ($request->input('elements') as $item) {
            $popup->elements()->create($item);
        }

        return Response::json($popup->save());
    }

    /**
     * @param Request $request
     * @param int     $id
     *
     * @return JsonResponse
     */
    public function edit(Request $request, int $id)
    {
        $popup = Popup::with('elements')->where('id', $id)->first();

        return Response::json($popup);
    }

    /**
     * @param Request $request
     * @param int     $id
     *
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $popup = Popup::find($id);
        $popup->elements()->delete();

        foreach ($request->input('elements') as $item) {
            $popup->elements()->create($item);
        }

        return Response::json($popup->update($request->all()));
    }

    /**
     * @param Request $request
     * @param int     $id
     *
     * @return JsonResponse
     */
    public function delete(Request $request, int $id)
    {
        $popup = Popup::find($id);
        return Response::json($popup->delete());
    }

    /**
     * @param Request $request
     * @param string  $name
     *
     * @return JsonResponse
     */
    public function getByName(Request $request, string $name)
    {
        $popup = Popup::with('elements')->where('name', $name)->first();

        return Response::json($popup);
    }
}
