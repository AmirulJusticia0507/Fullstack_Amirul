<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Card Info</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Check Card Info</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="card_number">Enter 8 digits of a card number:</label>
                                <input type="text" class="form-control" name="card_number" id="card_number" maxlength="8" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Check</button>
                        </form>
                        <?php
                        // Function to call the BINLIST API and retrieve information
                        function getCardInfo($bin) {
                            $url = 'https://lookup.binlist.net/' . $bin;
                            $ch = curl_init($url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $response = curl_exec($ch);
                            curl_close($ch);
                            return $response;
                        }

                        // Function to write the result to a log file
                        function writeToLogFile($data) {
                            $logFile = 'card_info.log';
                            $handle = fopen($logFile, 'a');
                            fwrite($handle, $data);
                            fclose($handle);
                        }

                        // Check if form is submitted
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Get the card number from the form
                            $cardNumber = $_POST['card_number'];

                            // Check if card number is exactly 8 digits
                            if (strlen($cardNumber) == 8 && is_numeric($cardNumber)) {
                                // Call the BINLIST API
                                $cardInfo = getCardInfo($cardNumber);
                                
                                // Write the result to a log file
                                writeToLogFile($cardInfo);
                                
                                // Display the result on the web page
                                echo '<div class="mt-3">' . $cardInfo . '</div>';
                            } else {
                                echo '<div class="alert alert-danger mt-3">Invalid card number. Please enter exactly 8 digits.</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
