<head>
    <?php $this->_compileInclude('header'); ?>

</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">
<script type="text/javascript">
$(document).ready(function()
{   
    $(".monthPicker").datepicker({
        dateFormat: 'yy-mm-dd',
        changeDay: false,
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,

        onChangeMonthYear: function(dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).val($.datepicker.formatDate('yy-mm-dd', new Date(year, month, 1)));
        }
    });

    $(".monthPicker").focus(function () {
        $(".ui-datepicker-calendar").hide();
        $("#ui-datepicker-div").position({
            my: "center top",
            at: "center bottom",
            of: $(this)
        });
    });
});
</script>

<div class="button">
<form action="index.php?manager-popular" method ="post">
	<label for="month">Month: </label>
	<input type="text" id="month" name="month" class="monthPicker" />
	<button type="submit">view revenue</button>
</form>
</div>

<table>
	<tr>
		<th>Month</th>
		<th>Movie</th>
        <th>#of Order</th>
	</tr>
	<?php $i = -1;
 
				foreach($this->tpl_var['rev'] as $key => $r){ 
					$i++; ?>
        <?php $ii = -1;
 
				foreach($r as $key => $rr){ 
					$ii++; ?>
        <tr>
        <?php if($ii==0){ ?>
		<td><?php echo $r['month']; ?></td>
        <?php } else { ?>
        <td></td>
        <?php } ?>
		<td><?php echo $r['movie'][$ii]; ?></td>
        <td><?php echo $r['num_of_order'][$ii]; ?></td>
	   </tr>
       <?php } ?>
	<?php } ?>
</table>
</br>
<div class="button">
<a href="index.php?manager-index"><button>index</button></a>
</div>