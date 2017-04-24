<!-- monster stats  -->
<input type="text" name="monster_hp" id="monster_hp" value="<?php echo $monster_hp; ?>" hidden="true">
<input type="text" name="monster_attack" id="monster_attack" value="<?php echo $monster_attack; ?>" hidden="true">
<input type="text" name="monster_item" id="monster_item" value="<?php echo $monster_item; ?>" hidden="true">
<!-- game form -->
<form role="form" action="includes/cobra.run.php" method="post" name="room_change">
	<input type="text" name="current_room" id="current_room" value="<?php echo $cr; ?>" hidden="true">
	<input type="text" name="hp" id="hp" value="<?php echo $hp; ?>" hidden="true">
	<input type="text" name="money" id="money" value="<?php echo $money; ?>" hidden="true">
	<input type="text" name="weapon" id="weapon" value="<?php echo $weapon; ?>" hidden="true">
	<input type="text" name="head" id="head" value="<?php echo $head; ?>" hidden="true">
	<input type="text" name="chest" id="chest" value="<?php echo $chest; ?>" hidden="true">
	<input type="text" name="hands" id="hands" value="<?php echo $hands; ?>" hidden="true">
	<input type="text" name="legs" id="legs" value="<?php echo $legs; ?>" hidden="true">
	<input type="text" name="ci_array" id="ci_array" value="<?php echo $ci_array; ?>" hidden="true">
	<input type="text" name="pi_array" id="pi_array" value="<?php echo $pi_array; ?>" hidden="true">
	<input type="text" name="hi_array" id="hi_array" value="<?php echo $hi_array; ?>" hidden="true">
	<input type="text" name="rm_array" id="rm_array" value="<?php echo $rm_array; ?>" hidden="true">
	<input type="text" name="dracula" id="dracula" value="<?php echo $dracula; ?>" hidden="true">
	<input type="text" name="moves" id="moves" value="<?php echo $moves; ?>" hidden="true">
</form>