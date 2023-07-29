<?php
$plainText = '';

function Cipher($ch, $key)
{
    if (!ctype_alpha($ch)) {
        return $ch;
    }

    $offset = ord(ctype_upper($ch) ? 'A' : 'a');
    return chr(fmod(ord($ch) + $key - $offset, 26) + $offset);
}

function Encipher($input, $key)
{
    $output = '';

    $inputArr = str_split($input);
    foreach ($inputArr as $ch) {
        $output .= Cipher($ch, $key);
    }

    return $output;
}

function Decipher($input, $key)
{
    return Encipher($input, 26 - $key);
}

if (isset($_POST['submit'])) {
    // Example
    $text = $_POST['cipherText'];
    $shiftNumber = $_POST['shiftNumber'];
    $cipherText = Encipher($text, 3);
    $plainText .= Decipher($text, $shiftNumber);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Crypto Class</title>
</head>
<body>
    <div class="container g-3 p-4">
        <img src="https://www.rrc.ca/wp-content/themes/rrc-parent/public/images/rrc-polytech-logo-colour.svg" class="mb-5">
        <h4 class="mb-5">RRC Decrypter <span>by: Oluwatosin</span></h4>
        <form class="row g-3 mt-5" method="POST" action="index.php">
            <div class="col-auto">
                <label for="staticEmail2" class="visually-hidden">Encrypted Word</label>
                <input type="text" class="form-control" id="staticEmail2" placeholder="Encrypted Word" name="cipherText">
            </div>
            <div class="col-auto">
            <label for="inputPassword2" class="visually-hidden">Shift Number</label>
            <input type="text" class="form-control" id="inputPassword2" placeholder="Shift number" name="shiftNumber">
            </div>
            <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3" name="submit">Decrypt</button>
            </div>
        </form>

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>
        <h1>
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                <span class="h5">Answer is: </span><br><hr><?php echo $plainText; ?>
            </div>
        </div>
        </h1>
        
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>