<?php
namespace MWStake\MediaWiki\Component\CommonWebAPIs\Rest\Handler;

use Exception;
use Config;
use MediaWiki\Linker\LinkRenderer;
use MWStake\MediaWiki\Component\CommonWebAPIs\Rest\Handler;
use Wikimedia\ParamValidator\ParamValidator;
use Wikimedia\Rdbms\LoadBalancer;

class AsyncMenu extends Handler {
	protected $linkRenderer;
	protected $lb;
	protected $config;

	public function __construct( LinkRenderer $linkRenderer, LoadBalancer $lb, Config $config ) {
		$this->linkRenderer = $linkRenderer;
		$this->lb = $lb;
		$this->config = $config;
	}

	/**
	 * @inheritDoc
	 */
	public function getParamSettings() {
		return parent::getParamSettings() + [
			'menu' => [
				static::PARAM_SOURCE => 'query',
				ParamValidator::PARAM_TYPE => 'string',
				ParamValidator::PARAM_REQUIRED => true,
			],
			'depth' => [
				static::PARAM_SOURCE => 'query',
				ParamValidator::PARAM_TYPE => 'integer',
				ParamValidator::PARAM_DEFAULT => -1,
				ParamValidator::PARAM_REQUIRED => false,
			],
		];
	}

	/**
	 * @inheritDoc
	 */
	public function execute() {
		$params = $this->getValidatedParams();
		try {
		} catch ( Exception $ex ) {
			return $this->getResponseFactory()->createFromException( $ex );
		}

		return $this->getResponseFactory()->createNoContent();
	}
}
