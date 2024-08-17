<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Tipos_Documento;
use App\Models\Productos;
use App\Models\Detalle_Venta;
use App\Models\Categoria_Producto;
use Illuminate\Support\Facades\DB;
use Exception;


class VentasController extends Controller
{

    public function registrarVentas()
    {

        $idProducto = productos::all();
        $precioProducto = productos::all();
        $tiposDocumento = tipos_documento::all();
        $nombreCategoria = categoria_producto::all();
      //  $idCategoriaProducto = DB::table('productos')->value('categoria_id');
       // $nombreCategoriaProducto = DB::table('categorias')->where('id', $idCategoriaProducto)->value('nombre');
        $ultimaVentaRegistrada = ventas::orderBy('id', 'desc')->first();

        $nextId = $ultimaVentaRegistrada ? $ultimaVentaRegistrada->id + 1 : 1;


        return view('registro-ventas.registro-ventas', compact('nextId', 'tiposDocumento', 'idProducto', 'precioProducto', 'nombreCategoria'));
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'cliente_nombre' => 'required|string',
            'tipo_documento_id' => 'required|exists:tipo_documento,id',
            'numero_documento' => 'required|string',
            'telefono_cliente' => 'nullable|string',
            'direccion_cliente' => 'nullable|string',
            'productos' => 'required|array',
            'productos.*.id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio' => 'required|numeric',
            'productos.*.total' => 'required|numeric',
        ]);

        // Obtén el nombre del tipo de documento por su ID
        $nombreDocumentoIdentidad = DB::table('tipo_documento')
            ->where('id', $validated['tipo_documento_id'])
            ->value('nombre');


        // Crear la venta
        $venta = Ventas::create([
            'nombre_cliente' => $validated['cliente_nombre'],
            'tipo_documento_id' => $validated['tipo_documento_id'],
            'nombre_documento_identidad' => $nombreDocumentoIdentidad,
            'numero_documento' => $validated['numero_documento'],
            'telefono_cliente' => $validated['telefono_cliente'],
            'direccion_cliente' => $validated['direccion_cliente'],
            'total_venta' => 0,
            'fecha_hora' => now(),
            'created_at' => now(),
            'updated_at' => now()
            // Puedes agregar otros campos según sea necesario
        ]);

        $totalVenta = 0;







        foreach ($validated['productos'] as $producto) {
            // Buscar el nombre del producto
            $nombreProducto = DB::table('productos')
                ->where('id', $producto['id'])  // Aquí accedes al id específico del producto
                ->value('nombre');

            // Verificar si el nombre del producto fue encontrado
            if (!$nombreProducto) {
                throw new Exception("Producto con ID {$producto['id']} no encontrado.");
            }

            // Inyectar el nombre del producto en la tabla Detalle_Venta
            Detalle_Venta::create([
                'venta_id' => $venta->id,
                'producto_id' => $producto['id'],
                'producto_comprado' => $nombreProducto,
                'cantidad' => $producto['cantidad'],
                'precio_unitario' => $producto['precio'],
                'total' => $producto['total'],
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $totalVenta += $producto['total'];
        }



        $venta->update(['total_venta' => $totalVenta]);

        return redirect()->route('registro-ventas.registrarVentas')->with('success', 'Venta registrada con éxito');
    }



    public function getProductsByCategory($categoriaId)
{
    // Obtener los productos filtrados por la categoría
    $productos = Productos::where('categoria_id', $categoriaId)->get(['id', 'nombre', 'precio']);

    // Retornar los productos en formato JSON para el uso en JavaScript
    return response()->json($productos);
}







}
