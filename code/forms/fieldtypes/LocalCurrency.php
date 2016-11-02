<?php

require_once 'Zend/Currency.php';

/**
 * Localized currency, extension of {@link Currency}
 */
class LocalCurrency extends Currency {

	private static $position = 8; // Zend_Currency::STANDARD;
	private static $script = null;
	private static $format = null;
	private static $display = 1; // Zend_Currency::NO_SYMBOL;
	private static $precision = 2;
	private static $currency_name = null;
	private static $currency = null;
	private static $symbol = null;
	private static $locale = null;
	private static $service = null;
	private static $tag = 'Zend_Locale';

	public function Nice($localized = true) {
		if ($localized) {
			$currency = new Zend_Currency(i18n::get_locale());
			$options = is_array($this->options()) ? $this->options() : array();
			return $currency->toCurrency(floatval($this->value), $options);
		}

		return parent::Nice();
	}

	public function Whole($localized = true) {
		if ($localized) {
			$currency = new Zend_Currency(i18n::get_locale());
			$options = array_merge($this->options(), ['precision' => 0]);
			return $currency->toCurrency(floatval($this->value), $options);
		}

		return parent::Whole();
	}

	private function options() {
		return array(
//				'position' => $this->config()->position,
////				'script' => $this->config()->script,
//				'format' => $this->config()->format,
				'display' => Zend_Currency::NO_SYMBOL,
//				'precision' => $this->config()->precision,
//				'name' => $this->config()->currency_name,
//				'currency' => $this->config()->currency,
//				'symbol' => $this->config()->symbol,
//				'locale' => $this->config()->locale,
//				'service' => $this->config()->service,
//				'tag' => $this->config()->tag
		);
	}

}
