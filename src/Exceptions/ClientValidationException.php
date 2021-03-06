<?php
/**
 * Created by IntelliJ IDEA.
 * User: mduncan
 * Date: 4/21/15
 * Time: 1:25 PM
 */

namespace Fulfillment\Postage\Exceptions;


class ClientValidationException extends PostageException {

	public $validationErrors;
	public $context;

	public function __construct($message = null, $errors = [], \Exception $previous = null, $omsCode = 11)
	{
		$this->validationErrors = $errors;

		$message = $message ?: 'The requested action failed validation.';

		if (!empty($this->validationErrors))
		{
			$message .= PHP_EOL;
			$message .= ' Failed tests: ' . PHP_EOL;
		}

		$message .= json_encode($this->validationErrors, JSON_PRETTY_PRINT);

		parent::__construct($message, 0, $previous, $omsCode);
	}

}