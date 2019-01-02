<?php
    session_start();

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
      //  header('Location: index.php');
    }
?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MARECKI - wyceny</title>
    <meta name="description" content="Marecki - wyceny">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img src="logo.png" alt="">

    <div id="pudelko">
      <button id="ustawienia_button"></button>
      <?php
          if(isset($_SESSION['blad_serwera']))
          {
              echo '<div class="blad_serwera">'.$_SESSION['blad_serwera'].'</div>';
              unset($_SESSION['blad_serwera']);
          }
      ?>
    <div id="panel">


      <!---  WYCENA PANEL --->

    <div id='wycena'>
      <form>
          <div class="klient">
              <label for="rabat">RABAT</label>
              <input type="number" id="rabat">
          </div>

          <div class="material">
              <h2>MATERIAŁ</h2>
              <h3>PŁYTY</h3>
              <button id="dodaj_plyte">DODAJ</button>
              <ol id="lista_plyt">
                 <!-- <li><label for="plyta">Cena płyty:</label>
                      <input type='number' id="plyta">
                      <label for="ilosc_plyt">Ilość płyt:</label>
                      <input type="number" id="ilosc_plyt"></li> -->
              </ol>

              <h3>OBRZEŻE</h3>
              <button id="dodaj_obrzeze">DODAJ</button>
              <ol id="lista_obrzeży">
                 <!-- <li>
                      <select name="obrzeże" class="obrzeże">
                      <option value="1">22/05</option>
                      <option value="1.2">22/08</option>
                      <option value="3">22/1 Połysk</option>
                      <option value="2.8">22/2</option>
                      <option value="5">42/1</option>
                      <option value="7">42/1 Połysk</option>
                      <option value="6">42/2</option>
                  </select>

                      <label for="obrzeże_metry">Ilość metrów:</label>
                      <input type="number" id="obrzeże_metry">
                  </li> -->
              </ol>
              <h4>MATERIAŁ RAZEM: </h4><span id="material_razem"></span>
          </div>

          <div class="uslugi">

              <div class="uslugi_linia">
                  <h2>USŁUGI</h2>
                  <label><input type="radio" name="ceny" value="detal"> <span>DETAL</span></label>
                  <label><input type="radio" name="ceny" value="hurt"><span>HURT</span></label>
                  <div class="alert" id="alert_hurt/detal"></div>
              </div>

              <h3>OBRZEŻE</h3>
              <button id="dodaj_oklejanie">DODAJ</button>
              <ol id="lista_oklejanie">
              <!--<li>
              <label for="oklejanie"></label>
              <select name="oklejanie" class="oklejanie">
                      <option value="22/05">22/05</option>
                      <option value="22/08">22/08</option>
                      <option value="22/08 Połysk">22/08</option>
                      <option value="22/1_połysk">22/1 Połysk</option>
                      <option value="22/2">22/2</option>
                      <option value="42/1">42/1</option>
                      <option value="42/1_połysk">42/1 Połysk</option>
                      <option value="42/2">42/2</option>
                  </select>
              <label for="oklejanie_metry">Metry oklejania</label>
              <input type="number" id="oklejanie_metry">
              </li> -->
              </ol>
              <label for="ciecie"><h3>Metry cięcia</h3></label>
              <input type="number" id="ciecie"><span id="metry_ciecia"></span>
              <div class="clearfix"></div>
              <h4>USŁUGI RAZEM: </h4><span id="uslugi_razem"></span>
          </div>
           <div id="wynik_div">
              <h5 id="wynik"></h5>
          </div>
      <button id="reload"><span>ODŚWIEŻ</span></button>
      <button id="policz">POLICZ</button>
      </form>
    </div>


    <!---   USTAWIENIA PANEL --->


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
    </div>
    </div>
    <script src="main.js"></script>
</body>

</html>
