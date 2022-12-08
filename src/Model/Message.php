<?php

namespace Model;

class Message 
{
	private ?int $id = null;
	private ?string $name = null;
	private ?string $content = null;
	private \DateTimeInterface $dateCreated;

	public function __construct()
	{
		$this->dateCreated = new \DateTime();
	}
	
	public function getId(): ?int
	{
		return $this->id;
	}
	
	public function setId(?int $id): self
	{
		$this->id = $id;
		return $this;
	}
	
	public function getName(): ?string
	{
		return $this->name;
	}
	
	public function setName(?string $name): self
	{
		$this->name = $name;
		return $this;
	}
	
	public function getContent(): ?string
	{
		return $this->content;
	}
	
	public function setContent(?string $content): self
	{
		$this->content = $content;
		return $this;
	}
	
	public function getDateCreated(): \DateTimeInterface
	{
		return $this->dateCreated;
	}
}