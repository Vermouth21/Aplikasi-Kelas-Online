<?php
$menuguest=<<<MENUG
			<div class="navbar-inner">
				<ul class="nav">
					<li><a href="./">Home</a></li>
					<li><a href="media.php?page=artikel">Artikel</a></li>
					
					<li><a href="judul">Judul TA</a></li>
					<li><a href="#" role="button" data-toggle="modal" data-target="#modal-register">Registrasi</a></li>
					<li><a href="#" role="button" data-toggle="modal" data-target="#modal-login">Login</a></li>
					
					<li><a href="#" role="button" data-toggle="modal" data-target="#howto">Petunjuk</a></li>
					<li><a href="help">T.O.S</a></li>
					
					<li class="dropdown">
                            <a href="#" class="dropdown-toggle" >Course<span class="caret"></span><i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="about-us.html">PHP dan MySQL</a></li>
                                <li><a href="lingkup.html">CodeIgniter</a></li>
								<li><a href="risalah.html">Laravel</a></li>
                                <li><a href="smile.html">Bootstrap</a></li>
                            </ul>
                        </li>
					<li><a href="#" role="button" data-toggle="modal" data-target="#modal-hubungi">Request Aplikasi</a></li>
				</ul>
			</div>
MENUG;
$menuuser = <<<MENUU
			<div class="navbar-inner">
				<ul class="nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="media.php?page=artikel">Artikel</a></li>
					<li><a href="judul.html">Judul TA</a></li>
					<li><a href="media.php?page=forum">Forum</a></li>
					<li><a href="media.php?page=help">Help</a></li>
					<li><a href="media.php?page=edit_akun">Edit Akun</a></li>
					<li><a href="media.php?page=testimonial">Testimonial</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
MENUU;
if(isset($_SESSION['iduser'])&&isset($_SESSION['nama'])){
	echo $menuuser;
} else {
	echo $menuguest;
}
?>