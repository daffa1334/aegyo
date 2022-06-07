<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\categories;

class categoriescontroller extends Controller
{
   public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors());
        }
        
        $categories = new Categories();
        $categories->name = $request->name;
        
        $categories->save();
        
        $data = Categories::where('id', '=', $categories->id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Data categories berhasil ditambahkan',
            'data' => $data
        ]);
    }
    public function getAll()
    {
        $data = Categories::get();        
        return response()->json($data);
    }
    
    public function getById($id)
    {
        $data = Categories::where('id', '=', $id)->first();        
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
    
        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        $categories = new Categories();
        $categories->name = $request->name;
        
        $categories->save();

        return response()->json([
            'success' => true,
            'message' => 'Data categories berhasil diubah'
        ]);        
    }
     public function delete($id)
    {
        $delete = Categories::where('id', '=', $id)->delete();

        if($delete) {
            return response()->json([
                'success' => true,
                'message' => 'Data categories berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data categories gagal dihapus'
            ]);            
        }
    }
}
