<?php $core->pageHead("Søkemotoroptimalisering"); ?>
<?php $core->getHeader(); ?>

<?php $core->checkAuth(); ?>

<div class="breadcrumbs">
	<div class="wrapper">
		<ul class="breadcrumb-nav">
			<li><a href="/?side=admin">Kontrollpanel</a></li>
			
			<li><a href="/?side=sokemotoroptimalisering">Søkemotoroptimalisering</a></li>
			
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="text-info">
		<h1>Søkemotoroptimalisering</h1><br/>
		<p>Velg en side ved å klikke på den, for å så tilpasse On-Page SEO.</p><br/>
	</div>
	<div class="seo-listing" style="grid-column: span 12;">
		<?php $core->listSEO(); ?>
	</div>
</div>

<?php $core->getFooter(); ?>
