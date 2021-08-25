<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinksRequest;
use App\Service\LinkService;
use Illuminate\Http\Request;
use App\Models\Link;


class LinkController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(){
        return view('links.show');
    }

    /**
     * @param LinksRequest $request
     * @param LinkService $linkService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(LinksRequest $request, LinkService $linkService)
    {
        $linkSource = $request->input('url');
        $linkDesc = $request->input('desc',  null);
        $linkHash = $linkService->getLinkHashGenerate();

        $link = Link::create([
            'link_source' => $linkSource,
            'link_desc' => $linkDesc,
            'link_hash' => $linkHash,
        ]);

        if ($link) {
            return back()->with('success', route('links.away', ['hash' => $linkHash]));
        }

        return back()->with('error', 'URL save error!');
    }

    /**
     * @param string $hash
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function away(string $hash){
        $link = Link::where(['link_hash' => $hash])->firstOrfail();
        if ($link){
            return redirect()->away($link->link_source);
        }
    }
}
