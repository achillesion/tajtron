<?php

include 'controllers/connect.php';
?>

<!doctype html>
<html>
<head>

    <meta charset="utf-8">

    <title></title>


    <meta http-equiv="cache-control" content="max-age=0"/>

    <meta http-equiv="cache-control" content="no-cache"/>

    <meta http-equiv="expires" content="0"/>

    <meta http-equiv="pragma" content="no-cache"/>

    <link rel="shortcut icon" href="images/icon.png"/>


    <!--Stylesheet for Add Invoice Module-->
    <link rel="stylesheet" href="assets/css/styleAddInvoice.css">


    <style type="text/css" media="all">

    </style>

</head>


<body>

<body>


<div class="invoice">
    <div>
        <div style="width:100%;">
            <img class="img-responsive" style="margin-top: 0px; width: 100%;height: 100px; background-size: contain; "
                 src="assets/images/invoice-layout-naveed.jpg">
        </div>

        <div class="clearfix"></div>
    </div>
<hr><br>
    <!--    Sr no | Tax Invoice | Date-->
    <div class="second">
        <div class="second left" style="float: left">
		<span style="font-size: 20px;"><?php $id = $_GET['sr'];  echo "Sr # ".$id;?></span>
        </div>
        
        <!-- Cash Debit-->
        <div class="second center" style="float: left" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <input  type="checkbox"> <strong>Cash</strong></input>
        <input type="checkbox"> <strong>Debit</strong></input>

        </div>
        <div class="second right" style="float: right">
        <span style="font-size: 20px;">
	<?php  echo 'Date:       '. date('Y-m-d') ."\n";?>
</div>
        </div>
        <div class="clearfix"></div>
    </div>
<hr><br>
   
    <?php

    $id = $_GET['sr'];
    
    $sql = "SELECT * FROM invoices WHERE id='$id'";

    if ($result = mysqli_query($con, $sql))
    {

    // Fetch one and one row
    while ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $code = $row['code'];
    $billdate = $row['date'];
    $name = $row['name'];
    $lpo = $row['lpo'];
    $lpodate = $row['lpo_date'];
    $do = $row['do'];
    $dodate = $row['do_date'];
    ?>
    <div class="logo">
        <div class="logo-left">
            <p>Mr. M/s &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;السيد / السادة </p>
            <?php echo $name; ?>
            <p>...............................................<br><br>...............................................</p>
        </div>
        <div class="logo-right">
        <br>
            Party A/C Code :<?php echo $code; ?>
                    <br><br>
                <strong>L.P.O. No.</strong> رقم طلب شراء &nbsp;&nbsp;&nbsp;
                        <?php echo $lpo; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    

                    <strong>Date</strong> التاريخ &nbsp;&nbsp;&nbsp;<?php echo $lpodate; ?>
                    <br><br>
                        <strong>D.O. No.</strong> اذن تسليم رقم &nbsp;&nbsp;&nbsp; <?php echo $do; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                   <strong>Date</strong> االتاريخ &nbsp;&nbsp;&nbsp;<?php echo $dodate;
                        }
                        } ?> 

              
           
        </div>
        <div class="clearfix"></div>
    </div>
    <table border="1" style="border-collapse:collapse;width:100%;border-radius:5px;">
        <tbody>
        <tr align="center">
            <td rowspan="2" style="width: 20px;">رقم الصنف <br>
                Item No
            </td>
            <td rowspan="2"> Description الـتـفـاصـيــــــل</td>
            <td rowspan="2">Quantity الكمية</td>
            <td colspan="2">سعر الوحدة <br>
                Unit Price
            </td>

            <td colspan="2">المبلغ الإجمالي <br>
                Total Amount
            </td>
        </tr>
        <tr align="center">
            <td>درهم.<br>
                Dhs.
            </td>
            <td>فلس <br>
                Fils
            </td>
            <td>درهم. <br>
                Dhs.
            </td>
            <td>فلس <br>
                Fils
            </td>
        </tr>
        <?php

        $id = $_GET['sr'];
        $sql = "SELECT * FROM items WHERE id='$id'";

        if ($result = mysqli_query($con, $sql)) {
            $count = 1;
            $total = 0;
            // Fetch one and one row
            while ($row = mysqli_fetch_array($result)) {
                $cost = number_format($row['cost'], 2, '.', '');
                $cost_arr = explode('.', $cost);
                $row_total = number_format($row['quantity'] * $row['cost'], 2, '.', '');
                $row_total_arr = explode('.', $row_total);
                $total = $total + $row_total;
                ?>
                <tr align="center">
                    <td><?= $count; ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td><?= $cost_arr[0] ?></td>
                    <td><?= $cost_arr[1] ?></td>
                    <td><?= $row_total_arr[0] ?></td>
                    <td><?= $row_total_arr[1] ?></td>

                </tr>
                <?php $count++;
            }
        } ?>
        <tr align="center" style="height:20px;">
                    <td ></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

       </tr>
        <tr align="center" style="height:20px;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

       </tr>
        <tr align="center" style="height:20px;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

       </tr>
        <tr align="center" style="height:20px;">
        <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

       </tr>

        <!--Subtotal 5 rows |amount|fils-->
        <tr>
            <td colspan="5">Sub Total</td>
            <td align="center">
                <?php
                $total= number_format($total, 2, '.', '');
                $total_arr = explode('.', $total); ?>
                <?= $total_arr[0] ?>
            </td>
            <td align="center"><?= $total_arr[1] ?></td>
        </tr>

        <!--VAT|Dhr|Fils-->
        <tr>
            <td colspan="5">VAT</td>
            <td align="center">
                <?php $vat = number_format($total * 0.05, 2, '.', '');
                $total = number_format($total + $vat, 2, '.', '');
                $vat_arr = explode('.', $vat);
                $total_arr = explode('.', $total);
                echo $vat_arr[0];
                ?>
            </td>
            <td align="center"><?= $vat_arr[1]; ?></td>
        </tr>
        <tr>
            <td colspan="5">Net Amount</td>
            <td align="center">
                <?= $total_arr[0] ?>
            </td>
            <td align="center"><?= $total_arr[1] ?></td>
        </tr>
        </tbody>
    </table>
    <div>
    
    <div class="last">
    <br><br><br>
    <div class="" style="margin-left: 100px;"></div>
    
        <div class="second left" style="float: left">
		Reciever's Sign توقيع المستلم 
		<hr>
        </div>
        <div class="second left" style="float: right">
		For Almujahid Press
        </div>
    </div>
        