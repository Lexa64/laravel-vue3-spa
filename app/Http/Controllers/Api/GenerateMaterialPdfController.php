<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RegisterOfMaterial;
use Spatie\LaravelPdf\Enums\Format;
use Spatie\LaravelPdf\Facades\Pdf;

class GenerateMaterialPdfController extends Controller
{
    public function generatePdf($id)
    {
        $record = RegisterOfMaterial::findOrFail($id);

        // или $record->toArray()
        $data = [
            'id' => $record->id,
            'name_of_material' => $record->name_of_material,
            'special_marks' => $record->special_marks,
        ];

        return Pdf::view('pdf.register-of-materials', ['data' => $data])
            ->format(Format::A4)
            ->name("record-{$record->id}.pdf")
            ->download(); // или ->save(public_path("pdf/record-{$record->id}.pdf"));
    }
}
