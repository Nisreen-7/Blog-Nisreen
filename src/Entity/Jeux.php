<?php
namespace App\Entity;

class Jeux
{
	private ?int $id;
	private string $label;

	private float $prix;
	private string $description;
	private string $image;

	private int $id_categorie;

	public function __construct(string $label, int $prix, string $description, string $image, int $id_categorie, ?int $id = null)
	{
		$this->id = $id;
		$this->label = $label;
		$this->prix = $prix;
		$this->description = $description;
		$this->image = $image;
		$this->id_categorie = $id_categorie;

	}



	/**
	 * @return 
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * @param  $id 
	 * @return self
	 */
	public function setId(?int $id): self
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getLabel(): string
	{
		return $this->label;
	}

	/**
	 * @param  $label 
	 * @return self
	 */
	public function setLabel(string $label): self
	{
		$this->label = $label;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getPrix(): float
	{
		return $this->prix;
	}

	/**
	 * @param  $prix 
	 * @return self
	 */
	public function setPrix(float $prix): self
	{
		$this->prix = $prix;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @param  $description 
	 * @return self
	 */
	public function setDescription(string $description): self
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getImage(): string
	{
		return $this->image;
	}

	/**
	 * @param  $image 
	 * @return self
	 */
	public function setImage(string $image): self
	{
		$this->image = $image;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getId_categorie(): int
	{
		return $this->id_categorie;
	}

	/**
	 * @param  $id_categorie 
	 * @return self
	 */
	public function setId_categorie(int $id_categorie): self
	{
		$this->id_categorie = $id_categorie;
		return $this;
	}
}