<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ScheduleService;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ScheduleServiceResource\Pages;
use App\Filament\Resources\ScheduleServiceResource\RelationManagers;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\SelectColumn;
use App\Models\User;

class ScheduleServiceResource extends Resource
{
    protected static ?string $model = ScheduleService::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                ->label('Nama Perusahaan')
                ->options(
                    User::pluck('name','id')
                ),
                DatePicker::make('tanggal_terakhir_service'),
                DatePicker::make('tanggal_service_selanjutnya'),
                TextInput::make('unit'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SelectColumn::make('user_id')
                ->label('Nama Perusahaan')
                ->options(User::pluck('name', 'id'))
                ->searchable()
                ->disabled()                
                ->label('Nama Perusahaan'),
                TextColumn::make('tanggal_terakhir_service'),
                TextColumn::make('tanggal_service_selanjutnya'),
                TextColumn::make('unit'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListScheduleServices::route('/'),
            'create' => Pages\CreateScheduleService::route('/create'),
            'edit' => Pages\EditScheduleService::route('/{record}/edit'),
        ];
    }
}