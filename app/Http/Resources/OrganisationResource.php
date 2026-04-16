<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganisationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'organisation_name' => $this->organisation_name,
            'organisation_type' => $this->organisation_type,
            'npi' => $this->npi,
            'voip_number' => $this->voip_number,
            'is_deletd' => $this->is_deletd,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => new UserResource(
                $this->whenLoaded('user')
            ),
            'organisation_location' => OrganisationLocationResource::collection(
            $this->whenLoaded('organisation_location')
            ),
        ];
        
    }
}
