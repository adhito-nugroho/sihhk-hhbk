
<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Aneka Usaha Kehutanan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="page/laporan/auk_laporan.php">
              <div class="box-body">
                                
                <div class="form-group">
                <label for="exampleInputEmail1">Tahun</label>
                    <select class="form-control" name="tahun">
                    <?php $tahun = (int)date('Y');?>
                    <option> <?=$tahun;?> </option>                  
                    <?php
                    $tahun1 = $tahun - 1;
                    $tahun2 = $tahun - 2;
                    ?>
                    <option value="<?=$tahun1;?>"><?=$tahun1;?></option>
                    <option value="<?=$tahun2;?>"><?=$tahun2;?></option>
                </select>
                </div>

                <div class="form-group">
                <label for="exampleInputEmail1">Bulan</label>
                <select class="form-control" name="bulan">
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">Nopember</option>
                                                <option value="12">Desember</option>

                </select>
                </div>
          
                <div class="form-group">
                <label>Kabupaten</label>
				<select class="form-control" name="kabupaten" id="kabupaten">
					<option value=""></option>
				</select>
                </div>

                <div class="form-group">
                <label>Kecamatan</label>
				<select class="form-control" name="kecamatan" id="kecamatan">
					<option value=""></option>
				</select>
                </div>
             
              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Cetak</button>
              </div>
            </form>

            <script type="text/javascript">
	      $(document).ready(function(){
      	$.ajax({
            type: 'POST',
          	url: "page/laporan/get_kabupaten.php",
          	cache: false, 
          	success: function(msg){
              $("#kabupaten").html(msg);
            }
        });

        $("#kabupaten").change(function(){
      	var kabupaten = $("#kabupaten").val();
          	$.ajax({
          		type: 'POST',
              	url: "page/laporan/get_kecamatan.php",
              	data: {kabupaten: kabupaten},
              	cache: false,
              	success: function(msg){
                  $("#kecamatan").html(msg);
                }
            });
        });

        
     });
    </script>