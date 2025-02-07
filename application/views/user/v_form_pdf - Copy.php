<?php
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
$pdf->SetTitle('Formulir Pendaftaran Calon Siswa YP Gunung Sari');
$pdf->SetSubject('Formulir Pendaftaran Calon Siswa YP Gunung Sari');
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
$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);
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
	
	$name_pdf = $sd->AplikanID.$sd->Nama;
	$pdf->write2DBarcode($sd->AplikanID, 'QRCODE,L', 168, 3, 20, 20, $style, 'N');
$html='
<table>
	<tr>
		<td style="width: 15%;">
			<img src="logo_arraafi.png" alt="test alt attribute" width="60" height="60" border="0" />
		</td>
		<td style="width: 60%;">
			<font size="20"><b>SEKOLAH ISLAM AR-RAA\'FI</b></font><br>
			<font size="8">KB | TK | SD | SMP | SMA | SMK</font><br>
			Website: www.arraafi.id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email: sekolah.arraafi@gmail.com<br>
			<hr>
		</td>
	</tr>
</table>
<table style="margin-top:-80px">
<tr>
	<td colspan="2"><b>1. Data Penerimaan Calon Mahasiswa/i</b><br></td>
</tr>
<tr>
	<td style="width: 25%;">&nbsp;&nbsp;&nbsp;&nbsp;Prodi</td>
	<td>: &nbsp; '.$getprogram.'</td>
</tr>

<tr>
	<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Penerimaan</td>
	<td>: &nbsp; '.$sd->proses.'</td>
</tr>

<tr>
	<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Kelompok</td>
	<td>: &nbsp; '.$sd->kelompok.', Kapasitas '.$sd->kapasitas.'</td>
</tr>

</table>


<table style="">
<tr>
	<td colspan="2"><b><br>2. Data Pribadi Calon Siswa</b><br></td>
</tr>
	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;NISN</td>
		<td>: &nbsp; '.$sd->nisn.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;NIK</td>
		<td>: &nbsp; '.$sd->nik.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;No UN Sebelumnya</td>
		<td>: &nbsp; '.$sd->noun.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
		<td>: &nbsp; '.$sd->nama.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Panggilan</td>
		<td>: &nbsp; '.$sd->panggilan.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Jenis Kelamin</td>
		<td>: &nbsp; '.strtoupper($sd->kelamin).'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Tempat Tanggal Lahir</td>
		<td>: &nbsp; '.$sd->tmplahir.', '.$sd->tgllahir.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Agama</td>
		<td>: &nbsp; '.$sd->agama.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Suku</td>
		<td>: &nbsp; '.$sd->suku.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Status</td>
		<td>: &nbsp; '.$sd->status.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Kondisi</td>
		<td>: &nbsp; '.$sd->kondisi.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Kewarganegaraan</td>
		<td>: &nbsp; '.$sd->warga.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Anak ke</td>
		<td>: &nbsp; '.$sd->anakke.', dari '.$sd->jsaudara.' bersaudara'.'</td>
		
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Status Anak</td>
		<td>: &nbsp; '.$sd->statusanak.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Saudara Kandung</td>
		<td>: &nbsp; '.$sd->jkandung.' orang'.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Saudara Tiri</td>
		<td>: &nbsp; '.$sd->jtiri.' orang'.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Bahasa</td>
		<td>: &nbsp; '.$sd->bahasa.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
		<td>: &nbsp; '.$sd->alamatsiswa.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Kode Pos</td>
		<td>: &nbsp; '.$sd->kodepossiswa.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Jarak ke Sekolah</td>
		<td>: &nbsp; '.$sd->jarak.' KM'.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Telpon</td>
		<td>: &nbsp; '.$sd->telponsiswa.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Handphone</td>
		<td>: &nbsp; '.$sd->hpsiswa.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Email</td>
		<td>: &nbsp; '.$sd->emailsiswa.'</td>
	</tr>
	
</table>

<table class="table  table-sm table-borderless">

<tr>
	<td colspan="2"><b><br>3. Data Sekolah Calon Siswa</b><br></td>
</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Asal Sekolah</td>
		<td>: &nbsp; '.$sd->asalsekolah.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;No Ijasah / Tanggal</td>
		<td>: &nbsp; '.$sd->noijasah.' / '.$sd->tglijasah.'</td>
	</tr>


	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Keterangan</td>
		<td>: &nbsp; '.$sd->ketsekolah.'</td>
	</tr>
	
</table>


<table class="table  table-sm table-borderless">

<tr>
	<td colspan="2"><b><br>4. Data Riwayat Kesehatan Calon Siswa</b><br></td>
</tr>

    <tr>
        <td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Golongan Darah</td>
        <td>: &nbsp; '.$sd->darah.'</td>
    </tr>

    <tr>
        <td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Berat / Tinggi</td>
        <td>: &nbsp; '.$sd->berat.' Kg / '.$sd->tglijasah.' Cm</td>
    </tr>

    <tr>
        <td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Riwayat Penyakit</td>
        <td>: &nbsp; '.$sd->kesehatan.'</td>
    </tr>
    
</table>


<table class="table  table-sm table-borderless">

<tr>
	<td colspan="2"><b><br>5. Data Orang Tua Calon Siswa</b><br></td>
</tr>

	<tr>
		<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<b>Ayah</b></td>
	</tr>
	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
		<td>: &nbsp; '.$sd->namaayah.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Status</td>
		<td>: &nbsp; '.$sd->statusayah.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Tempat Tanggal Lahir</td>
		<td>: &nbsp; '.$sd->tmplahirayah.', '.$sd->tgllahirayah.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Pendidikan</td>
		<td>: &nbsp; '.$sd->pendidikanayah.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan</td>
		<td>: &nbsp; '.$sd->pekerjaanayah .'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Penghasilan</td>
		<td>: &nbsp; '.$sd->penghasilanayah.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Email</td>
		<td>: &nbsp; '.$sd->emailayah .'</td>
	</tr>

	<tr>
		<td class="pt-4" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<b>Ibu</b></td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
		<td>: &nbsp; '.$sd->namaibu.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Status</td>
		<td>: &nbsp; '.$sd->statusibu.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Tempat Tanggal Lahir</td>
		<td>: &nbsp; '.$sd->tmplahiribu.', '.$sd->tgllahiribu.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Pendidikan</td>
		<td>: &nbsp; '.$sd->pendidikanibu.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan</td>
		<td>: &nbsp; '.$sd->pekerjaanibu .'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Penghasilan</td>
		<td>: &nbsp; '.$sd->penghasilanibu.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Email</td>
		<td>: &nbsp; '.$sd->emailibu .'</td>
	</tr>

	<tr>
		<td class="pt-4" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<b>Wali</b></td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Nama Wali</td>
		<td>: &nbsp; '.$sd->wali.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Alamat Orang Tua</td>
		<td>: &nbsp; '.$sd->alamatortu.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Telpon Wali</td>
		<td>: &nbsp; '.$sd->telponortu.'</td>
	</tr>

	<tr>
		<td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Handphone Wali</td>
		<td>: &nbsp; '.$sd->hportu .'</td>
	</tr>


	
</table>
<table class="table  table-sm table-borderless">


<tr>
	<td colspan="2"><b><br>6. Informasi Lainnya</b><br></td>
</tr>

    <tr>
        <td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Hobi</td>
        <td>: &nbsp; '.$sd->hobi.'</td>
    </tr>

    <tr>
        <td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Alamat Surat</td>
        <td>: &nbsp; '.$sd->alamatsurat.'</td>
    </tr>

    <tr>
        <td style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;Keterangan</td>
        <td>: &nbsp; '.$sd->keterangan.'</td>
    </tr>

</table>

<table>
	<tr>
		<td style="text-align:right"><br>Makassar,____/_____/_______<br></td>
	</tr>

	<tr>
		<td style="text-align:right"><br>Orang Tua/ Wali<br><br><br><br></td>
	</tr>

	<tr>
		<td style="text-align:right"><br>__________________</td>
	</tr>
</table>

';

endforeach;



$date = date("Y-m-d H:i:s");


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


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
