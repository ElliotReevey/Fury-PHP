<h1>Im the forgotten password page</h1>

<?=form_open_this("home/forgottenpassword/submit")?>
	<div class="contentContainer">
		<div class="fieldHolder">
			<div class="labelItem">Email Address:</div>
			<div class="inputField"><input type="text" name="emailAddress" class="text" value="<?=set_value('emailAddress')?>"></div>
		</div>
		<div class="inputButton">
			<input type="submit" class="submitButton" value="Submit" name="submitButton">
		</div>
	</div>
</form>