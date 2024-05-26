<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MembershipRequestResource\Pages;
use App\Filament\Resources\MembershipRequestResource\RelationManagers;
use App\Models\MembershipRequest;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MembershipRequestResource extends Resource
{
    protected static ?string $model = MembershipRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\Select::make('membership_id')
                    ->relationship('membership', 'id'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('membership.status')
                    ->badge()
                    ->sortable(),
            ])
            ->defaultPaginationPageOption(25)
            ->extremePaginationLinks()
            ->searchDebounce('750ms')
            ->persistSearchInSession()
            ->persistColumnSearchesInSession()
            ->persistSortInSession()
            ->filters([
                SelectFilter::make('membership.status')
                    ->relationship('membership', 'status'),
            ])
            ->filtersFormSchema(fn(array $filters): array => [
                Section::make('Filters')
                    ->description('These filters affect the visibility of the records in the table.')
                    ->schema([
                        $filters['membership.status'],
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembershipRequests::route('/'),
            'create' => Pages\CreateMembershipRequest::route('/create'),
            'edit' => Pages\EditMembershipRequest::route('/{record}/edit'),
        ];
    }
}
