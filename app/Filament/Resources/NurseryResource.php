<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NurseryResource\Pages;
use App\Filament\Resources\NurseryResource\RelationManagers;
use App\Models\Nursery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Ramsey\Uuid\Guid\Fields;

class NurseryResource extends Resource
{
    protected static ?string $model = Nursery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Nursery Name')
                    ->aside()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->columnSpan(2)
                            ->hiddenLabel(),

                    ]),

                Forms\Components\Section::make('Address')
                    ->aside()
                    ->schema([
                        Forms\Components\TextInput::make('address_line_1'),
                        Forms\Components\TextInput::make('address_line_2'),
                        Forms\Components\TextInput::make('town'),
                        Forms\Components\TextInput::make('county'),
                        Forms\Components\TextInput::make('postcode'),
                    ])
                    ->columns(1),

                Forms\Components\Section::make('Telephone')
                    ->aside()
                    ->schema([
                        Forms\Components\TextInput::make('telephone')
                            ->hiddenLabel()
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextInputColumn::make('name')
                    ->searchable(),
            ])
            ->filters([
                //
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
            'index'  => Pages\ListNurseries::route('/'),
            'create' => Pages\CreateNursery::route('/create'),
            'edit'   => Pages\EditNursery::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->organisation();
    }
}
