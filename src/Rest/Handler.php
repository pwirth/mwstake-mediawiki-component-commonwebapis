<?php

namespace MWStake\MediaWiki\Component\CommonWebAPIs\Rest;

use MediaWiki\Rest\Handler as BaseHandler;
use MediaWiki\Rest\Validator\Validator;
use Wikimedia\ParamValidator\ParamValidator;

abstract class Handler extends BaseHandler {

	/**
	 * @return array
	 */
	public function getParamSettings() {
		return [
			'context' => [
				static::PARAM_SOURCE => 'query',
				ParamValidator::PARAM_TYPE => 'string',
				ParamValidator::PARAM_REQUIRED => true,
				ParamValidator::PARAM_DEFAULT => '{}'
			],
		];
	}

	/**
	 * @inheritDoc
	 */
	public function needsReadAccess() {
		return true;
	}

	/**
	 * @inheritDoc
	 */
	public function needsWriteAccess() {
		return false;
	}

	/**
	 * @param Validator $restValidator
	 */
	public function validate( Validator $restValidator ) {
		parent::validate( $restValidator );
	}
}
