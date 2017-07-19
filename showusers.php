<?php $result=get_records($db);	?>

<?php if (!$result): echo 'problem:' . mysqli_errno($db) . ' ' . mysqli_error($db); ?>

	<?php else : ?>
    	<table>
    	    <tr>
    		<th>id</th>
    		<th>name</th>
    		<th>email</th>
                <th>action</th>
    	    </tr>
		<?php while ($row = mysqli_fetch_assoc($result)): ?>

	  <tr>
			<td><?= $row['id']; ?></td>
			<td><?= $row['name']; ?></td>
			<td><?= $row['email']; ?></td>
                        <td> <form action="index.php" method="post">
                                <input class="del" type="submit" name="del" value="delete"/>
                                <input type="number" name="id" value="<?= $row['id']; ?>" hidden/>
                            </form>
                        </td>
	     </tr>
		<?php endwhile; ?>
    	</table>
	<?php endif; ?>