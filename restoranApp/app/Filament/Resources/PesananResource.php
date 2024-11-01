<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesananResource\Pages;
use App\Filament\Resources\PesananResource\RelationManagers;
use App\Models\Pesanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class PesananResource extends Resource
{
    protected static ?string $model = Pesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('pelanggan_id')
                    ->relationship('pelanggan', 'nama')
                    ->label('Pelanggan')
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'sedang disiapkan' => 'Sedang Disiapkan',
                        'siap diantar' => 'Siap Diantar',
                        'sudah selesai' => 'Sudah Selesai',
                    ])
                    ->label('Status')
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_pesanan')
                    ->label('Tanggal Pesanan')
                    ->required(),

                Forms\Components\Select::make('menus')
                    ->label('Menus')
                    ->multiple() // Allow multiple selection
                    ->relationship('menus', 'nama_hidangan'), // Set up relationship with `menus`
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('pelanggan.nama')->label('Pelanggan')->sortable()->searchable(),
            TextColumn::make('status')->label('Status')->sortable(),
            TextColumn::make('tanggal_pesanan')->label('Tanggal Pesanan')->sortable(),
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
            'index' => Pages\ListPesanans::route('/'),
            'create' => Pages\CreatePesanan::route('/create'),
            'edit' => Pages\EditPesanan::route('/{record}/edit'),
        ];
    }
}
