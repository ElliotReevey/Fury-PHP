<h1>Im the signup page</h1>
<?=$fail?>
<?=form_open_this("home/signup/submit")?>
	<div class="contentContainer">
		<div class="fieldHolder">
			<div class="labelItem">Email Address:</div>
			<div class="inputField"><input type="text" name="emailAddress" class="text" value="<?=set_value('emailAddress')?>"></div>
		</div>
		<div class="fieldHolder">
			<div class="labelItem">Confirm Email:</div>
			<div class="inputField"><input type="text" name="confirmEmail" class="text" value="<?=set_value('confirmEmail')?>"></div>
		</div>
		<div class="fieldHolder">
			<div class="labelItem">Gender:</div>
			<div class="inputField">
				<select name="genderType" class="selectBox">
					<option selected="selected" value="">-- Select Gender --</option>
					<option>Male</option>
					<option>Female</option>
				</select>
			</div>
		</div>
		<div class="fieldHolder">
			<div class="labelItem">Age:</div>
			<div class="inputField">
				<select name="ageAmount" class="selectBox">
					<option selected="selected" value="">-- Select Age --</option>
					<option value="13">< 13</option>
					<?php for($i = 14; $i < 65; $i++) {?>
						<option><?=$i?></option>
					<?php } ?>
					<option value="65">65 ></option>
				</select>
			</div>
		</div>
		<div class="fieldHolder">
			<div class="labelItem">Referral Code:</div>
			<div class="inputField"><input type="text" name="referralCode" class="text" value="<?=set_value('referralCode')?>"></div>
		</div>
		<div class="fieldHolder">
			<div class="labelItem">Anti Script:</div>
			<div class="antiScriptCode"></div>
			<div class="antiScriptField"><input type="text" name="antiScript" class="antiScript"></div>
		</div>
		<div class="fieldHolder">
			<div class="longLabelItem">I have read and accept the terms of service</div>
			<div class="inputField"><input type="checkbox" name="termsOfService" class="checkBox" value="1"></div>
		</div>
		<div class="inputButton">
			<input type="submit" class="submitButton" value="Register" name="submitButton">
		</div>
	</div>
</form>