<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Productos; 
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Productos::all();

        if ($productos->isEmpty()) {
            $data = [
                'message' => 'No se encontraron productos', 
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        return response()->json($productos, 200); 
    }
}
