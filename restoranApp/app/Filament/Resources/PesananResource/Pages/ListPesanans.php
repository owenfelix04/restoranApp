<?php

namespace App\Filament\Resources\PesananResource\Pages;

use App\Filament\Resources\PesananResource;
use App\Models\Pesanan; // Import Pesanan model
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Forms; // Import Forms for DatePicker component

class ListPesanans extends ListRecords
{
    protected static string $resource = PesananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(), // New button
            Actions\Action::make('cetak_laporan')
                ->label('Cetak Laporan')
                ->icon('heroicon-o-printer')
                ->action(fn() => static::cetakLaporan())
                ->requiresConfirmation()
                ->modalHeading('Cetak Laporan Pesanan')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            EditAction::make(), // Allows editing individual records from the list view
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(), // Allows bulk deleting of records
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Actions\Filter::make('status')
                ->label('Filter by Status')
                ->query(fn ($query) => $query->where('status', '!=', '')),
            
            Actions\Filter::make('tanggal_pesanan')
                ->label('Filter by Date')
                ->form([
                    Forms\Components\DatePicker::make('tanggal_pesanan')->label('Tanggal Pesanan'),
                ])
                ->query(fn ($query, array $data) => $query->whereDate('tanggal_pesanan', $data['tanggal_pesanan'] ?? null)),
        ];
    }

    public static function cetakLaporan()
    {
        // Retrieve order data with related customer and menu information
        $orders = Pesanan::with(['pelanggan', 'menus'])->get();

        // Load the view to generate PDF
        $pdf = \PDF::loadView('laporan.cetak', ['orders' => $orders]);

        // Stream download the PDF file
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan_pesanan.pdf');
    }
}
