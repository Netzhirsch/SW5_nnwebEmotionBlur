<?php

namespace nnwebEmotionBlur;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\ActivateContext;
use Shopware\Components\Plugin\Context\DeactivateContext;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UpdateContext;
use Exception;
use Doctrine\Common\Collections\ArrayCollection;

class nnwebEmotionBlur extends Plugin {
	private $pluginname = 'nnwebEmotionBlur';

	public static function getSubscribedEvents() {
		return [
				'Enlight_Controller_Action_PostDispatchSecure_Widgets_Emotion' => 'extendsEmotionTemplates',
				'Enlight_Controller_Action_PostDispatchSecure_Backend_Emotion' => 'onPostDispatchBackendEmotion',
				'Theme_Compiler_Collect_Plugin_Less' => 'addLessFiles'
		];
	}

	public function activate(ActivateContext $context) {
		$context->scheduleClearCache(InstallContext::CACHE_LIST_ALL);
		parent::activate($context);
	}

	public function deactivate(DeactivateContext $context) {
		$context->scheduleClearCache(InstallContext::CACHE_LIST_ALL);
		parent::deactivate($context);
	}

	public function update(UpdateContext $context) {
		
		if (version_compare($context->getCurrentVersion(), "1.1.0", "<=")) {
			
			$emotionComponentInstaller = $this->container->get('shopware.emotion_component_installer');
			$element = $emotionComponentInstaller->createOrUpdate($this->getName(), "Blur-Banner", [
				'name' => 'Blur-Banner',
				'template' => 'component_nnweb_emotion_blur',
				'xtype' => 'emotion-components-nnweb-emotion-blur',
				'cls' => 'nnweb-emotion-blur'
			]);
			
			$element->createField([
				'name' => $this->pluginname . '_button_link_artikel',
				'fieldLabel' => 'Link auf Artikel',
				'xtype' => 'emotion-components-fields-article',
				'supportText' => 'Wird hier ein Artikel ausgewählt, wird der obige Link überschrieben.',
				'allowBlank' => true,
				'position' => '19'
			]);
			
		}
		
		$context->scheduleClearCache(InstallContext::CACHE_LIST_ALL);
		parent::update($context);
	}

	public function install(InstallContext $context) {
		parent::install($context);
		$this->registerEmotionElement();
	}

	private function registerEmotionElement() {
		$emotionComponentInstaller = $this->container->get('shopware.emotion_component_installer');
		
		$element = $emotionComponentInstaller->createOrUpdate($this->getName(), $this->pluginname, [
			'name' => 'Blur-Banner',
			'template' => 'component_nnweb_emotion_blur',
			'xtype' => 'emotion-components-nnweb-emotion-blur',
			'cls' => 'nnweb-emotion-blur'
		]);
		
		// Hintergrund
		$element->createDisplayField([
			'name' => 'hintergrund',
			'defaultValue' => 'Hintergrund',
			'supportText' => '',
			'allowBlank' => true
		]);
		
		$element->createMediaField([
			'name' => $this->pluginname . '_hintergrundbild',
			'fieldLabel' => 'Hintergrundbild',
			'supportText' => 'Bitte wählen Sie ein Bild aus der Media-Verwaltung.',
			'allowBlank' => true,
			'translatable' => true
		]);
		
		// Box
		$element->createDisplayField([
			'name' => 'textbox',
			'defaultValue' => 'Textbox',
			'supportText' => '',
			'allowBlank' => true
		]);
		
		$element->createComboBoxField([
			'fieldLabel' => 'Textausrichtung',
			'name' => $this->pluginname . '_textbox_text_align',
			'supportText' => 'Sie können hier den Textfluss festlegen.',
			'allowBlank' => false,
			'store' => 'Shopware.apps.nnwebEmotionBlur.store.TextAlignStore',
			'queryMode' => 'local',
			'displayField' => 'name',
			'valueField' => 'value',
			'defaultValue' => 'center'
		]);
		
		$element->createNumberField([
			'name' => $this->pluginname . '_textbox_width',
			'fieldLabel' => 'Textbox Breite',
			'defaultValue' => '50',
			'supportText' => 'Geben Sie eine Zahl zwischen 0 und 100 an. Der Wert entspricht der Breite in Prozent.',
			'allowBlank' => true
		]);
		
		$element->createNumberField([
			'name' => $this->pluginname . '_textbox_blur_factor',
			'fieldLabel' => 'Textbox Blur-Effekt-Faktor',
			'defaultValue' => '10',
			'supportText' => 'Geben Sie eine positive Zahl an. Der Wert entspricht der Unschärfe in Pixeln.',
			'allowBlank' => true
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_textbox_cls',
			'fieldLabel' => 'Textbox CSS-Klasse',
			'defaultValue' => '',
			'supportText' => 'Mehrere Klassen können mit einem Leerzeichen getrennt hinzugefügt werden.',
			'allowBlank' => true
		]);
		
		// Überschrift
		$element->createDisplayField([
			'name' => 'ueberschrift',
			'defaultValue' => 'Überschrift',
			'supportText' => '',
			'allowBlank' => true
		]);
		
		$element->createComboBoxField([
			'fieldLabel' => 'Überschrift anzeigen',
			'name' => $this->pluginname . '_ueberschrift_anzeigen',
			'supportText' => 'Wann soll die Überschrift sichtbar sein?',
			'allowBlank' => false,
			'store' => 'Shopware.apps.nnwebEmotionBlur.store.HoverVisibilityStore',
			'queryMode' => 'local',
			'displayField' => 'name',
			'valueField' => 'value',
			'defaultValue' => 'always'
		]);
		
		$element->createComboBoxField([
			'fieldLabel' => 'Überschrift-Tag',
			'name' => $this->pluginname . '_ueberschrift_tag',
			'supportText' => 'Sie können hier den HTML-Tag, der für die Überschrift genutzt wird, eingeben.',
			'allowBlank' => false,
			'store' => 'Shopware.apps.nnwebEmotionBlur.store.HeadlineTagStore',
			'queryMode' => 'local',
			'displayField' => 'name',
			'valueField' => 'value',
			'defaultValue' => 'h2'
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_ueberschrift_text',
			'fieldLabel' => 'Überschrift',
			'defaultValue' => 'Überschrift',
			'supportText' => 'Sie können hier eine Überschrift eingeben.',
			'allowBlank' => true,
			'translatable' => true
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_ueberschrift_cls',
			'fieldLabel' => 'Überschrift CSS-Klasse',
			'defaultValue' => '',
			'supportText' => 'Mehrere Klassen können mit einem Leerzeichen getrennt hinzugefügt werden.',
			'allowBlank' => true
		]);
		
		// Text
		$element->createDisplayField([
			'name' => 'text',
			'defaultValue' => 'Text',
			'supportText' => '',
			'allowBlank' => true
		]);
		
		$element->createComboBoxField([
			'fieldLabel' => 'Text anzeigen',
			'name' => $this->pluginname . '_text_anzeigen',
			'supportText' => 'Wann soll der Text sichtbar sein?',
			'allowBlank' => false,
			'store' => 'Shopware.apps.nnwebEmotionBlur.store.HoverVisibilityStore',
			'queryMode' => 'local',
			'displayField' => 'name',
			'valueField' => 'value',
			'defaultValue' => 'hover'
		]);
		
		$element->createTextAreaField([
			'name' => $this->pluginname . '_text_text',
			'fieldLabel' => 'Text',
			'defaultValue' => 'Sie können hier einen Text eingeben',
			'supportText' => 'Sie können hier einen Text eingeben',
			'allowBlank' => true,
			'translatable' => true
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_text_cls',
			'fieldLabel' => 'Text CSS-Klasse',
			'defaultValue' => '',
			'supportText' => 'Mehrere Klassen können mit einem Leerzeichen getrennt hinzugefügt werden.',
			'allowBlank' => true
		]);
		
		// Button
		$element->createDisplayField([
			'name' => 'button',
			'defaultValue' => 'Button',
			'supportText' => '',
			'allowBlank' => true
		]);
		
		$element->createComboBoxField([
			'fieldLabel' => 'Button anzeigen',
			'name' => $this->pluginname . '_button_anzeigen',
			'supportText' => 'Wann soll der Button sichtbar sein?',
			'allowBlank' => false,
			'store' => 'Shopware.apps.nnwebEmotionBlur.store.HoverVisibilityStore',
			'queryMode' => 'local',
			'displayField' => 'name',
			'valueField' => 'value',
			'defaultValue' => 'hover'
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_button_text',
			'fieldLabel' => 'Button-Text',
			'defaultValue' => 'Button-Text',
			'supportText' => 'Sie können hier einen Text für den  Button eingeben',
			'allowBlank' => true,
			'translatable' => true
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_button_link',
			'fieldLabel' => 'Button-Link',
			'defaultValue' => '',
			'supportText' => 'Sie können hier einen Link für den Button definieren.',
			'allowBlank' => true,
			'translatable' => true
		]);
			
		$element->createField([
			'name' => $this->pluginname . '_button_link_artikel',
			'fieldLabel' => 'Link auf Artikel',
			'xtype' => 'emotion-components-fields-article',
			'supportText' => 'Wird hier ein Artikel ausgewählt, wird der obige Link überschrieben.',
			'allowBlank' => true
		]);
		
		$element->createComboBoxField([
			'fieldLabel' => 'Link öffnen in',
			'name' => $this->pluginname . '_button_link_target',
			'supportText' => 'Sie können hier festlegen, wo der Link geöffnet wird.',
			'allowBlank' => false,
			'store' => 'Shopware.apps.nnwebEmotionBlur.store.LinkTargetStore',
			'queryMode' => 'local',
			'displayField' => 'name',
			'valueField' => 'value',
			'defaultValue' => '_self'
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_button_cls',
			'fieldLabel' => 'Button CSS-Klasse',
			'defaultValue' => '',
			'supportText' => 'Mehrere Klassen können mit einem Leerzeichen getrennt hinzugefügt werden.',
			'allowBlank' => true
		]);
	}

	public function addLessFiles(\Enlight_Event_EventArgs $args) {
		$less = new \Shopware\Components\Theme\LessDefinition(array(), array(
				__DIR__ . '/Resources/views/frontend/_public/src/less/all.less'
		), __DIR__);
		
		return new ArrayCollection(array(
				$less
		));
	}

	public function extendsEmotionTemplates(\Enlight_Event_EventArgs $args) {
		$controller = $args->getSubject();
		$view = $controller->View();
		$view->addTemplateDir(__DIR__ . '/Resources/views/frontend/');
	}

	public function onPostDispatchBackendEmotion(\Enlight_Controller_ActionEventArgs $args) {
		$controller = $args->getSubject();
		$view = $controller->View();
		$view->addTemplateDir(__DIR__ . '/Resources/views/');
		$view->extendsTemplate('backend/emotion/nnweb_emotion_blur/view/detail/elements/nnweb_emotion_blur.js');
		$view->extendsTemplate('backend/emotion/nnweb_emotion_blur/nnweb_emotion_blur_store.js');
	}
}