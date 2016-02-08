<!DOCTYPE html>
<html lang="en">
<head>
    <title>G4ME Guest Checkout</title>
</head>
<body>
<style>
    #form {
        align-content: center;
        height: 300px;
        width: 300px;
    }
    body {
        font: 'Roboto Slab', 'serif';
    }
</style>
<?php
try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=G4ME', 'root', 'root');

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


if(@$_POST['formSubmit'] == "Submit")
{
    $errorMessage = "";

    if(empty($_POST['fName']))
    {
        $errorMessage = "<li>You forgot to enter your first name.</li>";
    }
    if(empty($_POST['lName']))
    {
        $errorMessage = "<li>You forgot to enter your last name.</li>";
    }
    if(empty($_POST['address']))
    {
        $errorMessage = "<li>You forgot to enter your addresss</li>";
    }
    if(empty($_POST['city']))
    {
        $errorMessage = "<li>You forgot to enter your city</li>";
    }
    if(empty($_POST['state']))
    {
        $errorMessage = "<li>You forgot to enter your state</li>";
    }
    if(empty($_POST['paymetType']))
    {
        $errorMessage = "<li>You forgot to enter your payment type</li>";
    }
    if(empty($_POST['payment'])){
        $errorMessage = "<li>You forgot to enter your Debit/Credit Card information.</li>";
    }
//        $varfirstName = $_POST['fName'];
//        $varlastName = $_POST['lName'];
//        $varuserName = $_POST['user'];
//        $varpassword = $_POST['password'];
//        $varaddress = $_POST['address'];
//        $varcity = $_POST['city'];
//        $varstate = $_POST['state'];
//        $varzip = $_POST['zip'];
//        $varapt = $_POST['apt'];


    $stmt = $dbh->prepare("INSERT INTO users (firstName, lastName, email, address, city, state, apt, payType, payment) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $result = $stmt->execute(array($_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['apt'], $_POST['paymetType'], $_POST['payment']));

    if(!$result){
        print_r($stmt->errorInfo());
    }

    if(!empty($errorMessage))
    {
        echo("<p>There was an error with your form:</p>");
        echo("<ul>" . $errorMessage . "</ul>\n");
    }

}

?>
<div id="form">
<form id="info" action="guestCheckout.php" method="post">
    <input type="text"  name="fName" maxlength="45" placeholder="First Name"><br>
    <input type="text"  name="lName" maxlength="45" placeholder="Last Name"><br>
    <input type="email" name="email" maxlength="45" placeholder="example@aol.com"><br>
    <input type="text" name="address" maxlength="255" placeholder="Address"><br>
    Country:<select>
        <option>United States</option>
        <option>United Kingdom</option>
    </select><br>
    State:<select>
        <option value=""></option>
        <option>AL</option>
        <option>Ak</option>
        <option>AZ</option>
        <option>AR</option>
        <option>CA</option>
        <option>CO</option>
        <option>CT</option>
        <option>DE</option>
        <option>FL</option>
        <option>GA</option>
        <option>HI</option>
        <option>ID</option>
        <option>IL</option>
        <option>IN</option>
        <option>IA</option>
        <option>KS</option>
        <option>KY</option>
        <option>LA</option>
        <option>ME</option>
        <option>MD</option>
        <option>MA</option>
        <option>MI</option>
        <option>MN</option>
        <option>MS</option>
        <option>MO</option>
        <option>MT</option>
        <option>NE</option>
        <option>NV</option>
        <option>NH</option>
        <option>NJ</option>
        <option>NM</option>
        <option>NY</option>
        <option>NC</option>
        <option>ND</option>
        <option>OH</option>
        <option>OK</option>
        <option>OR</option>
        <option>PA</option>
        <option>RI</option>
        <option>SC</option>
        <option>SD</option>
        <option>TN</option>
        <option>TX</option>
        <option>UT</option>
        <option>VT</option>
        <option>VA</option>
        <option>WA</option>
        <option>WV</option>
        <option>WI</option>
        <option>WY</option>
    </select><br>
    <input type="text" name="city" maxlength="255" placeholder="City"><br>
    <input type="number" name="apt" maxlength="10" placeholder="Apt. #"><br>
    Card Type:<select  id="paymentType" form="info" action="guestCheckout.php">
        <option value="" selected></option>
        <option value="Visa">Visa</option>
        <option value="Master Card">Master Card</option>
        <option value="American Express">American Express</option>
        <option value="Discover">Discover</option>
    </select><br>
    Credit Card:<input type="number" name="payment" maxlength="16" placeholder="xxxx-xxxx-xxxx-xxxx"><br>
    Security Code:<input type="number" name="code" maxlength="4" placeholder="xxx">
    <button type="submit" name="formSubmit" value="Submit">Submit</button>

</form>
</div>
</body>
</html>