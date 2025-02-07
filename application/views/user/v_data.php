<style>
.teks-hidden {
  display:none;
}

a.lihat {
    padding: 10px 20px;
    background: #3f87f5;
    color: white;
    border-radius: 10px;
    margin-top: 5px;
    position: relative;
    display: inline-block;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
      // Mendapatkan URL saat halaman dimuat
      var url = window.location.href;
      
      // Mengganti kata "data" menjadi "cetak pdf" dalam URL
      var urlBaru = url.replace("data", "cetak_pdf");
      
      // Menyematkan URL yang sudah diubah ke elemen input dengan class "dapat"
      $('.dapat').val(urlBaru);
    });

    $(document).ready(function() {
      // Mendapatkan nilai teks dari elemen dengan class "dapat"
      var url = $('.dapat').val();
      
      // Menyematkan nilai teks ke dalam atribut "href" pada elemen dengan class "lihat"
      $('.lihat').attr('href', url);
    });
</script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

<div class="page-container">
<!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header no-gutters">
            <div class="align-items-md-center justify-content-between">
                <div class="row">
                    <div class="col-12">
                    <div class="col-12">
                      <h3>Data Anda Berhasil di Simpan</h3>

                      <input class="dapat " type="text" value="" hidden>
                    </div>
                    <div class="col-12">
                      <a class="lihat" href='' target='_blank'>Lihat & Download PDF</a> 
</div>
                      
</div>
                        
                  
                </div>
                    

                
        </div>
    </div>

</div>
