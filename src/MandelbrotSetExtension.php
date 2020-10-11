<?php

declare(strict_types=1);

namespace Mathematicator\MandelbrotSet;


use Nette\DI\CompilerExtension;
use Nette\DI\ContainerBuilder;
use Nette\Schema\Expect;
use Nette\Schema\Schema;

final class MandelbrotSetExtension extends CompilerExtension
{
	public function getConfigSchema(): Schema
	{
		return Expect::structure([
			'tempDir' => Expect::string(),
		])->castTo('array');
	}


	public function beforeCompile(): void
	{
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('mandelbrotSet'))
			->setFactory(MandelbrotSet::class, [
				'tempDir' => $this->processTempDir($builder),
			]);
	}


	private function processTempDir(ContainerBuilder $builder): string
	{
		/** @var mixed[] $config */
		$config = $this->getConfig();

		if (isset($config['tempDir']) === true) {
			if (\is_dir($config['tempDir']) === false) {
				throw new \RuntimeException('Temp path "' . $config['tempDir'] . '" is not directory.');
			}

			return $config['tempDir'];
		}
		if (isset($builder->parameters['tempDir']) === false) {
			throw new \RuntimeException('Configuration parameter "tempDir" is not defined. Please define custom temp dir.');
		}
		if (\is_dir($builder->parameters['tempDir']) === false) {
			throw new \RuntimeException('Temp path "' . $builder->parameters['tempDir'] . '" is not directory.');
		}

		return $builder->parameters['tempDir'] . '/mandelbrot-set';
	}
}
