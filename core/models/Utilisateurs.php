<?php

namespace app\core\models;

class Utilisateurs {
	private int $id;
    private string $mail;
    private ?string $username;
    private ?string $password;
    private bool $connexion = false;

    public function __construct(string $mail, string $username = null, string $password = null, bool $connexion, int $id = 0) {
		// $this->id = $id;
        // $this->$mail = $mail;
        // $this->username = $username;
        // $this->password = $password;
		// $this->connexion = $connexion;
		$this->setId($id);
        $this->setMail($mail);
        $this->setUsername($username);
        $this->setPassword($password);
		$this->setConnexion($connexion);
    }

	/**
	 * @return string
	 */
	public function getMail(): string {
		return $this->mail;
	}
	
	/**
	 * @param string $mail 
	 * @return self
	 */
	public function setMail(string $mail): self {
		$this->mail = $mail;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getUsername(): string {
		return $this->username;
	}
	
	/**
	 * @param string $username 
	 * @return self
	 */
	public function setUsername(?string $username): self {
		$this->username = $username;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getPassword(): string {
		return $this->password;
	}
	
	/**
	 * @param string $password 
	 * @return self
	 */
	public function setPassword(?string $password): self {
		$this->password = $password;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getConnexion(): bool {
		return $this->connexion;
	}
	
	/**
	 * @param bool $connexion 
	 * @return self
	 */
	public function setConnexion(bool $connexion): self {
		$this->connexion = $connexion;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
}