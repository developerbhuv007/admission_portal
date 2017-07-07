
 <div id="get_records">
 <table class="table table-bordered" style="margin:auto;width:95%">
<tr style="background-color:#000; color: #FFF">
<th>S No.</th>
<th><span id="candidateID" style="text-decoration:underline;cursor:pointer">Slip No</span></th>
<th>Addmission Date</th>
<th>Form No.</th>
<th><span id="name" style="text-decoration:underline;cursor:pointer">Name</span></th>
<th>Father's Name</th>
<th>JEE(Main)RollNo</th>
<th>JEE(Main)Rank</th>
<th>Branch From JOSSA</th>
<th>Category</th>
<th>Alloted Category</th>
<th>Branch Alloted by GKV</th>
<!-- <th>Ch 1</th>
<th>Ch 2</th>
<th>Ch 3</th>
<th>Ch 4</th> -->
</tr>
 
<?php

$i=1;
 foreach($records as $record):?>
<tr>
<td><?php echo $i++; ?></td>
<td><?php echo $record['candidateID'];?></td>
<td><?php echo $record['admdate'];?></td>
<td><?php echo $record['formno'];?></td>
<td><a href="/fetadmissions/view_details/<?php echo $record['candidateID'];?>"><?php echo $record['name'];?></a></td>
<td><?php echo $record['fathersname'];?></td>
<td><?php echo $record['jeerollno'];?></td>
<td><?php echo $record['jeerank'];?></td>
<td><?php echo $record['ccbbranch'];?></td>
<td><?php echo $record['category'];?></td>
<td><?php echo $record['allotedcategory'];?></td>
<td><?php echo $record['gkvbranch'];?></td>
<?php 
$bcchoice=json_decode($record['bchoices'],true);
?>
<!-- <td><?php echo $bcchoice[1];?></td>
<td><?php echo $bcchoice[2];?></td>
<td><?php echo $bcchoice[3];?></td>
<td><?php echo $bcchoice[4];?></td> -->
</tr>
<?php endforeach;?>



</table>
  </div>

  <style type="text/css">
  table tr:nth-child(odd){
   background-color: rgb(245,245,245);
  }
  </style>