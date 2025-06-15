<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RegisterOfMaterial;
use Spatie\LaravelPdf\Enums\Format;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\PdfToImage\Pdf as PdfToImage;

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

        // 1. Сначала сохраняем PDF во временный файл
        $pdfPath = storage_path("app/public/record-{$record->id}.pdf");

        Pdf::view('pdf.register-of-materials', ['data' => $data])
            ->format(Format::A4)
            ->save($pdfPath);

        // 2. Конвертируем PDF в изображение
        $imagePath = storage_path("app/public/record-{$record->id}.jpg");

        (new PdfToImage($pdfPath))
            ->setOutputFormat('jpg')
            ->saveImage($imagePath);

        // 3. Удаляем временный PDF (если не нужен)
        unlink($pdfPath);

        // 4. Возвращаем изображение как ответ
        //return response()->file($imagePath)->deleteFileAfterSend(true);

        return Pdf::view('pdf.register-of-materials', ['data' => $data])
            ->format(Format::A4)
            ->name("record-{$record->id}.pdf")
            ->download(); // или ->save(public_path("pdf/record-{$record->id}.pdf"));
    }
}
