<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request){

        $query = DB::table('books');
        if (isset($request->author))
            $query = $query->where('author', $request->author);
        if (isset($request->book_name))
            $query = $query->where('book_name', $request->book_name);
        if (isset($request->summary))
            $query = $query->where('summary', 'LIKE', '%'.$request->summary.'%');
        
        return $query->get();
    }
}
