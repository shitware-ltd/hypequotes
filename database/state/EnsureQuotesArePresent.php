<?php

namespace Database\State;

use App\Models\Quote;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;

class EnsureQuotesArePresent
{
    public function __invoke(): void
    {
        if ($this->present()) {
            return;
        }

        LazyCollection::make($this->openAndParseCsv(...))
            ->map($this->mapCsvRow(...))
            ->each($this->createQuote(...));
    }

    public function present(): bool
    {
        return DB::table('quotes')->count() > 0;
    }

    private function openAndParseCsv(): iterable
    {
        $handle = fopen(storage_path('quotes.csv'), 'r');
        $header = fgetcsv($handle);

        while (($line = fgetcsv($handle)) !== false) {
            $row = array_combine($header, $line);
            yield $row;
        }

        fclose($handle);
    }

    private function mapCsvRow(array $row): array
    {
        return [
            'quote' => $row['quote'],
            'quotee' => $row['quotee'],
        ];
    }

    private function createQuote(array $quote): void
    {
        Quote::create($quote);
    }
}
