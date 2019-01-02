<?php

      if(!isset($_POST["abs_22x05"]) || !isset($_POST["okl_22x05"]))
      {
          header('Location: index.php');
          exit();
      }

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
            // ceny z wysłanego formularza
            $abs_22x05 = $_POST["abs_22x05"];
            $okl_22x05 = $_POST["okl_22x05"];

            $abs_22x08 = $_POST["abs_22x08"];
            $okl_22x08 = $_POST["okl_22x08"];

            $abs_22x08_polysk = $_POST["abs_22x08_polysk"];
            $okl_22x08_polysk = $_POST["okl_22x08_polysk"];

            $abs_22x1_polysk = $_POST["abs_22x1_polysk"];
            $okl_22x1_polysk = $_POST["okl_22x1_polysk"];

            $abs_22x2 = $_POST["abs_22x2"];
            $okl_22x2 = $_POST["okl_22x2"];

            $abs_42x08 = $_POST["abs_42x08"];
            $okl_42x08 = $_POST["okl_42x08"];

            $abs_42x1_polysk = $_POST["abs_42x1_polysk"];
            $okl_42x1_polysk = $_POST["okl_42x1_polysk"];

            $abs_42x2 = $_POST["abs_42x2"];
            $okl_42x2 = $_POST["okl_42x2"];



            // pobranie cen z bazy danych...
            if($rezultat = $polaczenie->query("SELECT * FROM cennik WHERE id=1"))
            {

                $wiersz = $rezultat->fetch_assoc();

                // CENA OBRZEŻA - porównanie i zaktualizowanie
                if($abs_22x05!=$wiersz['abs_22x05'])
                $polaczenie->query("UPDATE cennik SET abs_22x05=$abs_22x05 WHERE id=1");

                if($abs_22x08!=$wiersz['abs_22x08'])
                $polaczenie->query("UPDATE cennik SET abs_22x08='$abs_22x08' WHERE id=1");

                if($abs_22x08_polysk!=$wiersz['abs_22x08_polysk'])
                $polaczenie->query("UPDATE cennik SET abs_22x08_polysk='$abs_22x08_polysk' WHERE id=1");

                if($abs_22x1_polysk!=$wiersz['abs_22x1_polysk'])
                $polaczenie->query("UPDATE cennik SET abs_22x1_polysk='$abs_22x1_polysk' WHERE id=1");

                if($abs_22x2!=$wiersz['abs_22x2'])
                $polaczenie->query("UPDATE cennik SET abs_22x2='$abs_22x2' WHERE id=1");

                if($abs_42x08!=$wiersz['abs_42x08'])
                $polaczenie->query("UPDATE cennik SET abs_42x08='$abs_42x08' WHERE id=1");

                if($abs_42x1_polysk!=$wiersz['abs_42x1_polysk'])
                $polaczenie->query("UPDATE cennik SET abs_42x1_polysk='$abs_42x1_polysk' WHERE id=1");

                if($abs_42x2!=$wiersz['abs_42x2'])
                $polaczenie->query("UPDATE cennik SET abs_42x2='$abs_42x2' WHERE id=1");


                $rezultat->close();
            }
            else
            {
              throw new Exception($polaczenie->connect_errno);
            }

            if($rezultat = $polaczenie->query("SELECT * FROM cennik WHERE id=2"))
            {

                $wiersz = $rezultat->fetch_assoc();

                // CENA OKLEJANIA - porównanie i zaktualizowanie
                if($okl_22x05!=$wiersz['abs_22x05'])
                $polaczenie->query("UPDATE cennik SET abs_22x05='$okl_22x05' WHERE id=2");

                if($okl_22x08!=$wiersz['abs_22x08'])
                $polaczenie->query("UPDATE cennik SET abs_22x08='$okl_22x08' WHERE id=2");

                if($okl_22x08_polysk!=$wiersz['abs_22x08_polysk'])
                $polaczenie->query("UPDATE cennik SET abs_22x08_polysk='$okl_22x08_polysk' WHERE id=2");

                if($_POST["okl_22x1_polysk"]!=$wiersz['abs_22x1_polysk'])
                $polaczenie->query("UPDATE cennik SET abs_22x1_polysk='$okl_22x1_polysk' WHERE id=2");

                if($okl_22x2!=$wiersz['abs_22x2'])
                $polaczenie->query("UPDATE cennik SET abs_22x2='$okl_22x2' WHERE id=2");

                if($okl_42x08!=$wiersz['abs_42x08'])
                $polaczenie->query("UPDATE cennik SET abs_42x08='$okl_42x08' WHERE id=2");

                if($okl_42x1_polysk!=$wiersz['abs_42x1_polysk'])
                $polaczenie->query("UPDATE cennik SET abs_42x1_polysk='$okl_42x1_polysk' WHERE id=2");

                if($okl_42x2!=$wiersz['abs_42x2'])
                $polaczenie->query("UPDATE cennik SET abs_42x2='$okl_42x2' WHERE id=2");


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

    header('Location: index.php');
?>
