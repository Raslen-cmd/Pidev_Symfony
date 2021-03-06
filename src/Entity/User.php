<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;


/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotNull
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotNull
     * @Assert\Length(
     *      min = 6,
     *      exactMessage = "Your password must at least have {{ limit }} caracters"
     * )
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotNull
     * @Assert\Length(
     *      min = 2,
     *      max = 26,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $first_name;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull
     * @Assert\Length(
     *      min = 2,
     *      max = 26,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     *
     */
    private $last_name;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     *  @Assert\Length(
     *
     *      max = 8,
     *      min = 8,
     *      exactMessage = "Your number must have {{ limit }} digits"
     * )
     */
    private $number;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotNull
     */
    private $birthday;
    /**
     * @ORM\Column(type="datetime")
     */
    private $created_date_user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $last_updated_user;

    /**
     * @Recaptcha\IsTrue
     */
    public $recaptcha;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default" : 0})
     */
    private $blocked;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getCreatedDateUser(): ?\DateTimeInterface
    {
        return $this->created_date_user;
    }

    public function setCreatedDateUser(\DateTimeInterface $created_date_user): self
    {
        $this->created_date_user = $created_date_user;

        return $this;
    }

    public function getLastUpdatedUser(): ?\DateTimeInterface
    {
        return $this->last_updated_user;
    }

    public function setLastUpdatedUser(\DateTimeInterface $last_updated_user): self
    {
        $this->last_updated_user = $last_updated_user;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getBlocked(): ?bool
    {
        return $this->blocked;
    }

    public function setBlocked(?bool $blocked): self
    {
        $this->blocked = $blocked;

        return $this;
    }
}
