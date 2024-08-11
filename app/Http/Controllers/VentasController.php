<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Tipos_Documento;
use App\Models\Productos;
use App\Models\Detalle_Venta;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{

    public function registrarVentas()
    {

        $idProducto = productos::all();
        $precioProducto = productos::all();
        $tiposDocumento = tipos_documento::all();
        $ultimaVentaRegistrada = ventas::orderBy('id', 'desc')->first();
        $nextId = $ultimaVentaRegistrada ? $ultimaVentaRegistrada->id + 1 : 1;


        return view('registro-ventas.registro-ventas', compact('nextId', 'tiposDocumento', 'idProducto', 'precioProducto'));
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'cliente_nombre' => 'required|string',
            'tipo_documento_id' => 'required|exists:tipos_documento,id',
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
        $nombreDocumentoIdentidad = DB::table('tipos_documento')
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
            Detalle_Venta::create([
                'venta_id' => $venta->id,
                'producto_id' => $producto['id'],
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
}
