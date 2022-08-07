<?php

namespace App\Trading\Models;

use App\Support\Models\ModelProvider;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * @method Trading createWithAttributes(array $attributes = [])
 * @method Trading|null first(array $conditions = [])
 * @method Trading|null firstByUnique(int|string $unique)
 */
class TradingProvider extends ModelProvider
{
    public string $modelClass = Trading::class;

    public function firstBySlug(string $slug): ?Trading
    {
        return $this->first(['slug' => $slug]);
    }

    public function allBySubscriber($subscriber): Collection
    {
        return $this->executeAll(
            $this->whereQuery()
                ->whereHas('subscribers', function ($query) use ($subscriber) {
                    $query->where('id', $this->retrieveKey($subscriber));
                })
        );
    }

    public function paginationBySubscriber($subscriber, ?int $perPage = null, ?int $page = null): LengthAwarePaginator
    {
        return $this->executePagination(
            $this->whereQuery()
                ->whereHas('subscribers', function ($query) use ($subscriber) {
                    $query->where('id', $this->retrieveKey($subscriber));
                }),
            $perPage,
            $page
        );
    }

    public function allByHavingSubscribers(): Collection
    {
        return $this->executeAll(
            $this->whereQuery()->has('subscribers')
        );
    }
}
