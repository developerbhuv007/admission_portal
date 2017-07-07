<?php

$a=array(
 '0'=>'Bank Copy',
 '1'=>'Accounts Section Copy',
 '2'=>'Student Copy',
 '3'=>'To be enclosed with Admission From'
); 
?>
<div id="wrapper">
    <?php
    for($i=0;$i<4;$i++){?> 
    <div class="eachBigDiv">
        <div class="eachContactDiv textCenter borderBottom"><?php echo $a[$i];?></div>
        <div class="collegeName textCenter borderBottom">GURUKUL KANGRI VISHWAVIDYALAY</div>
        <div class="collegeBranch textCenter borderBottom">Gurukul Kangri, Haridwar - 249404</div>
        <div class="text-feedeposite textCenter borderBottom">Fee Deposite Slip</div>
        <div class="eachInTwo borderBottom">
            <div class="text-receptNumber borderRight">Fee Rec. No.</div>
            <div class="receptNumber">1460021</div>
        </div>
        <div class="fee_date borderBottom"><span class="right">Date: <?php echo $off_info['0']['admdate'];?></span></div>
        <div class="text-bank borderBottom textCenter"><span>Credit the fee in Punjab National Bank, Gurukul Kangri, Haridwar Fee A/c only</span></div>
        <div class="pnbAccountTwoDiv borderBottom">
            <div class="text-pnbNo borderRight">PNB NO.</div>
            <div class="accountNo">A/c No. 4063000100041261</div>
        </div>
        <div class="relateTobankTwoDiv borderBottom">
            <div class="branchGKbank borderRight textCenter">Branch: Gurukul Kangri</div>
            <div class="branchGKbankCode textCenter">Branch Code: 406300</div>
        </div>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Name :</div>
            <div class="filed"><?php echo $per_info['0']['name'];?></div>
        </div>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Father Name :</div>
            <div class="filed"><?php echo $per_info['0']['fathersname'];?></div>
        </div>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Mob. No. </div>
            <div class="filed"><?php echo $per_info['0']['phone'];?></div>
        </div>
        <?php $branch='';
         if($off_info['0']['gkvbranch']=='ME'){
             $branch='Mech.';
        }elseif($off_info['0']['gkvbranch']=='CSE'){
             $branch='Comp. Sci.';
        }elseif ($off_info['0']['gkvbranch']=='ECE') {
             $branch='Elec. & Comm.';
        }else{
            $branch='Electrical';
        }
        ?>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Class :</div>
            <div class="filed">B. Tech. <?php echo $branch;?> Engg. Ist Sem.</div>
        </div>
        <div class="text-feeStructure textCenter borderBottom">Fee Structure:</div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Annual fee</div>
            <div class="feeStructureAmount"><span class="right">55,040.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Lab. Caution Money</div>
            <div class="feeStructureAmount"><span class="right">2,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Library Caution Money</div>
            <div class="feeStructureAmount"><span class="right">2,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Hostel Fee</div>
            <div class="feeStructureAmount"><span class="right">12,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Hostel Swcurity</div>
            <div class="feeStructureAmount"><span class="right">5,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Bus Charges</div>
            <div class="feeStructureAmount"><span class="right">4,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Mess Charges</div>
            <div class="feeStructureAmount"><span class="right">-</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Extra Fee Deposite</div>
            <div class="feeStructureAmount"><span class="right">-</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight"><strong>Total Fee</strong></div>
            <div class="feeStructureAmount"><span class="right"><strong>80,040.00</strong></span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Less CSAB-2014 deposited Fee</div>
            <div class="feeStructureAmount"><span class="right">40,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight"><strong>Net pay Feeable</strong></div>
            <div class="feeStructureAmount"><span class="right"><strong>55,040.00</strong></span></div>
        </div>
        <div class="text-amountInWords borderBottom">Amount in words:</div>
        <div class="amountInWords borderBottom">Forty Thousand Forty only</div>
        <div class="aboutDD borderBottom">
            <span style="font-size:14px;">By DD NO. ................... Date .................. Amount .................. Bank ........................ ..................................................................</span>
        </div>
        <div class="signature borderBottom">
            <div class="indivfree"></div>
            <div class="authorisedSignature"> Authorised Signature</div>
            <div class="studentSignature">Sing. of the Student</div>
        </div>
        <div class="text-bankUse textCenter borderBottom">FOR BANK USE ONLY</div>
        <div class="textTwoLabelFiled borderBottom">
            <div class="textLabel borderRight">Journal/Tr. No.</div>
            <div class="textFiled"></div>
        </div>
        <div class="textTwoLabelFiled borderBottom">
            <div class="textLabel borderRight">Date:</div>
            <div class="textFiled"></div>
        </div>
        <div class="sealsTwoDiv">
            <div class="sealDivinfreespace"></div>
            <div class="SEAL">Seal</div>
            <div class="BankManagerSEAL">Bank Manager</div>
        </div>
    </div>
    <?php if($i!=3){?>
   <div class="faltuDiv">

    </div>
<?php }}?>
    <!-- <div class="eachBigDiv">
        <div class="eachContactDiv textCenter borderBottom">Accounts Section Copy</div>
        <div class="collegeName textCenter borderBottom">GURUKUL KANGRI VISHWAVIDYALAY</div>
        <div class="collegeBranch textCenter borderBottom">Gurukul Kangri, Haridwar - 249404</div>
        <div class="text-feedeposite textCenter borderBottom">Fee Deposite Slip</div>
        <div class="eachInTwo borderBottom">
            <div class="text-receptNumber borderRight">Fee Rec. No.</div>
            <div class="receptNumber">1460021</div>
        </div>
        <div class="fee_date borderBottom"><span class="right">Date: 23/07/2014</span></div>
        <div class="text-bank borderBottom textCenter"><span>Credit the fee in Punjab National Bank, Gurukul Kangri, Haridwar Fee A/c only</span></div>
        <div class="pnbAccountTwoDiv borderBottom">
            <div class="text-pnbNo borderRight">PNB NO.</div>
            <div class="accountNo">A/c No. 4063000100041261</div>
        </div>
        <div class="relateTobankTwoDiv borderBottom">
            <div class="branchGKbank borderRight textCenter">Branch: Gurukul Kangri</div>
            <div class="branchGKbankCode textCenter">Branch Code: 406300</div>
        </div>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Name :</div>
            <div class="filed">Ashok Kumar</div>
        </div>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Father Name :</div>
            <div class="filed">R N Singh</div>
        </div>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Mob. No. </div>
            <div class="filed">9997009667</div>
        </div>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Class :</div>
            <div class="filed">B. Tech. Mech. Engg. Ist Sem.</div>
        </div>
        <div class="text-feeStructure textCenter borderBottom">Fee Structure:</div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Annual fee</div>
            <div class="feeStructureAmount"><span class="right">55,040.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Lab. Caution Money</div>
            <div class="feeStructureAmount"><span class="right">2,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Library Caution Money</div>
            <div class="feeStructureAmount"><span class="right">2,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Hostel Fee</div>
            <div class="feeStructureAmount"><span class="right">12,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Hostel Swcurity</div>
            <div class="feeStructureAmount"><span class="right">5,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Bus Charges</div>
            <div class="feeStructureAmount"><span class="right">4,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Mess Charges</div>
            <div class="feeStructureAmount"><span class="right">-</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Extra Fee Deposite</div>
            <div class="feeStructureAmount"><span class="right">-</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight"><strong>Total Fee</strong></div>
            <div class="feeStructureAmount"><span class="right"><strong>80,040.00</strong></span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Less CSAB-2014 deposited Fee</div>
            <div class="feeStructureAmount"><span class="right">40,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight"><strong>Net pay Feeable</strong></div>
            <div class="feeStructureAmount"><span class="right"><strong>55,040.00</strong></span></div>
        </div>
        <div class="text-amountInWords borderBottom">Amount in words:</div>
        <div class="amountInWords borderBottom">Forty Thousand Forty only</div>
        <div class="aboutDD borderBottom">
            <span style="font-size:14px;">By DD NO. ................... Date .................. Amount .................. Bank ........................ ..................................................................</span>
        </div>
        <div class="signature borderBottom">
            <div class="indivfree"></div>
            <div class="authorisedSignature"> Authorised Signature</div>
            <div class="studentSignature">Sing. of the Student</div>
        </div>
        <div class="text-bankUse textCenter borderBottom">FOR BANK USE ONLY</div>
        <div class="textTwoLabelFiled borderBottom">
            <div class="textLabel borderRight">Journal/Tr. No.</div>
            <div class="textFiled"></div>
        </div>
        <div class="textTwoLabelFiled borderBottom">
            <div class="textLabel borderRight">Date:</div>
            <div class="textFiled"></div>
        </div>
        <div class="sealsTwoDiv">
            <div class="sealDivinfreespace"></div>
            <div class="SEAL">Seal</div>
            <div class="BankManagerSEAL">Bank Manager</div>
        </div>
    </div>
    <div class="faltuDiv">

    </div>
    <div class="eachBigDiv">
        <div class="eachContactDiv textCenter borderBottom">Student Copy</div>
        <div class="collegeName textCenter borderBottom">GURUKUL KANGRI VISHWAVIDYALAY</div>
        <div class="collegeBranch textCenter borderBottom">Gurukul Kangri, Haridwar - 249404</div>
        <div class="text-feedeposite textCenter borderBottom">Fee Deposite Slip</div>
        <div class="eachInTwo borderBottom">
            <div class="text-receptNumber borderRight">Fee Rec. No.</div>
            <div class="receptNumber">1460021</div>
        </div>
        <div class="fee_date borderBottom"><span class="right">Date: 23/07/2014</span></div>
        <div class="text-bank borderBottom textCenter"><span>Credit the fee in Punjab National Bank, Gurukul Kangri, Haridwar Fee A/c only</span></div>
        <div class="pnbAccountTwoDiv borderBottom">
            <div class="text-pnbNo borderRight">PNB NO.</div>
            <div class="accountNo">A/c No. 4063000100041261</div>
        </div>
        <div class="relateTobankTwoDiv borderBottom">
            <div class="branchGKbank borderRight textCenter">Branch: Gurukul Kangri</div>
            <div class="branchGKbankCode textCenter">Branch Code: 406300</div>
        </div>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Name :</div>
            <div class="filed">Ashok Kumar</div>
        </div>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Father Name :</div>
            <div class="filed">R N Singh</div>
        </div>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Mob. No. </div>
            <div class="filed">9997009667</div>
        </div>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Class :</div>
            <div class="filed">B. Tech. Mech. Engg. Ist Sem.</div>
        </div>
        <div class="text-feeStructure textCenter borderBottom">Fee Structure:</div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Annual fee</div>
            <div class="feeStructureAmount"><span class="right">55,040.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Lab. Caution Money</div>
            <div class="feeStructureAmount"><span class="right">2,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Library Caution Money</div>
            <div class="feeStructureAmount"><span class="right">2,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Hostel Fee</div>
            <div class="feeStructureAmount"><span class="right">12,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Hostel Swcurity</div>
            <div class="feeStructureAmount"><span class="right">5,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Bus Charges</div>
            <div class="feeStructureAmount"><span class="right">4,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Mess Charges</div>
            <div class="feeStructureAmount"><span class="right">-</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Extra Fee Deposite</div>
            <div class="feeStructureAmount"><span class="right">-</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight"><strong>Total Fee</strong></div>
            <div class="feeStructureAmount"><span class="right"><strong>80,040.00</strong></span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Less CSAB-2014 deposited Fee</div>
            <div class="feeStructureAmount"><span class="right">40,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight"><strong>Net pay Feeable</strong></div>
            <div class="feeStructureAmount"><span class="right"><strong>55,040.00</strong></span></div>
        </div>
        <div class="text-amountInWords borderBottom">Amount in words:</div>
        <div class="amountInWords borderBottom">Forty Thousand Forty only</div>
        <div class="aboutDD borderBottom">
            <span style="font-size:14px;">By DD NO. ................... Date .................. Amount .................. Bank ........................ ..................................................................</span>
        </div>
        <div class="signature borderBottom">
            <div class="indivfree"></div>
            <div class="authorisedSignature"> Authorised Signature</div>
            <div class="studentSignature">Sing. of the Student</div>
        </div>
        <div class="text-bankUse textCenter borderBottom">FOR BANK USE ONLY</div>
        <div class="textTwoLabelFiled borderBottom">
            <div class="textLabel borderRight">Journal/Tr. No.</div>
            <div class="textFiled"></div>
        </div>
        <div class="textTwoLabelFiled borderBottom">
            <div class="textLabel borderRight">Date:</div>
            <div class="textFiled"></div>
        </div>
        <div class="sealsTwoDiv">
            <div class="sealDivinfreespace"></div>
            <div class="SEAL">Seal</div>
            <div class="BankManagerSEAL">Bank Manager</div>
        </div>
    </div>
    <div class="faltuDiv">

    </div>
    <div class="eachBigDiv">
        <div class="eachContactDiv textCenter borderBottom">To be enclosed with Admission From</div>
        <div class="collegeName textCenter borderBottom">GURUKUL KANGRI VISHWAVIDYALAY</div>
        <div class="collegeBranch textCenter borderBottom">Gurukul Kangri, Haridwar - 249404</div>
        <div class="text-feedeposite textCenter borderBottom">Fee Deposite Slip</div>
        <div class="eachInTwo borderBottom">
            <div class="text-receptNumber borderRight">Fee Rec. No.</div>
            <div class="receptNumber">1460021</div>
        </div>
        <div class="fee_date borderBottom"><span class="right">Date: 23/07/2014</span></div>
        <div class="text-bank borderBottom textCenter"><span>Credit the fee in Punjab National Bank, Gurukul Kangri, Haridwar Fee A/c only</span></div>
        <div class="pnbAccountTwoDiv borderBottom">
            <div class="text-pnbNo borderRight">PNB NO.</div>
            <div class="accountNo">A/c No. 4063000100041261</div>
        </div>
        <div class="relateTobankTwoDiv borderBottom">
            <div class="branchGKbank borderRight textCenter">Branch: Gurukul Kangri</div>
            <div class="branchGKbankCode textCenter">Branch Code: 406300</div>
        </div>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Name :</div>
            <div class="filed">Ashok Kumar</div>
        </div>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Father Name :</div>
            <div class="filed">R N Singh</div>
        </div>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Mob. No. </div>
            <div class="filed">9997009667</div>
        </div>
        <div class="labelfiledTwoDiv borderBottom">
            <div class="label borderRight">Class :</div>
            <div class="filed">B. Tech. Mech. Engg. Ist Sem.</div>
        </div>
        <div class="text-feeStructure textCenter borderBottom">Fee Structure:</div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Annual fee</div>
            <div class="feeStructureAmount"><span class="right">55,040.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Lab. Caution Money</div>
            <div class="feeStructureAmount"><span class="right">2,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Library Caution Money</div>
            <div class="feeStructureAmount"><span class="right">2,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Hostel Fee</div>
            <div class="feeStructureAmount"><span class="right">12,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Hostel Swcurity</div>
            <div class="feeStructureAmount"><span class="right">5,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Bus Charges</div>
            <div class="feeStructureAmount"><span class="right">4,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Mess Charges</div>
            <div class="feeStructureAmount"><span class="right">-</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Extra Fee Deposite</div>
            <div class="feeStructureAmount"><span class="right">-</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight"><strong>Total Fee</strong></div>
            <div class="feeStructureAmount"><span class="right"><strong>80,040.00</strong></span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight">Less CSAB-2014 deposited Fee</div>
            <div class="feeStructureAmount"><span class="right">40,000.00</span></div>
        </div>
        <div class="feeStructureTwoDiv borderBottom">
            <div class="feeStructureLabel borderRight"><strong>Net pay Feeable</strong></div>
            <div class="feeStructureAmount"><span class="right"><strong>55,040.00</strong></span></div>
        </div>
        <div class="text-amountInWords borderBottom">Amount in words:</div>
        <div class="amountInWords borderBottom">Forty Thousand Forty only</div>
        <div class="aboutDD borderBottom">
            <span style="font-size:14px;">By DD NO. ................... Date .................. Amount .................. Bank ........................ ..................................................................</span>
        </div>
        <div class="signature borderBottom">
            <div class="indivfree"></div>
            <div class="authorisedSignature"> Authorised Signature</div>
            <div class="studentSignature">Sing. of the Student</div>
        </div>
        <div class="text-bankUse textCenter borderBottom">FOR BANK USE ONLY</div>
        <div class="textTwoLabelFiled borderBottom">
            <div class="textLabel borderRight">Journal/Tr. No.</div>
            <div class="textFiled"></div>
        </div>
        <div class="textTwoLabelFiled borderBottom">
            <div class="textLabel borderRight">Date:</div>
            <div class="textFiled"></div>
        </div>
        <div class="sealsTwoDiv">
            <div class="sealDivinfreespace"></div>
            <div class="SEAL">Seal</div>
            <div class="BankManagerSEAL">Bank Manager</div>
        </div>
    </div> -->
</div>