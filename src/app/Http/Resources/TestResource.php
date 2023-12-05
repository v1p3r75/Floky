<?php

namespace App\Http\Resources;

use Floky\Http\Requests\Request;
use Floky\Http\Resources\Resource;

class TestResource extends Resource
{
    public function toArray(Request $request): array
    {
        return [
            'first' => $this->attr . ' + ' . $request->getUri(),
        ];
    }
}