<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Jumbotron;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\JumbotronResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\JumbotronResource\RelationManagers;

class JumbotronResource extends Resource
{
    protected static ?string $model = Jumbotron::class;
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Gambar Header';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul'),
                TextInput::make('deskripsi'),
                FileUpload::make('gambar')
                    ->required()
                    ->preserveFilenames() 
                    ->maxSize(5000000) 
                    ->visibility('public')  
                    
                    
                    
            ]);       
                
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul'),
                TextColumn::make('deskripsi'),
                ImageColumn::make('gambar'),
                TextColumn::make('created_at'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListJumbotrons::route('/'),
            'create' => Pages\CreateJumbotron::route('/create'),
            'edit' => Pages\EditJumbotron::route('/{record}/edit'),
        ];
    }
}