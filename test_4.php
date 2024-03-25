<?php
function findMissing($list) {
    $n = count($list);
    
    // Calculate the common difference
    $common_diff = ($list[$n - 1] - $list[0]) / $n;
    
    // Iterate through the series to find the missing term
    for ($i = 0; $i < $n - 1; $i++) {
        $expected_term = $list[0] + $i * $common_diff;
        if ($list[$i] + $common_diff != $list[$i + 1]) {
            return $expected_term + $common_diff;
        }
    }
    
    // If no missing term found
    return null;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input list from form
    $inputList = $_POST['input_list'];
    
    // Convert input string to array
    $list = explode(",", $inputList);
    $list = array_map('intval', $list); // Convert strings to integers
    
    // Find missing term
    $missingTerm = findMissing($list);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Missing Term</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5 mb-4">Find Missing Term</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="input_list">Enter comma-separated list of numbers:</label>
                <input type="text" class="form-control" id="input_list" name="input_list" required>
            </div>
            <button type="submit" class="btn btn-primary">Find Missing Term</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <?php if ($missingTerm !== null): ?>
                <div class="mt-4">
                    <h4>Missing term in <?php echo htmlspecialchars($_POST['input_list']); ?>:</h4>
                    <p><?php echo $missingTerm; ?></p>
                </div>
            <?php else: ?>
                <div class="mt-4">
                    <p>No missing term found.</p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
