<?php 
namespace App\Views\errors; 
use App\Enums\MensagemTipoEnum;

echo var_dump($PossuiMensagemAviso);
echo var_dump($PossuiMensagemErro);
echo var_dump($PossuiMensagemSucesso);
?>

<?php if ($PossuiMensagemAviso) : ?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<ul>
			<?php foreach ($ValidacaoView as $mensagemAviso) : ?>
				<li><?= $mensagemAviso->Mensagem ?></li>
			<?php endforeach ?>
		</ul>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif ?>

<?php if ($PossuiMensagemErro) : ?>
	<ul class="alert alert-dismissible alert-danger">
	<?php foreach ($ValidacaoView as $mensagemErro) : ?>
		<li><?= $mensagemErro->Mensagem ?></li>
	<?php endforeach ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</ul>
<?php endif ?>

<?php if ($PossuiMensagemSucesso) : ?>
	<ul class="alert alert-dismissible alert-success">
	<?php foreach ($ValidacaoView as $mensagemSucesso) : ?>
		<li><?= $mensagemSucesso->Mensagem ?></li>
	<?php endforeach ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</ul>
<?php endif ?>
