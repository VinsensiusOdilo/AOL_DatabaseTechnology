<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <!-- Nav bar -->
    <nav class="navbar navbar-expand-md navbar-light sticky-top" style="background-color: lightslategray;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/book icon.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                My Library
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#Tpinjam">Tabel Peminjaman</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#Tbuku">Tabel Buku</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#Tpetugas">Tabel Petugas</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#Tmember">Tabel Member</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#Tdenda">Tabel Denda</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Go to Form
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="pinjam.html">Peminjaman</a></li>
                    <li><a class="dropdown-item" href="addbook.html">Buku</a></li>
                    <li><a class="dropdown-item" href="addmember.html">Member</a></li>
                    <li><a class="dropdown-item" href="addpetugas.html">Petugas</a></li>
                    <li><a class="dropdown-item" href="denda.html">Denda</a></li>
                </ul>
                </li>
            </ul>
            </div>
        </div>
      </nav>

    <!-- Tabel Peminjaman -->
    <h3 class="my-5 text-center" id="Tpinjam">Tabel Peminjaman</h3>

    <table class="table table-striped align-items-center text-center">
        <tr>
            <th>KodePinjam</th>
            <th>TglPinjam</th>
            <th>TglKembali</th>
            <th>KodeBuku</th>
            <th>KodePetugas</th>
            <th>Status</th>
            <th>NoAnggota</th>
            <th>JudulBuku</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "library");

            if($conn-> connect_error){
                die("Connection failed : ". $conn-> connect_error);
            }

            $sql = "SELECT KodePinjam, TglPinjam, TglKembali, KodeBuku, KodePetugas, Status, NoAnggota, JudulBuku
                    FROM meminjam";
            
            $result = $conn->query($sql);

            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo "<tr><td>". $row["KodePinjam"] . "</td><td>". $row["TglPinjam"]."</td><td>". $row["TglKembali"]."</td><td>".$row["KodeBuku"]."</td><td>".$row["KodePetugas"]."</td><td>".$row["Status"]."</td><td>".$row["NoAnggota"]."</td><td>".$row["JudulBuku"]."</td></tr>";
                }
                echo "</table>";
            }
            else{
                echo "0 Result";
            }

            $conn-> close();
        ?>
    </table>

    <!-- Tabel Buku -->
    <h3 class="my-5 text-center" id="Tbuku">Tabel Buku</h3>

    <table class="table table-striped align-items-center text-center">
        <tr>
            <th>KodeBuku</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Kategori</th>
            <th>Jumlah</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "library");

            if($conn-> connect_error){
                die("Connection failed : ". $conn-> connect_error);
            }

            $sql = "SELECT *
                    FROM buku";
            
            $result = $conn->query($sql);

            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo "<tr><td>". $row["KodeBuku"] . "</td><td>". $row["Judul"]."</td><td>". $row["Penulis"]."</td><td>".$row["Penerbit"]."</td><td>".$row["Tahun"]."</td><td>".$row["Kategori"]."</td><td>".$row["Jumlah"]."</td></tr>";
                }
                echo "</table>";
            }
            else{
                echo "0 Result";
            }

            $conn-> close();
        ?>
    </table>

    <!-- Tabel Petugas -->
    <h3 class="my-5 text-center" id="Tpetugas">Tabel Petugas</h3>

    <table class="table table-striped align-items-center text-center">
        <tr>
            <th>KodePetugas</th>
            <th>NoTelepon</th>
            <th>Nama Petugas</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "library");

            if($conn-> connect_error){
                die("Connection failed : ". $conn-> connect_error);
            }

            $sql = "SELECT *
                    FROM petugas";
            
            $result = $conn->query($sql);

            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo "<tr><td>". $row["KodePetugas"] . "</td><td>". $row["NoTelepon"]."</td><td>". $row["NamaPetugas"]."</td></tr>";
                }
                echo "</table>";
            }
            else{
                echo "0 Result";
            }

            $conn-> close();
        ?>
    </table>

    <!-- Tabel Member -->
    <h3 class="my-5 text-center" id="Tmember">Tabel Member</h3>

    <table class="table table-striped align-items-center text-center">
        <tr>
            <th>NoAnggota</th>
            <th>NoTelepon</th>
            <th>Nama</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "library");

            if($conn-> connect_error){
                die("Connection failed : ". $conn-> connect_error);
            }

            $sql = "SELECT *
                    FROM anggota";
            
            $result = $conn->query($sql);

            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo "<tr><td>". $row["NoAnggota"] . "</td><td>". $row["NoTelepon"]."</td><td>". $row["Nama"]."</td></tr>";
                }
                echo "</table>";
            }
            else{
                echo "0 Result";
            }

            $conn-> close();
        ?>
    </table>

    <!-- Tabel Denda -->
    <h3 class="my-5 text-center" id="Tdenda">Tabel Denda</h3>

    <table class="table table-striped align-items-center text-center">
        <tr>
            <th>NoDenda</th>
            <th>NoAnggota</th>
            <th>LamaTelat</th>
            <th>TarifDenda</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "library");

            if($conn-> connect_error){
                die("Connection failed : ". $conn-> connect_error);
            }

            $sql = "SELECT *
                    FROM denda";
            
            $result = $conn->query($sql);

            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo "<tr><td>". $row["NoDenda"] . "</td><td>". $row["NoAnggota"]."</td><td>". $row["LamaTelat"]."</td><td>".$row["TarifDenda"]."</td></tr>";
                }
                echo "</table>";
            }
            else{
                echo "0 Result";
            }

            $conn-> close();
        ?>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>