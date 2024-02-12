<?php
$invoiceData = array(
    "Customer" => "John Doe",
    "Address" => "123 Main St, Cityville",
    "Invoice Date" => "2023-01-01",
    "Due Date" => "2023-01-15",
    "Items" => array(
        array("Item" => "Product A", "Quantity" => 2, "Price" => 20),
        array("Item" => "Product B", "Quantity" => 1, "Price" => 15),
        array("Item" => "Product C", "Quantity" => 3, "Price" => 25)
    ),
    "Discount" => 20, // Discount percentage
    "GST" => 17 // GST percentage
);
foreach ($invoiceData['Items'] as $item) {
    $total = $item['Quantity'] * $item['Price'];
    $subTotal += $total;
    $discountAmount = ($subTotal * $invoiceData['Discount']) / 100;
$gstAmount = ($subTotal * $invoiceData['GST']) / 100;

// Calculate gross total
$grossTotal = $subTotal - $discountAmount + $gstAmount;
}
echo $total;
echo $subTotal;

// Display customer information
echo "<h2>Customer Invoice</h2>";
echo "<p><strong>Customer:</strong> {$invoiceData['Customer']}</p>";
echo "<p><strong>Address:</strong> {$invoiceData['Address']}</p>";
echo "<p><strong>Invoice Date:</strong> {$invoiceData['Invoice Date']}</p>";
echo "<p><strong>Due Date:</strong> {$invoiceData['Due Date']}</p>";
?>