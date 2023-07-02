<table class="table table-striped table-bordered">
			<tr>
				<th>ITEM NAME</th>
				<th>PRICE</th>
				<th>QUANTITY</th>
				<th></th>
				<th></th>
				<th></th>
				<th>LINE TOTAL</th>
			</tr>
			
<?php
foreach($cart->getItems() as $unit)
{
	?>
<tr>
	<td><?= $unit->getItemName() ?></td>
	<td><?= number_format($unit->getItemPrice(),2) ?></td>
	<td><?= $unit->getCartQuantity() ?></td>
	<td><input type="button" class="btn btn-primary larger" value="+" onclick="modify('<?= $unit->getCartItemId() ?>',1)"> </td>
	<td><input type="button" class="btn btn-success larger" value="-" onclick="modify('<?= $unit->getCartItemId() ?>',2)"> </td>
	<td><input type="button" class="btn btn-danger larger" value="X" onclick="modify('<?= $unit->getCartItemId() ?>',3)"> </td>
	<td><?= number_format($unit->getCartQuantity()*$unit->getItemPrice(),2) ?></td>
</tr>
		
<?php	
}
?>
<tr>
	<th colspan="6">TOTAL</th>
	<th><?= number_format($cart->getTotalCartAmount(),2) ?></th>
</tr>
<tr>
	<td colspan="7">
		<a style="float: right;" class="btn btn-danger" href="clear.php">Clear Cart</a>
	</td>
</tr>
</table>