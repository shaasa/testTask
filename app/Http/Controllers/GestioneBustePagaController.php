<?php

namespace App\Http\Controllers;

use App\Models\Dipendente;
use App\Models\BustaPaga;
use App\Http\Livewire\Dipendenti;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException;
use setasign\Fpdi\PdfParser\Filter\FilterException;
use setasign\Fpdi\PdfParser\PdfParserException;
use setasign\Fpdi\PdfParser\Type\PdfTypeException;
use setasign\Fpdi\PdfReader\PdfReaderException;
use Spatie\PdfToText\Pdf;
use function PHPUnit\Framework\isNull;

class GestioneBustePagaController extends Controller{
    public function __invoke(Request $request){
        $request->validate(['mese'       => 'required',
                            'anno'       => 'required',
                            'customFile' => 'required']);

        $tmpDisk = Storage::disk('tmp');
        $newDir = md5($request->input('mese') . $request->input('anno'));
        $tmpDisk->makeDirectory($newDir);

        $this->split_pdf($request->file('customFile')->getPathname(), storage_path('app/tmp') . '/' . $newDir);
        $files = $tmpDisk->files($newDir);
        foreach($files as $bustaPaga){
            $testoBusta = Pdf::getText(str_replace('\\', "/", $tmpDisk->path($bustaPaga)), 'C:/xamppn/pdftotext/pdftotext.exe');
            $dipendente = null;
            $cf = $this->trovaCFinPagina($testoBusta);

            if($cf !== false){
                $dipendente = Dipendente::where('CF', $cf)->first();
            }
            if(!is_null($dipendente)){
                $newNameFile = $request->input('mese') . $request->input('anno') . '_' . $cf . '.pdf';
                if(Storage::exists('public/' . $newNameFile)){
                    Storage::delete('public/' . $newNameFile);
                }

                Storage::move('tmp/' . $bustaPaga, 'public/' . $newNameFile);
                $bustaPaga = BustaPaga::where('mese', $request->input('mese'))->where('anno', $request->input('anno'))->where('dipendente_id', $dipendente->id)->first();
                if(is_null($bustaPaga)){
                    $bustaObj = new BustaPaga();
                    $bustaObj->setAttribute('dipendente_id', $dipendente->id);
                    $bustaObj->setAttribute('file', $newNameFile);
                    $bustaObj->setAttribute('mese', $request->input('mese'));
                    $bustaObj->setAttribute('anno', $request->input('anno'));
                    $bustaObj->save();
                }
            }

            $tmpDisk->delete($bustaPaga);
        }
        $tmpDisk->deleteDirectory($newDir);
        return redirect(url('uploadBustePaga', ['messaggio' => 'ok']));
    }

    private function trovaCFinPagina($txt){
        $re = '/[A-Za-z]{6}[0-9]{2}[A-Za-z]{1}[0-9]{2}[A-Za-z]{1}[0-9]{3}[A-Za-z]{1}/';
        preg_match($re, $txt, $matches, PREG_OFFSET_CAPTURE, 0);

        return (isset($matches[0][0])) ? $matches[0][0] : false;
    }

    private function split_pdf(string $filename, string $directory){
        $pdf = new Fpdi();
        try{
            $pageCount = $pdf->setSourceFile($filename);
        }catch(PdfParserException $e){
        }
        $file = pathinfo($filename, PATHINFO_FILENAME);

        // Split each page into a new PDF
        for($i = 1; $i <= $pageCount; $i++){
            $newPdf = new Fpdi();
            $newPdf->addPage();
            try{
                $newPdf->setSourceFile($filename);
            }catch(PdfParserException $e){
            }
            try{
                $newPdf->useTemplate($newPdf->importPage($i));
            }catch(CrossReferenceException $e){
            }catch(FilterException $e){
            }catch(PdfTypeException $e){
            }catch(PdfParserException $e){
            }catch(PdfReaderException $e){
            }

            $newFilename = sprintf('%s/%s_%s.pdf', $directory, $file, $i);
            $newPdf->output($newFilename, 'F');
        }
    }
}
