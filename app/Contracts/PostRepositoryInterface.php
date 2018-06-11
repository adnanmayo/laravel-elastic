<?php
/**
 * Created by PhpStorm.
 * User: adnanmumtaz
 * Date: 6/11/18
 * Time: 4:34 PM
 */

namespace App\Contracts;

interface PostRepositoryInterface{

    public function search(string $query = ''): \Illuminate\Support\Collection;
    public function all(): \Illuminate\Support\Collection;

}