<?php
// Tes Upload dari SSH
error_reporting(0);
//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
class MYPDF extends TCPDF {
	


}
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('YP Gunung Sari');
$pdf->SetTitle('Formulir Pendaftaran Calon mahasiswa YP Gunung Sari');
$pdf->SetSubject('Formulir Pendaftaran Calon mahasiswa YP Gunung Sari');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->setFontSubsetting(false);
// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set margins
$pdf->SetMargins(20, 12, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 0);

$pdf->SetFont('poppinsb', '', 7);
$pdf->SetFont('poppins', '', 7);
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'lang/eng.php')) {
	require_once(dirname(__FILE__).'lang/eng.php');
	$pdf->setLanguageArray($l);
}

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);



// add a page
$pdf->AddPage();
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set some text to print

$base_url = base_url();

// set style for barcode
$style = array(
    'border' => false,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, 
    'module_width' => 1, 
    'module_height' => 1 // height of a single module in points
);


foreach ($siswa as $sd):
	foreach($getprogram as $a){
		$prog = $a->Nama;
	}
	$programnama 	= "";
	$pendidikannama = "";
	$name_pdf 		= $sd->AplikanID.$sd->Nama;
	$idva 		    = $sd->AplikanID;
	$programnama 	= $this->m_user->select_program_nama($sd->ProgramID);
	$pendidikannama = $this->m_user->select_pendidikan_terakhir($sd->PendidikanAyah);
	$sumberinfonama = $this->m_user->select_sumber_info($sd->SumberInformasi);
	$kelamin        = $this->m_user->select_kelamin($sd->Kelamin);
	$tgllah       	= $sd->TanggalLahir;
	$pisah			= explode("-", $tgllah);
	$tgllahir		= $pisah[2].'-'.$pisah[1].'-'.$pisah[0];

	$tglbuat 		= $sd->TanggalBuat;
	$pisahspasi     = explode(" ", $tglbuat);
	$satu 			= $pisahspasi[0];
	$dt 			= explode("-", $satu);
	$wktbuat 		= $dt[2].'/'.$dt[1].'/'.$dt[0];
	//$pdf->write2DBarcode($sd->AplikanID, 'QRCODE,L', 168, 3, 20, 20, $style, 'N');
$html='
<table>
	<tr>
		<td style="width: 15%;">
			<img src="logo_stikes.png" alt="test alt attribute" width="60" height="60" border="0" />
		</td>
		<td style="width: 85%;">
			<font size="20"><b>STIKES GUNUNG SARI</b></font><br>
			<font size="8">Keperawatan | Kebidanan | Profesi Ners</font><br>
			Website: https://stikes.gunungsari.id/ Email: info_stikes@gunungsari.com<br>
			<hr>
		</td>
	</tr>
</table>
<br><br>
<table style="margin-top:80% !important;font-size:12px;width:100%;line-height: 15px;">
<tr>
	<td colspan="2"><b>1. Data Penerimaan Calon Mahasiswa/i</b><br></td>
</tr>
<tr>
	<td style="width: 25%;">&nbsp;&nbsp;&nbsp;&nbsp;Prodi</td>
	<td>: &nbsp; '.$sd->ProdiID.'</td>
</tr>

<tr>
	<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Program</td>
	<td>: &nbsp; '.$programnama.'</td>
</tr>


</table>


<table style="font-size:12px;width:100%;line-height: 15px;">
<tr>
	<td colspan="2"><b><br>2. Data Pribadi Calon Siswa</b><br></td>
</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
		<td>: &nbsp; '.$sd->Nama.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
		<td>: &nbsp; '.$sd->Alamat.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Tempat Lahir</td>
		<td>: &nbsp; '.$sd->TempatLahir.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Tanggal Lahir</td>
		<td>: &nbsp; '.$tgllahir.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Jenis Kelamin</td>
		<td>: &nbsp; '.$kelamin.'</td>
	</tr>
	
	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;No. KTP</td>
		<td>: &nbsp; '.$sd->NomorKTP.'</td>
	</tr>
	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;No. KK</td>
		<td>: &nbsp; '.$sd->NomorKK.'</td>
	</tr>
	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;No. Ponsel(HP)</td>
		<td>: &nbsp; '.$sd->Handphone.'</td>
	</tr>
	<tr>
	<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Sumber Informasi</td>
	<td>: &nbsp; '.$sumberinfonama.'</td>
</tr>
	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Kontak Referensi</td>
		<td>: &nbsp; '.$sd->CatatanPresenter.'</td>
	</tr>

	
</table>

<table class="table  table-sm table-borderless" style="font-size:12px;width:100%;line-height: 15px;">

<tr>
	<td colspan="2"><b><br>3. Pendidikan Terakhir</b><br></td>
</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Asal Sekolah</td>
		<td>: &nbsp; '.$sd->AsalSekolah.'</td>
	</tr>
	
	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;NISN</td> 
		<td>: &nbsp; '.$sd->PropinsiAsal.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;NPSN:</td>
		<td>: &nbsp; '.$sd->NegaraAsal.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Tahun Lulus:</td>
		<td>: &nbsp; '.$sd->TahunLulus.'</td>
	</tr>
	


	
</table>


<table class="table  table-sm table-borderless" style="font-size:12px;width:100%;line-height: 15px;">

<tr>
	<td colspan="2"><b><br>4. Data Orang Tua/Wali</b><br></td>
</tr>

    <tr>
        <td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Nama Ibu Kandung:</td>
        <td>: &nbsp; '.$sd->NamaIbu.'</td>
    </tr>

    <tr>
        <td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Nama Ayah/Wali:</td>
        <td>: &nbsp; '.$sd->NamaAyah.'</td>
    </tr>

    <tr>
        <td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Pendidikan Terakhir:</td>
        <td>: &nbsp; '.$pendidikannama.'</td>
    </tr>
	<tr>
        <td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan:</td>
        <td>: &nbsp; '.$sd->PekerjaanAyah.'</td>
    </tr>

    <tr>
        <td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;No.Ponsel:</td>
        <td>: &nbsp; '.$sd->HandphoneOrtu.'</td>
    </tr>
    
</table>

<table style="font-size:12px;width:100%;line-height: 15px;">
	<tr>
		<td style="text-align:right"><br>Makassar, '.$wktbuat.'<br></td>
	</tr>

	<tr>
		<td style="text-align:right"><br>'.$sd->Nama.'<br><br><br><br></td>
	</tr>

	<tr>
		<td style="text-align:right"><br>__________________</td>
	</tr>
</table>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> <br><br><br><br><br><br><br>
<table style="margin-top:100% !important;font-size:12px;width:100%;line-height: 30px;">
<tr>
	<td style="text-align:center"><h2>Arsip Pendukung</h2></td>
</tr>

<tr>
<td style="width: 100%;">
<img src="/filebox/camaba/'.$idva.'/ktp-ijazah/'.$idva.'-ktp.jpg" alt="Foto KTP" border="0" />
<br><b>Foto KTP</b>
</td>
</tr>

<tr>
<td style="width: 100%;">
<img src="/filebox/camaba/'.$idva.'/ktp-ijazah/'.$idva.'-ijazah.jpg" alt="Foto Ijazah" border="0"  />
<br><b>Foto Ijazah</b>
</td>
</tr>

</table>

';

endforeach;
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// add a page
$pdf->AddPage();
$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);
// set some text to print
$hal2='

<table style="margin-top:100% !important;font-size:12px;width:100%;line-height: 30px;">
<tr>
	<td style="text-align:center"><b>SURAT PERNYATAAN</b><br></td>
</tr>

<tr>
	
	<td>Yang bertanda tangan di bawah ini :</td>
</tr>

<tr>
	
	<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp; Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </td>
	<td style="border-bottom:1px solid black;width: 50%"> '.$sd->Nama.'</td>
</tr>
<tr>
	
	<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp; No. KTP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td>
	<td style="border-bottom:1px solid black;width: 50%"> '.$sd->NomorKTP.'</td>
</tr>

<tr>
	
	<td>Menyatakan bahwa :</td>
</tr>



</table>


<table style="margin-top:100% !important;font-size:12px;width:100%;line-height: 30px;">

<tr>
	
	<td>1. Semua keterangan yang saya lengkapi adalah benar dan dapat di pertanggung jawabkan, serta
	akan menerima sanksi apabila pernyataan yang saya lengkapi tidak benar.</td>
</tr>


<tr>
	<td>2. Saya bersedia mematuhi segala peraturan akademik baik tertulis maupun tidak tertulis yang
	berada di lingkungan kampus.</td>
</tr>

<tr>
	<td>3. saya bersedia dan sanggup memenuhi biaya pendidikan yang telah ditetapkan oleh Institusi.</td>
</tr>

<tr>
	<td>4. Saya bersedia menjaga nama baik Almamater di dalam maupun di luar lingkungan institusi</td>
</tr>

<tr>
	<td>5. Tidak menuntut pengembalian segala macam biaya yang telah dibayarkan, apabila :<br>
	&nbsp;&nbsp;&nbsp;&nbsp; a. Mengundurkan diri pada saat proses penerimaan masuk atau selama perkuliahan.<br>
	&nbsp;&nbsp;&nbsp;&nbsp; b. Dikeluarkan karena melanggar peraturan yang telah ditetapkan Institusi.
	</td>
</tr>
<tr>
	<td>Demikian surat pernyataan ini saya tanda-tangani dengan penuh kesadaran dan tanggung jawab</td>
</tr>


</table>


<br><br>
<table>
	

	<tr>
		<td style="text-align:right;font-size:12px"><br>Makassar, '.$wktbuat.'</td>
	</tr>
</table>


<br><br><br><br><br>
<table style="margin-top:100% !important;font-size:12px;width:100%;line-height: 20px;">
	<tr>
		<td style="text-align:center"><br>Orang Tua / Wali<br></td>
		<td style="text-align:center"><br>Pendaftar,<br></td>
	</tr>

	<tr>
		<td style="text-align:center"><br>Materai<br>Rp. 10.000,-<br><br><br><br></td>
		<td style="text-align:center"><br><br><br><br><br></td>
	</tr>

	<tr>
		<td style="text-align:center"><br>( __________________ )</td>
		<td style="text-align:center"><br>( '.$sd->Nama.' )</td>
	</tr>
	
</table>




';


$date = date("Y-m-d H:i:s");



// output the HTML content
$pdf->writeHTML($hal2, true, false, true, false, '');


// $pdf->footer();
// print a block of text using Write()
// $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($name_pdf.'.pdf', 'I');
exit;
//============================================================+
// END OF FILE
//============================================================+
?>