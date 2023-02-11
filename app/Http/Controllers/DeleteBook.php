<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteBook extends Controller
{
    public function deleteBook (Request $request) 
    {
        
    $book = Books::select('*')
    ->whereRaw('id =' . $request->input('bookId'))->first();

    Storage::delete('public/files/' . $book->file);

    Storage::delete('public/images/' . $book->image);
     
    $book->delete();

    $results = DB::select('delete from reviews where book_id = ?', [$request->input('bookId')]);

    

    return redirect()->action([HomeController::class, 'index']);
    }

}
