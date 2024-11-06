<?php
if (!isset($_POST['submit_form'])) {
    echo "<div style='display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh;'>";
    echo "<link rel='stylesheet' type='text/css' href='style.css'>";
    echo "<h2>Adaugă un student</h2>";
?>
    <form method="POST" action="http://localhost/LAB6/adaugare_studenti.php" style="margin: 0 auto;">
        <table>
            <tr>
                <td>Marca:</td>
                <td><input type="text" name="marca_form"></td>
            </tr>
            <tr>
                <td>Nume:</td>
                <td><input type="text" name="nume_form"></td>
            </tr>
            <tr>
                <td>Prenume:</td>
                <td><input type="text" name="prenume_form"></td>
            </tr>
            <tr>
                <td>An studiu:</td>
                <td>
                    <select name="an_form">
                        <option value="1">An 1</option>
                        <option value="2">An 2</option>
                        <option value="3">An 3</option>
                        <option value="4">An 4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit_form" value="Add">
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>

    <!-- Butoane pentru navigare -->
    <div style="margin-top:20px;">
        <a href="afisare_studenti.php"><button>Vezi lista de studenți</button></a>
        <a href="adaugare_discipline.php"><button>Adaugă o disciplină</button></a>
        <a href="afisare_discipline.php"><button>Vezi lista de discipline</button></a>
    </div>

<?php
    echo "</div>";
} else {
    // Secvența care se execută după furnizarea parametrilor necesari inserării
    $con = mysqli_connect("127.0.0.1", "root", "", "facultate") or die("Nu se poate conecta la serverul MySQL");

    $marca = $_POST['marca_form'];
    $nume = $_POST['nume_form'];
    $prenume = $_POST['prenume_form'];
    $an = $_POST['an_form'];

    // Verificăm dacă datele din formular au fost primite corect
    echo "Marca: " . $marca . "<br>";
    echo "Nume: " . $nume . "<br>";
    echo "Prenume: " . $prenume . "<br>";
    echo "An studiu: " . $an . "<br>";

    // Se verifică dacă studentul care se dorește să se insereze nu există deja în baza de date
    $query = mysqli_query($con, "SELECT COUNT(*) FROM studenti_AC WHERE Marca='$marca'")
        or die("Eroare la verificare: " . mysqli_error($con));
    $row = mysqli_fetch_row($query);
    $nr = $row[0];

    if ($nr == 0) {
        // Adăugare cu parametri
        $query1 = mysqli_query($con, "INSERT INTO studenti_AC (Marca, Nume, Prenume, An_Studiu) VALUES ('$marca', '$nume', '$prenume', $an)")
            or die("Inserarea nu a putut avea loc! " . mysqli_error($con));
        echo "<center>Studentul a fost inserat cu succes!</center>";
    } else {
        echo "<center>Studentul respectiv există deja în baza de date!</center>";
    }

    mysqli_close($con);

    // Redirecționare către pagina de afișare a studenților
    header("Location: afisare_studenti.php");
    exit();
}
?>