<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
        ]);

        try {
            // Send email
            \Mail::to($validated['correo'])->send(new \App\Mail\PurchaseNotification($validated));

            return response()->json([
                'success' => true,
                'message' => '¡Gracias por tu compra! Te hemos enviado un correo de confirmación.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al enviar el correo: ' . $e->getMessage()
            ], 500);
        }
    }
}
