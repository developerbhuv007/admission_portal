

<div class="heading"><strong>Migration List</strong></div><br>
	<div id="count" style="text-align:center"><strong>Number of Records : <?php echo $records['count'];?></strong></div>
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
			<?php $i=0;foreach($records['records'] as $info):$i++;?>
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