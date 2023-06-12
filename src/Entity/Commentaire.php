<?php
namespace App\Entity;

class Commentaire
{
	private ?int $id;
	private string $commentaire;
	private int $id_jeux;

	public function __construct(string $commentair, int $id_jeux, ?int $id = null)
	{
		$this->id = $id;
		$this->commentaire = $commentair;
		$this->id_jeux = $id_jeux;

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
	public function getCommentaire(): string
	{
		return $this->commentaire;
	}

	/**
	 * @param  $commentaire 
	 * @return self
	 */
	public function setCommentaire(string $commentaire): self
	{
		$this->commentaire = $commentaire;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getId_jeux(): int
	{
		return $this->id_jeux;
	}

	/**
	 * @param  $id_jeux 
	 * @return self
	 */
	public function setId_jeux(int $id_jeux): self
	{
		$this->id_jeux = $id_jeux;
		return $this;
	}
}