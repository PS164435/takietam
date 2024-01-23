<link rel="stylesheet" href="../css/system_IO.css">



<?php
// nawiązanie połączenia
$conn = mysqli_connect('localhost', 'root', '', 'system_io');
// co jeśli nie da się połączyć
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


////////////////////////////////	KIEROWCY	//////////////////////////////////////////

// funkcja odpowiadająca za wyświetlanie listy kierowców
function ListaPodstron_kierowcy()
{
	// połączenie z serwerem
    $con = mysqli_connect('localhost', 'root', '', 'system_io');
    if(!$con)
    {	// co jeśli nie można się połączyć
        die("Connection failed!" . mysqli_connect_error());
    }
	// pobieranie danych
    $sql = "SELECT * FROM kierowcy";
    $result = mysqli_query($con, $sql);
	
		?> <!-- wyświetlanie danych w formie tabelki -->

		<table class="tabelka" style=" top: 65%; left: 50%;transform: translate(-50%, -50%); position: absolute;">
			<tr> <!-- tytuł tabelki -->
				<td colspan="5" class="nazwa"> Kierowcy</td
			</tr>
			<tr> <!-- wiersz z nazwami kolumn -->
				<th class="kolomny"> ID</th>
				<th class="kolomny"> Nazwisko</th>
				<th class="kolomny"> Imię</th>
				<th class="kolomny"> Rejestracja Pojazdu</th>
				<th class="kolomny"> Opcja</th>
				
			</tr>
		<?php // wyświetlanie wierszy z danymi elementami
		while ($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td class="wiersze"><?php echo $row["id_kierowcy"]; ?></td>
				<td class="wiersze"><?php echo $row["nazwisko"]; ?></td>
				<td class="wiersze"><?php echo $row["imię"]; ?></td>
				<td class="wiersze"><?php echo $row["rejestracja_pojazdu"]; ?></td>
				<td class="wiersze">		
					<a class="opcje" href="?action=EdytujKierowce&id_kierowcy=<?php echo $row["id_kierowcy"]; ?>">Edytuj</a>
					<a class="opcje" href="?action=UsunKierowce&id_kierowcy=<?php echo $row["id_kierowcy"]; ?>" onclick="return confirm('Czy na pewno chcesz usunąć ten rekord?')">Usuń</a>
				</td>
			</tr>
			<?php
		}
		?>
			<tr>
				<td colspan="5" class="dodaj">
					<a class="opcje" href="?action=DodajKierowce">Dodaj kierowcę</a>
				</td>
			</tr>
			<tr>
				<td  > 
					<a href="IO.php">
						<input  type="button" value="Cancel">
					</a>
                </td>
			</tr>
		</table>
	
	
		<?php
	
}

// żeby działało edytowanie kierowcy
if (isset($_GET['action']) && $_GET['action'] == 'EdytujKierowce' && isset($_GET['id_kierowcy'])) {
	EdytujKierowce($conn, $_GET['id_kierowcy']);
}

// żeby działało usuwanie kierowcy
if (isset($_GET['action']) && $_GET['action'] == 'UsunKierowce' && isset($_GET['id_kierowcy'])) {
    UsunKierowce($conn, $_GET['id_kierowcy']);
}

// żeby działało dodawanie kierowcy
if (isset($_GET['action']) && $_GET['action'] == 'DodajKierowce') {
    DodajKierowce($conn);
}

// formualrz
function FormularzStrony_kierowcy($row, $czynnosc){
    ?> <!-- formularz do wypełniania podczas edycji -->
    <form method="post" style=" top: 65%; left: 50%;transform: translate(-50%, -50%); position: absolute;" action="admin/admin_IO.php">
        <!-- id_kierowcy -->
        <table class="popup"> 
            </tr> <tr> <!-- UWAGA TRAGICZNE WCIĘCIA XD -->
                <td colspan='2'> <?php if ($czynnosc === 'dodajkierowce') { echo '<h2>Dodawanie nowego kierowcy</h2>';}
				if ($czynnosc === 'edytujkierowce') {echo '<h2>Edytowanie kierowcy</h2>';} ?></td>
			</tr><tr> 
			<td colspan='2' style="border: 1px solid black; background: black"> </td>
			</tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr>
			</tr> <tr> 
				<td colspan='2'> <label for="id_kierowcy">ID:</label> 
				<?php echo $row['id_kierowcy']; ?> <input type="hidden" name="id_kierowcy" value="<?php echo $row['id_kierowcy']; ?>"> </td>
            </tr> <tr>
			</tr> <tr>
                <td> <label for="nazwisko">Nazwisko:</label> </td>
                <td> <input type="text" name="nazwisko" value="<?php echo $row['nazwisko']; ?>"> </td>
            </tr> <tr>
                <td> <label for="imię">Imię:</label> </td>
                <td> <input type="text" name="imię" value="<?php echo $row['imię']; ?>"> </td>
            </tr> <tr>
                <td> <label for="rejestracja_pojazdu">Rejestracja pojazdu:</label> </td>
                <td> <input type="text" name="rejestracja_pojazdu" value="<?php echo $row['rejestracja_pojazdu']; ?>"> </td>
            </tr> <tr>
                <td style="text-align: center;"> <input style="width: 100px;" type="submit" name="<?php echo $czynnosc; ?>" value="Ok"> </td>
                <td style="text-align: center;"> 
					<a href="IO.php" style="text-decoration: none; color: white;">
						<input style="width: 100px;" type="button" value="Cancel">
					</a>
                </td>
            </tr>
        </table>
    </form>
    <?php
}

// obsługa formularza po dodaniu kierowcy 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dodajkierowce'])) {
	// pobranie danych z formularza
    $imię = $_POST['imię'];
    $nazwisko = $_POST['nazwisko'];
	$rejestracja_pojazdu = $_POST['rejestracja_pojazdu'];
    // zabezpieczenie
    $imię = mysqli_real_escape_string($conn, $imię);
    $nazwisko = mysqli_real_escape_string($conn, $nazwisko);
	$rejestracja_pojazdu = mysqli_real_escape_string($conn, $rejestracja_pojazdu);
    // zapytanie INSERT
    $sql = "INSERT INTO kierowcy (imię, nazwisko, rejestracja_pojazdu) VALUES ('$imię', '$nazwisko', '$rejestracja_pojazdu')";
    $result = mysqli_query($conn, $sql);

    // powrót do strony
	if ($result){
		header("Location: ../IO.php?action=ListaPodstron_kierowcy");
	} else{	// dodatkowa informacja
		echo 'coś poszło nie tak';
	}
}

// obsługa formularza po edycji kierowcy 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edytujkierowce'])) {
	// pobranie danych z formularza
	$id_kierowcy = mysqli_real_escape_string($conn, $_POST['id_kierowcy']);
	$imię = mysqli_real_escape_string($conn, $_POST['imię']);
	$nazwisko = mysqli_real_escape_string($conn, $_POST['nazwisko']);
	$rejestracja_pojazdu = mysqli_real_escape_string($conn, $_POST['rejestracja_pojazdu']);
	// zapytanie UPDATE
	$sql = "UPDATE kierowcy SET imię = '$imię', nazwisko = '$nazwisko', rejestracja_pojazdu = '$rejestracja_pojazdu' WHERE id_kierowcy = '$id_kierowcy' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	// powrót do strony
	if ($result){
		header("Location: ../IO.php?action=ListaPodstron_kierowcy");
	} else{	// dodatkowa informacja
		echo 'coś poszło nie tak';
	}
}

// funkcja odpowiadająca za możliwość usunięcia kierowcy
function UsunKierowce($conn, $id_kierowcy)
{
    // zabezpieczenie przed SQL Injection
    $id_kierowcy = mysqli_real_escape_string($conn, $id_kierowcy);
	
	$czyprzypisane = "SELECT id_trasy FROM trasy WHERE id_kierowcy = $id_kierowcy LIMIT 1";
	$resultczyjest = mysqli_query($conn, $czyprzypisane);
	
	if ($resultczyjest && mysqli_num_rows($resultczyjest) > 0) {
        // Kierowca jest przypisany do trasy, nie można go usunąć
         echo '<script>alert("Nie można usunąć kierowcy, ponieważ jest przypisany do trasy.");</script>';
    } else {
		$sql = "DELETE FROM kierowcy WHERE id_kierowcy = $id_kierowcy LIMIT 1";
		$result = mysqli_query($conn, $sql);
		
		// powrót do strony
		if ($result){
			header("Location: IO.php?action=ListaPodstron_kierowcy");
		} else{	// dodatkowa informacja
			echo 'coś poszło nie tak';
		}
	}
}

// funkcja odpowiadająca za możliwość dodania nowego kierowcy
function DodajKierowce($conn){
	
	$row = array('id_kierowcy' => '-', 'imię' => '', 'nazwisko' => '', 'rejestracja_pojazdu' => '');
	
	FormularzStrony_kierowcy($row, $czynnosc="dodajkierowce");
   
}

// funkcja odpowiadająca za możliwość edycji kierowcy
function EdytujKierowce($conn, $id_kierowcy)
{
	// pobranie danych strony do edycji
	$sql = "SELECT * FROM kierowcy WHERE id_kierowcy = $id_kierowcy";
	
	// zapytanie do bazy danych
	$result = mysqli_query($conn, $sql);
	
	// jeśli istnieją wyniki
	if ($result && mysqli_num_rows($result) > 0) {

		// pobranie pojedyńczego wiersza
		$row = mysqli_fetch_assoc($result);
		
		FormularzStrony_kierowcy($row, $czynnosc="edytujkierowce");

	}
}


////////////////////////////////	MIEJSCA  	//////////////////////////////////////////

// funkcja odpowiadająca za wyświetlanie listy miejsc
function ListaPodstron_miejsca()
{
	// połączenie z serwerem
    $con = mysqli_connect('localhost', 'root', '', 'system_io');
    if(!$con)
    {	// co jeśli nie można się połączyć
        die("Connection failed!" . mysqli_connect_error());
    }
	// pobieranie danych
    $sql = "SELECT * FROM miejsca";
    $result = mysqli_query($con, $sql);
	
		?> <!-- wyświetlanie danych w formie tabelki -->
		<table class="tabelka" style=" top: 65%; left: 50%;transform: translate(-50%, -50%); position: absolute;">
			<tr> <!-- tytuł tabelki -->
				<td colspan="7" class="nazwa"> Miejsca</td
			</tr>
			<tr> <!-- wiersz z nazwami kolumn -->
				<th class="kolomny"> ID</th>
				<th class="kolomny"> Nazwa</th>
				<th class="kolomny"> Państwo</th>
				<th class="kolomny"> Miejscowość</th>
				<th class="kolomny"> Ulica</th>
				<th class="kolomny"> Nr domu</th>
				<th class="kolomny"> Opcja</th>
				
			</tr>
		<?php // wyświetlanie wierszy z danymi elementami
		while ($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td class="wiersze"><?php echo $row["id_miejsca"]; ?></td>
				<td class="wiersze"><?php echo $row["nazwa"]; ?></td>
				<td class="wiersze"><?php echo $row["państwo"]; ?></td>
				<td class="wiersze"><?php echo $row["miejscowość"]; ?></td>
				<td class="wiersze"><?php echo $row["ulica"]; ?></td>
				<td class="wiersze"><?php echo $row["nr_domu"]; ?></td>
				<td class="wiersze">		
					<a class="opcje" href="?action=EdytujMiejsce&id_miejsca=<?php echo $row["id_miejsca"]; ?>">Edytuj</a>
					<a class="opcje" href="?action=UsunMiejsce&id_miejsca=<?php echo $row["id_miejsca"]; ?>" onclick="return confirm('Czy na pewno chcesz usunąć ten rekord?')">Usuń</a>
				</td>
			</tr>
			<?php
		}
		?>
			<tr>
				<td colspan="7" class="dodaj">
					<a class="opcje" href="?action=DodajMiejsce">Dodaj miejsce</a>
				</td>
			</tr>
			</tr> 
				<td >
					<a href="IO.php">
						<input  type="button" value="Cancel">
					</a>
                </td>
			</tr>
		</table>
		<?php
	
}

// żeby działało edytowanie miejsc
if (isset($_GET['action']) && $_GET['action'] == 'EdytujMiejsce' && isset($_GET['id_miejsca'])) {
	EdytujMiejsce($conn, $_GET['id_miejsca']);
}

// żeby działało usuwanie miejsc
if (isset($_GET['action']) && $_GET['action'] == 'UsunMiejsce' && isset($_GET['id_miejsca'])) {
    UsunMiejsce($conn, $_GET['id_miejsca']);
}

// żeby działało dodawanie miejsc
if (isset($_GET['action']) && $_GET['action'] == 'DodajMiejsce') {
    DodajMiejsce($conn);
}

// formualrz
function FormularzStrony_miejsca($row, $czynnosc){
    ?> <!-- formularz do wypełniania podczas edycji -->
    <form method="post" style="top: 65%; left: 50%;transform: translate(-50%, -50%); position: absolute;" action="admin/admin_IO.php">
        <!-- id_miejsca -->
        <table class="popup"> 
            </tr> <tr> <!-- UWAGA TRAGICZNE WCIĘCIA XD -->
                <td colspan='2'> <?php if ($czynnosc === 'dodajmiejsce') { echo '<h2>Dodawanie nowego miejsca</h2>';}
				if ($czynnosc === 'edytujmiejsce') {echo '<h2>Edytowanie miejsca</h2>';} ?></td>
			</tr><tr> 
			<td colspan='2' style="border: 1px solid black; background: black"> </td>
			</tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr>
			</tr> <tr> 
				<td colspan='2'> <label for="id_miejsca">ID:</label> 
				<?php echo $row['id_miejsca']; ?> <input type="hidden" name="id_miejsca" value="<?php echo $row['id_miejsca']; ?>"> </td>
            </tr> <tr>
			</tr> <tr>
                <td> <label for="nazwa">Nazwa:</label> </td>
                <td> <input type="text" name="nazwa" value="<?php echo $row['nazwa']; ?>"> </td>
            </tr> <tr>
                <td> <label for="państwo">Państwo:</label> </td>
                <td> <input type="text" name="państwo" value="<?php echo $row['państwo']; ?>"> </td>
            </tr> <tr>
                <td> <label for="miejscowość">Miejscowość:</label> </td>
                <td> <input type="text" name="miejscowość" value="<?php echo $row['miejscowość']; ?>"> </td>
            </tr> <tr>
			    <td> <label for="ulica">Ulica:</label> </td>
                <td> <input type="text" name="ulica" value="<?php echo $row['ulica']; ?>"> </td>
            </tr> <tr>
				<td> <label for="nr_domu">Nr domu:</label> </td>
                <td> <input type="text" name="nr_domu" value="<?php echo $row['nr_domu']; ?>"> </td>
            </tr> <tr>
                <td style="text-align: center;"> <input style="width: 100px;" type="submit" name="<?php echo $czynnosc; ?>" value="Ok"> </td>
                <td style="text-align: center;"> 
					<a href="IO.php" style="text-decoration: none; color: white;">
						<input style="width: 100px;" type="button" value="Cancel">
					</a>
                </td>
            </tr>
        </table>
    </form>
    <?php
}

// obsługa formularza po dodaniu miejsca
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dodajmiejsce'])) {
	// pobranie danych z formularza
    $nazwa = $_POST['nazwa'];
	$państwo = $_POST['państwo'];
    $miejscowość = $_POST['miejscowość'];
	$ulica = $_POST['ulica'];
	$nr_domu = $_POST['nr_domu'];
    // zabezpieczenie
    $nazwa = mysqli_real_escape_string($conn, $nazwa);
	$państwo = mysqli_real_escape_string($conn, $państwo);
    $miejscowość = mysqli_real_escape_string($conn, $miejscowość);
	$ulica = mysqli_real_escape_string($conn, $ulica);
	$nr_domu = mysqli_real_escape_string($conn, $nr_domu);
    // zapytanie INSERT
    $sql = "INSERT INTO miejsca (nazwa, państwo, miejscowość, ulica, nr_domu) VALUES ('$nazwa', '$państwo', '$miejscowość', '$ulica', '$nr_domu')";
    $result = mysqli_query($conn, $sql);

    // powrót do strony
	if ($result){
		header("Location: ../IO.php?action=ListaPodstron_miejsca");
	} else{	// dodatkowa informacja
		echo 'coś poszło nie tak';
	}
}

// obsługa formularza po edycji miejsca 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edytujmiejsce'])) {
	// pobranie danych z formularza
	$id_miejsca = mysqli_real_escape_string($conn, $_POST['id_miejsca']);
	$nazwa = mysqli_real_escape_string($conn, $_POST['nazwa']);
	$państwo = mysqli_real_escape_string($conn, $_POST['państwo']);
	$miejscowość = mysqli_real_escape_string($conn, $_POST['miejscowość']);
	$ulica = mysqli_real_escape_string($conn, $_POST['ulica']);
	$nr_domu = mysqli_real_escape_string($conn, $_POST['nr_domu']);
	// zapytanie UPDATE
	$sql = "UPDATE miejsca SET nazwa = '$nazwa', państwo = '$państwo', miejscowość = '$miejscowość' ,ulica = '$ulica' , nr_domu = '$nr_domu'  WHERE id_miejsca = '$id_miejsca' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	// powrót do strony
	if ($result){
		header("Location: ../IO.php?action=ListaPodstron_miejsca");
	} else{	// dodatkowa informacja
		echo 'coś poszło nie tak';
	}
}


// funkcja odpowiadająca za możliwość usunięcia miejsca
function UsunMiejsce($conn, $id_miejsca)
{
    // zabezpieczenie przed SQL Injection
    $id_miejsca = mysqli_real_escape_string($conn, $id_miejsca);
	
	$czyprzypisane = "SELECT id_przystanku FROM przystanki WHERE id_miejsca = $id_miejsca LIMIT 1";
	$resultczyjest = mysqli_query($conn, $czyprzypisane);
	if ($resultczyjest && mysqli_num_rows($resultczyjest) > 0) {
        // Kierowca jest przypisany do trasy, nie można go usunąć
         echo '<script>alert("Nie można usunąć miejsca, ponieważ jest przypisane do przystanku.");</script>';
	} else {
		$sql = "DELETE FROM miejsca WHERE id_miejsca = $id_miejsca LIMIT 1";
		$result = mysqli_query($conn, $sql);
		
		// powrót do strony
		if ($result){
			header("Location: IO.php?action=ListaPodstron_miejsca");
		} else{	// dodatkowa informacja
			echo 'coś poszło nie tak';
		}
	}
}

// funkcja odpowiadająca za możliwość dodania nowego miejsca
function DodajMiejsce($conn){
	
	$row = array('id_miejsca' => '-', 'nazwa' => '', 'państwo' => '', 'miejscowość' => '', 'ulica' => '', 'nr_domu' => '');
	
	FormularzStrony_miejsca($row, $czynnosc="dodajmiejsce");
   
}

// funkcja odpowiadająca za możliwość edycji miejsca
function EdytujMiejsce($conn, $id_miejsca)
{
	// pobranie danych strony do edycji
	$sql = "SELECT * FROM miejsca WHERE id_miejsca = $id_miejsca";
	
	// zapytanie do bazy danych
	$result = mysqli_query($conn, $sql);
	
	// jeśli istnieją wyniki
	if ($result && mysqli_num_rows($result) > 0) {

		// pobranie pojedyńczego wiersza
		$row = mysqli_fetch_assoc($result);
		
		FormularzStrony_miejsca($row, $czynnosc="edytujmiejsce");
		
	}
}


////////////////////////////////	TRASY  	//////////////////////////////////////////

// funkcja odpowiadająca za wyświetlanie listy tras
function ListaPodstron_trasy()
{
	// połączenie z serwerem
    $con = mysqli_connect('localhost', 'root', '', 'system_io');
    if(!$con)
    {	// co jeśli nie można się połączyć
        die("Connection failed!" . mysqli_connect_error());
    }
	// pobieranie danych
    $sql = "SELECT * FROM trasy ORDER BY id_trasy DESC";
    $result = mysqli_query($con, $sql);
		?> <!-- wyświetlanie danych w formie tabelki -->
		<table style="width: 100%">
		 <!-- wyświetlanie wierszy z danymi elementami -->
			<tr>
				<td class="dodajtras">
					<a class="opcjetras" style="padding: 3px, border: none;" href="?action=DodajTrase">DODAJ NOWĄ TRASĘ</a>
				</td>
			</tr>
		</table>
		<table class="tabelkatras">
			<?php
		while ($row = mysqli_fetch_array($result)) {
			?>
		<table>
			<tr>
				<td class="wierszetras" style="background: grey; width: 60px"><?php echo $row["id_trasy"]; ?></td>
				<td >
					<a  style="padding: 0px" href="?action=EdytujTraseZaawansowanie&id_trasy=<?php echo $row["id_trasy"]; ?>">
						<input class="buttontras" type="button" value="<?php echo $row["stan_zaawansowania"]; ?>">
					</a>
					<br>
					<a style="padding: 0px" href="?action=EdytujTraseRozliczenie&id_trasy=<?php echo $row["id_trasy"]; ?>">
						<input class="buttontras" type="button" value="<?php echo $row["stan_rozliczenia"]; ?>">
					</a>
					<br> 
					<?php
						$sqlk = "SELECT * FROM kierowcy WHERE id_kierowcy = " . $row['id_kierowcy'];
						$resultk = mysqli_query($con, $sqlk);
						$rowk = mysqli_fetch_array($resultk);
					?>
					<a style="padding: 0px"  href="?action=EdytujTraseKierowca&id_trasy=<?php echo $row["id_trasy"]; ?>">
						<input class="buttontras" type="button" value="<?php echo $rowk['imię'] . ' ' . $rowk['nazwisko']; ?>">
					</a>
				</td>
				<?php 
				
					$sqlp = "SELECT * FROM przystanki WHERE id_trasy = '" . $row['id_trasy'] . "'";
					$resultp = mysqli_query($con, $sqlp);
					
                    while ($rowp = mysqli_fetch_array($resultp)) {
                       ?> <td> <?php WypiszPrzystanek($rowp['id_przystanku']); ?> </td> <?php
                    }
				?>
				<td class="wierszetras" style="width: 65px">		
					<a class="opcjetras" style="font-size:40px; padding: 3px;" href="?action=DodajPrzystanek&id_trasy=<?php echo $row['id_trasy'] ?>">+</a>
				</td>
				<td class="wierszetras" style="width: 65px">		
					<a class="opcjetras" style="padding: 3px" href="?action=UsunTrase&id_trasy=<?php echo $row["id_trasy"]; ?>" onclick="return confirm('Czy na pewno chcesz usunąć ten rekord?')">Usuń</a>
				</td>
			</tr>
			<?php
		}
		?>
		</table>
		</table>
		<?php	
}

// żeby działało edytowanie trasy
if (isset($_GET['action']) && $_GET['action'] == 'ListaPodstron_kierowcy') {
	ListaPodstron_kierowcy();
}

// żeby działało edytowanie trasy
if (isset($_GET['action']) && $_GET['action'] == 'ListaPodstron_miejsca') {
	ListaPodstron_miejsca();
}

// żeby działało edytowanie trasy
if (isset($_GET['action']) && $_GET['action'] == 'ListaPodstron_przystanki') {
	ListaPodstron_przystanki();
}

// żeby działało edytowanie trasy
if (isset($_GET['action']) && $_GET['action'] == 'EdytujTrase' && isset($_GET['id_trasy'])) {
	EdytujTrase($conn, $_GET['id_trasy']);
}

// żeby działało usuwanie trasy
if (isset($_GET['action']) && $_GET['action'] == 'UsunTrase' && isset($_GET['id_trasy'])) {
    UsunTrase($conn, $_GET['id_trasy']);
}

// żeby działało dodawanie trasy
if (isset($_GET['action']) && $_GET['action'] == 'DodajTrase') {
    DodajTrase($conn);
}

// żeby działało edytowanie zaawansowania
if (isset($_GET['action']) && $_GET['action'] == 'EdytujTraseZaawansowanie') {
    EdytujTraseZaawansowanie($conn, $_GET['id_trasy']);
}

// żeby działało edytowanie zaawansowania
if (isset($_GET['action']) && $_GET['action'] == 'EdytujTraseRozliczenie') {
    EdytujTraseRozliczenie($conn, $_GET['id_trasy']);
}

// żeby działało edytowanie zaawansowania
if (isset($_GET['action']) && $_GET['action'] == 'EdytujTraseKierowca') {
    EdytujTraseKierowca($conn, $_GET['id_trasy']);
}


// formualrz
function FormularzStrony_trasy($row, $czynnosc){
    ?> <!-- formularz do wypełniania podczas edycji -->
    <form method="post" style="top: 65%; left: 50%;transform: translate(-50%, -50%); position: absolute;" action="admin/admin_IO.php">
        <!-- id_trasy -->
        <table class="popup"> 
            </tr> <tr> <!-- UWAGA TRAGICZNE WCIĘCIA XD -->
                <td colspan='2'> <?php if ($czynnosc === 'dodajtrase') { echo '<h2>Dodawanie nowej trasy</h2>';}
				if ($czynnosc === 'edytujtrase') {echo '<h2>Edytowanie trasy</h2>';} ?></td>
			</tr><tr> 
			<td colspan='2' style="border: 1px solid black; background: black"> </td>
			</tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr>
			</tr> <tr> 
				<td colspan='2'> <label for="id_trasy">ID:</label> 
				<?php echo $row['id_trasy']; ?> <input type="hidden" name="id_trasy" value="<?php echo $row['id_trasy']; ?>"> </td>
            </tr> <tr>
			</tr> <tr>
                <td> <label for="stan_zaawansowania">Stan Zaawansowania:</label> </td>
                <td> <select name="stan_zaawansowania">
					<option value="planowana" <?php if ($row['stan_zaawansowania'] === 'do rozliczenia') echo 'selected'; ?>>Planowana</option>
					<option value="w trakcie" <?php if ($row['stan_zaawansowania'] === 'w trakcie') echo 'selected'; ?>>W trakcie</option>
					<option value="ukończona" <?php if ($row['stan_zaawansowania'] === 'ukończona') echo 'selected'; ?>>Ukończona</option>
				</select> </td>
            </tr> <tr>
                <td> <label for="stan_rozliczenia">Stan Rozliczenia:</label> </td>
                <td> <select name="stan_rozliczenia">
					<option value="do rozliczenia" <?php if ($row['stan_rozliczenia'] === 'do rozliczenia') echo 'selected'; ?>>Do rozliczenia</option>
					<option value="rozliczona" <?php if ($row['stan_rozliczenia'] === 'rozliczona') echo 'selected'; ?>>Rozliczona</option>
				</select> </td>
            </tr> <tr>
			    <td> <label for="id_kierowcy">Id kierowcy:</label> </td>
                <td> <select name="id_kierowcy" id="id_kierowcy" value="<?php echo $row['id_kierowcy']; ?>"> <?php echo PobierzKierowce($conn); ?> </select></td>
			</tr> <tr>
                <td style="text-align: center;"> <input style="width: 100px;" type="submit" name="<?php echo $czynnosc; ?>" value="Ok"> </td>
                <td style="text-align: center;"> 
					<a href="IO.php" style="text-decoration: none; color: white;">
						<input style="width: 100px;" type="button" value="Cancel">
					</a>
                </td>
            </tr>
        </table>
    </form>
    <?php
}

// funkcja odpowiadająca za pobieranie kierowców
function PobierzKierowce()
{
    $options = '';
    $sql = "SELECT * FROM kierowcy";
    $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'system_io'), $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
			$options .= '<option value="' . $row['id_kierowcy'] . '">' . $row['id_kierowcy'] . ' - ' . $row['nazwisko'] . ' ' . $row['imię'] . '</option>';
        }
    }
    return $options;
}

// funkcja odpowiadająca za pobieranie kierowców
function PobierzMiejsce()
{
    $options = '';
    $sql = "SELECT * FROM miejsca";
    $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'system_io'), $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
			$options .= '<option value="' . $row['id_miejsca'] . '">' . $row['id_miejsca'] . ' - ' . $row['nazwa'] . ' ' . $row['państwo'] .  ' ' . $row['miejscowość'] . ' ' . $row['ulica'] . ' ' . $row['nr_domu'] . '</option>';
		}
    }
    return $options;
}


// obsługa formularza po edycji trasy
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edytujtrase'])) {
	// pobranie danych z formularza
	$id_trasy = mysqli_real_escape_string($conn, $_POST['id_trasy']);
	$stan_zaawansowania = mysqli_real_escape_string($conn, $_POST['stan_zaawansowania']);
	$stan_rozliczenia = mysqli_real_escape_string($conn, $_POST['stan_rozliczenia']);
	$id_kierowcy = mysqli_real_escape_string($conn, $_POST['id_kierowcy']);
	// zapytanie UPDATE
	$sql = "UPDATE trasy SET id_trasy = '$id_trasy', stan_zaawansowania = '$stan_zaawansowania', stan_rozliczenia = '$stan_rozliczenia', id_kierowcy = '$id_kierowcy' WHERE id_trasy = '$id_trasy' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	// powrót do strony
	if ($result){
		header("Location: ../IO.php");
	} else{	// dodatkowa informacja
		echo 'coś poszło nie tak';
	}
}

// obsługa formularza po dodaniu trasy
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dodajtrase'])) {
	// pobranie danych z formularza
	$stan_zaawansowania = $_POST['stan_zaawansowania'];
    $stan_rozliczenia = $_POST['stan_rozliczenia'];
	$id_kierowcy = $_POST['id_kierowcy'];
    // zabezpieczenie
	$stan_zaawansowania = mysqli_real_escape_string($conn, $stan_zaawansowania);
    $stan_rozliczenia = mysqli_real_escape_string($conn, $stan_rozliczenia);
	$id_kierowcy = mysqli_real_escape_string($conn, $id_kierowcy);
    // zapytanie INSERT
    $sql = "INSERT INTO trasy (stan_zaawansowania, stan_rozliczenia, id_kierowcy) VALUES ('$stan_zaawansowania', '$stan_rozliczenia', '$id_kierowcy')";
    $result = mysqli_query($conn, $sql);

    // powrót do strony
	if ($result){
		header("Location: ../IO.php");
	} else{	// dodatkowa informacja
		echo 'coś poszło nie tak';
	}
}

// funkcja odpowiadająca za możliwość usunięcia trasy
function UsunTrase($conn, $id_trasy)
{
    // zabezpieczenie przed SQL Injection
    $id_trasy = mysqli_real_escape_string($conn, $id_trasy);

	$czyprzypisane = "SELECT id_przystanku FROM przystanki WHERE id_trasy = $id_trasy LIMIT 1";
	$resultczyjest = mysqli_query($conn, $czyprzypisane);
	
	if ($resultczyjest && mysqli_num_rows($resultczyjest) > 0) {
        // Kierowca jest przypisany do trasy, nie można go usunąć
         echo '<script>alert("Nie można usunąć trasy, ponieważ ma ona przystanki.");</script>';
    } else {
		 $sql = "DELETE FROM trasy WHERE id_trasy = $id_trasy LIMIT 1";
			$result = mysqli_query($conn, $sql);
	
		// powrót do strony
		if ($result){
			header("Location: IO.php");
		} else{	// dodatkowa informacja
			echo 'coś poszło nie tak';
		}
	}
}

// funkcja odpowiadająca za możliwość dodania nowej trasy
function DodajTrase($conn){
	
	$row = array('id_trasy' => '-', 'stan_zaawansowania' => '', 'stan_rozliczenia' => '', 'id_kierowcy' => '');
	
	FormularzStrony_trasy($row, $czynnosc="dodajtrase");
   
}

// funkcja odpowiadająca za możliwość edycji trasy
function EdytujTrase($conn, $id_trasy)
{
	// pobranie danych strony do edycji
	$sql = "SELECT * FROM trasy WHERE id_trasy = $id_trasy";
	
	// zapytanie do bazy danych
	$result = mysqli_query($conn, $sql);
	
	// jeśli istnieją wyniki
	if ($result && mysqli_num_rows($result) > 0) {

		// pobranie pojedyńczego wiersza
		$row = mysqli_fetch_assoc($result);
		
		FormularzStrony_trasy($row, $czynnosc="edytujtrase");
		
	}
}

// funkcja odpowiadająca za możliwość edycji trasy
function EdytujTraseZaawansowanie($conn, $id_trasy)
{
	// pobranie danych strony do edycji
	$sql = "SELECT * FROM trasy WHERE id_trasy = $id_trasy";
	
	// zapytanie do bazy danych
	$result = mysqli_query($conn, $sql);
	
	// jeśli istnieją wyniki
	if ($result && mysqli_num_rows($result) > 0) {

		// pobranie pojedyńczego wiersza
		$row = mysqli_fetch_assoc($result);
		
		FormularzStrony_trasy_zaawansowanie($row, $czynnosc="edytujtrasezaawansowanie");
		
	}
}

// funkcja odpowiadająca za możliwość edycji trasy
function EdytujTraseRozliczenie($conn, $id_trasy)
{
	// pobranie danych strony do edycji
	$sql = "SELECT * FROM trasy WHERE id_trasy = $id_trasy";
	
	// zapytanie do bazy danych
	$result = mysqli_query($conn, $sql);
	
	// jeśli istnieją wyniki
	if ($result && mysqli_num_rows($result) > 0) {

		// pobranie pojedyńczego wiersza
		$row = mysqli_fetch_assoc($result);
		
		FormularzStrony_trasy_rozliczenie($row, $czynnosc="edytujtraserozliczenie");
		
	}
}

// funkcja odpowiadająca za możliwość edycji trasy
function EdytujTraseKierowca($conn, $id_trasy)
{
	
	// pobranie danych strony do edycji
	$sql = "SELECT * FROM trasy WHERE id_trasy = $id_trasy";
	
	// zapytanie do bazy danych
	$result = mysqli_query($conn, $sql);
	
	// jeśli istnieją wyniki
	if ($result && mysqli_num_rows($result) > 0) {

		// pobranie pojedyńczego wiersza
		$row = mysqli_fetch_assoc($result);
		
		FormularzStrony_trasy_kierowca($row, $czynnosc="edytujtrasekierowca");
		
	}
}


// formualrz
function FormularzStrony_trasy_zaawansowanie($row, $czynnosc){
    ?> <!-- formularz do wypełniania podczas edycji -->
    <form method="post"  style=" top: 65%; left: 50%;transform: translate(-50%, -50%); position: absolute;" action="admin/admin_IO.php">
        <!-- id_trasy -->
        <table class="popup"> 
            </tr> <tr>
                <td colspan='2'> <?php echo '<h2 style="font-size: 18px;" >Stan zaawansowania trasy</h2>'; ?></td>
			</tr><tr> 
			<td colspan='2' style="border: 1px solid black; background: black"> </td>
			</tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr>
			</tr> <tr> 
				<td> </label> <input type="hidden" name="id_trasy" value="<?php echo $row['id_trasy']; ?>"> </td>
            </tr> <tr>
				<td> <select style="width: 205%" name="stan_zaawansowania">
					<option value="planowana" <?php if ($row['stan_zaawansowania'] === 'do rozliczenia') echo 'selected'; ?>>Planowana</option>
					<option value="w trakcie" <?php if ($row['stan_zaawansowania'] === 'w trakcie') echo 'selected'; ?>>W trakcie</option>
					<option value="ukończona" <?php if ($row['stan_zaawansowania'] === 'ukończona') echo 'selected'; ?>>Ukończona</option>
				</select> </td>
            </tr> <tr>
                <td style="text-align: center;"> <input style="width: 100px;" type="submit" name="<?php echo $czynnosc; ?>" value="Ok"> </td>
                <td style="text-align: center;"> 
					<a href="IO.php" style="text-decoration: none; color: white;">
						<input style="width: 100px;" type="button" value="Anuluj">
					</a>
                </td>
            </tr>
        </table>
    </form>
    <?php
}

// formualrz
function FormularzStrony_trasy_rozliczenie($row, $czynnosc){
    ?> <!-- formularz do wypełniania podczas edycji -->
    <form method="post"  style=" top: 65%; left: 50%;transform: translate(-50%, -50%); position: absolute;" action="admin/admin_IO.php">
        <!-- id_trasy -->
        <table class="popup"> 
            </tr> <tr>
                <td colspan='2'> <?php echo '<h2 style="font-size: 18px;" >Stan rozliczenia trasy</h2>'; ?></td>
			</tr><tr> 
			<td colspan='2' style="border: 1px solid black; background: black"> </td>
			</tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr>
			</tr> <tr> 
				<td> </label> <input type="hidden" name="id_trasy" value="<?php echo $row['id_trasy']; ?>"> </td>
            </tr> <tr>
				 <td> <select style="width: 200%" name="stan_rozliczenia">
					<option value="do rozliczenia" <?php if ($row['stan_rozliczenia'] === 'do rozliczenia') echo 'selected'; ?>>Do rozliczenia</option>
					<option value="rozliczona" <?php if ($row['stan_rozliczenia'] === 'rozliczona') echo 'selected'; ?>>Rozliczona</option>
				</select> </td>
            </tr> <tr>
                <td style="text-align: center;"> <input style="width: 100px;" type="submit" name="<?php echo $czynnosc; ?>" value="Ok"> </td>
                <td style="text-align: center;"> 
					<a href="IO.php" style="text-decoration: none; color: white;">
						<input style="width: 100px;" type="button" value="Anuluj">
					</a>
                </td>
            </tr>
        </table>
    </form>
    <?php
}

// formualrz
function FormularzStrony_trasy_kierowca($row, $czynnosc){
    ?> <!-- formularz do wypełniania podczas edycji -->
    <form method="post"  style="top: 65%; left: 50%;transform: translate(-50%, -50%); position: absolute;" action="admin/admin_IO.php">
        <!-- id_trasy -->
        <table class="popup"> 
            </tr> <tr>
                <td colspan='2'> <?php echo '<h2 style="font-size: 18px;" >Kierowcy</h2>'; ?></td>
			</tr><tr> 
			<td colspan='2' style="border: 1px solid black; background: black"> </td>
			</tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr>
			</tr> <tr> 
				<td> </label> <input type="hidden" name="id_trasy" value="<?php echo $row['id_trasy']; ?>"> </td>
            </tr> <tr>
					<td> <select name="id_kierowcy" id="id_kierowcy" value="<?php echo $row['id_kierowcy']; ?>"> <?php echo PobierzKierowce($conn); ?> </select></td>
					<td style=""> <a class="opcjetras" style="background-color: white; border: 1px solid black; color: black; border-radius:3px" href="?action=ListaPodstron_kierowcy"> Opcje </a> <td>
			</tr> <tr>
                <td style=""> <input style="width: 100px;" type="submit" name="<?php echo $czynnosc; ?>" value="Ok"> </td>
                <td style=""> 
					<a href="IO.php" style="text-decoration: none; color: white;">
						<input style="width: 100px;" type="button" value="Anuluj">
					</a>
                </td>
            </tr>
        </table>
    </form>
    <?php
}

// obsługa formularza po edycji zaawansowania
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edytujtrasezaawansowanie'])) {
	// pobranie danych z formularza
	$id_trasy = mysqli_real_escape_string($conn, $_POST['id_trasy']);
	$stan_zaawansowania = mysqli_real_escape_string($conn, $_POST['stan_zaawansowania']);
	// zapytanie UPDATE
	$sql = "UPDATE trasy SET id_trasy = '$id_trasy', stan_zaawansowania = '$stan_zaawansowania' WHERE id_trasy = '$id_trasy' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	// powrót do strony
	if ($result){
		header("Location: ../IO.php");
	} else{	// dodatkowa informacja
		echo 'coś poszło nie tak';
	}
}

// obsługa formularza po edycji zaawansowania
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edytujtraserozliczenie'])) {
	// pobranie danych z formularza
	$id_trasy = mysqli_real_escape_string($conn, $_POST['id_trasy']);
	$stan_rozliczenia = mysqli_real_escape_string($conn, $_POST['stan_rozliczenia']);
	// zapytanie UPDATE
	$sql = "UPDATE trasy SET id_trasy = '$id_trasy', stan_rozliczenia = '$stan_rozliczenia' WHERE id_trasy = '$id_trasy' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	// powrót do strony
	if ($result){
		header("Location: ../IO.php");
	} else{	// dodatkowa informacja
		echo 'coś poszło nie tak';
	}
}

// obsługa formularza po edycji kierowców
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edytujtrasekierowca'])) {
	// pobranie danych z formularza
	$id_trasy = mysqli_real_escape_string($conn, $_POST['id_trasy']);
	$id_kierowcy = mysqli_real_escape_string($conn, $_POST['id_kierowcy']);
	// zapytanie UPDATE
	$sql = "UPDATE trasy SET id_trasy = '$id_trasy', id_kierowcy = '$id_kierowcy' WHERE id_trasy = '$id_trasy' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	// powrót do strony
	if ($result){
		header("Location: ../IO.php");
	} else{	// dodatkowa informacja
		echo 'coś poszło nie tak';
	}
}


////////////////////////////////	PRZYSTANKI  	//////////////////////////////////////////

// funkcja odpowiadająca za wyświetlanie listy miejsc
function ListaPodstron_przystanki()
{
	// połączenie z serwerem
    $con = mysqli_connect('localhost', 'root', '', 'system_io');
    if(!$con)
    {	// co jeśli nie można się połączyć
        die("Connection failed!" . mysqli_connect_error());
    }
	// pobieranie danych
    $sql = "SELECT * FROM przystanki";
    $result = mysqli_query($con, $sql);
	
		?> <!-- wyświetlanie danych w formie tabelki -->
		<table class="tabelka">
			<tr> <!-- tytuł tabelki -->
				<td colspan="7" class="nazwa"> Przystanki</td
			</tr>
			<tr> <!-- wiersz z nazwami kolumn -->
				<th class="kolomny"> ID</th>
				<th class="kolomny"> Rodzaj przystanku</th>
				<th class="kolomny"> ID miejsca</th>
				<th class="kolomny"> ID trasy</th>
				<th class="kolomny"> Notatki</th>
				<th class="kolomny"> Opcja</th>
				
			</tr>
		<?php // wyświetlanie wierszy z danymi elementami
		while ($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td class="wiersze"><?php echo $row["id_przystanku"]; ?></td>
				<td class="wiersze"><?php echo $row["rodzaj"]; ?></td>
				<td class="wiersze"><?php echo $row["id_miejsca"]; ?></td>
				<td class="wiersze"><?php echo $row["id_trasy"]; ?></td>
				<td class="wiersze"><?php echo $row["notatki"]; ?></td>
				<td class="wiersze">		
					<a class="opcje" href="?action=EdytujPrzystanek&id_przystanku=<?php echo $row["id_przystanku"]; ?>">Edytuj</a>
					<a class="opcje" href="?action=UsunPrzystanek&id_przystanku=<?php echo $row["id_przystanku"]; ?>" onclick="return confirm('Czy na pewno chcesz usunąć ten rekord?')">Usuń</a>
				</td>
			</tr>
			<?php
		}
		?>
			<tr>
				<td colspan="7" class="dodaj">
					<a class="opcje" href="?action=DodajPrzystanek">Dodaj przystanek</a>
				</td>
			</tr>
		</table>
		<?php

}

// żeby działało edytowanie przystanku
if (isset($_GET['action']) && $_GET['action'] == 'EdytujPrzystanek' && isset($_GET['id_przystanku'])) {
	EdytujPrzystanek($conn, $_GET['id_przystanku']);
}

// żeby działało usuwanie przystanku
if (isset($_GET['action']) && $_GET['action'] == 'UsunPrzystanek' && isset($_GET['id_przystanku'])) {
    UsunPrzystanek($conn, $_GET['id_przystanku']);
}

// żeby działało dodawanie przystanku
if (isset($_GET['action']) && $_GET['action'] == 'DodajPrzystanek' && isset($_GET['id_trasy'])) {
    DodajPrzystanek($conn, $_GET['id_trasy']);
}

// formualrz
function FormularzStrony_przystanku($row, $czynnosc){
	?> <!-- formularz do wypełniania podczas edycji -->
    <form method="post" style="top: 65%; left: 50%;transform: translate(-50%, -50%); position: absolute;" action="admin/admin_IO.php">
        <!-- id_przystanku -->
       <table class="popup"> 
            </tr> <tr> <!-- UWAGA TRAGICZNE WCIĘCIA XD -->
                <td colspan='2'> <?php if ($czynnosc === 'dodajprzystanek') { echo '<h2>Dodawanie nowego przystanku</h2>';}
				if ($czynnosc === 'edytujprzystanek') {echo '<h2>Edytowanie przystanku</h2>';} ?></td>
			</tr><tr> 
			<td colspan='2' style="border: 1px solid black; background: black"> </td>
			</tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr>
			</tr> <tr> 
				<td colspan='2'> <label for="id_przystanku">ID:</label> 
				<?php echo $row['id_przystanku']; ?> <input type="hidden" name="id_przystanku" value="<?php echo $row['id_przystanku']; ?>"> </td>
            </tr> <tr>
                <td> <label for="rodzaj">Rodzaj:</label> </td>
                <td> <input type="text" name="rodzaj" value="<?php echo $row['rodzaj']; ?>"> </td>
            </tr> <tr>
               <td> <label for="id_miejsca">ID miejsca:</label> </td>
                <td> <select name="id_miejsca" id="id_miejsca" value="<?php echo $row['id_miejsca']; ?>"> <?php echo PobierzMiejsce($conn); ?> </select>  </td>
             </tr> <tr>
                <td> <input type="hidden" name="id_trasy" value="<?php echo $row['id_trasy']; ?>"> </td>
             </tr> <tr>
                <td> <label for="notatki">Notatki:</label> </td>
                <td> <textarea name="notatki"><?php echo $row['notatki']; ?></textarea> </td>
            </tr> <tr>
                <td style="text-align: center;"> <input style="width: 100px;" type="submit" name="<?php echo $czynnosc; ?>" value="Ok"> </td>
                <td style="text-align: center;"> 
					<a href="IO.php" style="text-decoration: none; color: white;">
						<input style="width: 100px;" type="button" value="Cancel">
					</a>
                </td>
            </tr>
        </table>
    </form>
    <?php
}

// obsługa formularza po dodaniu przystanku 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dodajprzystanek'])) {
	// pobranie danych z formularza
    $rodzaj = $_POST['rodzaj'];
	$id_miejsca = $_POST['id_miejsca'];
	$id_trasy = $_POST['id_trasy'];
    $notatki = $_POST['notatki'];
	// zabezpieczenie
    $rodzaj = mysqli_real_escape_string($conn, $rodzaj);
	$id_miejsca = mysqli_real_escape_string($conn, $id_miejsca);
	$id_trasy = mysqli_real_escape_string($conn, $id_trasy);
    $notatki = mysqli_real_escape_string($conn, $notatki);
    // zapytanie INSERT
	$sql = "INSERT INTO przystanki (rodzaj, id_miejsca, id_trasy, notatki) VALUES ('$rodzaj', '$id_miejsca','$id_trasy', '$notatki')";
    $result = mysqli_query($conn, $sql);

    // powrót do strony
	if ($result){
		header("Location: ../IO.php");
	} else{	// dodatkowa informacja
		echo 'coś poszło nie tak';
	}
}

// obsługa formularza po edycji przystanku 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edytujprzystanek'])) {
	// pobranie danych z formularza
	$id_przystanku = mysqli_real_escape_string($conn, $_POST['id_przystanku']);
	$rodzaj = mysqli_real_escape_string($conn, $_POST['rodzaj']);
	$id_miejsca = mysqli_real_escape_string($conn, $_POST['id_miejsca']);
	$id_trasy = mysqli_real_escape_string($conn, $_POST['id_trasy']);
	$notatki = mysqli_real_escape_string($conn, $_POST['notatki']);
	// zapytanie UPDATE
	$sql = "UPDATE przystanki SET rodzaj = '$rodzaj', id_miejsca = '$id_miejsca',id_trasy = '$id_trasy', notatki = '$notatki' WHERE id_przystanku = '$id_przystanku' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	// powrót do strony
	if ($result){
		header("Location: ../IO.php");
	} else{	// dodatkowa informacja
		echo 'coś poszło nie tak';
	}
}

// funkcja odpowiadająca za możliwość usunięcia przystanku
function UsunPrzystanek($conn, $id_przystanku)
{
    // zabezpieczenie przed SQL Injection
    $id_przystanku = mysqli_real_escape_string($conn, $id_przystanku);

    $sql = "DELETE FROM przystanki WHERE id_przystanku = $id_przystanku LIMIT 1";
    $result = mysqli_query($conn, $sql);
	
	// powrót do strony
	if ($result){
		header("Location: IO.php");
	} else{	// dodatkowa informacja
		echo 'coś poszło nie tak';
	}
}

// funkcja odpowiadająca za możliwość dodania nowego przystanku
function DodajPrzystanek($conn, $idt){
	
	$row = array('id_przystanku' => '-', 'rodzaj' => '', 'id_miejsca' => '', 'id_trasy' => $idt,  'notatki' => '');
	
	FormularzStrony_przystanku($row, $czynnosc="dodajprzystanek");
   
}

// funkcja odpowiadająca za możliwość edycji przystanku
function EdytujPrzystanek($conn, $id_przystanku)
{
	// pobranie danych strony do edycji
	$sql = "SELECT * FROM przystanki WHERE id_przystanku = $id_przystanku";
	
	// zapytanie do bazy danych
	$result = mysqli_query($conn, $sql);
	
	// jeśli istnieją wyniki
	if ($result && mysqli_num_rows($result) > 0) {

		// pobranie pojedyńczego wiersza
		$row = mysqli_fetch_assoc($result);
		
		FormularzStrony_przystanku($row, $czynnosc="edytujprzystanek");

	}
}

// funkcja odpowiadająca za wyświetlanie listy miejsc
function WypiszPrzystanek($index)
{
	// połączenie z serwerem
    $con = mysqli_connect('localhost', 'root', '', 'system_io');
    if(!$con)
    {	// co jeśli nie można się połączyć
        die("Connection failed!" . mysqli_connect_error());
    }
	// pobieranie danych
    $sql = "SELECT * FROM przystanki WHERE id_przystanku = '$index'";
    $result = mysqli_query($con, $sql);
	
		?> <!-- wyświetlanie danych w formie tabelki -->
		<table class="tabelka2">
		<?php // wyświetlanie wierszy z danymi elementami
		while ($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td class="wiersze2" ><?php echo $row["rodzaj"]; ?></td>
				<td rowspan='3'>
				<a class="edius" href="?action=EdytujPrzystanek&id_przystanku=<?php echo $row["id_przystanku"]; ?>">Edytuj</a>
				<a class="edius" href="?action=UsunPrzystanek&id_przystanku=<?php echo $row["id_przystanku"]; ?>" onclick="return confirm('Czy na pewno chcesz usunąć ten rekord?')">Usuń</a>	
				</td>

			</tr>
			<tr>
					<?php	
						$sqlm = "SELECT * FROM miejsca WHERE id_miejsca = " . $row['id_miejsca'];
						$resultm = mysqli_query($con, $sqlm);
						$rowm = mysqli_fetch_array($resultm);
					?>
				<td class="wiersze2" >
				 <?php echo $rowm["id_miejsca"] . ' - ' . $rowm["nazwa"] . ' ' . $rowm["państwo"] . ' ' . $rowm["miejscowość"] . ' ' . $rowm["ulica"] . ' ' . $rowm["nr_domu"]; ?>
				</td>
			</tr>
			<tr>
				<td class="opis"><textarea readonly style="width: 100%; height: 17px;"><?php echo $row["notatki"]; ?> </textarea></td>
			</tr>
			<?php
		}
		?>
		</table>	
		<?php

}






?>