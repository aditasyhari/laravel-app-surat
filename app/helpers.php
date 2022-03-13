<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\SuratKeluar;

function tglIndo($tgl){
    $hari = date('l',strtotime($tgl));

    if ($hari == "Monday") {
        $hari = "Senin";
    } elseif ($hari == "Tuesday") {
        $hari = "Selasa";
    } elseif ($hari == "Wednesday") {
        $hari = "Rabu";
    } elseif ($hari == "Thursday") {
        $hari = "Kamis";
    } elseif ($hari == "Friday") {
        $hari = "Jumat";
    } elseif ($hari == "Saturday") {
        $hari = "Sabtu";
    } elseif ($hari == "Sunday") {
        $hari = "Minggu";
    } else {
        $hari = "-";
    }

    $tanggal = substr($tgl,8,2);
    $bulan = bulanIndo(substr($tgl,5,2));
    $tahun = substr($tgl,0,4);
    return $hari.', '.$tanggal.' '.$bulan.' '.$tahun;		 
}

function bulanIndo($bln){
	switch ($bln){
		case 1: 
			return "Januari";
			break;
		case 2:
			return "Februari";
			break;
		case 3:
			return "Maret";
			break;
		case 4:
			return "April";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Juni";
			break;
		case 7:
			return "Juli";
			break;
		case 8:
			return "Agustus";
			break;
		case 9:
			return "September";
			break;
		case 10:
			return "Oktober";
			break;
		case 11:
			return "November";
			break;
		case 12:
			return "Desember";
			break;
	}
} 

function getBulanRomawi($bln){
    switch ($bln){
        case "01": 
            return "I";
            break;
        case "02":
            return "II";
            break;
        case "03":
            return "III";
            break;
        case "04":
            return "IV";
            break;
        case "05":
            return "V";
            break;
        case "06":
            return "VI";
            break;
        case "07":
            return "VII";
            break;
        case "08":
            return "VIII";
            break;
        case "09":
            return "IX";
            break;
        case "10":
            return "X";
            break;
        case "11":
            return "XI";
            break;
        case "12":
            return "XII";
            break;
    }
}

function nomorSurat($param) {
    $max = SuratKeluar::where('kode_klasifikasi', $param['kode'])->max('urutan');
    $kode = \Str::upper($param['kode']);
    $bulan = Carbon::parse($param['tgl_surat_fisik'])->format('m');
    $bulan_romawi = getBulanRomawi($bulan);
    $tahun = date("Y");

    if(is_numeric($max)) {
        $max += 1;
    } else {
        $max = 1;
    }

    $output = [
        'urutan' => $max,
        'nomor_surat' => "$max/$kode/$bulan_romawi/$tahun"
    ];

    return $output;
}

function variabelReplace($param) {
    $perihal = $param['perihal'];
    $tgl_surat_fisik = $param['tgl_surat_fisik'];
    $tujuan = $param['tujuan'];
    $email_tujuan = $param['email_tujuan'];
    $ukuran_ttd = $param['ukuran_ttd'];
    $nomor_surat = $param['nomor_surat'];
    $konten = $param['konten'];
    $nama_pembuat = \Auth::user()->nama;
    $email_pembuat = \Auth::user()->email;
    // $ttd = Auth::user()->ttd;
    // $ttd_img = '<img style="width:'.$ukuran_ttd.'px"'." src=https://$_SERVER[HTTP_HOST]/image/ttd/$ttd>";

    $variabel = array('=NoSurat=', '=Nama=', '=Email=', '=Perihal=', '=TglSurat=', '=Tujuan=', '=EmailTujuan=');
    $replace = array($nomor_surat, $nama_pembuat, $email_pembuat, $perihal, tglIndo($tgl_surat_fisik), $tujuan, $email_tujuan);

    $konten_surat = str_replace($variabel, $replace, $konten);

    return $konten_surat;
}

?>