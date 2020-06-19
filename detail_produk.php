        <?php
            $nagari = mysql_query("SELECT * from tbl_barang where id_barang='$_GET[id]'");
            while($sql = mysql_fetch_array($nagari)){
        ?>  
<div class="row align-items-center py-5">
    <div class="col-sm-6 pl-sm-5 pr-sm-0">
        <div class="px-sm-5">
            <div class="col-md-6 text-center">
                <img class="img-responsive" src="produk/<?php echo $sql['gambar']; ?>">
            </div>
        </div>
    </div>
    <div class="col-sm-6 px-sm-5">
        <h1 class="font-weight-semi-bold mb-0 mt-2" itemprop="name"><?php echo $sql['nama_barang']; ?></h1>
        <?php
            $label = explode(" ", $sql['label']);
            $warna = "";
            foreach ($label as $lb) {
                if($lb == "Terbatas")
                {
                    $warna = "warning";
                }
                elseif($lb == "Diskon")
                {
                    $warna = "primary";
                }
                elseif($lb == "Terbaru")
                {
                    $warna = "success";
                }
                echo "<span class='label label-$warna'>$lb</span> ";    
            }
            
            ?>
        <div class="wrapper-harga d-flex mt-3" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            <div class="harga-awal h4 text-muted font-weight-semi-bold"><s><?php echo "Rp " . number_format($sql['harga_diskon'],2,',','.') ?></s></div>
            <div class="harga-akhir h4 text-danger ml-4 font-weight-semi-bold"><span itemprop="price" content="85500"><?php echo "Rp " . number_format($sql['harga_asli'],2,',','.') ?></span></div>
        </div>
        <p class="sinopsis mt-3 text-justify d-none" itemprop="description">

        </p>

        <div class="custom-produk">
            <form action="">

                <div class="form-group mb-2 w-100">
                    <p class="mb-0 mr-auto">Warna : <span class="txtWarna"><?php echo $sql['warna']; ?></span></p>
                </div>

                <div class="form-group mb-2 d-flex">
                    <div class="form-group mb-0 w-100 radio-btn-custom bahan " itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <p class="my-auto mr-auto">Bahan :
                            <label class="mr-2 px-2" for="idbahan-4">
                                <?php echo $sql['bahan']; ?>
                            </label>
                        </p>
                    </div>
                </div>
                <p class="">Tersedia : <span id="stock"><?php echo $sql['stok']; ?></span></p>
                <button type="button" class="btn btn-info text-white text-uppercase w-100 py-2 add-to-cart btn-lg font-weight-semi-bold">Pesan</button>
            </form>
        </div>
    </div>
</div>
<?php } ?>