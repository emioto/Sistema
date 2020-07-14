<?php 
namespace App\Views\errors;

use App\Enums\MensagemTipoEnum;
?>

<?php if ($PossuiMensagemAviso) : ?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<ul>
			<?php foreach ($Mensagens as $mensagemAviso) : ?>
				<?php if($mensagemAviso->IdMensagemTipo == MensagemTipoEnum::Aviso): ?>
					<li><?= $mensagemAviso->Mensagem ?></li>
				<?php endif ?>
			<?php endforeach ?>
		</ul>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif ?>

<?php if ($PossuiMensagemErro) : ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<ul>
			<?php foreach ($Mensagens as $mensagemErro) : ?>
				<?php if($mensagemErro->IdMensagemTipo == MensagemTipoEnum::Erro): ?>
					<li><?= $mensagemErro->Mensagem ?></li>
				<?php endif ?>
			<?php endforeach ?>
		</ul>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif ?>

<?php if ($PossuiMensagemComum) : ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<ul>
			<?php foreach ($Mensagens as $mensagemComum) : ?>
				<?php if($mensagemComum->IdMensagemTipo == MensagemTipoEnum::Comum): ?>	
					<li><?= $mensagemComum->Mensagem ?></li>
				<?php endif ?>
			<?php endforeach ?>
		</ul>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif ?>
