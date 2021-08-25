<?php
declare(strict_types=1);

namespace App\Service;
use Str;

class LinkService
{
    public function getLinkHashGenerate():string
    {
        return str_shuffle(Str::upper(Str::random(2)) . Str::lower(Str::random(2)).mt_rand(10,99));
    }
}
