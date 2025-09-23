<?php

namespace App\Filament\Resources\Subscriptions\Pages;

use App\Filament\Resources\Subscriptions\SubscriptionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSubscription extends EditRecord
{
    protected static string $resource = SubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Subscriptions Success Edited';
    }
}
