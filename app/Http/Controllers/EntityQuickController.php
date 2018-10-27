<?php

namespace App\Http\Controllers;

/**
 * Class EntityQuickController
 * @package App\Http\Controllers
 */
class EntityQuickController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $ajax = request()->ajax();
        return view('entities.forms.' . ($ajax ? '_' : null) . 'quick', compact('ajax'));
    }
}