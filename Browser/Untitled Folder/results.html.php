
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<style>
table,th,td
{
border:1px solid black;
}
</style>
<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js" > </script> 
<script type="text/javascript" src="http://www.kunalbabre.com/projects/table2CSV.js" > </script> 
<script>
$(document).ready(function() {
 
  $('table').each(function() {
    var $table = $(this);
 
    var $button = $("<button type='button'>");
    $button.text("Export to csv");
    $button.insertAfter($table);
 
    $button.click(function() {
      var csv = $table.table2CSV({delivery:'value'});
      window.location.href = 'data:text/csv;charset=UTF-8,'
                            + encodeURIComponent(csv);
    });
  });
})
</script>

</head>
<body>
    <table >   
		<?php 
		for ($i = 0; $i < $result->columnCount(); $i++) {
			$col = $result->getColumnMeta($i);
			$columns[] = $col['name'];
		}
		?>
		<tr>
			<?php for ($x = 0; $x < $sizeResult; $x++):?>
				<td> <?php echo $columns[$x]; ?> </td>
			<?php endfor; ?>
		</tr>
		
			<?php foreach ($result as $data):  ?>
				<tr> 
					<?php for ($x = 0; $x < $sizeResult; $x++):?>
						<?php if(!is_null($data[$x])): ?>
							<td> <?php echo $data[$x]; ?> </td>
						<?php endif; ?>
						<?php if(is_null($data[$x])): ?>
							<td> <?php echo "N/A"; ?> </td>
						<?php endif; ?>
						
					<?php endfor; ?>
				</tr>
			
			<?php endforeach; ?>
				
    </table>
  </body>
</html>
