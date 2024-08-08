<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Carbon\CarbonImmutable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'fas-cart-shopping';

    protected static ?string $navigationLabel = "Orders";
    protected static ?string $modelLabel = "Order";
    protected static ?string $navigationGroup = "Order Details";
    protected static ?string $slug = "orders";
    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() < 10 ? 'warning' : 'success';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
//                Forms\Components\TextInput::make('created_by_name')
//                    ->maxLength(255)
//                    ->default(null),
                Forms\Components\Section::make('Customer/Items Details')->schema([
                    Forms\Components\Select::make('customer_id')
                        ->relationship('customer', 'name')
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->live()
                        ->required(),
                    Forms\Components\Select::make('stock_item_id')
                        ->relationship('stockItem', 'name')
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->live()
                        ->required(),
                    Forms\Components\Select::make('size_id')
                        ->relationship('size', 'name')
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->live()
                        ->required(),
                    Forms\Components\TextInput::make('quantity')
                        ->numeric()
                        ->default(null),
                    Forms\Components\TextInput::make('each_item_amount')
                        ->label('Amount For Each Item')
                        ->numeric()
                        ->default(null)->columnSpan(1),
                    Forms\Components\TextInput::make('amount')
                        ->label('Total Amount')
                        ->numeric()
                        ->default(null),
                ])->columns(3),

                Forms\Components\Section::make('Vendor Details')->schema(
                    [
                        Forms\Components\Select::make('paper')
                            ->relationship('paperVendor', 'name')
                            ->label('Paper')
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->live()
                            ->required(),
                        Forms\Components\Select::make('plate')
                            ->relationship('plateVendor', 'name')
                            ->label('Plate')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->live()
                            ->required(),
                        Forms\Components\Select::make('printing')
                            ->relationship('printingVendor', 'name')
                            ->label('Printing')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->live()
                            ->required(),
                        Forms\Components\Select::make('lamination')
                            ->relationship('laminationVendor', 'name')
                            ->label('Lamination')
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->live()
                            ->required(),
                        Forms\Components\Select::make('binding')
                            ->relationship('bindingVendor', 'name')
                            ->label('Binding')
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->live()
                            ->required()
                            ->columnSpanFull(),

                    ]
                )->columns(2),

                Forms\Components\Section::make('Dates')->schema(
                    [
                        Forms\Components\DatePicker::make('order_date')
                            ->default(now()) // Set the default value to the current datetime
                            ->format('Y-m-d H:i:s'),
                        Forms\Components\DatePicker::make('delivery_date')
                            ->required(),
                        Forms\Components\Select::make('created_by')
                            ->relationship('user', 'name')
                            ->label('Created By')
                            ->default(Auth::user()->id)
                            ->required()
                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_by_name')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('each_item_amount')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('customer.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('size.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('stockItem.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('paperVendor.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('plateVendor.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('printingVendor.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('laminationVendor.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('bindingVendor.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('delivery_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Created By')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
