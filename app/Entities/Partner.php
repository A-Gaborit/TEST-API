<?php

namespace App\Entities;

class Partner
{
    /**
     * @var string
     */
    public readonly string $id;
    /**
     * @var string
     */
    public string $companyName;
    /**
     * @var string
     */
    public string $contactEmail;
    /**
     * @var string
     */
    public string $contactPhone;

    /**
     * @var string|null
     */
    public ?string $website;
    /**
     * @var string|null
     */
    public ?string $logoPath;

    /**
     * @param string $id
     * @param string $companyName
     * @param string $contactEmail
     * @param string $contactPhone
     * @param string|null $website
     * @param string|null $logoPath
     */
    public function __construct(string $id, string $companyName, string $contactEmail, string $contactPhone, ?string $website, ?string $logoPath)
    {
        $this->id = $id;
        $this->companyName = $companyName;
        $this->contactEmail = $contactEmail;
        $this->contactPhone = $contactPhone;
        $this->website = $website;
        $this->logoPath = $logoPath;
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
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     * @return void
     */
    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @return string
     */
    public function getContactEmail(): string
    {
        return $this->contactEmail;
    }

    /**
     * @param string $contactEmail
     * @return void
     */
    public function setContactEmail(string $contactEmail): void
    {
        $this->contactEmail = $contactEmail;
    }

    /**
     * @return string
     */
    public function getContactPhone(): string
    {
        return $this->contactPhone;
    }

    /**
     * @param string $contactPhone
     * @return void
     */
    public function setContactPhone(string $contactPhone): void
    {
        $this->contactPhone = $contactPhone;
    }

    /**
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param string|null $website
     * @return void
     */
    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return string|null
     */
    public function getLogoPath(): ?string
    {
        return $this->logoPath;
    }

    /**
     * @param string|null $logoPath
     * @return void
     */
    public function setLogoPath(?string $logoPath): void
    {
        $this->logoPath = $logoPath;
    }
}
