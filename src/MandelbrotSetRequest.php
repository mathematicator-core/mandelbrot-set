<?php

declare(strict_types=1);

namespace Mathematicator\MandelbrotSet;


final class MandelbrotSetRequest
{
	private int $width;

	private int $height;

	private int $iterations;

	private float $minX;

	private float $maxX;

	private float $minY;

	private float $maxY;

	private int $deltaA;

	private int $deltaB;


	public function __construct(
		int $deltaA,
		int $deltaB,
		int $width = 300,
		int $height = 300,
		int $iterations = 18,
		float $minX = -2.0,
		float $maxX = 1.0,
		float $minY = -1.0,
		float $maxY = 1.0
	) {
		$this->width = $width;
		$this->height = $height;
		$this->iterations = $iterations;
		$this->minX = $minX;
		$this->maxX = $maxX;
		$this->minY = $minY;
		$this->maxY = $maxY;
		$this->deltaA = $deltaA;
		$this->deltaB = $deltaB;
	}


	/**
	 * @return int[]|float[]
	 */
	public function getParams(): array
	{
		return [
			$this->width, $this->height, $this->iterations,
			$this->minX, $this->maxX, $this->minY, $this->maxY,
			$this->deltaA, $this->deltaB,
		];
	}


	public function getFileName(): string
	{
		return implode('_', $this->getParams()) . '.png';
	}


	public function getWidth(): int
	{
		return $this->width;
	}


	public function getHeight(): int
	{
		return $this->height;
	}


	public function getIterations(): int
	{
		return $this->iterations;
	}


	public function getMinX(): float
	{
		return $this->minX;
	}


	public function getMaxX(): float
	{
		return $this->maxX;
	}


	public function getMinY(): float
	{
		return $this->minY;
	}


	public function getMaxY(): float
	{
		return $this->maxY;
	}


	public function getDeltaA(): int
	{
		return $this->deltaA;
	}


	public function getDeltaB(): int
	{
		return $this->deltaB;
	}
}
