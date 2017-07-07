<STYLE TYPE="text/css">
td{
padding: 0px 3px 0px 15px;
}
#search_q{
	height:30px;
}
</STYLE>
<div class="main">
	<div class="drop_down" style="width: 100%;height:60px;background-colo:red;">
        	  <div style="float:left">
        	  	<?php echo $this->Form->input('category', 
									    array(
									        'options' => array( 'GEN' => 'GEN','OBC' => 'OBC', 'SC' => 'SC', 'ST' => 'ST', 'GEN-PH' => 'GEN-PH','OBC-PH' => 'OBC-PH', 'SC-PH' => 'SC-PH', 'ST-PH' => 'ST-PH', ),           
									        'id'=>'cat',
											'empty' =>'Category : All',
									        'label' => false,
									        'class'=>'form-control',

										));
				?>
			
        	  </div>
        	  <div style="float:right">
        	  	<button class="btn btn-success" style="float:right" id="excel">Download in Excel</button>
        	  	<button class="btn btn-primary" style="float:right;margin-right:20px;" id="pdf">Download in Pdf</button>
        	  </div>
        </div>
	<div class="heading"><strong>Migration List</strong></div><br>
	<div id="count" style="text-align:center"><strong>Number of Records : <?php echo $count;?></strong></div>
	<div class="tablediv">
		<table border="1" width="95%">
			<tr>
				<th>GKV Rank</th>
				<th>JEE(Main) Roll No</th>
				<th>Name</th>
				<th>Fathers Name</th>
				<th>Category</th>
				<th>JEE(Main) Rank</th>
				<th>Click To Migrate</th>
			</tr>
			<?php $i=0;foreach($studentDetails as $info):$i++;?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $info["jeerollno"];?></td>
				<td><?php echo $info["name"];?></td>
				<td><?php echo $info["fathersname"];?></td>
				<td><?php echo $info["category"];?></td>
				<td><?php echo $info["jeerank"];?></td>
				<td><div class="migarte-btn"><a href="<?php echo "data_entry/".$info["uid"];?>"><button style="background-color: rgb(70, 11, 244);color: whitesmoke;width: 60px; border: 1px solid black;">Migrate</button></a></div></td>
			</tr>
		<?php endforeach;?>
		</table>
	</div>
</div>