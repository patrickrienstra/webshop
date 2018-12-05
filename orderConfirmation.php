<?php
require_once 'inc/config.php';
require_once 'inc/package.inc.php';

$date=date('Y-m-d');
$chillerItems='';
$dryItems='';
$naw=$_SESSION['naw'];

// Check if customer record exists
$customercheck='SELECT CustomerID FROM webcustomer WHERE :Email AND :Fullname';
$stmt=$db->prepare($customercheck);
$stmt->bindValue(':Email', $_SESSION['Email']);
$stmt->bindValue(':Fullname', $_SESSION['Fullname']);

//Create new customer record
$newCustomer='INSERT INTO webcustomer (Fullname, Email, PhoneNumber, Address, City, ZipCode) VALUES (:name, :email, :phone, :address, :city, :zipcode)';
$stmtNC=$db->prepare($newCustomer);
$stmtNC->bindValue(':name', $naw['FullName']);
$stmtNC->bindValue(':email', $naw['Email']);
$stmtNC->bindValue(':phone', $naw['PhoneNumber']);
$stmtNC->bindValue(':address', $naw['Address']);
$stmtNC->bindValue(':zipcode', $naw['Zipcode']);
$stmtNC->bindValue(':city', $naw['City']);

//execution of $stmtNC and $customercheck
if(!isset($_SESSION['CustomerID']) && $stmt->execute()){
    $_SESSION['CustomerID']=array();
    if($stmt->rowCount() > 0){
        $_SESSION['CustomerID']=$stmt->fetch(PDO::FETCH_ASSOC);
    }elseif($stmt->rowCount()==0){
        if($stmtNC->execute() && $stmt->execute()){
            $_SESSION['CustomerID']=$stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
}

//query 1
$query1='INSERT INTO web_invoices (CustomerID, InvoiceDate, TotalChillerItems, TotalDryItems) VALUES (:customerid, :date, :chilleritems, :dryitems)';
$stmt1=$db->prepare($query1);
$stmt1->bindValue(':customerid', $_SESSION['CustomerID']);
$stmt1->bindValue(':date', $date);
$stmt1->bindValue(':chilleritems', $chillerItems);
$stmt1->bindValue(':dryitems', $dryItems);

//query2
$query2='SELECT max(InvoiceID) FROM web_invoices WHERE CustomerID=:customerid';
$stmt2=$db->prepare($query2);
$stmt2->bindValue(':customerid', $_SESSION['CustomerID']);

if($stmt1->execute()){
    if($stmt2->execute()){
        $row=$stmt2->fetch(PDO::FETCH_ASSOC);
        $invoiceID=$row['InvoiceID'];
    }
}

//cart
$query4="SELECT stockitemid, stockitemname, brand, unitprice, photo, taxrate FROM stockitems WHERE stockitemid = :id";
foreach ($_SESSION['cart'] as $product) {
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $product['id'], PDO::PARAM_INT);
    if ($stmt->execute()) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $row['amount']=$product['qty'];
        array_push($cart, $row);
    }
}


foreach($cart as $product) {
    //query 3
    $query3 = 'INSERT INTO web_invoicelines (InvoiceID, StockItemID, Quantity, TaxAmount, ExtendedPrice) VALUES (:invoiceid, :stockitemid, :quantity, :tax, :totalprice)';
    $stm3 = $db->prepare($query3);
    $stm3->bindValue(':invoiceid', $invoiceID);
    $stm3->bindValue(':stockitemid', $product['stockitemid']);
    $stm3->bindValue(':quantity', $product['amount']);
    $stm3->bindValue(':tax', (($product['TaxRate']/100)*$product['amount']*$product['UnitPrice']));
    $stm3->bindValue(':totalprice', (($product['TaxRate']/100+1)*$product['amount']*$product['UnitPrice']));
    $stm3->execute();
}
$view='views/orderConfirmation.php';
$sectionActive='betaling';

require_once 'template.php';