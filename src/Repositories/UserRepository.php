<?php


namespace Src\Repositories;


use App\Models\User;

class UserRepository extends BaseRepository
{
    /**
     * OrderRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(new User());
    }
}