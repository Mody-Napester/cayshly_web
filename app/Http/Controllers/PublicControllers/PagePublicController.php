<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PagePublicController extends Controller
{
    /**
     * Show user wishlist
     */
    public function show($page){
        $data['page'] = Page::getOneBy('slug', $page);
        return view('@public.page.show', $data);
    }

}
