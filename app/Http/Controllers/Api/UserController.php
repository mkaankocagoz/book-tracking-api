<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ReadList;

class UserController extends Controller
{
    public function read($id){
        $user_id = Auth::id();
        
        $read_list = ReadList::updateOrCreate(
            ['user_id' => $user_id, 'book_id' => $id],
            ['read' => 1, 'will_read' => 0]
        );
    
        return response(['message' => 'Kitap okuduklarım listesine başarıyla eklendi.'], 200);
    }

    public function will_read($id){
        $user_id = Auth::id();
        
        $read_list = ReadList::updateOrCreate(
            ['user_id' => $user_id, 'book_id' => $id],
            ['read' => 0, 'will_read' => 1]
        );
    
        return response(['message' => 'Kitap okuyacaklarım listesine başarıyla eklendi.'], 200);
    }
}
