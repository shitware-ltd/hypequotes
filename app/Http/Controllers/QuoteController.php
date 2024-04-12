<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Http\Resources\QuoteCollection;
use App\Http\Resources\QuoteResource;
use App\Models\Quote;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new QuoteCollection(Quote::query()->simplePaginate(15));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateQuoteRequest $request)
    {
        $quote = Quote::create($request->validated());

        return new QuoteResource($quote);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {
        return new QuoteResource($quote);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        $quote->update($request->validated());

        return new QuoteResource($quote);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();

        return response()->noContent();
    }
}
