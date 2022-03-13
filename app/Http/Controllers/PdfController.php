<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use Exception;
use PDF;

class PdfController extends Controller
{
    //
    public function lihatPdf(Request $request)
    {
        try {
            $sk = SuratKeluar::find($request->id_surat_keluar);
            $data = [
                'm_atas' => $sk->m_atas,
                'm_bawah' => $sk->m_bawah,
                'm_kanan' => $sk->m_kanan,
                'm_kiri' => $sk->m_kiri,
                'layout_kop' => $sk->layout_kop,
                'layout_konten' => $sk->layout_konten
            ];

            $pdf = PDF::loadView('pdf.show', $data)->setPaper($sk->ukuran_hal, $sk->orientasi_hal);

            return $pdf->stream('SK_'.$sk->nomor_surat.'.pdf');
        } catch (exception $e) {
            return view('error.500');
        }
    }
}
