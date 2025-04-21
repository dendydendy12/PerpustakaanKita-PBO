<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KoleksiPribadiResource\Pages;
use App\Filament\Resources\KoleksiPribadiResource\RelationManagers;
use App\Models\KoleksiPribadi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Peminjaman;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KoleksiPribadiResource extends Resource
{
    protected static ?string $model = KoleksiPribadi::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box-arrow-down';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('user_id')
                    ->label('Peminjam')
                    ->relationship('user', 'name')
                    ->required(),

                Forms\Components\Select::make('buku_id')
                    ->label('Buku')
                    ->relationship('buku', 'judul')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
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
                    ->label('Tanggal Pinjam')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal_pengembalian')
                    ->label('Tanggal Kembali')
                    ->date()
                    ->sortable(),



            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\Action::make('returnBook')
                ->label('Mengembalikan Buku')
                ->action(function ($record) {
                    //logika pengembalian buku
                    $peminjaman = Peminjaman::where('user_id', $record->user_id)
                    ->where('buku_id', $record->buku_id)
                    ->whereNull('tanggal_pengembalian')
                    ->first();

                    if ($peminjaman) {
                        $peminjaman->returnBook();

                         // Kirim pemberitahuan jika buku berhasil dikembalikan
                        Notification::make()
                            ->title('Buku Telah Dikembalikan')
                            ->success()
                            ->body('Buku berhasil dikembalikan oleh ' . $record->user->name)
                            ->send();
                    }
                })

                ->color('primary')
                ->icon('heroicon-o-check'),

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
            'index' => Pages\ListKoleksiPribadis::route('/'),

           'create' => Pages\CreateKoleksiPribadi::route('/create'),
            'edit' => Pages\EditKoleksiPribadi::route('/{record}/edit'),
        ];

   }
}