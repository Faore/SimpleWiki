<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page();
        $page->title = $request->input('title');
        $page->raw = $request->input('raw');
        $page->parse();
        $page->save();
        \Flash::success('Page created.');

        return redirect()->to('/wiki/'.$page->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);

        return view('show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view('edit')->with('page', $page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = \App\Page::findOrFail($id);
        $page->title = $request->input('title');
        $page->raw = $request->input('raw');
        $page->parse();
        $page->save();
        \Flash::success('Page edited.');

        return redirect()->to('/wiki/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        \Flash::success('Page deleted.');

        return redirect()->to('/');
    }

    public function refresh($id)
    {
        $page = Page::findOrFail($id);
        $page->parse();
        $page->save();
        \Flash::success('Page refreshed. The latest HTML has been rebuilt.');

        return redirect()->to('/wiki/'.$id);
    }
}
