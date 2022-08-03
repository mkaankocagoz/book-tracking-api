<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;

class BookController extends Controller
{
    public function index(){

        if (Cache::has('books')) {
            $data = Cache::get('books');
            return response()->json($data, 200);
        }

        $data = Book::get();
        Cache::put('books', $data, 600);

        return $data;
    }

    public function store(BookRequest $request){
        if (! Gate::allows('access-admin')) {
            abort(403, 'Unauthorized action.');
        }

        $book = new Book();
        $book->author = $request->author;
        $book->book_name = $request->book_name;
        $book->summary = $request->summary ? $request->summary : '';
        $book->save();
    
        return response(['message' => 'Yeni kitap başarıyla kaydedildi.'], 200);
    }

    public function update(BookRequest $request, $id){
        if (! Gate::allows('access-admin')) {
            abort(403, 'Unauthorized action.');
        }

        $book = Book::find($id);
        $book->author = $request->author;
        $book->book_name = $request->book_name;
        $book->summary = $request->summary ? $request->summary : '';
        $book->save();

        return response(['message' => 'Güncelleme işlemi başarılı.'], 200);
    }

    public function destroy($id){
        if (! Gate::allows('access-admin')) {
            abort(403, 'Unauthorized action.');
        }

        Book::destroy($id);

        return response(['message' => 'Silme işlemi başarılı.'], 200);
    }
}
