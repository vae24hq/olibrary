
<style type="text/css">
	table {text-align: left; min-width: 50%; margin: 5px; }
	table th {color: tan; border-right: 1px solid tan; width: 20%;}
	table td {padding-left: 10px;}
</style>
<?php include 'slice-header.php';?>


<table>  
	<tr>
		<th>Serial</th>
		<td><?php echo $book->serial;?></td>
	</tr>

	<tr>
		<th>Title</th>
		<td><?php echo $book->title;?></td>
	</tr>

	<tr>
		<th>Author</th>
		<td><?php echo $book->author;?></td>
	</tr>
	
	<tr>
		<th>Description</th>
		<td><?php echo $book->description;?></td>
	</tr>
</table>
<?php include 'slice-footer.php';?>
