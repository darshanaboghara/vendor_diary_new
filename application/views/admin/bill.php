<!DOCTYPE html>
<html>
<head>
	<title>Payment Details</title>
</head>
<body>


<h1>Payment Details</h1>
<table style="border:1px solid red;width:100%;">
	<tr>
		<th style="border:1px solid red">Name</th>
		<th style="border:1px solid red">Email_id</th>
		<th style="border:1px solid red">Plan Name</th>
		<th style="border:1px solid red">Plan Activation</th>
		<th style="border:1px solid red">Plan Expired</th>
		<th style="border:1px solid red">plan duration</th>
		<th style="border:1px solid red">Payment</th>
	</tr>
	<?php foreach($vendor as $data)
	{?>
	<tr>
		<td style="border:1px solid red"><?php echo $data->planner_name;?></td>
		<td style="border:1px solid red"><?php echo $data->email;?></td>
		<td style="border:1px solid red"><?php echo $data->plan_name;?></td>
		<td style="border:1px solid red"><?php echo $data->plan_activated;?></td>
		<td style="border:1px solid red"><?php echo $data->plan_expired;?></td>
		<td style="border:1px solid red"><?php echo $data->plan_duration;?></td>
		<td style="border:1px solid red"><b>₹<?php echo $data->grand_total;?></b></td>
	</tr>
	<?}?>
	<tr id="demo">
		<td ></td>
		<td ></td>
		<td ><button onclick='deleteplan()'>Print</button></td>
	</tr>
</table>

<script>
    function deleteplan()
    {
        document.getElementById("demo").remove();
        window.print()
    }
</script>

</body>
</html>