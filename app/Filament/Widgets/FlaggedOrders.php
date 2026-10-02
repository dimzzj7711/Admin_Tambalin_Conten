<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class FlaggedOrders extends BaseWidget
{
    protected static ?string $heading = 'Flagged Orders';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Order::query()->whereIn('status', ['new', 'processing'])
            )
            ->defaultSort('created_at', 'asc')
            ->paginated([5, 10, 25])
            ->defaultPaginationPageOption(5)
            ->columns([
                TextColumn::make('number')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('customer.name')
                    ->label('Customer')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn (string $state) => ucfirst($state))
                    ->color(fn (string $state) => match ($state) {
                        'new' => 'info',
                        'processing' => 'warning',
                        default => 'gray',
                    })
                    ->icon(fn (string $state) => match ($state) {
                        'new' => 'heroicon-m-sparkles',
                        'processing' => 'heroicon-m-arrow-path',
                        default => null,
                    }),

                TextColumn::make('total_price')
                    ->money('USD')
                    ->alignEnd()
                    ->sortable(),

                TextColumn::make('days_old')
                    ->label('Days old')
                    ->state(fn (Order $record) => (int) $record->created_at->diffInDays(now()))
                    ->weight('bold')
                    ->sortable(query: fn (Builder $query, string $direction) =>
                        $query->orderBy('created_at', $direction === 'asc' ? 'desc' : 'asc')
                    ),

                TextColumn::make('issue')
                    ->state(fn (Order $record) => $record->status === 'new'
                        ? 'Awaiting processing'
                        : 'Stuck in processing')
                    ->badge()
                    ->color(fn (string $state) => $state === 'Awaiting processing' ? 'warning' : 'danger'),
            ]);
    }
}