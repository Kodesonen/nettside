
<?php $core->pageHead("Endre utfordring"); ?>

	<?php $core->getHeader(); ?>
	<div class="wrapper">
		<div class="medlem-form">
			<h1>Endre utfordring</h1><hr/>
			<div class="wrapper">
				<?php if(isset($_POST['submit'])){ $core->updateChallenge(); } ?>
				<?php if(isset($_POST['delete'])){ $core->deleteChallenge(); } ?>
			</div>

			<form action='' method='POST'>
				<label for="tittel"><b>Tittel</b></label>
				<input type="text" value="<?php $core->requestData("utfordringer", "tittel"); ?>" name="tittel" required>

				<label for="beskrivelse"><b>Beskrivelse</b></label>
				<input type="text" value="<?php $core->requestData("utfordringer", "beskrivelse"); ?>" name="beskrivelse" required>

				<label for="kildekode"><b>Kildekode</b></label>
				<input type="text" value="<?php $core->requestData("utfordringer", "git"); ?>" name="kildekode" required>

				<hr/><button type="submit" name="submit" class="medlem-button add_course_select">Oppdater utfordring</button>
				<button type="submit" name="delete" class="medlem-button add_course_select">Slett utfordring</button>
			</form>
		</div>
		
		<div class="sidebar-image">
			<img src="/assets/img/raw_svg/woman_with_backpack_and_robot.svg"/>
		</div>
	</div>
	
	<?php $core->getFooter(); ?>