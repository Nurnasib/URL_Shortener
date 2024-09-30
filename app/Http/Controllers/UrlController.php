<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Psy\Util\Str;

class UrlController extends Controller
{
    public function create() {
        return view('create');
    }
    public function index() {
        $urls = Url::where('user_id', auth()->id())->get();
        return view('index', compact('urls'));
    }
    public function show($short) {
        $url = Url::where('short_url', $short)->firstOrFail();
        $url->increment('count');
        return redirect($url->original_url);
    }
    public function store(Request $request) {
        $request->validate([
            'original_url'=> 'required|url'
        ]);
        $short = \Illuminate\Support\Str::random(3);
        Url::create([
            'user_id'=> auth()->id(),
            'original_url'=> $request->original_url,
            'short_url'=> $short
        ]);
        return redirect()->route('urls.index')->with('success', 'Short URL created successfully.');
    }
}
