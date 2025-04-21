<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BukuResource\Pages;
use App\Filament\Resources\BukuResource\RelationManagers;
use App\Models\Buku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;

class BukuResource extends Resource
{
    protected static ?string $model = Buku::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('cover')
                    ->required()
                    ->image(),

                Forms\Components\TextInput::make('penulis')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('tahun_terbit')
                    ->required()
                    ->numeric()
                    ->maxLength('4')
                    ->label('Tahun Terbit'),

                Forms\Components\TextInput::make('stok_buku')
                    ->required()
                    ->numeric()
                    ->maxLength('4')
                    ->label('Stok Buku'),

                Forms\Components\Select::make('kategori_id') // Nama field sesuai kolom di tabel bukus
                    ->relationship('kategoriBuku', 'nama_kategori') // Sesuaikan dengan nama relasi dan kolom di model KategoriBuku
                    ->required()
                    ->searchable()
                    ->preload(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),

                Tables\Columns\TextColumn::make('penulis')
                    ->searchable(),

                Tables\Columns\ImageColumn::make('cover')
                    ->label('Cover Buku')
                    ->width(50)
                    ->height(50)
                // ->image()
                , // Opsi ukuran gambar


                Tables\Columns\TextColumn::make('tahun_terbit')
                    ->sortable()
                    ->label('Tahun Terbit')
                    ->searchable(),

                Tables\Columns\TextColumn::make('kategoriBuku.nama_kategori') // Menampilkan nama kategori
                    ->label('Kategori') // Label kolom di tabel
                    ->sortable() // Membuat kolom dapat diurutkan
                    ->searchable(), // Membuat kolom dapat dicari

                Tables\Columns\TextColumn::make('stok_buku')
                    ->sortable()
                    ->label('Stok Buku')

                    ->searchable(),



            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListBukus::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
        ];
    }
}