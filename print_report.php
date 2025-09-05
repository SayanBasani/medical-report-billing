<?php
session_start();
include 'report.php';

$invoice = new report();
$invoice->checkLoggedIn();

if (empty($_GET['report_id'])) {
    echo "<h1>There is some Problem! </h1>";
    die;
}

$reportItems = $invoice->getreportItems($_GET['report_id']);
$reportValues = $invoice->getreport($_GET['report_id']);
$invoiceDate = $currentDate = date('m/d/Y');

$reportFileName = 'report-' . $reportValues['clientName'] . '.pdf';
?>
<html>

<head>
    <meta charset="UTF-8">
    <!-- <style>
        .a{border: 1px solid black ;}
        body {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 18px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        @page {
            size: A4 portrait;
            margin: 20px;
        }
        @media print {
            .footer-common {
                /* position: fixed;
                bottom: 0;
                left: 0;
                right: 0; */
                text-align: center;
                font-size: 20px;
                font-weight: bold;
                padding: 8px 15px;
                background-color: rgb(45, 162, 191) !important;
                color: white;
                /* border-top: 1px solid #000; */
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .bodyelement {
                margin-bottom: 70px;
                /* border: 1px solid red; */
            }

            body {
                position: relative;
            }

            .footer-common {
                position: running(footer);
                border-radius: 7px;
            }

            /* Tell browser to print footer on each page */
            @page {
                @bottom-center {
                    content: element(footer);
                }
            }
        }
        .footer-common {
                position: running(footer);
                border-radius: 7px;
                text-align: center;
                font-size: 20px;
                font-weight: bold;
                padding: 8px 15px;
                background-color: rgb(45, 162, 191) !important;
                color: white;
                /* border-top: 1px solid #000; */
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }


        .contact-info div {
            /* margin-top: 45px; */
            font-size: 14px;
            color: #20247b;
            line-height: 1.4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 6px;
        }

        th {
            background-color: #eee;
        }

        table:nth-child(1) {
            margin-top: 80px;
        }

        .footer-right {
            /* border: 1px solid black; */
            text-align: right;
            margin-top: 50px;
        }

        @media print {
            .no-print {
                display: none;
            }
        }

        .examination_part_data_div {
            display: grid;
            grid-template-columns: 1fr 5px 1fr;
        }


        .patient_info {
            display: grid;
            grid-template-columns: 3fr 1fr;
        }

        .header_1st {
            background-color: rgb(45, 162, 191);
            /* grid-area: a; */
        }

        .header_22nd {
            display: grid;
            grid-template-columns: 3fr 1.2fr;
        }
        .a{
            border: 3px solid red;
        }
    </style> -->
    <style>
        .a {
            border: 2px solid red;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 9px;
            margin: 0;
            padding: 0;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;

            /* background-image: url('./Image_for_Report/Background.png'); */
            /* background-repeat: no-repeat; */
            /* background-position: center center; */
            /* background-size: 30%;*/
            /* background-attachment: fixed; */
        }

        @page {
            size: A4 portrait;
            margin: 5mm;   /* very small margins */
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }

        .page * {
            /* font-size: 9px !important;      
            line-height: 1.2 !important;     */
        }

        .page h1, .page h2, .page h3 {
            font-size: 10px !important;     /* reduce heading size */
            margin: 2px 0 !important;
        }

        .page table {
            font-size: 8.5px !important;
            margin: 2px 0 !important;
            padding: 1px !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 2px 1px;
            font-size: 13px;
            text-align: center;
        }

        table, th, td {
            border: 1px solid black;
            
            padding: 5px 10px;

        }

        th {
            background-color: #eee;
            font-size: 9px;
            
        }

        h1, h2, h3 {
            margin: 1px 0;
            font-size: 11px;
        }

        .patient_info {
            font-size: 9px;
            padding: 3px;
            margin: 2px;
        }

        .exam-section {
            font-size: 9px;
            margin: 2px 0;
            padding: 2px;
        }


        .footer-right {
            text-align: right;
            margin-top: 5px;
            font-size: 14px;
        }

        .footer-right img {
            width: 150px;
            margin-bottom: 2px;
        }

        .footer-common {
            font-size: 10px;
            font-weight: bold;
            padding: 1px 1px;
            background-color: rgba(45, 191, 179, 0.69) !important;
            color: white;
            border-radius: 4px;
         }


         @media print {
            .footer-common {
                /* position: fixed;
                bottom: 0;
                left: 0;
                right: 0; */
                text-align: center;
                font-size: 14px;
                font-weight: bold;
                padding: 6px 12px;
                background-color: rgba(45, 191, 179, 0.69) !important;
                color: white;
                /* border-top: 1px solid #000; */
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .bodyelement {
                margin-bottom: 70px;
                /* border: 1px solid red; */
            }

            body {
                position: relative;
            }

            .footer-common {
                position: running(footer);
                border-radius: 7px;
            }

            /* Tell browser to print footer on each page */
            @page {
                @bottom-center {
                    content: element(footer);
                }
            }
        }

        .header_1st {
            background-color: rgba(45, 191, 179, 0.69);
            padding: 2px 5px;
            height: 140px; 
        }

        .f_color {
            background-color: rgba(45, 191, 179, 0.69);
        }

        .header_22nd {
            display: grid;
            grid-template-columns: 3fr 1.2fr;
        }

        .examination_part_data_div {
            display: grid;
            grid-template-columns: 1fr 5px 1fr;
            size:20px;
            padding:-30px;
        }

        .patient_info {
            display: grid;
            grid-template-columns: 3fr 1fr;
        }

        .header {
            margin-top: 9px;
            display: grid;
            gap: 7px;
        }

        .header_22nd {
            /* border: 2px solid red; */
            margin: 5px;
        }

        .contact-info {
            font-size: 16px;   /* Increase font size */
            font-weight: bold; /* Make it bolder */
            margin-left: 6px;  /* Space from icon */
        }

        .c * {
            border: 1px solid red;
        }
        @media print {
            .footer-right {
                position: fixed;
                bottom: 20px;   /* distance from bottom of page */
                right: 30px;    /* adjust if you want it right-aligned */
                text-align: right;
                font-size: 14px;
            }
        }
        .footer-right {
                position: fixed;
                bottom: 20px;   /* distance from bottom of page */
                right: 30px;    /* adjust if you want it right-aligned */
                text-align: right;
                font-size: 14px;
            }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="no-print p-4 border bg-black">
        <button id="printBtn" onclick="window.print()" class="bg-blue-500 text-white px-3 py-1 rounded">🖨 Print</button>
    </div>
    <img src="./Image_for_Report/Background.png"
        style="position: fixed; top: 20%; left: 0; width: 100%;
              z-index: -1; object-fit: cover;" />


    <header class="m-1 border-black border-2px">
        <div class="header_1st header text-white">
            <div class="flex gap-2 p-2 items-start">
                <img src="./Image_for_Report/Logo.png" class="w-14" alt="">
                <div class="text-center flex flex-col justify-center items-center w-full">
                    <h1 class="text-3xl font-semibold">MAA SARADA X –RAY CLINIC & LABORATORY</h1>
                    <h2 class="text-base font-medium">Bajkul, Kismat Bajkul, Dist-Purba Medinipur, Pin-721655</h2>
                </div>
            </div>

            <div class="flex justify-center item-center font-semibold gap-6">
                <span class="flex items-center">
                    <img src="./Image_for_Report/Call.png" class="w-9" alt="">
                    <span class="contact-info">9732665138 / 9732698096</span>
                </span>
                <span class="flex items-center">
                    <img src="./Image_for_Report/Email.png" class="w-14" alt="">
                    <span class="contact-info">bajkulmaasarada@gmail.com</span>
                </span>
            </div>

        </div>
        <div class="w-full header_22nd">
            <div class="border border-black header_2nd m-1 patient_inf text-base p-2 rounded-2xl gap-3">
                <div class="">
                    <div class="gap-2 font-bold flex whitespace-nowrap">Name of Patient: <span class="font-semibold whitespace-normal"><?php echo $reportValues['clientName'];    ?> </span></div>
                                   </div>
                <div class="grid grid-cols-2">
                    <div class="gap-2 font-bold flex whitespace-nowrap">Age: <span class="font-semibold whitespace-normal"><?php echo $reportValues['age'];    ?> </span></div>
                    <div class="gap-2 font-bold flex whitespace-nowrap">Sex: <span class="font-semibold whitespace-normal"><?php echo $reportValues['sex'];    ?> </span></div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="gap-2 font-semibold flex whitespace-nowrap">Date of Report: <span class="font-normal whitespace-normal"><?php 
                $date_of_report = $reportValues['date_of_report'];
                            echo date('d-m-Y', strtotime($date_of_report));    
                            ?> </span> </div>
                    <div class="gap-2 font-semibold flex whitespace-nowrap">Date of Recipt: <span class="font-normal whitespace-normal">
                        <?php 
                    echo date('d-m-Y' , strtotime($reportValues['date_of_recipt']));    
                    ?> </span> </div>
                    <div class="gap-2 font-bold flex whitespace-nowrap">Doctor: <span class="font-semibold whitespace-normal"><?php echo $reportValues['reffering_doctor'];  ?> </span> </div>
 
                </div>
            </div>
            <div class="header_3rd header_1st flex justify-center items-center rounded-2xl">
                <img src="./Image_for_Report/LabPic.png" width="180px" alt="" style="transform: scale(0.9);" class="rounded-sm">
            </div>
            <div class="hidden header_3rd  flex justify-center items-center">
                <img src="./Image_for_Report/LabPic.png" width="180px" alt=""
                style="transform: scale(1.3);"
                class="rounded-sm"
                >
            </div>
        </div>
    </header>
    <div class="footer-common">
        Report Of Examination
    </div>
    <div class="m-1 bodyelement ">
        <?php
        $is_Examinition = false;
        $_EXAMINATION_Array = [];
        $is_normal_fields = false;
        foreach ($reportItems as $reportItem) {
            // echo "<br>-->".$reportItem['EXAMINATION_name']."<br>";
            $_EXAMINATION_name = $reportItem['EXAMINATION_name'];
            // echo "<br>$_EXAMINATION_name<br>";
            if (in_array($_EXAMINATION_name, $_EXAMINATION_Array)) {
                // echo "the >".$_EXAMINATION_name."<br>";
            } else {
                // echo "<br>.".$_EXAMINATION_name."<br>";
                if ( !empty($_EXAMINATION_name) && $_EXAMINATION_name !== "undefined" && $_EXAMINATION_name !== null) {
                    $_EXAMINATION_Array[] = $_EXAMINATION_name;
                }
                else{
                    // echo("this is an empty field ");
                    $is_normal_fields = true;
                }
            }
        }

        // echo "-------------";
        // print_r($_EXAMINATION_Array);
        // echo "<br> count --> ".count($_EXAMINATION_Array)."<br>";
        // echo "<br> -------------";

        ?>
        <table class=" <?php if ( !$is_normal_fields ) {echo "hidden";} ?>">
            <tr>
                <!-- <th>Lab No.     </th> -->
                <!-- <th>Test No.    </th> -->
                <th>Test Name   </th>
                <th>Report Value</th>
                <?php 
                $extrafield = $reportItems[0]['mainexamination'];
                if ($extrafield == "BloodRoutine") {
                    echo "<th></th>";
                }
                ?>
                <th>Normal Value</th>
            </tr>

            <?php
            
            $count = 0;
            $EXAMINATION_Array = [];
            foreach ($reportItems as $reportItem) {
                
                $EXAMINATION_name = $reportItem['EXAMINATION_name'];
                $mainexamination = $reportItem['mainexamination'];
                $EXAMINATION_name1;
                // echo "<script>alert('->".$mainexamination."<-');</script>";
                if ($EXAMINATION_name == "undefined" || $EXAMINATION_name == null ) {
                    $count++;
                    // <td>' . htmlspecialchars($reportItem['report_no'])      . '</td>
                    echo '
                        <tr>
                            
                            <td>' . htmlspecialchars($reportItem['test_name'])    . '</td>
                            <td>' . htmlspecialchars($reportItem['result'])       . '</td>
                            ';
                    if ($extrafield == "BloodRoutine") {
                        echo '<td>' . htmlspecialchars($reportItem['extrafield'])   . '</td>';
                    }
                    echo '
                            <td>' . htmlspecialchars($reportItem['normal_value']) . '</td>
                        </tr>
                        ';
                } else {
                    // echo "--> $EXAMINATION_name <--";
                    if (in_array($EXAMINATION_name, $EXAMINATION_Array)) {
                    } else {
                        $EXAMINATION_Array[] = $EXAMINATION_name;
                    }
                }
            }
            ?>

        </table>
        <?php
        // echo "<br> -------------";
        // print_r(empty($_EXAMINATION_Array));
        // echo "<br>";
        // print_r(empty($_EXAMINATION_Array[0]));
        // echo "<br> -------------";
        ?>
        <div class="m-3 grid gap-1 <?php  ?>">
            <?php
            // print_r($EXAMINATION_Array) ;
            $lenOfExamination = count($EXAMINATION_Array);
            $countOfExamination = 0;
            foreach ($EXAMINATION_Array as $Examination) {
                
                echo "
                    <div class='p-0  gap-3 rounded-2xl border-black border'>
                        <h2 class='text-2xl font-bold flex justify-center'>" . htmlspecialchars($Examination) . "</h2>
                    <div class='grid ";
                if($reportItem['mainexamination'] == "WidalAndInfectionPanel"){
                    echo "p-4 font-semibold text-lg'>";   
                }else{
                    echo "grid-cols-2 p-1 font-semibold text-base'>";   
                }
                // echo $reportItem['mainexamination'];

                foreach ($reportItems as $reportItem) {
                    $EXAMINATION_name = $reportItem['EXAMINATION_name'];
                    
                    if (!empty($EXAMINATION_name) && $EXAMINATION_name == $Examination) {
                        $count++;
                        echo '
                            <div class="gap-3 examination_part_data_div ">
                                <div class="flex '.( $reportItem['mainexamination'] == "WidalAndInfectionPanel" ? "justify-center" : "justify-end" ).'">' 
                                . htmlspecialchars($reportItem['test_name']) . '</div> 
                                <span>:-<br></span>
                                <div class="">' 
                                . htmlspecialchars($reportItem['result']) . '</div>
                            </div>
                        ';
                    }
                }
                echo "</div></div>";
            }
            ?>
        </div>


        <div class="footer-right px-3">
            <p class="flex flex-row-reverse"><img src="sign.png" width="170" style="margin-bottom: 5px;" class=""></p>
            <p><strong>Consultant Pathologist</strong><br>
                Dr. Ramesh Ch Patra <br>
                M.B.B.S (Cal), D.C.P</p>
        </div>
    </div>
</body>

</html>