{block name="widgets_emotion_components_nnweb_emotion_blur"}
	{if $Data.nnwebEmotionBlur_button_link_produkt_id}
		{$link = {url controller="detail" sArticle=$Data.nnwebEmotionBlur_button_link_produkt_id}}
	{else}
		{$link = $Data.nnwebEmotionBlur_button_link}
	{/if}

	<div class="nnweb_emotion_blur {$Data.nnwebEmotionBlur_hintergrund_position}" style="background-image:url('{$Data.nnwebEmotionBlur_hintergrundbild}')">
		
		<div class="wrapper {$Data.nnwebEmotionBlur_textbox_position_x} {$Data.nnwebEmotionBlur_textbox_position_y}" style="text-align:{$Data.nnwebEmotionBlur_textbox_text_align};width:{$Data.nnwebEmotionBlur_textbox_width}%;">		
			
			<div class="background-wrap">
				<div class="background background_{$rnd_id} {$Data.nnwebEmotionBlur_textbox_position_x} {$Data.nnwebEmotionBlur_textbox_position_y}"
					style="
						filter:blur({$Data.nnwebEmotionBlur_textbox_blur_factor}px);
						background-image:url('{$Data.nnwebEmotionBlur_hintergrundbild}');
						background-size:{10000/$Data.nnwebEmotionBlur_textbox_width/1.5}%;
					"
				></div>
			</div>
						
			<{$Data.nnwebEmotionBlur_ueberschrift_tag} class="headline {$Data.nnwebEmotionBlur_ueberschrift_cls} visibility-{$Data.nnwebEmotionBlur_ueberschrift_anzeigen}">
				{$Data.nnwebEmotionBlur_ueberschrift_text}
			</{$Data.nnwebEmotionBlur_ueberschrift_tag}>
			
			<p class="{$Data.nnwebEmotionBlur_text_cls} visibility-{$Data.nnwebEmotionBlur_text_anzeigen}">{$Data.nnwebEmotionBlur_text_text}</p>
			
			<a class="{$Data.nnwebEmotionBlur_button_cls} visibility-{$Data.nnwebEmotionBlur_button_anzeigen}" href="{$link}" target="{$Data.nnwebEmotionBlur_button_link_target}">
				<span>{$Data.nnwebEmotionBlur_button_text}</span>
			</a>
			
		</div>
	</div>
{/block}