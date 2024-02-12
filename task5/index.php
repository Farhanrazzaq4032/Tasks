<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task 05</title>
    <style>
        table{
            border-collapse: collapse;
            font-size: 30px;
        }
        table, th, td{
            border: 2px solid black;
            padding: 10px;
        }
        div{
            margin-top: 40px;
            font-size: 30px;
        }
    </style>
</head>
<body>
    <?php 
    $student = array(
        "Farhan"=>[
            "math"=>10,
            "urdu"=>20,
            "eng"=>30
        ],
        "Usman"=>[
            "math"=>10,
            "urdu"=>20,
            "eng"=>30
        ],
        "Umair"=>[
            "math"=>10,
            "urdu"=>30,
            "eng"=>30
        ],
        "numan"=>[
            "math"=>21,
            "urdu"=>32,
            "eng"=>74
        ],
        "zeeshan"=>[
            "math"=>76,
            "urdu"=>45,
            "eng"=>54
        ],
        "kamran"=>[
            "math"=>34,
            "urdu"=>67,
            "eng"=>40
        ],
        "ali"=>[
            "math"=>93,
            "urdu"=>80,
            "eng"=>60
        ]
        );
        $shopping = array(
            "Fazeel"=>[
                "address"=>"Khanewal",
                "items" =>[
                       ["product"=>"cloth", "quantity"=>1, "price"=>600],
                       ["product"=>"perfume", "quantity"=>2, "price"=>350],
                       ["product"=>"shoe", "quantity"=>5, "price"=>200],
                       ["product"=>"books", "quantity"=>1, "price"=>100]
                ],
                //discont and gst change dynamically change to add this array 
                "discont" =>20,
                "gst" =>17
            ],
            "Farhan"=>[
                "address"=>"Khanewal",
                "items" =>[
                       ["product"=>"cloth", "quantity"=>1, "price"=>60],
                       ["product"=>"perfume", "quantity"=>4, "price"=>50],
                       ["product"=>"shoe", "quantity"=>3, "price"=>220],
                       ["product"=>"books", "quantity"=>4, "price"=>134]
                ],
                //discont and gst change dynamically change to add this array 
                "discont" =>50,
                "gst" =>10
                ]
            
        );


        //student total marks and avg finder coding (student)
        function calculate($math, $urdu, $eng, $op = "+"){
            if($op == "+"){
                $total = $math+$urdu+$eng;
            }
            elseif($op == "/"){
                $totalnbr = $math+$urdu+$eng;
                $total = $totalnbr*100/500;
            }
            return $total;
        }

        //coustomer total price and discount and total price (customer invoice)
        function cicp($quantity, $price){
            $totalPrice = $quantity * $price;
            return $totalPrice;
        }
        function cic($subtotal, $op = ""){
            if($op == "discont"){
                $discont = $subtotal*20/100;
                $total = $discont;
            }
            elseif($op == "gst"){
                $gst = $subtotal*17/100;
                $total = $gst;
            }
            elseif($op == "total"){
                $discont = $subtotal*20/100;
                $gst = $subtotal*17/100;
                $total = $subtotal - $discont + $gst;

            }
            return $total;
        }
        //an othe method

        function fdiscont($subtotal, $discont){
            $discont = $subtotal * $discont/100;
            return $discont;
        }
        function fgst($subtotal, $gst){
            $gst = $subtotal * $gst/100;
            return $gst;
        }
        function ffp($subtotal, $discont, $gst){
            $discont = $subtotal * $discont/100;
            $gst = $subtotal * $gst/100;
            $finalprice = $subtotal - $discont + $gst;
            return $finalprice;
        }



        //this table for student
        echo"<h1>Student Table</h1>
        <table style='border:4px solid black; padding: 10px'>
        <tr>
            <th>Student</th>
            <th>Math</th>
            <th>Urdu</th>
            <th>Eng</th>
            <th>obtain Marks</th>
            <th>Total Marks</th>
            <th>Avg</th>
    </tr>";
        
        foreach($student as $name => $subjects){
        

        // $total = $subjects["math"]+$subjects["urdu"]+$subjects["eng"];
        // echo $total;
        // echo totals($subjects["math"], $subjects["urdu"], $subjects["eng"]);
        echo "
        <tr>
        <th>$name</th>
        <td>".$subjects["math"]."</td>
        <td>".$subjects["urdu"]."</td>
        <td>".$subjects["eng"]."</td>
        <td>".calculate($subjects["math"], $subjects["urdu"], $subjects["eng"], "+")."</td>
        <td>500</td>
        <td>".calculate($subjects["math"], $subjects["urdu"], $subjects["eng"], "/")."%</td>
    </tr>";
   
}
    //this tabel for customer invoice 
   echo "</table>";

   foreach($shopping as $cusname => $product){


    // $productdata = $cusname["fazeel"]["cloth"]["quantity"];
    // echo $productdata;
    echo"
    <div>
    <table>
        <tr>
            <th>Name</th>
            <td colspan='3'>$cusname</td>
        </tr>
        <tr>
            <th>address</th>
            <td colspan='3'>".$product["address"]."</th>
        </tr>
        <tr>
            <th>Products</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
   ";
   
        $subtotal = 0;
        foreach($product["items"] as $item){
        $total = $item["quantity"] * $item["price"];
        $subtotal += $total; 
        $discont = $product["discont"];
        $gst = $product["gst"];

   echo "
   <tr>
   <th>".$item["product"]."</th>
   <td>".$item["quantity"]."</td>
   <td>".$item["price"]."</td>
   <td>$total</td>
   </tr>
   ";
        }
        // thsi is used for first function
//        echo"
//         <tr>
//             <th colspan='2'></th>
//             <th>price</th>
//             <th>$subtotal</th>
//         </tr>
//         <tr>
//             <th colspan='2'></th>
//             <th>discount 20%</th>
//             <th>".cic($subtotal, "discont")."</th>
//         </tr>
//         <tr>
//             <th colspan='2'></th>
//             <th>GST 17%</th>
//             <th>".cic($subtotal, "gst")."</th>
//         </tr>
//         <tr>
//             <th colspan='2'></th>
//             <th>final price</th>
//             <th>".cic($subtotal, "total")."</th>
//         </tr>
//     </table>
//     </div>
// ";
//this is use for 2nd function
       echo"
        <tr>
            <th colspan='2'></th>
            <th>price</th>
            <th>$subtotal</th>
        </tr>
        <tr>
            <th colspan='2'></th>
            <th>Discount $discont %</th>
            <th style='background-color:red;'>".fdiscont($subtotal, $discont,)."</th>
        </tr>
        <tr>
            <th colspan='2'></th>
            <th>GST $gst %</th>
            <th>".fgst($subtotal, $gst)."</th>
        </tr>
        <tr>
            <th colspan='2'></th>
            <th>Final Price</th>
            <th style='background-color:green'>".ffp($subtotal, $discont, $gst)."</th>
        </tr>
    </table>
    </div>
";

print_r($shopping);
}
    ?>
</body>
</html>