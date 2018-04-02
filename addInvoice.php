<?php
include 'inc/header.php';
include 'inc/sidebar.php';
require 'controllers/connect.php';

// php script for showing current date

date_default_timezone_set('Asia/Dubai');
$test = new DateTime();
$d = date_format($test, 'd-m-Y ');
//echo date_format($test, 'Y-m-d ');
$t = date_format($test, 'h:i a');


?>

<body onload="">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker();
    });
</script>

<div id="wrapper">
    <div id="page-wrapper">
        <div id="page-inner">
            <form action="controllers/addInvoice.php" onsubmit="ValidateForm()" method="post">
                <div class="row">

                    <div class="col-md-12">
                        <!-- Customer Name -->
                        <div class="form-group">
                            <label for="name">Customer Name</label>
                            <input type="name" class="form-control" name="name" required>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <!-- Party Account Code -->
                        <div class="form-group">
                            <label for="name">Party Account Code</label>
                            <input type="name" class="form-control" name="code" required>
                        </div>

                        <!-- Date -->
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="name" class="form-control datepicker" name="date"
                                   placeholder="<?php echo $d; ?>">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <!-- LPO -->
                        <div class="form-group">
                            <label for="lpo">LPO</label>
                            <input type="name" class="form-control" name="lpo">
                        </div>
                        <!-- DO -->
                        <div class="form-group">
                            <label for="do">Do</label>
                            <input type="name" class="form-control" name="do">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <!-- LPO -->
                        <div class="form-group">
                            <label for="lpodate">Date</label>
                            <input type="name" class="form-control datepicker" name="lpodate"
                                   placeholder="<?php echo $d; ?>">
                        </div>
                        <!-- DO -->
                        <div class="form-group">
                            <label for="dodate">Date</label>
                            <input type="name" class="form-control datepicker" name="dodate"
                                   placeholder="<?php echo $d; ?>">
                        </div>
                    </div>

                    <!-- Conetnts Table-->
                    <div class="col-md-12">
                        <table id="myTable" border="1" style="border-collapse:collapse;width:100%;border-radius:5px;">
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

                            <tr align="center">

                                <td>1</td>
                                <td class="description"><textarea placeholder="Description"
                                                                  name="item_name[]"></textarea>
                                </td>
                                <td><textarea onchange="costCalculation(2)" id="qty" class="qty" placeholder="Quantity"
                                              name="item_quantity[]"></textarea></td>
                                <td><textarea onchange="costCalculation(2)" id="cos" class="cost" placeholder="Cost"
                                              name="item_cost[]"></textarea></td>

                                <td><textarea onchange="costCalculation(2)" id="ufils" placeholder="Cost"
                                              name="CostFils[]"></textarea></td>
                                <td><span id="Totdhs" class="price">0</span></td>
                                <td><span id="Totfils" class="price">0</span></td>


                            </tr>

                            <tr>
                                <td colspan="5">Sub Total</td>
                                <td id="subtotdhs" align="center">

                                </td>
                                <td id="subtotfils" align
                                "="center"></td>
                            </tr>


                            <tr>
                                <td colspan="5">VAT</td>
                                <td id="vatdhs" align="center">

                                </td>
                                <td id="vatfills" align="center"></td>
                            </tr>
                            <tr>
                                <td colspan="5">Net Amount</td>
                                <td id="netdhs" align="center">

                                </td>
                                <td id="netfils" align="center"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>


                    <!--<div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <table id="items">

                                <tr>
                                    <th>items</th>
                                    <th>Description</th>
                                    <th>Unit Cost(د.إ)</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>

                                <tr class="item-row">
                                    <td>1</td>
                                    <td class="description"><textarea placeholder="Description"
                                                                      name="description[]"></textarea></td>
                                    <td><textarea id="cost" class="cost" placeholder="Cost" name="cost[]"></textarea></td>
                                    <td><textarea id="qty" class="qty" placeholder="Quantity" name="qty[]"></textarea></td>
                                    <td><span id price class="price">0</span></td>
                                </tr>


                                <tr id="hiderow">
                                    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="blank"></td>
                                    <td colspan="2"id="Subtotals" class="total-line">Subtotal</td>
                                    <td class="total-value">
                                        <div id="subtotal"></div>
                                    </td>
                                </tr>
                                <tr>

                                    <td colspan="2" class="blank"></td>
                                    <td colspan="2" class="total-line">Total</td>
                                    <td class="total-value">
                                        <div id="total"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="blank"></td>
                                    <td colspan="2" class="total-line">Amount Paid</td>

                                    <td class="total-value"><textarea id="paid" name="totalpaid"
                                                                      placeholder="د.إ"></textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="blank"></td>
                                    <td colspan="2" class="total-line balance">Balance Due</td>
                                    <td class="total-value balance">
                                        <div class="due"></div>
                                    </td>
                                </tr>

                            </table>

                        </div>
                        <div class="col-md-1"></div>
                    </div>
    -->
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-4"><br>
                            <button type="button" class=" btn btn-success btn-md" onclick="onLoad()"
                                    style="font-size: 20px; height: 40px">Add
                            </button>
                        </div>
                        <div class="col-md-4"><br>
                            <input type="button" onclick="myDeleteFunction()" class=" btn btn-danger btn-md"
                                   name="submit"
                                   value="Delete Row"
                                   style="font-size: 20px" style="height: 70px"/></div>
                        <div class="col-md-4"><br>
                            <input type="submit" class=" btn btn-info btn-lg" name="submit" value="Save & Submitt"
                                   style="font-size: 20px" style="height: 70px"/></div>
                    </div>
            </form>
            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
</body>

<script>


    var index = 3;
    var table = document.getElementById("myTable");
    console.log(table.rows.length);
    var count = 0;

    function onLoad() {


        var row = table.insertRow(index);
        row.align = "center";
        var Cell1 = row.insertCell(0);
        Cell1.innerHTML = index - 1;
        var Cell2 = row.insertCell(1);
        Cell2.innerHTML = "<textarea  placeholder='Description' name='item_name[]'></textarea>";
        var Cell3 = row.insertCell(2);
        Cell3.innerHTML = "<textarea  onchange='costCalculation(this.parentNode.parentNode.rowIndex)' placeholder='Quantity' name='item_quantity[]'></textarea>";
        var Cell4 = row.insertCell(3);
        Cell4.innerHTML = "<textarea onchange='costCalculation(this.parentNode.parentNode.rowIndex)' id='costRep' placeholder='Cost' name='item_cost[]'></textarea>";
        // Cell4.innerHTML="4";
        var Cell5 = row.insertCell(4);
        Cell5.innerHTML = "<textarea onchange='costCalculation(this.parentNode.parentNode.rowIndex)' placeholder='Cost' name='CostFils[]'></textarea>";
        var Cell6 = row.insertCell(5);
        Cell6.innerHTML = "0";
        var Cell7 = row.insertCell(6);
        Cell7.innerHTML = "0";

        index++;
        // Cell1.innerhtml = temp;
    }

    function myDeleteFunction() {

        if (index > 2) {
            document.getElementById("myTable").deleteRow(index - 1);
            index--;
            subTotal();
        }
    }


    function costCalculation(rowNumber) {

        console.log("row no is" + rowNumber + "and index is" + index);
        //yeh do lines edit hon gi
        var reqCell = table.rows[rowNumber].cells[3].valueOf();
        var costOne = reqCell.querySelector('textarea').value;

        var reqSecCell = table.rows[rowNumber].cells[4].valueOf();
        var costTwo = "0." + reqSecCell.querySelector('textarea').value;
        var totalCost = Number(costOne) + Number(costTwo);
        console.log("row No is" + (rowNumber));
        console.log("total cost is" + totalCost);
        //-------


        var qunatityCell = table.rows[rowNumber].cells[2].valueOf();
        var quantityNo = qunatityCell.querySelector('textarea').value;

        //Yeh Fils wala portion ha jisy as a total ham ne deal kia ha
        /*
         * var fils=Number(table.rows[rowNumber-1].cells[2].)
         *
         * */
        //table.rows[rowNumber-1].cells[4].innerHTML=totalCost*quantityNo;

        var str = (totalCost * quantityNo).toFixed(2).toString();
        var numarray = str.split('.');

        if (numarray[1] == null) {

            numarray[1] = 0;
        }
        table.rows[rowNumber].cells[5].innerHTML = numarray[0];
        table.rows[rowNumber].cells[6].innerHTML = numarray[1];

        subTotal();
    }

    function subTotal() {

        var rowLength = table.rows.length;
        console.log(rowLength);
        var i;

        for (i = 2; i < rowLength - 3; i++) {

            var costOne = table.rows[i].cells[5].innerHTML;
            var costTwo = "0." + table.rows[i].cells[6].innerHTML

            count += Number(costOne) + Number(costTwo);

        }


        var VAT = (count * 0.05).toFixed(2);
        console.log(VAT);
        var str = (count.toFixed(2)).toString();
        var str2 = VAT.toString();

        var numarray = str.split('.');
        var numarray2 = str2.split('.');

        if (numarray[1] == null) {

            numarray[1] = "0";
        }
        if (numarray2[1] == null) {

            numarray2[1] = "0";
        }


        table.rows[rowLength - 3].cells[1].innerHTML = numarray[0];
        table.rows[rowLength - 3].cells[2].innerHTML = numarray[1];
        table.rows[rowLength - 2].cells[1].innerHTML = numarray2[0];
        table.rows[rowLength - 2].cells[2].innerHTML = numarray2[1]
        table.rows[rowLength - 1].cells[1].innerHTML = Number(numarray[0]) + Number(numarray2[0]);
        table.rows[rowLength - 1].cells[2].innerHTML = Number(numarray[1]) + Number(numarray2[1]);
        count = 0;

    }

    function validateForm() {
        var x = document.forms["myForm"]["fname"].value;
        if (x == "") {
            alert("Name must be filled out");
            return false;
        }
    }

</script>


<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/onScreen.js"></script>
<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- Morris Chart Js -->
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<!--<script src="assets/js/morris/morris.js"></script>-->
<!--<!-- Custom Js -->-->
<!--<script src="assets/js/custom-scripts.js"></script>-->

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $(".datepicker").datepicker();
    });
</script>
