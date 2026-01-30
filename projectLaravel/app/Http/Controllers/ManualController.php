<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ManualController extends Controller
{
    /**
     * Generate User Manual PDF
     */
    public function generateUserManual()
    {
        $pdf = Pdf::loadView('manuals.usuario.manual');
        $pdf->setPaper('a4', 'portrait');
        
        // Save to public/docs directory
        $path = public_path('docs/Manual_Usuario.pdf');
        $pdf->save($path);
        
        return response()->download($path);
    }

    /**
     * Generate Technical Manual PDF
     */
    public function generateTechnicalManual()
    {
        $pdf = Pdf::loadView('manuals.tecnico.manual');
        $pdf->setPaper('a4', 'portrait');
        
        // Save to public/docs directory
        $path = public_path('docs/Manual_Tecnico.pdf');
        $pdf->save($path);
        
        return response()->download($path);
    }

    /**
     * Generate both manuals at once
     */
    public function generateBoth()
    {
        // Generate User Manual
        $pdfUser = Pdf::loadView('manuals.usuario.manual');
        $pdfUser->setPaper('a4', 'portrait');
        $pathUser = public_path('docs/Manual_Usuario.pdf');
        $pdfUser->save($pathUser);

        // Generate Technical Manual
        $pdfTech = Pdf::loadView('manuals.tecnico.manual');
        $pdfTech->setPaper('a4', 'portrait');
        $pathTech = public_path('docs/Manual_Tecnico.pdf');
        $pdfTech->save($pathTech);

        return response()->json([
            'success' => true,
            'message' => 'Manuales generados exitosamente',
            'files' => [
                'usuario' => 'Manual_Usuario.pdf',
                'tecnico' => 'Manual_Tecnico.pdf'
            ]
        ]);
    }
}
