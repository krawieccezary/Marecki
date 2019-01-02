<?php

    

      require_once 'connect.php';
      mysqli_report(MYSQLI_REPORT_STRICT);

      try
      {   // połączenie z bazą danych
          $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);

          if ($polaczenie->connect_errno!=0)
          {
              throw new Exception(mysqli_connect_errno());
          }
          else
          {
            // CENY OBRZEŻA - pobranie cen z bazy danych
            if($rezultat = $polaczenie->query("SELECT * FROM cennik WHERE id=1"))
            {
                $wiersz = $rezultat->fetch_assoc();
                $abs_22x05 = $wiersz['abs_22x05'];
                $abs_22x08 = $wiersz['abs_22x08'];
                $abs_22x08_polysk = $wiersz['abs_22x08_polysk'];
                $abs_22x1_polysk = $wiersz['abs_22x1_polysk'];
                $abs_22x2 = $wiersz['abs_22x2'];
                $abs_42x08 = $wiersz['abs_42x08'];
                $abs_42x1_polysk = $wiersz['abs_42x1_polysk'];
                $abs_42x2 = $wiersz['abs_42x2'];

                $rezultat->close();
            }
            else
            {
              throw new Exception($polaczenie->connect_errno);
            }

            // CENY OKLEJANIA - pobranie cen z bazy danych

            if($rezultat = $polaczenie->query("SELECT * FROM cennik WHERE id=2"))
            {
                $wiersz = $rezultat->fetch_assoc();
                $okl_22x05 = $wiersz['abs_22x05'];
                $okl_22x08 = $wiersz['abs_22x08'];
                $okl_22x08_polysk = $wiersz['abs_22x08_polysk'];
                $okl_22x1_polysk = $wiersz['abs_22x1_polysk'];
                $okl_22x2 = $wiersz['abs_22x2'];
                $okl_42x08 = $wiersz['abs_42x08'];
                $okl_42x1_polysk = $wiersz['abs_42x1_polysk'];
                $okl_42x2 = $wiersz['abs_42x2'];

                $rezultat->close();
            }
            else
            {
              throw new Exception($polaczenie->connect_errno);
            }

          }
    }
    catch (Exception $e)
    {
        $_SESSION['blad_serwera'] = 'Błąd serwera! Przepraszamy za niedogodności i zapraszamy w innym terminie! Informacja deweloperska: '.$e;
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MARECKI - wyceny</title>
    <meta name="description" content="Marecki - wyceny">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div id="ustawienia">
    <h2>CENY</h2>
    <form action="setup.php" method="post">
        <table>
            <tr>
               <td></td>
                <td><h3>OBRZEŻE</h3></td>
                <td><h3>OKLEJANIE</h3></td>
            </tr>
            <tr>
                <td>22/0.5</td>
                <td><input type="number" step="any" name="abs_22x05" value= "<?=$abs_22x05?>"></td>
                <td><input type="number" step="any" name="okl_22x05" value="<?=$okl_22x05?>"></td>
            </tr>
            <tr>
                <td>22/0.8</td>
                <td><input type="number" step="any" name="abs_22x08" value= "<?=$abs_22x08?>"></td>
                <td><input type="number" step="any" name="okl_22x08" value="<?=$okl_22x08?>"></td>
            </tr>
            <tr>
                <td>22/0.8 Połysk</td>
                <td><input type="number" step="any" name="abs_22x08_polysk" value="<?=$abs_22x08_polysk?>"></td>
                <td><input type="number" step="any" name="okl_22x08_polysk" value="<?=$okl_22x08_polysk?>"></td>
            </tr>
            <tr>
                <td>22/1 Połysk</td>
                <td><input type="number" step="any" name="abs_22x1_polysk" value="<?=$abs_22x1_polysk?>"></td>
                <td><input type="number" step="any" name="okl_22x1_polysk" value="<?=$okl_22x1_polysk?>"></td>
            </tr>
            <tr>
                <td>22/2</td>
                <td><input type="number" step="any" name="abs_22x2" value="<?=$abs_22x2?>"></td>
                <td><input type="number" step="any" name="okl_22x2" value="<?=$okl_22x2?>"></td>
            </tr>
            <tr>
                <td>42/0.8</td>
                <td><input type="number" step="any" name="abs_42x08" value="<?=$abs_42x08?>"></td>
                <td><input type="number" step="any" name="okl_42x08" value="<?=$okl_42x08?>"></td>
            </tr>
            <tr>
                <td>42/1 Połysk</td>
                <td><input type="number" step="any" name="abs_42x1_polysk" value="<?=$abs_42x1_polysk?>"></td>
                <td><input type="number" step="any" name="okl_42x1_polysk" value="<?=$okl_42x1_polysk?>"></td>
            </tr>
            <tr>
                <td>42/2</td>
                <td><input type="number" step="any" name="abs_42x2" value="<?=$abs_42x2?>"></td>
                <td><input type="number" step="any" name="okl_42x2" value="<?=$okl_42x2?>"></td>
            </tr>
    </table>
        <h2>USŁUGI</h2>
    <input type="submit" value="ZAPISZ" id="zapisz_ustawienia">
</form>
</div>
</body>
</html>
