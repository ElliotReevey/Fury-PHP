<p>If you have any queries or questions you would like to ask please use the form below to contact us. We will do our best to reply within 24 hours.</p>

<?php if(isset($fail)) { echo errorbox($fail); } ?>

<?=form_open_this("home/contact/submit")?>
	<div class="contentContainer">
		<div class="fieldHolder">
			<div class="labelItem">Name:</div>
			<div class="inputField"><input type="text" name="fullName" class="text" value="<?=set_value('fullName')?>"></div>
		</div>
		<div class="fieldHolder">
			<div class="labelItem">Email Address:</div>
			<div class="inputField"><input type="text" name="emailAddress" class="text" value="<?=set_value('emailAddress')?>"></div>
		</div>
		<div class="fieldHolder">
			<div class="labelItem">Subject:</div>
			<div class="inputField">
				<select name="subjectType" class="selectBox">
					<option selected="selected" value="">-- Select Subject --</option>
					<option>General Enquiry</option>
					<option>Ideas</option>
					<option>Ban</option>
					<option>Login Problems</option>
					<option>Advertising Request</option>
				</select>
			</div>
		</div>
		<div class="fieldHolder">
			<div class="labelItem">Message:</div>
			<div class="inputField"><textarea name="messageBox" class="textArea"><?=set_value('messageBox')?></textarea></div>
		</div>
		<div class="fieldHolder">
			<div class="labelItem">Anti Script:</div>
			<div class="antiScriptCode"></div>
			<div class="antiScriptField"><input type="text" name="antiScript" class="antiScript"></div>
		</div>
		<div class="inputButton">
			<input type="submit" class="submitButton" value="Submit" name="submitButton">
		</div>
	</div>
</form>