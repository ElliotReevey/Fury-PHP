<h1>Im the index page</h1>

Links: <a href="/Fury-PHP/home/signup">Signup</a> | <a href="/Fury-PHP/home/contact">Contact</a> | <a href="/Fury-PHP/home/forgottenpassword">Forgotten Password</a>

<?=form_open_this("home/index/submit")?>
	<div class="contentContainer">
		<div class="fieldHolder">
			<div class="labelItem">Email Address:</div>
			<div class="inputField"><input type="text" name="emailAddress" class="text" value=""></div>
		</div>
		<div class="fieldHolder">
			<div class="labelItem">Password:</div>
			<div class="inputField"><input type="password" name="password" class="text"></div>
		</div>
		<div class="inputButton">
			<input type="submit" class="submitButton" value="Submit" name="submitButton">
		</div>
	</div>
</form>