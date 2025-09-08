<?php

namespace App\Http\Controllers;

use App\Models\ItemFlavor;
use App\Services\ItemFlavorService;
use Illuminate\Http\Request;

class ItemFlavorController extends Controller
{
    protected $itemFlavorService;

    public function __construct(ItemFlavorService $itemFlavorService) {
        $this->itemFlavorService = $itemFlavorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->itemFlavorService->all();
        return view('items.index', );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemFlavor  $itemFlavor
     * @return \Illuminate\Http\Response
     */
    public function show(ItemFlavor $itemFlavor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemFlavor  $itemFlavor
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemFlavor $itemFlavor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemFlavor  $itemFlavor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemFlavor $itemFlavor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemFlavor  $itemFlavor
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemFlavor $itemFlavor)
    {
        //
    }
}
