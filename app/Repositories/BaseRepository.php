<?php

namespace App\Repositories;

use App\Traits\{
    Authentication,
    Generator,
    ResponseAPI,
    Getter
};


class BaseRepository
{
    use Authentication,
        Generator,
        ResponseAPI,
        Getter;
}
