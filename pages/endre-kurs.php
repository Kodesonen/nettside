<?php $core->pageHead("Endre kurs"); ?>
<?php $core->getHeader(); ?>

<?php $core->checkAuth(); ?>

<div class="breadcrumbs">
	<div class="wrapper">
		<ul class="breadcrumb-nav">
			<li><a href="/?side=admin">Kontrollpanel</a></li>
			
			<li><a href="/?side=kursbehandler">Kursbehandler</a></li>
			
			<li><a href="/?side=kapittelbehandler&id=<?php echo $_GET['id']; ?>">
				<?php $core->requestSpecificData("kurskatalog", "id", $_GET['id'], "navn"); ?>
			</a></li>
			
			<li><a href="#">...</a></li>
			
		</ul>
	</div>
</div>

<div class="wrapper">
    <div class="medlem-form">
        <h1>Endre kurs</h1><hr/>
        <div class="wrapper">
            <?php if(isset($_POST['submit'])){ $core->updateCourse(); } ?>
        </div>

        <form action='' method='POST'>
            <label for="navn"><b>Kursnavn</b></label>
            <input type="text" value="<?php $core->requestData("kurskatalog", "navn"); ?>" name="navn" required>
            
            <label for="beskrivelse"><b>Beskrivelse</b></label>
            <input type="text" value="<?php $core->requestData("kurskatalog", "beskrivelse"); ?>" name="beskrivelse" required>

            <label for="ikon"><b>Kursikon</b></label>
            <input type="text" value="<?php $core->requestData("kurskatalog", "ikon"); ?>" name="ikon" required>

            <hr/><button type="submit" name="submit" class="medlem-button add_course_select">Endre kurs</button>
        </form>
    </div>

    <div class="sidebar-image">
        <img src="/assets/img/raw_svg/guy_with_moustache_no_hat.svg"/>
    </div>
</div>

<?php $core->getFooter(); ?>
