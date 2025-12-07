<?php

namespace App\Entities;

class MemberPartner
{
    /**
     * @var string
     */
    public readonly string $id;
    /**
     * @var string
     */
    public string $userId;
    /**
     * @var string
     */
    public string $partnerId;
    /**
     * @var string|null
     */
    public ?string $role;

    /**
     * @param string $id
     * @param string $userId
     * @param string $partnerId
     * @param string|null $role
     */
    public function __construct(string $id, string $userId, string $partnerId, ?string $role)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->partnerId = $partnerId;
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getPartnerId(): string
    {
        return $this->partnerId;
    }

    /**
     * @param string $partnerId
     */
    public function setPartnerId(string $partnerId): void
    {
        $this->partnerId = $partnerId;
    }

    /**
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param string|null $role
     */
    public function setRole(?string $role): void
    {
        $this->role = $role;
    }
}
