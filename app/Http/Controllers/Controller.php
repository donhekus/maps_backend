<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
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
        $popup = new Popup($request->all());
        foreach ($request->input('items') as $item) {
            $popup->popupItem()->create($item);
        }

        return Response::json($popup->save());
    }

    /**
     * @param Request $request
     * @param int     $popupId
     *
     * @return JsonResponse
     */
    public function update(Request $request, int $popupId)
    {
        $popup = Popup::find($popupId);

        foreach ($request->input('items') as $item) {
            if (array_key_exists('id', $item)) {
                $popup->popupItem()->where('id', $item['id'])->update($item);
            } else {
                $popup->popupItem()->create($item);
            }
        }

        return Response::json($popup->save());
    }

    /**
     * @param Request $request
     * @param int     $popupId
     *
     * @return JsonResponse
     */
    public function delete(Request $request, int $popupId)
    {
        $popup = Popup::find($popupId);
        return Response::json($popup->delete());
    }
}
