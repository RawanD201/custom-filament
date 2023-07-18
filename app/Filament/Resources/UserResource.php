<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use Filament\Tables\Filters\TernaryFilter;
use Phpsa\FilamentPasswordReveal\Password;
use Filament\Forms\Components\TextInput\Mask;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $slug = 'users';


    protected static ?int $navigationSort = -1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('fullname')
                            ->label(__('attr.fullname'))
                            ->required()
                            ->minLength(2)
                            ->maxLength(255),
                        TextInput::make('username')
                            ->label(__('attr.username'))
                            ->minLength(2)
                            ->maxLength(255)
                            ->required(),
                        DatePicker::make('birthday')
                            ->label(__('attr.birthday'))
                            ->default(now())
                            ->displayFormat('d/m/Y')
                            ->required(),
                        TextInput::make('phone')
                            ->label(__('attr.phone'))
                            ->tel()
                            ->required()
                            ->maxLength(255)
                            ->mask(fn (Mask $mask) => $mask->pattern('0000 000 00 00'))
                            ->autocomplete(),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('index')
                    ->label(__('attr.index'))
                    ->toggleable()
                    ->grow(false)
                    ->getStateUsing(
                        static fn (\stdClass $rowLoop): string => (string) $rowLoop->iteration
                    )
                    ->rowIndex(),
                TextColumn::make('fullname')
                    ->label(__('attr.name'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('username')
                    ->label(__('attr.username'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                IconColumn::make('is_active')
                    ->label(__('attr.status'))
                    ->grow(false)
                    ->options([
                        'heroicon-o-check-circle' => __('true'),
                        'heroicon-o-x-circle' => __('false'),
                    ])
                    ->colors([
                        'success' => __('true'),
                        'danger' => __('false'),
                    ])
                    ->getStateUsing(fn (User $record) => $record->is_active ? __('true') : __('false'))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('phone')
                    ->label(__('attr.phone'))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('birthday')
                    ->label(__('attr.birthday'))
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label(__('attr.created_at'))
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('updated_at')
                    ->label(__('attr.updated_at'))
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label(__('attr.status'))
                    ->indicator('Actives')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    protected static function getNavigationLabel(): string
    {
        return __('labels.users.list');
    }

    protected function getTitle(): string
    {
        return __('labels.users.list');
    }


    public static function getPluralLabel(): string
    {
        return __('labels.departments.list');
    }
}
