<?php


namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class productosController extends Controller
{
    public function index()
    {
        $productos = Productos::all();

        if ($productos->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron productos porfavor ingrese uno en la base de datos',
                'status' => 404
            ], 404);
        }

        return response()->json($productos, 200); 
    }

    public function show($id)
    {
        $producto = Productos::find($id);

        if (!$producto) {
            return response()->json([
                'message' => 'Este Producto no se encuentra',
                'status' => 404
            ], 404);
        }

        return response()->json($producto, 200);
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nombre' => 'required|string|max:255',
        'tipo_producto' => 'required|in:bebida,comida',
        'precio' => 'required|numeric',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors(),
            'status' => 400
        ], 400);
    }

    // Crea el producto con solo los campos permitidos
    $producto = Productos::create($request->only(['nombre', 'tipo_producto', 'precio']));

    return response()->json([
        'message' => 'Producto creado exitosamente',
        'producto' => $producto,
        'status' => 201
    ], 201);
}


    public function update(Request $request, $id)
    {
        $producto = Productos::find($id);

        if (!$producto) {
            return response()->json([
                'message' => 'Producto no encontrado',
                'status' => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'tipo_producto' => 'required|in:bebida,comida', 
            'precio' => 'required|numeric',
        ]);
        

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        $producto->update($request->all());

        return response()->json([
            'message' => 'Producto actualizado exitosamente',
            'producto' => $producto,
            'status' => 200
        ], 200);
    }

    public function destroy($id)
    {
        $producto = Productos::find($id);

        if (!$producto) {
            return response()->json([
                'message' => 'Producto no encontrado',
                'status' => 404
            ], 404);
        }

        $producto->delete();

        return response()->json([
            'message' => 'Producto eliminado exitosamente',
            'status' => 200
        ], 200);
    }
}
