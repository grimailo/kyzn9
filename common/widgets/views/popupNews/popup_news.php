<?php

use \yii\widgets\ListView;

/**
 * @var $dataProvider
 */
?>
<div class="popupContainer">
	<h4 class="block-title">Новые новости</h4>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'popup_list',
        'layout' => "\n{items}\n{pager}",
    ]);
    ?>

	<button type="button" id="close-notification" class="close" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>

</div>
