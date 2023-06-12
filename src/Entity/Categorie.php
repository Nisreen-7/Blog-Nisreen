<?php
namespace App\Entity;

class Categorie
{
    private ?int $id;
    private string $name;
    

    public function __construct( string $name, ?int $id = null)
    {
        $this->id = $id;
        $this->name = $name;
     
}

	/**
	 * @return 
	 */
	public function getId(): ?int {
		return $this->id;
	}
	
	/**
	 * @param  $id 
	 * @return self
	 */
	public function setId(?int $id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param  $name 
	 * @return self
	 */
	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}
}