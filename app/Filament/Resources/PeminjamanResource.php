<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeminjamanResource\Pages;
use App\Models\Peminjaman;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
// use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\BadgeColumn;

class PeminjamanResource extends Resource
{
    protected static ?string $model = Peminjaman::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Nama Peminjam')
                    ->relationship('user', 'name')
                    ->required(),

                Forms\Components\Select::make('buku_id')
                    ->label('Judul Buku')
                    ->relationship('buku', 'judul')
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_peminjaman')
                    ->label('Tanggal Peminjaman')
                    ->default(now())
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_pengembalian')
                    ->label('Tanggal Pengembalian'),

                Forms\Components\Select::make('status_peminjaman')
                    ->label('Status Peminjaman')
                    ->options([
                        'belum' => 'Belum Dikembalikan',
                        'sudah' => 'Sudah Dikembalikan',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Peminjam')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('buku.judul')
                    ->label('Buku')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal_peminjaman')
                    ->label('Tanggal Peminjaman')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal_pengembalian')
                    ->label('Tanggal Pengembalian')
                    ->date()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('status_peminjaman') // Pastikan nama field sesuai dengan database Anda
                    ->label('Status')
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'belum' => 'Belum Dikembalikan',
                        'sudah' => 'Sudah Dikembalikan',
                        default => 'Tidak Diketahui',
                    })
                    ->colors([
                        'danger' => 'belum',
                        'success' => 'sudah',
                    ]),

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
            'index' => Pages\ListPeminjamen::route('/'),
            'create' => Pages\CreatePeminjaman::route('/create'),
            'edit' => Pages\EditPeminjaman::route('/{record}/edit'),
        ];
    }
}