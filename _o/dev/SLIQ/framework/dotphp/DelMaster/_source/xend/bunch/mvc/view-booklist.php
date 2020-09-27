<style type="text/css">
	table {text-align: left; min-width: 50%; margin: 5px; }
	table th {color: tan; border-bottom: 1px solid tan;}
</style>

<?php include 'slice-header.php';?>
<table>  
	<tr>
		<th>Serial</th>
		<th>Title</th>
		<th>Author</th>
		<th>Description</th>
	</tr>
<?php foreach ($books as $title => $book){?>
	<tr>
		<td><a href="./?act=details&id=<?php echo $book->serial;?>"><?php echo $book->serial;?></a></td>
		<td><?php echo $book->title;?></td>
		<td><?php echo $book->author;?></td>
		<td><?php echo $book->description;?></td>
	</tr>
<?php }?> 
</table>

<?php include 'slice-footer.php';?>
