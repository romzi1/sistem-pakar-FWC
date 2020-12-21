<?php
include('koneksi.php');

if(isset($_SESSION['login_user'])){
header("location: about.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/
  bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" href="img/2.png">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">


      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="homeadmin.php"><button type="button" class="btn btn-primary btn-block">BERANDA</button></a></p>
      <p><a href="daftarkerusakan.php"><button type="button" class="btn btn-primary btn-block active">KERUSAKAN</button></a></p>
      <p><a href="gejala.php"><button type="button" class="btn btn-primary btn-block">CIRI KERUSAKAN</button></a></p>
      <p><a href="basispengetahuan.php"><button type="button" class="btn btn-primary btn-block">BASIS PENGETAHUAN</button></a></p>
      <br><br><br><br><br><br><br><br><br><br>
      <p><a href="logout.php"><button type="button" class="btn btn-primary btn-block" id="myBtn">LOGOUT</button></a></p>
    </div>
    <div class="col-sm-8 text-left">
           <h2 class="text-center">Kerusakan</h2>
      <form id="form1" name="form1" method="post" action="daftarkerusakan.php">
				<label for="sel1">Jenis hp</label>
				<select class="form-control"  name="hp" onChange='this.form.submit();'>
				<option>Pilih</option>
                <option>Android</option>

  		</select>
  </form>
<br>
<a href="inputkerusakan.php"><button type="button" class="btn btn-default">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
</button></a>
    	<br><br>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID kerusakan</th>
							<th>Nama Kerusakan</th>
                            <th>Jenis kerusakan</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                     <?php
if(isset($_POST['hp']))
if($_POST['hp']!="jenishp"){
$queri="Select * From kerusakan where jenishp = \"".$_POST['hp']."\"";
$hasil=mysqli_query ($konek_db,$queri);
$id = 0;
while ($data = mysqli_fetch_array ($hasil)){
 			$id++;
 			echo "
        			<tr>
        			<td>".$id."</td>
					<td>".$data[0]."</td>
        			<td>".$data[1]."</td>
        			<td>".$data[2]."</td>
                    <td><a href=\"detailkerusakan.php?id=".$data[0]."\"><i class='glyphicon glyphicon-search'></i></a>"." || <a href=\"editkerusakan.php?id=".$data[0]."\"><i class='glyphicon glyphicon-pencil'></i></a>"." || <a href=\"deletekerusakan.php?id=".$data[0]."\" onclick='return checkDelete()'><i class='glyphicon glyphicon-trash'></i></a>"."</td>
        		</tr>
        	";
			}
}
 ?>
</table><br><br><br><br><br>
            </div>
    </div>
  </div>
</div>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Yakin menghapus data ini?');
}
</script>

<footer class="container-fluid text-center">
  <p>Copyright 2018 &copy;</p>
</footer>

</body>
</html>
