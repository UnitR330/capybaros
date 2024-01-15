<?php
namespace App\DB;


interface DataBase
{
    function create(object $userData) : int;

    function update(int $userId, object $userData) : bool;

    function delete(int $userId) : void;

    function show(int $userId) : array;
    
    function showAll() : array;
}