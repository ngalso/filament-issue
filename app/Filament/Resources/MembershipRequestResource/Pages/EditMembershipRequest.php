<?php

namespace App\Filament\Resources\MembershipRequestResource\Pages;

use App\Filament\Resources\MembershipRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMembershipRequest extends EditRecord
{
    protected static string $resource = MembershipRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
