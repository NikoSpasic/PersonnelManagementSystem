<?php 

/***********************************/
/********** CONTROLLER *************/
/***********************************/

require_once("controller/index.controller.php");

/***********************************/
/********** PAGE ELEMENTS **********/
/***********************************/

require_once("include/pageElements/header.php");

?>


<h1>Godisnji odmor tabela:</h1><br>

<table class="table table-bordered table-hover table-striped">
	
	<tr>
		<th>Id</th>
		<th>Radnik</th>
		<th>Stari Godisnji</th>
		<th>Novi Godisnji</th>
		<th>Iskorisceno</th>
		<th>Preostalo</th>
		<th colspan="2">Akcija</th>
	</tr>
	
	<?php if ($korisnici): ?>
		<?php foreach($korisnici as $korisnik): ?>
			<tr>
				<td><?= $korisnik->getId() ?></td>
				<td><?= $korisnik->getIme() ?> <?= $korisnik->getPrezime() ?></td>
				<td><?= $korisnik->getGoStari() ?> dana (<?= date("Y") - 1 ?>)</td>
				<td><?= $korisnik->getGoNovi() ?> dana (<?= date("Y") ?>)</td>
				<td><?= $korisnik->getGoIskorisceno() ?> dana</td>
				<td><?= $korisnik->getGoPreostalo() ?> dana</td>
				<td class="text-center"><a class="btn btn-outline-secondary btn-sm" href="#"><i class="fa fa-pencil-square-o fa-lg"></i></a></td>
				<td class="text-center"><a class="btn btn-outline-danger btn-sm" href="#"><i class="fa fa-trash-o fa-lg"></i></a></td>
			</tr>
		<?php endforeach; ?>
	<?php else: ?>
		<tr><td colspan="8"><p class="text-center font-weight-bold"><?= $poruka ?></p></td></tr>	
	<?php endif; ?>

</table>


<?php require_once("include/pageElements/footer.php"); ?>
