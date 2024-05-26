<?php

namespace App\Filament\Resources\MembershipRequestResource\Pages;

use App\Filament\Resources\MembershipRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMembershipRequests extends ListRecords
{
    protected static string $resource = MembershipRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
