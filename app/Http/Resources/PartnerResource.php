<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Entities\Partner;

class PartnerResource extends JsonResource
{
    /**
     * @var Partner
     */
    public $resource;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->getId(),
            'company_name' => $this->resource->getCompanyName(),
            'contact_email' => $this->resource->getContactEmail(),
            'contact_phone' => $this->resource->getContactPhone(),
            'website' => $this->resource->getWebsite(),
            'logo_path' => $this->resource->getLogoPath(),
        ];
    }
}
