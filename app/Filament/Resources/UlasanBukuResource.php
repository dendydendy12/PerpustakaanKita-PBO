<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UlasanBukuResource\Pages;
use App\Filament\Resources\UlasanBukuResource\RelationManagers;
use App\Models\UlasanBuku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UlasanBukuResource extends Resource
{
    protected static ?string $model = UlasanBuku::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('user_id')
                    ->label('Nama Pengguna')
                    ->relationship('user', 'name')
                    ->required(),

                Forms\Components\Select::make('buku_id')
                    ->label('buku')
                    ->relationship('buku', 'judul')
                    ->required(),

                Forms\Components\RichEditor::make('ulasan')
                    ->required()
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underLine',
                        'undo',
                    ]),

                Forms\Components\Select::make('rating')
                    ->label('Rating')
                    ->options([
                        1 => '⭐ 1 - Buruk',
                        2 => '⭐⭐ 2 - Cukup',
                        3 => '⭐⭐⭐ 3 - Baik',
                        4 => '⭐⭐⭐⭐ 4 - Sangat Baik',
                        5 => '⭐⭐⭐⭐⭐ 5 - Luar Biasa',
                    ])
                    ->required()
                    ->default(3),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Pengguna')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('buku.judul')
                    ->label('Judul Buku')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('ulasan')
                    ->label('Ulasan')
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('rating')
                    ->label('Rating')
                    ->formatStateUsing(fn(string $state): string => str_repeat('⭐', (int)$state))
                    ->sortable(),

                //
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
            'index' => Pages\ListUlasanBukus::route('/'),
            'create' => Pages\CreateUlasanBuku::route('/create'),
            'edit' => Pages\EditUlasanBuku::route('/{record}/edit'),
        ];
    }
}