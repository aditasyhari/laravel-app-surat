<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use Exception;
use PDF;
use Dompdf;

class PdfController extends Controller
{
    //
    public function previewTemplate(Request $request)
    {
        try {
            $data = [
                'nomor_surat' => 'Template Surat',
                'm_atas' => $request->m_atas,
                'm_bawah' => $request->m_bawah,
                'm_kanan' => $request->m_kanan,
                'm_kiri' => $request->m_kiri,
                'layout_kop' => $request->layout_kop,
                'layout_konten' => $request->layout_konten
            ];

            $pdf = PDF::loadView('pdf.show', $data)->setPaper($request->ukuran_hal, $request->orientasi_hal);

            return $pdf->stream("preview.pdf", array("Attachment" => false));
        } catch (exception $e) {
            return view('error.500');
        }
    }

    public function preview(Request $request)
    {
        try {
            $data = [
                'nomor_surat' => $request->nomor_surat,
                'm_atas' => $request->m_atas,
                'm_bawah' => $request->m_bawah,
                'm_kanan' => $request->m_kanan,
                'm_kiri' => $request->m_kiri,
                'layout_kop' => $request->layout_kop,
                'layout_konten' => $request->layout_konten
            ];

            $pdf = PDF::loadView('pdf.show', $data)->setPaper($request->ukuran_hal, $request->orientasi_hal);

            return $pdf->stream("preview.pdf", array("Attachment" => false));
        } catch (exception $e) {
            return view('error.500');
        }
    }

    public function lihatPdf(Request $request)
    {
        try {
            $sk = SuratKeluar::find($request->input('id_surat_keluar'));
            // dd($sk);
            $data = [
                'nomor_surat' => $sk->nomor_surat,
                'm_atas' => $sk->m_atas,
                'm_bawah' => $sk->m_bawah,
                'm_kanan' => $sk->m_kanan,
                'm_kiri' => $sk->m_kiri,
                'layout_kop' => $sk->layout_kop,
                'layout_konten' => $sk->layout_konten
            ];

            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pdf.show', $data)->setPaper($sk->ukuran_hal, $sk->orientasi_hal);

            return $pdf->stream("SK_$sk->nomor_surat.pdf", array("Attachment" => false));
        } catch (exception $e) {
            return view('error.500');
        }
    }

    public function lihatPdfDraft(Request $request)
    {
        try {
            $sk = SuratKeluar::find($request->input('id_surat_keluar'));
            // dd($sk);
            $data = [
                'nomor_surat' => $sk->nomor_surat,
                'm_atas' => $sk->m_atas,
                'm_bawah' => $sk->m_bawah,
                'm_kanan' => $sk->m_kanan,
                'm_kiri' => $sk->m_kiri,
                'layout_kop' => $sk->layout_kop,
                'layout_konten' => $sk->layout_konten_draft
            ];

            $pdf = PDF::loadView('pdf.show', $data)->setPaper($sk->ukuran_hal, $sk->orientasi_hal);

            return $pdf->stream("SK_$sk->nomor_surat.pdf", array("Attachment" => false));
        } catch (exception $e) {
            return view('error.500');
        }
    }
}
