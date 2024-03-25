<?php
// Function to capitalize the first letter of each word of a string
function capitalizeFirstLetter($str) {
    return ucwords($str);
}

// Function to determine odd and even of a number
function checkOddEven($num) {
    if (!is_numeric($num)) {
        return "Invalid input!";
    }

    if ($num % 2 === 0) {
        return "Even!";
    } else {
        return "Odd!";
    }
}

// Function to identify numbers in a string and remove them
function removeNumbers($str) {
    return preg_replace('/[0-9]+/', '', $str);
}

// Inisialisasi variabel untuk menampung input
$inputString = '';
$inputNumber = '';

// Pengecekan apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai input dari form
    $inputString = $_POST['input_string'];
    $inputNumber = $_POST['input_number'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Functions</title>
</head>
<body>
    <h2>Task Functions</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="input_string">Enter a string:</label>
        <input type="text" id="input_string" name="input_string" value="<?php echo $inputString; ?>"><br><br>
        
        <label for="input_number">Enter a number:</label>
        <input type="number" id="input_number" name="input_number" value="<?php echo $inputNumber; ?>"><br><br>
        
        <button type="submit">Submit</button>
    </form>

    <hr>

    <h3>Results:</h3>
    <?php
    // Menampilkan hasil fungsi-fungsi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<p>A. Capitalize First Letter: " . capitalizeFirstLetter($inputString) . "</p>";
        echo "<p>B. Check Odd or Even: " . checkOddEven($inputNumber) . "</p>";
        echo "<p>C. Remove Numbers: " . removeNumbers($inputString) . "</p>";
    }
    ?>
</body>
</html>
