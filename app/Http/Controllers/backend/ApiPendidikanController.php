<?php
 
 namespace App\Http\Controllers\Backend;
 
 use App\Models\Pendidikan;
 use Illuminate\Http\Request;
 use App\Http\Controllers\Controller;
 use Illuminate\Support\Facades\Response;
 
 class ApiPendidikanController extends Controller
 {
     public function getAll()
     {
         $pendidikan = Pendidikan::all();
         return Response::json($pendidikan, 201);
     }

     public function getPen($id)
     {
         $pendidikan = Pendidikan::find($id);
 
         if (!$pendidikan) {
             return response()->json([
                 'status' => 'error',
                 'message' => 'Data tidak ditemukan!'
             ], 404);
         }
 
         return response()->json($pendidikan, 200);
     }
 
     public function createPen(Request $request)
     {
         $pendidikan = Pendidikan::create($request->all());
 
         return response()->json([
             'status' => 'ok',
             'message' => 'Pendidikan berhasil ditambahkan!',
             'data' => $pendidikan
         ], 201);
     }
 
     public function updatePen($id, Request $request)
     {
         Pendidikan::find($id)->update($request->all());
 
         return response()->json([
             'status' => 'ok',
             'message' => 'Pendidikan berhasil dirubah!'
         ], 201);
     }
 
     public function deletePen($id)
     {
         Pendidikan::destroy($id);
 
         return response()->json([
             'status' => 'ok',
             'message' => 'Pendidikan berhasil dihapus!'
         ], 201);
     }
 }

