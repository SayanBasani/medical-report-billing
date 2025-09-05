
        <?php
        session_start();
        include 'report.php';
        $invoice = new report();
        $invoice->checkLoggedIn();
        if(!empty($_GET['reportId']) && $_GET['reportId']) {
        	echo $_GET['reportId'];
        	$reportValues = $report->getreport($_GET['reportId']);		
        	$reportItems = $report->getreportItems($_GET['reportId']);		
        }
        ?>
         
                <div class="">
                    
                   
                    
                    <div class="container-fluid" style="background-color: #ffffff;">
                        
                        
                      
                        
                        <div class="row">
                            <div class="col-lg-12" >
                                <div class="card">
                                    <div class="card-title">
                                       <div class="float-left">
            <h3 class="mb-0" style="color: black;">Mob: 9732698096</h3>
        </div> 
                                            <div class="float-right"> 
                                              <h3 class="mb-0" style="color: black;">Mob: 9732665138</h3>
                                           </div>
                                    </div>
                                    <hr>
                                    
                                        <div class="card-body">
                                            <div class="row mb-12">
                                               <div class="col-12">
                                <div class="text-center ">
                                   <h2 class="mb-0" style=" font-weight: 900; color: #20247b; font-size: 40px; margin: 0 0 15px; ;">MAA SAREDA X-RAY CLINIC AND LABORATORY</h2>
                                    <h5 style="  font-weight: 700; color: #20247b; font-size: 20px; margin-bottom: 10px;">Bajkul:: P.O-Krismat Bajkul::Dist- Purba Medinipur - Facebook Inc</h5>
                                    <h5  style="  font-weight: 700; color: #20247b; font-size: 16px; margin-bottom: 10px;">Email::bajkulmaasarada@gmail.com</h5>
                                    <span style="background: #000; color: #ffffff;font-size: 16px;padding: 4px 13px; display: inline-block; margin-bottom: 12px; border-radius: 20px;  font-weight: 600;">REPORT OF EMAMINATION</span>
                                </div>
                                 <hr>
                                <div class="float-left">
                                                    <br>
                                                                                             
                                                    <h3 class="text-dark mb-1"> Name of Patient: <?=$row['clientName']?></h3>
                                                 <div></div>
                                                  <div class="text-dark mb-1">Age:  <?=$row['age']?></div>
                                                     <div class="text-dark mb-1">Sex:  <?=$row['sex']?></div>
                                                       <div class="text-dark mb-1">Reffering Doctor:  <?=$row['reffering_doctor']?> </div>
                                                     
                                                </div>
                                                <div class="float-right">
                                                    <br>
                                                    <div>Lab No: 012</div>
                                                    <h3 class="text-dark mb-1">Date of Report:<?= $row['date_of_report']; ?></h3>                                            
                                                    <div>Date of Recipt:<?= $row['date_of_recipt']; ?></div>
        <!--                                            <div>Canal Winchester, OH 43110</div>
        -->
                                                    
                                                </div>
                                            </div>
                            </div>
                                               
                                            </div>
                                            <div class="table-responsive-sm">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th class="center">#</th>
                                                            <th>Test Name</th>
                                                            <th class="right">Report</th>
                                                            <th class="center">Normal Value</th>
                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                        <tr>
                                                            <td class="center"><?=$no?></td>
                                                            <td class="left strong"><?=$row['test_name']?></td>
                                                            <td class="right"><?=$row['result']?></td>
                                                            <td class="center"><?=$row['normal_value']?></td>
                                                                 
                                                        </tr>
                                                        <tr>
                                                         <td class="center"><?=$no?></td>
                                                            <td class="left strong"><?=$row['test_name1']?></td>
                                                            <td class="right"><?=$row['result1']?></td>
                                                            <td class="center"><?=$row['normal_value1']?></td>
                                                                 
                                                        </tr><tr>
                                                         <td class="center"><?=$no?></td>
                                                            <td class="left strong"><?=$row['test_name2']?></td>
                                                            <td class="right"><?=$row['result2']?></td>
                                                            <td class="center"><?=$row['normal_value2']?></td>
                                                                 
                                                        </tr><tr>
                                                         <td class="center"><?=$no?></td>
                                                            <td class="left strong"><?=$row['test_name3']?></td>
                                                            <td class="right"><?=$row['result3']?></td>
                                                            <td class="center"><?=$row['normal_value3']?></td>
                                                                 
                                                        </tr><tr>
                                                         <td class="center"><?=$no?></td>
                                                            <td class="left strong"><?=$row['test_name4']?></td>
                                                            <td class="right"><?=$row['result4']?></td>
                                                            <td class="center"><?=$row['normal_value4']?></td>
                                                            
                                                        </tr>
                                                      
                                                    </tbody>
                                                </table>
                                            </div>
                                       
                                        </div>
                                        <div class="card-footer bg-white">

                                          <div class="float-right">
                                                   <br>
                                                   <br>
                                                    <h3 class="text-dark mb-1">consultant pathologist</h3>
                                                    <div></div>
                                                    <div class="text-dark mb-1">Dr. Ramesh Ch Patra</div>                                            
                                                    <div> M.B.B.S (Cal), D.C.P</div>
        <!--                                            <div>Canal Winchester, OH 43110</div>
        -->
                                                    
                                                </div>
                                         
                                        </div>
                                </div>
                                                                    

                                                                         <input id ="printbtn" type="button" class="btn btn-success btn-flat m-b-30 m-t-30"  value="Print Invoice" onclick="window.print();" >
                                    <input id ="printbtn" type="button" value="Go Back" class="btn btn-danger btn-flat m-b-30 m-t-30"  onclick="goBack()" >



                                        
                                             </div>
                                </div>
                            </div>
                          
                        </div>
                        
                       


        <?php include('./constant/layout/footer.php');?>
         <script>
        function goBack() {
          window.history.back();
        }
        </script>

