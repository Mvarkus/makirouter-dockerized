<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController
{
    public function index(): Response
    {
        return new Response('List of users');
    }

    public function show(int $id): Response
    {
        return new Response("User with id #{$id}");
    }

    public function store(): Response
    {
        return new Response('Create new user');
    }

    public function update(int $id): Response
    {
        return new Response("Update user with id #{$id}");
    }

    public function destroy(int $id): Response
    {
        return new Response("Delete user with id #{$id}");
    }
}