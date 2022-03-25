<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelpackageRequest;
use App\Travelpackage;
use Illuminate\Http\Request;
use Illuminate\Support\str;


class TravelpackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Travelpackage::all();

        return view('pages.admin.travel-package.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelpackageRequest $request)
    {
        $data = $request->all();
        $data['slug'] = str::slug($request->title);

        Travelpackage::create($data);
        return redirect()->route('travel-package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item= Travelpackage::findOrFail($id);

        return view('pages.admin.travel-package.edit',[
            'item'=> $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelpackageRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = str::slug($request->title);

        $item = Travelpackage::findOrFail($id);
        $item -> update($data);
        return redirect()->route('travel-package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Travelpackage::findOrFail($id);
        $item->delete();
        return redirect()->route('travel-package.index');
    }
}
