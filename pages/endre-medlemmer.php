<?php $core->pageHead("Endre medlemmer"); ?>
<?php if(!$core->isLoggedIn() || !$core->isAdmin()) header("Location: /?side=hjem"); ?>
<?php $core->getHeader(); ?>

<?php $core->checkAuth(); ?>

<div class="breadcrumbs">
	<div class="wrapper">
		<ul class="breadcrumb-nav">
			<li><a href="/?side=admin">Kontrollpanel</a></li>
			
			<li><a href="/?side=endre-medlemmer">Endre medlemmer</a></li>
			
		</ul>
	</div>
</div>

<div class="wrapper">
    <div class="text-info">
        <h1>Endre medlemmer</h1><br/>
        <p>Her kan du både se på og endre Kodesonens medlemmer. For å endre et medlem må du søke etter medlemmet med enten fullt navn eller e-post.</p>
    </div>

    <div class="grid-12">
		<div class="text-info">
			<h2>Søk etter medlem:</h2>
		</div>
        <div class="wrapper"><?php if(isset($_POST['submit'])){ $core->findMember(); } ?></div>

        <form action='' method='POST' class="mendre-medlemmer">
            <input type="text" id="search-user" class="endre-medlemmer-input" placeholder="Søk etter navn eller e-post..." name="epost" required>
            
            <button type="submit" name="submit" class="endre-medlemmer-button"><i class="fas fa-search"></i> Søk etter medlem</button>
        </form>
    </div>
	
	<div class="text-info">
		<h2>Administratorer:</h2>
	</div>
    <div class="member-list" style="margin-top: 10px; margin-bottom: 30px;">
        <table class="member">
            <tr class="member-leading">
                <td>Navn</th>
                <td>E-post adresse</th>
                <td>Rolle</th>
                <td>Studieretning</th>
                <td>Medlem siden</th>
                <td>API-nøkkel</th>
            </tr>
            <?php $core->listAdmins(); ?>
        </table>
    </div>
	
	<div class="text-info">
		<h2>Medlemmer:</h2>
	</div>
    <div class="member-list">
        <table class="member">
            <tr class="member-leading">
                <td>Navn</th>
                <td>E-post adresse</th>
                <td>Studieretning</th>
                <td>Medlem siden</th>
                <td>Privat medlem</th>
                <td>API-nøkkel</th>
            </tr>
            <?php $core->listMembers(); ?>
        </table>
    </div>
</div>

<?php $core->getFooter(); ?>
