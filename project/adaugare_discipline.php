<?php
if (!isset($_POST['submit_form'])) {
    echo "<div style='display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh;'>";
    echo "<link rel='stylesheet' type='text/css' href='style.css'>";
    echo "<h2>Adaugă o disciplină</h2>";
?>
    <form method="POST" action="http://localhost/LAB6/adaugare_discipline.php" style="margin: 0 auto;">
        <table>
            <tr>
                <td>Cod Disciplina:</td>
                <td><input type="text" name="cod_disciplina"></td>
            </tr>
            <tr>
                <td>Disciplina:</td>
                <td><input type="text" name="nume_disciplina"></td>
            </tr>
            <tr>
                <td>An studiu:</td>
                <td>
                    <select name="an_studiu">
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
        <a href="afisare_discipline.php"><button>Vezi lista de discipline</button></a>
        <a href="adaugare_studenti.php"><button>Adaugă un student</button></a>
        <a href="afisare_studenti.php"><button>Vezi lista de studenți</button></a>
    </div>

<?php
    echo "</div>";
} else {
    // Secvența care se execută după furnizarea parametrilor necesari inserării
    $con = mysqli_connect("127.0.0.1", "root", "", "facultate") or die("Nu se poate conecta la serverul MySQL");

    $cod_disciplina = $_POST['cod_disciplina'];
    $nume_disciplina = $_POST['nume_disciplina'];
    $an_studiu = $_POST['an_studiu'];

    // Verificăm dacă datele din formular au fost primite corect
    echo "Cod Disciplina: " . $cod_disciplina . "<br>";
    echo "Disciplina: " . $nume_disciplina . "<br>";
    echo "An studiu: " . $an_studiu . "<br>";

    // Se verifică dacă disciplina nu există deja în baza de date
    $query = mysqli_query($con, "SELECT COUNT(*) FROM discipline WHERE codDisciplina='$cod_disciplina'")
        or die("Eroare la verificare: " . mysqli_error($con));
    $row = mysqli_fetch_row($query);
    $nr = $row[0];

    if ($nr == 0) {
        // Adăugare cu parametri
        $query1 = mysqli_query($con, "INSERT INTO discipline (codDisciplina, Disciplina, An_Studiu) VALUES ('$cod_disciplina', '$nume_disciplina', $an_studiu)")
            or die("Inserarea nu a putut avea loc! " . mysqli_error($con));
        echo "<center>Disciplina a fost inserată cu succes!</center>";
    } else {
        echo "<center>Disciplina respectivă există deja în baza de date!</center>";
    }

    mysqli_close($con);

    // Redirecționare către pagina de afișare a disciplinelor
    header("Location: afisare_discipline.php");
    exit();
}
?>