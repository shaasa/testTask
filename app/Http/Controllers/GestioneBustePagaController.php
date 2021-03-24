<?php

namespace App\Http\Controllers;

use App\Models\Dipendente;
use App\Models\BustaPaga;
use App\Http\Livewire\Dipendenti;

use App\Http\Requests\UploadBustePagaRequest;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException;
use setasign\Fpdi\PdfParser\Filter\FilterException;
use setasign\Fpdi\PdfParser\PdfParserException;
use setasign\Fpdi\PdfParser\Type\PdfTypeException;
use setasign\Fpdi\PdfReader\PdfReaderException;
use Spatie\PdfToText\Pdf;

class GestioneBustePagaController extends Controller{
    public function __invoke(UploadBustePagaRequest $request){
        $tmpDisk = Storage::disk('tmp');
        $newDir = $this->creaDirTmp($request, $tmpDisk);
        $this->split_pdf($request->file('customFile')->getPathname(), storage_path('app/tmp') . '/' . $newDir);
        $this->gestisciPDFBustePaghe($tmpDisk, $newDir, $request);
        $tmpDisk->deleteDirectory($newDir);

        return redirect(url('uploadBustePaga', ['messaggio' => 'ok']));
    }

    /**
     * @param $txt
     *
     * @return bool|string
     */
    private function trovaCFinPagina($txt){
        $re = '/[A-Za-z]{6}[0-9]{2}[A-Za-z]{1}[0-9]{2}[A-Za-z]{1}[0-9]{3}[A-Za-z]{1}/';
        preg_match($re, $txt, $matches, PREG_OFFSET_CAPTURE, 0);

        return (isset($matches[0][0])) ? $matches[0][0] : false;
    }

    /**
     * @param \App\Http\Requests\UploadBustePagaRequest $request
     * @param                                           $tmpDisk
     *
     * @return string
     */
    private function creaDirTmp(UploadBustePagaRequest $request, $tmpDisk) : string{
        $newDir = md5($request->input('mese') . $request->input('anno'));
        $tmpDisk->makeDirectory($newDir);

        return $newDir;
    }

    /**
     * @param                                             $tmpDisk
     * @param                                             $newDir
     * @param \App\Http\Requests\UploadBustePagaRequest   $request
     */
    private function gestisciPDFBustePaghe($tmpDisk, $newDir, UploadBustePagaRequest $request){
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
                $this->spostaFileBustaPaga($bustaPaga, $newNameFile);
                $this->salvaBustaPaga($request, $dipendente->id, $newNameFile);
            }
        }
    }

    /**
     * @param $bustaPaga
     * @param $newNameFile
     */
    private function spostaFileBustaPaga($bustaPaga, $newNameFile){
        if(Storage::exists('public/' . $newNameFile)){
            Storage::delete('public/' . $newNameFile);
        }

        Storage::move('tmp/' . $bustaPaga, 'public/' . $newNameFile);
    }

    /**
     * @param \App\Http\Requests\UploadBustePagaRequest $request
     * @param                                           $dipendente_id
     * @param                                           $newNameFile
     */
    private function salvaBustaPaga(UploadBustePagaRequest $request, $dipendente_id, $newNameFile){
        $bustaPagaDB = BustaPaga::where('mese', $request->input('mese'))->where('anno', $request->input('anno'))->where('dipendente_id', $dipendente_id)->first();
        if(is_null($bustaPagaDB)){
            $bustaObj = new BustaPaga();
            $bustaObj->setAttribute('dipendente_id', $dipendente_id);
            $bustaObj->setAttribute('file', $newNameFile);
            $bustaObj->setAttribute('mese', $request->input('mese'));
            $bustaObj->setAttribute('anno', $request->input('anno'));
            $bustaObj->save();
        }
    }

    /**
     * @param string $filename
     * @param string $directory
     */
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
