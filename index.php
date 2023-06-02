<?php
include('header.php');?>


<div class="jumbotron jumbotron-fluid">
<div class="container">
<h1 class="test display-4 text-center">Uuemõisa miil 2023</h1>
<style media="screen">

  .test {
    
    color: black;
  }

   
   .jumbotron {
  background-image: url(https://www.promarket.org/wp-content/uploads/2019/05/GettyImages-1090317894-scaled.jpg);
  background-size: cover; /* Taustapilt täidab elemendi ala, säilitades samas proportsioonid */
  background-position: center; /* Pilt on keskel */
  color: #fff;
  height: 500px;
  
}


    </style>

    </div>
    </div>
  
  <div class="container mt-4">
   
    <div class="container mx-auto">
   
    <?php
    if (!empty($_GET['Eesnimi']) && !empty($_GET['Perenimi']) && !empty($_GET['Voistlusklass']) && !empty($_GET['Email'])) {
        $Eesnimi = htmlspecialchars(trim($_GET['Eesnimi']));
        $Perenimi = htmlspecialchars(trim($_GET['Perenimi']));
        $Voistlusklass = htmlspecialchars(trim($_GET['Voistlusklass']));
        $Email = htmlspecialchars(trim($_GET['Email']));
        $id = htmlspecialchars(trim($_GET['id']));
        //päring
        $paring = "INSERT INTO register(Eesnimi,Perenimi,Voistlusklass,Email) VALUES ('" . $Eesnimi . "','" . $Perenimi . "','" . $Voistlusklass . "','" . $Email . "')";
        $valjund = mysqli_query($yhendus, $paring);
        #var_dump($paring);
        //päringu vastuste arv
        $tulemus = mysqli_affected_rows($yhendus);
        if ($tulemus == 1) {
            echo "Edukalt registreeritud, suuname <a href=\"index.php\">tagasi</a>";
            echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php">';
        } else {
            echo "Registreerimine ebaõnnestus";
        }
        //ühenduse sulgemine
        mysqli_close($yhendus);
    }
    ?>

<style>
    .form-container {
        max-width: 500px;
        margin: 0 auto;
    }
    .form-container .form-group {
        margin-bottom: 20px;
    }
    .form-container .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }
    .form-container .form-group input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .form-container .form-group input[type="submit"],
    .form-container .form-group input[type="reset"] {
        padding: 10px 20px;
        border-radius: 4px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    }
    .form-container .form-group input[type="reset"] {
        background-color: #6c757d;
    }
    
</style>
<style>
    .select-wrapper {
        position: relative;
        display: inline-block;
    }

    .arrow-container {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .arrow {
        display: inline-block;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 5px 5px 0 5px;
        border-color: #000 transparent transparent transparent;
    }

    .form-container .form-group .select-wrapper {
        width: 100%;
    }
</style>


<div class="form-container">
    <h1>Registreeru üritusele</h1>
    <form action="" method="get">
        <div class="form-group">
            <input type="hidden" name="id" required value="<?php echo $rida['id']; ?>">
        </div>
        <div class="form-group">
            <label for="Eesnimi">Eesnimi:</label>
            <input type="text" name="Eesnimi" required value="<?php echo $rida['Eesnimi']; ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="Perenimi">Perenimi:</label>
            <input type="text" name="Perenimi" required value="<?php echo $rida['Perenimi']; ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="Voistlusklass">Võistlusklass:</label>
            <div class="select-wrapper">
                <select name="Voistlusklass" required class="form-control custom-select">
                    <option value="A">Klass A</option>
                    <option value="B">Klass B</option>
                </select>
                <div class="arrow-container">
                    <span class="arrow"></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="Email">Email:</label>
            <input type="text" name="Email" required value="<?php echo $rida['Email']; ?>" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Registreeri">
            <input type="reset" class="btn btn-secondary" value="Tühjenda">
        </div>
    </form>
</div>




</body>
</html>
